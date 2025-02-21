<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iodev\Whois\Factory as Whois;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Stringy\Stringy;
use GuzzleHttp\Client;
use Symfony\Component\HttpClient\HttpClient;
use Spatie\Browsershot\Browsershot;
use GuzzleHttp\Cookie\FileCookieJar;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Symfony\Component\DomCrawler\Crawler; 
use Yajra\DataTables\DataTables;
use GuzzleHttp\TransferStats;
use Spatie\SslCertificate\SslCertificate;
use App\Models\DomainPending;
use App\Models\DomainExpired;
use App\Models\DomainCategory;
class DomainController extends Controller
{
    private $blockedTlds = [
        '.cn', '.hk', '.ru', '.adult', '.chat', '.cfd', '.church', '.ceo', 
            '.club', '.corsica', '.coupons', '.dating', '.date', '.email', 
            '.eco', '.faith', '.fyi', '.frl', '.gal', '.game', '.gay', '.gmbh', 
            '.kim', '.joburg', '.kiwi', '.llc', '.love', '.lgbt', '.nrn', '.onl', 
            '.ninja', '.moster', '.ooo', '.porn', '.rip', '.saarland', '.sbs', 
            '.rodeo', '.sbs', '.sex', '.sexy', '.singles', '.srl', '.viajes', 
            '.vin', '.vip', '.vlaaderen', '.vodka', '.villas', '.voto', '.wang', 
            '.wien', '.webcam', '.wtf', '.xin', '.zip', '.vu', '.cz', '.app',
            '.cl', '.ge', '.com.do', '.do', '.dev', '.sx', '.com.mx', '.com.ua', 
            '.uz', '.com.my', '.com.tw', '.tw', '.xxx', '.aero', '.cat', '.bond', 
            '.fun', '.wiki', '.weddings', '.bet', '.win', '.bid', '.tirol', 
            '.futbol', '.uno', '.zone', '.rocks', '.run', '.rent', '.rest', 
            '.support', '.fish', '.team', '.fail', '.tips', '.buzz', '.fishing', 
            '.brussels', '.life', '.mom', '.ac', '.ag', '.ar', '.ax', '.bh', 
            '.by', '.cm', '.dk', '.ee', '.fm', '.gd', '.gi', '.gy', '.hr', '.id', 
            '.is', '.jp', '.ky', '.lc', '.lt', '.ly', '.md', '.ms', '.my', '.nl', 
            '.nz', '.ph', '.pm', '.pw', '.ro', '.rw', '.se', '.si', '.sn', '.su', 
            '.tf', '.tn', '.tz', '.uz', '.vu', '.yt', '.ae', '.ai', '.at', '.be', 
            '.bi', '.bz', '.ch', '.es', '.fo', '.gl', '.ht', '.ie', '.io', '.it', 
            '.kg', '.kz', '.li', '.lu', '.ma', '.mk', '.mu', '.nc', '.no', '.om', 
            '.pk', '.pr', '.qa', '.rs', '.sa', '.sg', '.sk', '.so', '.sx', '.tg', 
            '.tv', '.ua', '.vc', '.wf', '.af', '.am', '.au', '.bg', '.bj', '.ca', 
            '.cl', '.co', '.ec', '.fi', '.gg', '.gs', '.hn', '.hu', '.im', '.ir', 
            '.je', '.kr', '.la', '.ls', '.lv', '.me', '.mn', '.mx', '.ng', '.nu', 
            '.pe', '.pl', '.pt', '.re', '.sc', '.sh', '.sm', '.st', '.tc', '.tl', 
            '.tw', '.ug', '.uy', '.vg', '.ws', '.pro', '.aero', '.asia', '.co.uk'
    ];

    private function isDomainBlocked($domain)
    {
        // Extraire le TLD du domaine
        $parts = explode('.', strtolower($domain));
        $tld = end($parts);
        //dd($parts);
        // Vérifier aussi les TLD composés (ex: co.uk)
        if (count($parts) > 2) {
            $secondLevelTld = $parts[count($parts) - 2] . '.' . $tld;
            if (in_array($secondLevelTld, $this->blockedTlds)) {
                return true;
            }
        }
        
        return in_array($tld, $this->blockedTlds);
    }

    public function domain_available_pending(Request $request)
    {
        // Commence avec une requête pour récupérer les domaines et leurs catégories
        $query_pending = DomainPending::with('categories');

        // Filtre par catégorie si spécifié
        if ($request->filled('category')) {
            $query_pending->whereHas('categories', function ($q) use ($request) {
                $q->where('domain_categories.id', $request->category);
            });
        }

        // Filtrer par High DA si le paramètre est présent
        if ($request->filled('high_da')) {
            $query_pending->where('DA', '>=', 10)->orderBy('DA', 'desc');
        }

        // Filtrer par TLD si spécifié
        if ($request->filled('tld')) {
            $query_pending->where('domain_name', 'LIKE', "%." . $request->tld);
        }

        // Filtre par type de valeur (starts, contains, ends)
        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $value = $request->filter_value;
            switch ($request->filter_type) {
                case 'starts':
                    $query_pending->where('domain_name', 'LIKE', "$value%");
                    break;
                case 'contains':
                    $query_pending->where('domain_name', 'LIKE', "%$value%");
                    break;
                case 'ends':
                    $query_pending->where('domain_name', 'LIKE', "%$value");
                    break;
            }
        }

        // Récupération des catégories pour le formulaire
        $categories = DomainCategory::distinct()->get();

        // Pagination des résultats
        $pending_domains = $query_pending->orderBy('add_date', 'desc')->paginate(10);

        // Retourne la vue avec les données
        return view('domain_available_pending', [
            'pending_domains' => $pending_domains,
            'high_da' => $request->high_da,
            'categories' => $categories,
            'category' => $request->category
        ]);
    }

    public function domain_available_expired(Request $request){
        // Commence avec une requête pour récupérer les domaines et leurs catégories
        $query_expired = DomainExpired::with('categories');

        // Filtre par catégorie si spécifié
        if ($request->filled('category')) {
            $query_expired->whereHas('categories', function ($q) use ($request) {
                $q->where('domain_categories.id', $request->category);
            });
        }

        // Filtrer par High DA si le paramètre est présent
        if ($request->filled('high_da')) {
            $query_expired->where('DA', '>=', 10)->orderBy('DA', 'desc');
        }

        // Filtrer par TLD si spécifié
        if ($request->filled('tld')) {
            $query_expired->where('domain_name', 'LIKE', "%." . $request->tld);
        }

        // Filtre par type de valeur (starts, contains, ends)
        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $value = $request->filter_value;
            switch ($request->filter_type) {
                case 'starts':
                    $query_expired->where('domain_name', 'LIKE', "$value%");
                    break;
                case 'contains':
                    $query_expired->where('domain_name', 'LIKE', "%$value%");
                    break;
                case 'ends':
                    $query_expired->where('domain_name', 'LIKE', "%$value");
                    break;
            }
        }

        // Récupération des catégories pour le formulaire
        $categories = DomainCategory::distinct()->get();
        //dd($categories);
        // Pagination des résultats
        $expired_domains = $query_expired->orderBy('add_date', 'desc')->paginate(10);

        return view('domain_available_expired',[
            'expired_domains' => $expired_domains,
            'high_da' => $request->has('high_da'),
            'categories' => $categories,
            'category' => $request->category
        ]);
    }
    
    

    public function domain_available(Request $request){
        
        // file_get_contents(url('/api/expired-domains'));

        /* if ($request->ajax()) {
            $today = Carbon::now()->toDateString();
            $existingRecord = DB::table('expiry_domain_cronjob')
            ->whereDate('created_at', $today)
            // ->where('cronjob', 0)         
            ->first();
            $data = DB::table('domain_details')
            ->where('expiry_domain_statistics_id', ($existingRecord->id ?? 'no'));      
            // ->get();
        return DataTables::of($data)
            ->editColumn(
                'created_at',
                function ($row) {
                    return $row->created_at;
                }
            )        
            ->addColumn(
                'actions',
                function ($row) {
                    // $actions = '<a href='. route('admin.users.show', $row->domain_id) .'><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>
                    //         <a href='. route('admin.users.edit', $row->domain_id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>';
                    // if ((Sentinel::getUser()->domain_id !== $row->domain_id) && ($row->domain_id > 2)) {
                    //     $actions .= '<a href='. route('admin.users.confirm-delete', $row->domain_id) .' data-id="'.$row->id.'" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';
                    // }
                    // return $actions;
                    return '';
                }
            )
            ->rawColumns(['actions'])
            ->make(true);
        } */

    }

    public function domain_available_pending_da(Request $request){
        $query_pending = DomainPending::with('categories');
        $query_pending->where('DA', '>=', 10);
        // Filtre par catégorie si spécifié
        if ($request->filled('category')) {
            $query_pending->whereHas('categories', function ($q) use ($request) {
                $q->where('domain_categories.id', $request->category);
            });
        }


        // Filtrer par TLD si spécifié
        if ($request->filled('tld')) {
            $query_pending->where('domain_name', 'LIKE', "%." . $request->tld);
        }

        // Filtre par type de valeur (starts, contains, ends)
        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $value = $request->filter_value;
            switch ($request->filter_type) {
                case 'starts':
                    $query_pending->where('domain_name', 'LIKE', "$value%");
                    break;
                case 'contains':
                    $query_pending->where('domain_name', 'LIKE', "%$value%");
                    break;
                case 'ends':
                    $query_pending->where('domain_name', 'LIKE', "%$value");
                    break;
            }
        }

        //dd($expired_domains);
        $categories = DomainCategory::distinct()->get();
        $pending_domains = $query_pending->orderBy('id', 'asc')->paginate(10);
        return view('domain_available_pending_da', [
            'pending_domains' => $pending_domains,
            'categories' => $categories,
            'category' => $request->category
        ]);
    }

    public function domain_available_expired_da(Request $request){
        $query_expired = DomainExpired::with('categories');
        $query_expired->where('DA', '>=', 10);
        //dd($expired_domains);
        // Filtre par catégorie si spécifié
        if ($request->filled('category')) {
            $query_expired->whereHas('categories', function ($q) use ($request) {
                $q->where('domain_categories.id', $request->category);
            });
        }

        // Filtrer par High DA si le paramètre est présent
        if ($request->filled('high_da')) {
            $query_expired->where('DA', '>=', 10)->orderBy('DA', 'desc');
        }

        // Filtrer par TLD si spécifié
        if ($request->filled('tld')) {
            $query_expired->where('domain_name', 'LIKE', "%." . $request->tld);
        }

        // Filtre par type de valeur (starts, contains, ends)
        if ($request->filled('filter_type') && $request->filled('filter_value')) {
            $value = $request->filter_value;
            switch ($request->filter_type) {
                case 'starts':
                    $query_expired->where('domain_name', 'LIKE', "$value%");
                    break;
                case 'contains':
                    $query_expired->where('domain_name', 'LIKE', "%$value%");
                    break;
                case 'ends':
                    $query_expired->where('domain_name', 'LIKE', "%$value");
                    break;
            }
        }

        // Récupération des catégories pour le formulaire
        $categories = DomainCategory::distinct()->get();
        //dd($categories);
        // Pagination des résultats
        $expired_domains = $query_expired->orderBy('id', 'asc')->paginate(10);
        $categories = DomainCategory::distinct()->get();
        return view('domain_available_expired_da', [
            'categories' => $categories,
            'expired_domains' => $expired_domains

        ]);
    }
    public function domain_available_search(Request $request)
    {
        // Initialisation des requêtes pour les domaines expirés et en attente
        $expired_domains_query = DomainExpired::with('categories');
        $pending_domains_query = DomainPending::with('categories');
    
        // Appliquer les filtres si fournis
        if ($request->has('s')) {
            $keyword = $request->s;
            $expired_domains_query->where('domain_name', 'LIKE', "%$keyword%");
            $pending_domains_query->where('domain_name', 'LIKE', "%$keyword%");
        }
    
        if ($request->has('category')) {
            $category = $request->category;
            $expired_domains_query->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category);
            });
            $pending_domains_query->whereHas('categories', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }
    
        if ($request->has('high_da')) {
            $expired_domains_query->where('DA', '>=', 10);
            $pending_domains_query->where('DA', '>=', 10);
        }
    
        // Paginer les résultats
        $expired_domains = $expired_domains_query->paginate(10, ['*'], 'expired_page');
        $pending_domains = $pending_domains_query->paginate(10, ['*'], 'pending_page');
        $all_domains = $expired_domains->merge($pending_domains);

        // Récupérer les catégories pour les filtres
        $categories = DomainCategory::distinct()->get();
        //dd(all_domains->count());
        // Retourner la vue avec les données
        return view('domain_available_search', [
            'expired_domains' => $expired_domains,
            'pending_domains' => $pending_domains,
            'categories' => $categories,
            'search' => $request->s,
            'selected_category' => $request->category,
            'high_da' => $request->has('high_da'),
            'all_domains' => $all_domains
        ]);
    }
    
 
    /* public function domain_available_da(Request $request){

        // file_get_contents(url('/api/expired-domains'));

        if ($request->ajax()) {
            $today = Carbon::now()->toDateString();
            $existingRecord = DB::table('expiry_domain_cronjob')
            ->whereDate('created_at', $today)
            // ->where('cronjob', 0)         
            ->first();
            $data = DB::table('domain_details')
            ->where('da','>', 25)       
            ->where('expiry_domain_statistics_id', ($existingRecord->id ?? 'no'));     
            
        return DataTables::of($data)
            ->editColumn(
                'created_at',
                function ($row) {
                    return $row->created_at;
                }
            )        
            ->addColumn(
                'actions',
                function ($row) {
                    // $actions = '<a href='. route('admin.users.show', $row->domain_id) .'><i class="livicon" data-name="info" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="view user"></i></a>
                    //         <a href='. route('admin.users.edit', $row->domain_id) .'><i class="livicon" data-name="edit" data-size="18" data-loop="true" data-c="#428BCA" data-hc="#428BCA" title="update user"></i></a>';
                    // if ((Sentinel::getUser()->domain_id !== $row->domain_id) && ($row->domain_id > 2)) {
                    //     $actions .= '<a href='. route('admin.users.confirm-delete', $row->domain_id) .' data-id="'.$row->id.'" data-toggle="modal" data-target="#delete_confirm"><i class="livicon" data-name="user-remove" data-size="18" data-loop="true" data-c="#f56954" data-hc="#f56954" title="delete user"></i></a>';
                    // }
                    // return $actions;
                    return '';
                }
            )
            ->rawColumns(['actions'])
            ->make(true);
        }

        return view('domain_available_da');
    }

    public function domain_available_search(Request $request){
        $data =[];
        if ($request->s) {
            $d = file_get_contents(url('/api/search-expired-domains?keyword='.$request->s));
            $d = json_decode($d,true);
            $data = $d['data'];
        }
        return view('domain_available_search',compact('data'));
    } */


    public function website_status_checker(Request $request){

            $websiteStatusRequest = false;
            $websiteStatusStats = null;

        if ($domain = $request->domain) {
            $domain = str_replace(['http://', 'https://'], ['',''], $request->input('domain'));

            // dd($domain);

            $httpClient = new Client();

            
            try {
                $websiteStatusRequest = $httpClient->request('GET', 'http://' . $domain, [
                    'proxy' => [
                        'http' => $this->getRequestProxy(),
                        'https' => $this->getRequestProxy()
                    ],
                    'http_errors' => false,
                    'verify' => false,
                    'timeout' => config('settings.request_timeout',10000),
                    'allow_redirects' => [
                        'max'             => 10,
                        'strict'          => true,
                        'referer'         => true,
                        'protocols'       => ['http', 'https']
                    ],
                    'headers' => [
                        'User-Agent' => config('settings.request_user_agent')
                    ],
                    'on_stats' => function (TransferStats $stats) use (&$websiteStatusStats) {
                        if ($stats->hasResponse()) {
                            $websiteStatusStats = $stats->getHandlerStats();
                        }
                    }
                ]);
            } catch (\Exception $e) {}
        }

        return view('domain_analysis.website_status_checker',['domain' => ($domain ?? null), 'result' => $websiteStatusRequest, 'stats' => $websiteStatusStats]);
    }

    public function getRequestProxy()
    {
        // If request proxies are set
        if (!empty(config('settings.request_proxy'))) {
            // Check if there's a cached proxy already
            if (config('settings.request_cached_proxy')) {
                $proxy = config('settings.request_cached_proxy');
            } else {
                // Select a proxy at random
                $proxies = preg_split('/\n|\r/', config('settings.request_proxy'), -1, PREG_SPLIT_NO_EMPTY);
                $proxy = $proxies[array_rand($proxies)];

                // Cache the selected proxy
                config(['settings.request_cached_proxy' => $proxy]);
            }

            return $proxy;
        }

        return null;
    }

    public function ssl_checker(Request $request){
        $ssl = false;
        if ($domain = $request->domain) {
            $domain = str_replace(['http://', 'https://'], '', $request->input('domain'));

            
            try {
                $ssl = SslCertificate::createForHostName($domain, config('settings.request_timeout',10000), false);
            } catch (\Exception $e) {}

            
        }
        return view('domain_analysis.ssl-checker', [ 'domain' => ($domain ?? null), 'result' => $ssl]);
    }


    public function dns_lookup(Request $request){
        
        $dnsRecords=[];
        if ($domain = $request->domain) {
            $domain = str_replace(['http://', 'https://'], '', $request->input('domain'));

            try {
                $dnsRecords = dns_get_record($domain, DNS_A + DNS_AAAA + DNS_CNAME + DNS_MX + DNS_TXT + DNS_NS);
            } catch (\Exception $e) {
                $dnsRecords = [];
            }
        }

        return view('domain_analysis.dns-lookup',[ 'domain' => $domain, 'results' => $dnsRecords]);
    }

    public function whois_lookup(Request $request){
        $whoisRecords = false;
        if ($domain = $request->domain) {
            $domain = str_replace(['http://', 'https://', 'www.'], '', $request->input('domain'));

            
            try {
                $whoisRecords = Whois::get()->createWhois()->loadDomainInfo($domain);
            } catch (\Exception $e) {}
        }

        return view('domain_analysis.whois-lookup', [ 'domain' => $domain, 'result' => $whoisRecords]);
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt'
        ]);

        try {
            $file = $request->file('csv_file');
            $path = $file->getRealPath();
            
            $data = array_map('str_getcsv', file($path));
            $headers = array_shift($data);
            
            $importCount = 0;
            $blockedCount = 0;
            
            foreach ($data as $row) {
                $csvData = array_combine($headers, $row);
                
                // Vérifier si le domaine est bloqué
                if ($this->isDomainBlocked($csvData['domain'])) {
                    $blockedCount++;
                    continue;
                }
                
                $domainData = [
                    'domain_name' => $csvData['domain'],
                    'DA' => (int)$csvData['DA'],
                    'PA' => (int)$csvData['PA'],
                    'DR' => -1, // valeur par défaut
                    'TF' => (int)$csvData['TF'],
                    'CF' => (int)$csvData['CF'],
                    'spam_rating' => (int)explode('/', $csvData['spam_rating'])[0],
                    'total_backlinks' => (int)$csvData['total_backlinks'],
                    'referring_domains' => (int)$csvData['referring_domains'],
                    'external_links' => (int)$csvData['external_links'],
                    'internal_links' => abs((int)$csvData['total_backlinks'] - (int)$csvData['external_links']),
                    'add_date' => $csvData['add_date'],
                    'end_date' => $csvData['end_date'],
                    'domain_age' => $csvData['domain_age'],
                    'status' => $csvData['status'],
                    'tld_registered' => $csvData['tld_registered'],
                    'crawl_results' => $csvData['crawl_results'],
                    'global_rank' => $csvData['global_rank'],
                    'length' => $csvData['length'],
                    'com_tld' => $csvData['com_tld'],
                    'net_tld' => $csvData['net_tld'],
                    'org_tld' => $csvData['org_tld'],
                    'biz_tld' => $csvData['biz_tld'],
                    'info_tld' => $csvData['info_tld'],
                    'de_tld' => $csvData['de_tld'],
                ];
                
                DomainExpired::updateOrCreate($domainData);
                $importCount++;
            }

            $message = "Import terminé : $importCount domaines importés, $blockedCount domaines bloqués";
            return redirect()->back()->with('success', $message);
            
        } catch (\Exception $e) {
            \Log::error('Erreur d\'import :', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return redirect()->back()->with('error', 'Erreur lors de l\'import: ' . $e->getMessage());
        }
    }
}


