<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Google_Client;
use Google_Service_Webmasters;
use GuzzleHttp\Client;
//use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Illuminate\Support\Facades\Log; // Import the Log facade
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Http;

class BacklinkController extends Controller
{
    
/* start Google API and generic API code for fetching backlinks */

     public function checkExternalBacklinks(Request $request)
    {
         $googleSearchConsoleBacklinks = array();
        // Google Search Console API
        $website = $request->input('website');
        $page = $request->input('page');
        $page = !empty($page)?$page: 1;
        //$generic_crowling = $this->generic_crowling($website);
        //dd($generic_crowling);
        //$googleSearchConsoleBacklinks = $this->fetchGoogleSearchConsoleBacklinks($website);
        //dd($googleSearchConsoleBacklinks);
        // RankWatch API
        $rankWatchBacklinksdetail = $this->fetchRankWatchBacklinksdetail($website);
        dd($rankWatchBacklinksdetail);
        if(!empty($rankWatchBacklinksdetail))
        {    
            $rankWatchBacklinksdetail['website']= $website;
            $rankWatchBacklinksdetail['total_pages'] = ceil($rankWatchBacklinksdetail['total_backlinks'] / 200);
            $rankWatchBacklinksdetail['limit'] =  200;
            $rankWatchBacklinksdetail['current_page'] =  $page;
            $rankWatchBacklinks = $this->fetchRankWatchBacklinks($website, $page);
            // Combine and format backlinks
            $backlinks = array_merge($googleSearchConsoleBacklinks, $rankWatchBacklinks);
            //$count = sizeof($backlinks);
            return response()->json([
                'success' => true,
                'message' => 'Backlinks retrieved successfully',
                'summary' => $rankWatchBacklinksdetail,
                'detail' => $backlinks,
                //'backlinks_count' => $count
            ]);
        }else{
            return response()->json([
                'success' => true,
                'message' => 'No Backlinks retrieved',
            ]);
        }
        
    }

    private function fetchGoogleSearchConsoleBacklinks($website)
    {
         $client = new Google_Client();
    $client->setClientId('218347823146-sdp7nal6qbkdipejqanetndd6h8du8fr.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setScopes([
        Google_Service_Webmasters::WEBMASTERS_READONLY,
    ]);

    // If you're using Laravel, you might need to set up the redirect URI:
    // $client->setRedirectUri('YOUR_REDIRECT_URI');

    // Handle authentication (you may need to adjust this part based on your Laravel setup)
    $accessToken = getAccessTokenFromYourAuthFlow(); // Replace with your auth flow
    $client->setAccessToken($accessToken);

    if ($client->isAccessTokenExpired()) {
        // Refresh the access token if expired
        $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());
    }

    $webmastersService = new Google_Service_Webmasters($client);
    
    // Fetch backlinks from Google Search Console API
    $response = $webmastersService->urlcrawlerrorscounts->query('https://' . $website);

    $backlinks = []; // Initialize an array for backlinks
    
    foreach ($response->getCounts() as $count) {
        $backlink = [
            'url' => $count->getTargetUrl(),
            'details' => $count->getDetails(),
        ];
        $backlinks[] = $backlink;
    }

    return $backlinks;
    }

    
    private function generic_crowling($website)
    {
    $client = new Client(HttpClient::create(['timeout' => 60]));
    $externalBacklinks = [];    
    $pageNumber = 0;
    
        $searchUrl = "https://www.google.com/search?q=link:$website&start=" . ($pageNumber * 10);
        $crawler = $client->request('GET', $searchUrl);
        $crawler->filter('div > a')->each(function ($node) use (&$externalBacklinks, $website) {
            $backlinkUrl = $node->attr('href');
            
            parse_str(parse_url($backlinkUrl, PHP_URL_QUERY), $queryParams);
            if (isset($queryParams['q'])) {
                $backlink = $queryParams['q'];
                
                if (strpos($backlink, 'http') === 0 && 
                    strpos($backlink, $website) === false && 
                    strpos($backlink, 'google.com') === false) {
                    $externalBacklinks[] = $backlink;
                }
            }
        });

        $pageNumber++;
    
    
    return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully, External Backlinks',
        'data' => $externalBacklinks,
    ]);
}
    
    private function fetchRankWatchBacklinks($website, $page)
{
   // $apiKey = 'YOUR_RANKWATCH_API_KEY';
    $apiUrl = "https://appapi.rankwatch.com/api/link_explorer/backlink/data";
    
    $client = new Client();
    $response = $client->post($apiUrl, [
        /*'headers' => [
            'Authorization' => "Bearer {$apiKey}",
        ],*/
        'form_params' => [
            'domain_name' => $website,
            'limit' => 200,
            'page' => $page,
        ],
    ]);

            
    $rankWatchData = json_decode($response->getBody()->getContents(), true);    
    $backlinks = [];
    if (isset($rankWatchData['response']['data'])) {
        foreach ($rankWatchData['response']['data'] as $backlink) {
            // Extract necessary data from $backlink and add it to $backlinks array
            $backlinks[] = [
                'url' => $backlink['u'],
                'anchor_text' => $backlink['a'],
                // Add other relevant fields here
            ];
        }
    }

    return $backlinks;
}
    private function fetchRankWatchBacklinksdetail($website)
{
   // $apiKey = 'YOUR_RANKWATCH_API_KEY';
    $apiUrl = "https://appapi.rankwatch.com/api/link_explorer/backlink/domain_summary";
    
    $client = new Client();
    $response = $client->post($apiUrl, [
        /*'headers' => [
            'Authorization' => "Bearer {$apiKey}",
        ],*/
        'form_params' => [
            'domain_name' => $website,            
        ],
    ]);

                return $response->getBody();
    $rankWatchData = json_decode($response->getBody()->getContents(), true);    
   
    $backlinks = [];
    if (!empty($rankWatchData['response'])) {        
            $backlinks = [
                'total_backlinks' => $rankWatchData['response']['t'],
                'follow' => $rankWatchData['response']['f'],
                'not_follow' => $rankWatchData['response']['nf'],                
            ];
    }

    return $backlinks;
}

 
    
/* end Google API and generic API code for fetching backlinks */
    
    
//node js code with laravel     
/*    
public function checkExternalBacklinks(Request $request)
{
    try {
        $website = $request->input('website');

        // Make a request to the Node.js API
        $response = Http::get('http://localhost:3397/external-backlinks', [
            'website' => $website,
        ]);

        $data = $response->json();

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully, External Backlinks',
            'data' => $data,
        ]);
    } catch (\Exception $e) {
        // Log the error for debugging
        \Log::error('An error occurred: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'An error occurred',
            'data' => null,
        ], 500);
    }
}
  /*
public function checkExternalBacklinks(Request $request)
{
    $website = $request->input('website');
    $externalBacklinks = [];

    $pageNumber = 0;
    do {
        $searchUrl = "https://www.google.com/search?q=link:$website&start=" . ($pageNumber * 10);

        $externalBacklinks = array_merge($externalBacklinks, $this->getExternalBacklinks($searchUrl, $website));

        $pageNumber++;
    } while (!empty($this->getNextPageUrl($website, $pageNumber)));

    return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully, External Backlinks',
        'data' => $externalBacklinks,
    ]);
}

private function getExternalBacklinks($url, $website)
{
    $html = Browsershot::url($url)->bodyHtml();

    $crawler = new Crawler($html);

    return $crawler->filter('div > a')->each(function ($node) use ($website) {
        $backlinkUrl = $node->attr('href');

        parse_str(parse_url($backlinkUrl, PHP_URL_QUERY), $queryParams);
        if (isset($queryParams['q'])) {
            $backlink = $queryParams['q'];

            if (strpos($backlink, 'http') === 0 &&
                strpos($backlink, $website) === false &&
                strpos($backlink, 'google.com') === false) {
                return $backlink;
            }
        }
    });
}

private function getNextPageUrl($website, $pageNumber)
{
    $searchUrl = "https://www.google.com/search?q=link:$website&start=" . ($pageNumber * 10);

    $html = Browsershot::url($searchUrl)->bodyHtml();
    $crawler = new Crawler($html);
    $nextPageButton = $crawler->filter('#pnnext');

    return $nextPageButton->count() > 0 ? $searchUrl : null;
}

*/

/*

public function checkExternalBacklinks(Request $request)
{
    $website = $request->input('website');        
    $client = new Client(HttpClient::create(['timeout' => 60]));
    $externalBacklinks = [];
    
    $pageNumber = 0;
    do {
        $searchUrl = "https://www.google.com/search?q=link:$website&start=" . ($pageNumber * 10);
        $crawler = $client->request('GET', $searchUrl);
        $crawler->filter('div > a')->each(function ($node) use (&$externalBacklinks, $website) {
            $backlinkUrl = $node->attr('href');
            
            parse_str(parse_url($backlinkUrl, PHP_URL_QUERY), $queryParams);
            if (isset($queryParams['q'])) {
                $backlink = $queryParams['q'];
                
                if (strpos($backlink, 'http') === 0 && 
                    strpos($backlink, $website) === false && 
                    strpos($backlink, 'google.com') === false) {
                    $externalBacklinks[] = $backlink;
                }
            }
        });

        $pageNumber++;
    } while ($crawler->filter('#pnnext')->count() > 0);
    
    return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully, External Backlinks',
        'data' => $externalBacklinks,
    ]);
}



private function isExternalBacklink($url, $website)
{
    // Check if the URL is a valid external backlink
    return strpos($url, 'http') === 0 && strpos($url, $website) === false && strpos($url, 'google.com') === false;
}



    
    
    
    
    public function getBacklinks(Request $request)
    {
        try {
            $domain = $request->input('domain');
            $domain = preg_replace('/^https?:\/\//i', '', $domain);
            $domain = preg_replace('/^www\./i', '', $domain);
            $domain = rtrim($domain, '/');

            // Initialize Goutte client
            $client = new Client();

            // Crawl the domain page
            $crawler = $client->request('GET', "https://{$domain}");

            $backlinks = [];

            // Extract link elements
            $crawler->filter('a')->each(function ($node) use (&$backlinks, $domain) {
                $link = $node->attr('href');
                // Filter out non-URL links and internal links
                if (filter_var($link, FILTER_VALIDATE_URL) && strpos($link, $domain) === false) {
                    $backlinks[] = $link;
                }
            });

            // Perform advanced analysis on each backlink
            $analyzedBacklinks = $this->analyzeBacklinks($backlinks);

            return response()->json(['backlinks' => $analyzedBacklinks]);
        } catch (\Exception $e) {
            Log::error('Error fetching backlinks: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred while fetching backlinks.'], 500);
        }
    }

    private function analyzeBacklinks(array $backlinks)
    {
        $analyzedBacklinks = [];

        foreach ($backlinks as $backlink) {
            // Analyze each backlink
            $backlinkData = $this->analyzeSingleBacklink($backlink);
            $analyzedBacklinks[] = $backlinkData;
        }

        return $analyzedBacklinks;
    }

    private function analyzeSingleBacklink($backlink)
    { // Your logic for advanced backlink analysis here
        // Example: Fetch domain authority, anchor text, etc.
        return [
            'url' => $backlink,
            'domain_authority' => $this->fetchDomainAuthority($backlink),
            'anchor_text' => $this->fetchAnchorText($backlink),
            // Add more data as needed
        ];
    }

    private function fetchDomainAuthority($url)
    {
        // Simulated logic to fetch domain authority
        return rand(1, 100);
    }

    private function fetchAnchorText($url)
    {
        // Simulated logic to fetch anchor text
        return 'Sample Anchor Text';
    }
 * 
 */
}

