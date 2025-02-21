<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FlaskApiDomainPendingService;
use App\Services\FLaskApiPendingServiceFromExpDomains;
use App\Models\DomainPending;
use Illuminate\Support\Facades\DB;

class FlaskApiDomainPending extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:domain-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get expired domains from ExpiredDomains.net 
                                and save them in the database';

    protected $flaskApiService;

    public function __construct(
        FlaskApiDomainPendingService $flaskApiDomainPendingService,
        FLaskApiPendingServiceFromExpDomains $flaskApiPendingServiceFromExpDomains
        )
    {
        parent::__construct();
        $this->flaskApiDomainPendingService = $flaskApiDomainPendingService;
        $this->flaskApiPendingServiceFromExpDomains = $flaskApiPendingServiceFromExpDomains;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            ini_set('memory_limit', '2G'); 
            // Liste des TLD à exclure
            $excludedTlds = ['adult', 'sexy', 'sex', 'porn', 'xxx', 'love', 
            'dating', 'casino', 'bet', 'poker', 'gambling',
            'escort', 'cam', 'webcam', 'hot', 'gay', 'fun'];

            DB::beginTransaction();
            try {
                //$dataExpiredFromExpDomains = $this->flaskApiPendingServiceFromExpDomains->getData();
                //$dataExpired = $this->flaskApiDomainPendingService->getData();
                //print_r($dataExpiredFromExpDomains);
                //print_r($dataExpired);
                $page = 1;  // Page initiale
                $perPage = 5000;  // Nombre d'éléments par page
                $allDataExpiredFromExpDomains = [];  // Stocker toutes les données récupérées

                do {
                    // Récupérer les données paginées
                    $response = $this->flaskApiPendingServiceFromExpDomains->getData($page, $perPage);
                    print($response['status']);
                    print("Response de l'api Flask from expired domains à la page: ".$page." \n");
                    
                    if (isset($response['status']) && $response['status'] === 'success' && !empty($response['data'])) {
                        $dataExpiredFromExpDomains = $response['data'];
                        print("La taille des données de expired domains: ".count($dataExpiredFromExpDomains)." \n");
                        //$allDataExpiredFromExpDomains[] = $dataExpiredFromExpDomains;
                        // Ajouter les données récupérées à la liste globale
                        //$allDataExpiredFromExpDomains = array_merge($allDataExpiredFromExpDomains, $dataExpiredFromExpDomains);
                        foreach ($dataExpiredFromExpDomains as $item) {
                            if (!isset($item['Domain'])) {
                                continue; // Si la clé 'Domain' n'existe pas, on passe à l'élément suivant
                            }
                            $domainParts = explode('.', strtolower(trim($item['Domain'])));
                            $tld = end($domainParts);
                            
                            if (in_array($tld, $excludedTlds)) {
                                continue;
                            }
        
                            $age = ($item['Creation Date'] === '-' || $item['First Seen'] === '-') 
                                ? 0 
                                : abs((int)$item['Creation Date'] - (int)$item['First Seen']);
        
                            DomainPending::updateOrCreate(
                                ['domain_name' => $item['Domain']],
                                [
                                    'DA' => -1,
                                    'PA' => -1,
                                    'DR' => 0,
                                    'TF' => -1,
                                    'CF' => -1,
                                    'spam_rating' => -1,
                                    'total_backlinks' => (int)$item['Backlinks'],
                                    'referring_domains' => -1,
                                    'external_links' => -1,
                                    'internal_links' => -1,
                                    'add_date' => $item['Add Date'],
                                    'end_date' => $item['End Date'],
                                    'domain_age' => $age,
                                    'status' => $item['Status'],
                                    'tld_registered' => $item['TLD Registered'],
                                    'crawl_results' => $item['Crawl Results'],
                                    'global_rank' => $item['Global Rank'],
                                    'length' => $item['Length'],
                                    'com_tld' => $item['.com'],
                                    'net_tld' => $item['.net'],
                                    'org_tld' => $item['.org'],
                                    'biz_tld' => $item['.biz'],
                                    'info_tld' => $item['.info'],
                                    'de_tld' => $item['.de'],
                                    
                                ]
                            );
                            //print($a);
                            //$allDataExpiredFromExpDomains = [];
                        }
                        // Incrémenter la page pour la prochaine itération
                        $page++;
                    } else {
                        // Arrêter si aucune donnée n'est renvoyée
                        break;
                    }
                } while (!empty($dataExpiredFromExpDomains));
                //print("Response of all datas de l'api Flask from expired domains ");
                //print_r($allDataExpiredFromExpDomains);
                // Traitement des données de dataExpiredFromExpDomains
                

                $page = 1;  // Page initiale
                $perPage = 1000;  // Nombre d'éléments par page
                $allDataExpired = [];  // Stocker toutes les données récupérées

                do {
                    // Récupérer les données paginées
                    $response = $this->flaskApiDomainPendingService->getData($page, $perPage);
                    print("Response de l'api Flask des seo métrics à la page ".$page." \n");
                    //print_r($response);
                    
                    if (isset($response['status']) && $response['status'] === 'success' && !empty($response['data'])) {
                        $dataExpired = $response['data'];
                        print("La taille des données de check page: ".count($dataExpiredFromExpDomains)." \n");
                        //$allDataExpired[] = $dataExpired;
                        // Ajouter les données récupérées à la liste globale
                        //$allDataExpired = array_merge($allDataExpired, $dataExpiredFromExpDomains);

                        // Incrémenter la page pour la prochaine itération
                        foreach ($dataExpired as $item) {
                            if (!isset($item['domain'])) {
                                continue; // Si la clé 'Domain' n'existe pas, on passe à l'élément suivant
                            }
                            //print_r($item);
                            $domainParts = explode('.', strtolower(trim($item['domain'])));
                            $tld = end($domainParts);
                            
                            if (in_array($tld, $excludedTlds)) {
                                continue;
                            }
        
                            $backlinks = str_replace(' K', '000', $item['backlinks']);
                            $backlinks = str_replace('.', '', $backlinks);
                            $age = ($item['creation_date'] === '-' || $item['first_seen'] === '-') 
                                ? 0 
                                : abs((int)$item['creation_date'] - (int)$item['first_seen']);
                                if (!isset($item['domain']) || empty($item['domain'])) {
                                    $this->error('Domaine invalide : ' . json_encode($item));
                                    continue;
                                }
                            
                            $categories = $this->flaskApiDomainPendingService->assignCategories($item);
                            //print
                            
                            if (empty($categories)) {
                                $this->error('Aucune catégorie trouvée pour le domaine : ' . $item['domain']);
                                continue;
                            }
        
                            DomainPending::updateOrCreate(
                                ['domain_name' => $item['domain']],
                                [
                                    'DA' => (int)$item['DA'],
                                    'PA' => (int)$item['PA'],
                                    'DR' => -1,
                                    'TF' => (int)$item['TF'],
                                    'CF' => (int)$item['CF'],
                                    'spam_rating' => (int)str_replace(' / 18', '', $item['spam_rating']),
                                    'total_backlinks' => (int)$backlinks,
                                    'referring_domains' => (int)$item['referring_domains'],
                                    'external_links' => (int)$item['external_link'],
                                    'internal_links' => abs((int)$backlinks - (int)$item['external_link']),
                                    'add_date' => $item['add_date'],
                                    'end_date' => $item['end_date'],
                                    'domain_age' => $age,
                                    'status' => $item['status'],
                                    'tld_registered' => $item['tld_registered'],
                                    'crawl_results' => $item['crawl_results'],
                                    'global_rank' => $item['global_rank'],
                                    'length' => $item['length'],
                                    'com_tld' => $item['com_tld'],
                                    'net_tld' => $item['net_tld'],
                                    'org_tld' => $item['org_tld'],
                                    'biz_tld' => $item['biz_tld'],
                                    'info_tld' => $item['info_tld'],
                                    'de_tld' => $item['de_tld'],
                                    //'categories' => $this->flaskApiDomainPendingService->assignCategories($item)
                                ]
                            );
                            //print($a);
                            //$allDataExpired = [];
                            #$domainRecord->categories()->sync($categories);
                        }
                        $page++;
                    } else {
                        // Arrêter si aucune donnée n'est renvoyée
                        break;
                    }
                } while (!empty($dataExpired));
                //print("Response of all datas de l'api Flask");
                //print_r($allDataExpired);

                // Traitement des données de dataExpired
                
                //$categories = $this->flaskApiDomainPendingService->assignCategories($item);
                //$domainRecord->categories()->sync($categories);
                DB::commit();
                logger("Données expired récupérées et enregistrées avec succès.");
                $this->info('Données expired récupérées et enregistrées avec succès.');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            $this->error('Erreur après la récupération des données de l\'API Flask : ' . $e->getMessage());
        }
    }
    
}
