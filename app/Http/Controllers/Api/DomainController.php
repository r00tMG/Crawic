<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Iodev\Whois\Factory;
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
use Iodev\Whois\Factory as Whois;

class DomainController extends Controller
{
    public function domain_age(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        
        $response = Http::get('https://explorekeywords.com/tools/api/website_audit/domain_age.php', [
            'domain' => $domainName,
        ]);
        $data = $response->json();

        if ($data['domain']['creationDate'] ?? false) {
            $diff=strtotime('now')-strtotime($data['domain']['creationDate']);
            $years = floor($diff / (60*60*24*365));
            $months = floor(($diff - $years * 60*60*24*365) / (60*60*24*30));
            $days = floor(($diff - $years * 60*60*24*365 - $months*60*60*24*30 ) / (60*60*24));

            $data['domain']['age'] = $years.' Years '.$months.' Month '.$days.' Days';
        }

        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $data,
        ]);
}
    public function domain_whois(Request $request)
    {       
        $domainName = $request->input('domain');
        // $domainName = strtolower(trim($domainName));
        // $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        // $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        // $domainName = preg_replace('/^www\./i', '', $domainName);
        // $domainName = str_replace('/', '', $domainName);
        // $domainName = stripslashes($domainName);  
        
        // $response = Http::get('https://explorekeywords.com/tools/api/website_audit/whois.php', [
        //     'domain' => $domainName,
        // ]);
        // $data = $response->json();
        
        
        $whoisRecords = false;
        if ($domain = $request->input('domain')) {
            $domain = str_replace(['http://', 'https://', 'www.'], '', $request->input('domain'));

            
            try {
                $whoisRecords = Whois::get()->createWhois()->loadDomainInfo($domain);
            } catch (\Exception $e) {}
        }
        
        $data = view('api_response.whois-lookup', [ 'domain' => $domain, 'result' => $whoisRecords]);
        return $data;
        return response()->json([
        'success' => true,
        'whoisRecords' => $whoisRecords,
        'message' => 'Data retrieved successfully.',
        'data' => $data,
        ]);
}
    public function domain_global_rank(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        
        $response = Http::get('https://explorekeywords.com/tools/api/website_audit/rank.php', [
            'site' => $domainName,
        ]);
        $rst = $response->json();        
        if ($rst['similar_rank']['rank'] ?? null) $data[0]['rank'] = $rst['similar_rank']['rank'];
        $data[0]['domain'] = $domainName;
        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $data,
        ]);
}
    public function domain_google_bing_rank(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        
        $response = Http::get('https://explorekeywords.com/tools/api/website_audit/indexed_page.php', [
            'site' => $domainName,
        ]);        
        //$rst = $response->json();
        $data[0]=[];        
        $rst = $response->body();
        // $rst= explode('<script>', $rst);    
        // $dataArray = json_decode($rst[0], true);
        // $data[0]['google'] = $dataArray['google'];
        // $data[0]['bing'] = $dataArray['bing'];
        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $rst,
        ]);
}
    public function domain_authority(Request $request)
    {       
        $data='';
        if ($domainName = $request->input('domain')){
            
            
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://ettvi.com/page-authority-checker');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "id=page-authority&site=".$domainName);
            
            $headers = array();
            $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7';
            $headers[] = 'Accept-Language: en-US,en;q=0.9,ur;q=0.8,de;q=0.7';
            $headers[] = 'Cache-Control: max-age=0';
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            $headers[] = 'Cookie: PHPSESSID=ba63283a66e2cb355095f26db0872a91; _ga=GA1.1.1707386430.1717152379; __gads=ID=801f2ab262d29dff:T=1717152379:RT=1717152379:S=ALNI_MY8GbYtL8c3FrWbGbZXPH_EvS7iCQ; __gpi=UID=00000d7d1368b9f4:T=1717152379:RT=1717152379:S=ALNI_MZZeK4F3Re40VM2i9h_xnaVP2BitQ; __eoi=ID=a739459e61139b8b:T=1717152379:RT=1717152379:S=AA-AfjYLIEXnLoc5zHLic4e8ZciA; FCNEC=%5B%5B%22AKsRol_NxAf5PlYSQCbcek1yoRVd_Bmovjz3ocpegtQVMqeSGIMWmY4Oa5IwFUEhHubhOuik2Zh69iHZN1NhGvKpeN7Iso6MOK0iCcTygEhIgW3mPC2EoK-PCXtYRYr132zW4juACgL_wE7xnx3_J-PyLyO27j1YMw%3D%3D%22%5D%5D; _ga_9T79RCMDZD=GS1.1.1717152379.1.1.1717152652.0.0.0';
            $headers[] = 'Origin: https://ettvi.com';
            $headers[] = 'Priority: u=0, i';
            $headers[] = 'Referer: https://ettvi.com/page-authority-checker';
            $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
            $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
            $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
            $headers[] = 'Sec-Fetch-Dest: document';
            $headers[] = 'Sec-Fetch-Mode: navigate';
            $headers[] = 'Sec-Fetch-Site: same-origin';
            $headers[] = 'Sec-Fetch-User: ?1';
            $headers[] = 'Upgrade-Insecure-Requests: 1';
            $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            
            $data = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            
            
            // $data = file_get_contents('https://moz.com/domain-analysis?site='.$domainName);
            $data = explode('id="dapa"',$data);
            $data = $data[1] ?? '';
            $data = '<table id="dapa"'.$data;
            $data = explode('</table>',$data)[0].'</table>';
            
        }
        
        return $data;
        
        
        
        // $domainName = strtolower(trim($domainName));
        // $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        // $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        // $domainName = preg_replace('/^www\./i', '', $domainName);
        // $domainName = str_replace('/', '', $domainName);
        // $domainName = stripslashes($domainName);  
        
        // $response = Http::get('https://explorekeywords.com/tools/api/website_audit/domain_authority.php', [
        //     'site' => $domainName,
        // ]);
        // $rst = $response->body();  
        // $rst= explode('<script>function', $rst);    
        // $dataArray = json_decode($rst[0], true);
        // $data[0]['authority'] = $dataArray;
        // $data[0]['domain'] = $domainName;
        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $rst,
        ]);
    }
    public function domain_audit(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        $response = Http::get('https://explorekeywords.com/tools/api/website_audit/top_search_query.php', [
            'site' => $domainName,
        ]);
       // $rst = $response->json();  
        $rst = $response->body();          
        // $rst= explode('<script>function', $rst);            
        // $dataArray = json_decode($rst[0], true);
        echo $rst;
        // return response()->json([
        // 'message' => 'Data retrieved successfully.',
        // 'data' => $rst,
        // ]);
}
public function getDomainOwnerdetail(Request $request)
    {
       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);    
        $whoisServer = $this->getWhoisServer($domainName);
        
        if (!$whoisServer) {
            return response()->json(['error' => 'Unsupported domain TLD'], 400);
        }

        try {
            $whois = Factory::get()->createWhois();
            $info = $whois->loadDomainInfo($domainName);            
            $data = [
            'domainName' => $info->domainName,
            'expiration_date' => date("Y-m-d", $info->expirationDate), 
            'owner' => $info->owner,
            'registrar' => $info->registrar,
            'creationDate' => date("Y-m-d",$info->creationDate),
            'updatedDate' => date("Y-m-d",$info->updatedDate),
            'whoisServer' => $info->whoisServer,
            'nameServers' => $info->nameServers,
            'domainsecurity' => $info->dnssec,
            'states' => $info->states,                   
            ];      
        } catch (\Exception $e) {
            Log::error('Error fetching WHOIS data: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch WHOIS data'], 500);
        }
        
        

    return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $data,
    ]);
    }   
    
    private function getWhoisServer($domainName)
    {
        // Simplified logic to determine the WHOIS server based on the domain's TLD
        $tld = Str::afterLast($domainName, '.');
        
        $whoisServers = [
            'com' => 'https://who.is/whois/',
            'net' => 'https://who.is/whois/'
            // Add more TLD mappings as needed
        ];

        return $whoisServers[$tld] ?? null;
    }

    
public function findExpiredDomains(Request $request)
{
    $keyword = $request->input('keyword');
    
    
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://demo-project49626.p.rapidapi.com/catalog/product",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => json_encode([
		'name' => $keyword,
		'price' => 0,
		'manufacturer' => '',
		'category' => '',
		'description' => '',
		'tags' => ''
	]),
	CURLOPT_HTTPHEADER => [
		"X-RapidAPI-Host: demo-project49626.p.rapidapi.com",
		"X-RapidAPI-Key: 401c2b1b93msh9ac78784c11268cp180b9ajsn9590c6a26ef1",
		"content-type: application/json"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}
    exit;
    
    $apiKey = 'a3976ec93dmsh7768e01de1bffecp1afa04jsnb59573269118'; // Replace with your actual API key
    //$apiUrl = "https://api.domainr.com/v3/search?query={$keyword}&client_id={$apiKey}";
    //$response = Http::get($apiUrl);
    $response = Http::get('https://api.domainr.com/v3/search', [
            'query' => $keyword,
            'client_id' => $apiKey,
        ]);
    $rst = $response->json(); 
    dd($rst);
    if ($response->successful()) {
        $data = $response->json();
        // Parse the response data to find expired domains
        // The structure of the response will depend on the API you're using
        // Extract and filter expired domains based on your requirements
        return response()->json([
            'success' => true,
            'message' => 'Expired domains found.',
            'data' => $filteredExpiredDomains,
        ]);
    } else {
        // Handle the unsuccessful response
        return response()->json([
            'success' => false,
            'error' => 'Failed to retrieve expired domains.',
        ], 500);
    }
}

//https://www.seekahost.com/wp-content/themes/clickdo-main-theme/expiredlist/expire_domain.json

public function todayexpirieddomain()
{   
    $today = Carbon::now()->toDateString();
    $existingRecord = DB::table('expiry_domain_cronjob')
    ->whereDate('created_at', $today)
   ->where('cronjob', 0)         
    ->first();
if (1) {
     $response = Http::get('https://www.seekahost.com/wp-content/themes/clickdo-main-theme/expiredlist/expire_domain.json'); 
     // dd($response);   
    if ($response->successful()) {        
        //$data = $response->json();        
        $data = $response->body();
         //$data = str_replace("} {","},{",$data);
         
        $response = array();
        $response['date']= date('Y-m-d');
        $data = preg_replace('/}\s*{/', '},{', $data);
        $data = json_decode($data, true);
        if (json_last_error() === JSON_ERROR_NONE) {
            $fixedJsonString = json_encode($data, JSON_PRETTY_PRINT);            
        } else {   
            return response()->json([
            'success' => false,
            'message' => 'Error: Unable to fetch JSON data.',
            'data' => '',
                ]);
        }
        $count = sizeof($data['domain_list']);
        $array_data = [
            'total_domain' => $count,
            'is_successful' => true,
            'cronjob'=> 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        if (!$existingRecord) {
            $newRecordId = DB::table('expiry_domain_cronjob')                
            ->insertGetId($array_data);        
            $array_data['id'] = $newRecordId;
        } else { 
            $newRecordId = $existingRecord->id;       
            $array_data['id'] = $newRecordId;
        }
        
        $currentYear = date("Y"); // Get the current year
        
        foreach($data['domain_list'] as $res)
        {
            $domainName = $res['domain_name'];
            $parts = explode('.', $domainName);
            $firstPart = $parts[0];
            $length = strlen($firstPart);
            
            $tenYearsAgo = $currentYear - $res['age']; 
            $domain_record = [
                'expiry_domain_statistics_id' => $newRecordId,
                'domain_name' => $res['domain_name'],
                'len' => $length,
                'age' => $tenYearsAgo,
                'da' => $res['da'],
                'pa' => $res['pa'],
                'dr' => $res['dr'],
                'cf' => $res['cf'],
                'tf' => $res['tf'],
                'total_backlinks' => $res['total_backlinks'],
                'referring_domains' => $res['referring_domains'],                
                'created_at' => now(),
                'updated_at' => now(),
            ];
            if (DB::table('domain_details')->where('expiry_domain_statistics_id',$newRecordId)->where('domain_name',$res['domain_name'])->count() == 0){
                $a = DB::table('domain_details')->insert($domain_record);
            }
            
            // echo $res['domain_name'].' '.$a."\n";
            // print_r($domain_record);
        }
        // print_r($data['domain_list']);
        // exit();
        // Display the JSON data
        //return response()->json($data);

        $total = DB::table('domain_details')->where('expiry_domain_statistics_id',$existingRecord->id)->count();
        DB::table('expiry_domain_cronjob')->where('id',$existingRecord->id)->update([
            'total_domain' => $total
        ]);



        return response()->json([
        'total' => $total,
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $array_data,
            ]);
    } else {
        return response()->json([
        'success' => false,
        'message' => 'Error: Unable to fetch JSON data.',
        'data' => '',
            ]);
    }



    
    } else {
    // If a record exists for today, use its ID
    $newRecordId = $existingRecord->id;
    return response()->json([
        'success' => false,
        'message' => 'Today Data Already Exist.',
        'data' => $newRecordId,
            ]);
}



    
}  

public function _todayexpirieddomaintwo($page,$start,$header){
    $ch = curl_init();
    $utcTime = gmdate('Y-m-d').' 24:55:00';
    $timestamp = strtotime($utcTime) * 1000;



    echo $start.' ';

curl_setopt($ch, CURLOPT_URL, 'https://www.expired-domains.co/ajax/?sEcho='.($_GET['n']++).'&iColumns=13&sColumns=%2C%2C%2C%2C%2C%2C%2C%2C%2C%2C%2C%2C&iDisplayStart='.$start.'&iDisplayLength=100&mDataProp_0=col0&bSortable_0=true&mDataProp_1=col1&bSortable_1=true&mDataProp_2=col2&bSortable_2=true&mDataProp_3=col3&bSortable_3=true&mDataProp_4=col4&bSortable_4=true&mDataProp_5=col5&bSortable_5=true&mDataProp_6=col6&bSortable_6=true&mDataProp_7=col7&bSortable_7=true&mDataProp_8=col8&bSortable_8=true&mDataProp_9=col9&bSortable_9=true&mDataProp_10=col10&bSortable_10=true&mDataProp_11=col11&bSortable_11=true&mDataProp_12=col12&bSortable_12=true&iSortCol_0=1&sSortDir_0=asc&iSortingCols=1&tileId=TILE_NS07&isMobile=false&_='.$timestamp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array(); 
$headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
$headers[] = 'Accept-Language: en-US,en;q=0.9,ur;q=0.8,de;q=0.7';
// $headers[] = 'Cookie: '.$header;
$headers[] = 'Cookie: guid=eff2c9d4-6074-49c6-8d89-d20631061c77; _ga=GA1.1.762836240.1721819605; __gads=ID=db8e7bb56774f1c2:T=1721819606:RT=1721819606:S=ALNI_Mbt-Zj3p_1nVSQwk0zwH9VyoO5WkQ; __gpi=UID=00000e9deecaace9:T=1721819606:RT=1721819606:S=ALNI_MZS1OG-8Hlm84utkbMJ8BlcQpfxNA; __eoi=ID=1fb12426065fc6bd:T=1721819606:RT=1721819606:S=AA-AfjZhif4OEvwfaDhU4_g7qmdq; FCNEC=%5B%5B%22AKsRol-7zVNUY4HbcU45hYIp4OGDTxnZJ356cbRAtTAq9l-SQ9lSIfv3bfsv40BVR_dyRyLKwmWpbvGACeV46YFgXRvRy5GT7-Jq4djILelF5MZbXsCrIv3OXo7f7JKrLxHkwpRr6okWeju5TCCIbrxxdm59V2M7Qg%3D%3D%22%5D%5D; wordpress_4a59d03994b8f0aa6fdfde64cb0286bf=dramahd82%40gmail.com%7C1721993611%7Cf1f6b29a6cc1f79a0fea05b885aa33d0%7Cdc844414de03f72cd4c2368dab961c8f730307983fc06f2cd3b656fde2a7262e; wordpress_logged_in_4a59d03994b8f0aa6fdfde64cb0286bf=dramahd82%40gmail.com%7C1721993611%7Cf1f6b29a6cc1f79a0fea05b885aa33d0%7Cdc844414de03f72cd4c2368dab961c8f730307983fc06f2cd3b656fde2a7262e; expTile=TILE_NS07; JSESSIONID=CB006D0F19B65F7236E39E5B7E0161BA; _ga_DQWLBWEZW9=GS1.1.1721829160.4.0.1721829160.60.0.0';

$headers[] = 'Priority: u=1, i';
$headers[] = 'Referer: https://www.expired-domains.co/';
$headers[] = 'Sec-Ch-Ua: \"Not/A)Brand\";v=\"8\", \"Chromium\";v=\"126\", \"Google Chrome\";v=\"126\"';
$headers[] = 'Sec-Ch-Ua-Mobile: ?0';
$headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
$headers[] = 'Sec-Fetch-Dest: empty';
$headers[] = 'Sec-Fetch-Mode: cors';
$headers[] = 'Sec-Fetch-Site: same-origin';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/126.0.0.0 Safari/537.36';
$headers[] = 'X-Requested-With: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

// file_put_contents('apitwo_'.$utcTime.$start, $result); 

if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
}
curl_close($ch);

return $result;
}


public function todayexpirieddomaintwo()
{   
    $_GET['n']= 1;
    $get = Http::get('https://www.expired-domains.co');
 
    $header = '';

    foreach ($get->headers()['Set-Cookie'] as $sc) {
        $header .= explode(';', $sc)[0].'; ';
    }

    

    $today = Carbon::now()->toDateString();
    $existingRecord = DB::table('expiry_domain_cronjob')
    ->whereDate('created_at', $today)
   ->where('cronjob', 0)         
    ->first();

    // dd($existingRecord);

    if (!$existingRecord){
        $array_data = [
            'total_domain' => 0,
            'is_successful' => true,
            'cronjob'=> 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        $newRecordId = DB::table('expiry_domain_cronjob')                
            ->insertGetId($array_data);        

        $existingRecord = DB::table('expiry_domain_cronjob')
        ->whereDate('created_at', $today)
       ->where('cronjob', 0)         
        ->first();
    }

   //  $today = Carbon::now()->toDateString();
   //  $existingRecord = DB::table('expiry_domain_cronjob')
   //  ->whereDate('created_at', $today)
   // ->where('cronjob', 0)         
   //  ->first();

$result = $this->_todayexpirieddomaintwo(1,0,$header);


// $a = $this->_todayexpirieddomaintwo(1,0  ,$header);
// $b = $this->_todayexpirieddomaintwo(2,100,$header);

// dd([$header,$result]); 

$data = (json_decode($result,true));



$iTotalRecords = ($data['iTotalRecords'] ?? 0);

$fdomains=[];
$x=1;
$i=$existingRecord->api2_page+1;
// dd($i);
$domain_records=[];
$records_domains=[];
$exists=0;
$inserted=0;
if ($iTotalRecords > 0) {
    for (; $i < ((int)($iTotalRecords/100)); $i++) { 
        $x++;

        $result = $this->_todayexpirieddomaintwo($i,(($i-1)*100),$header);
        $result = (json_decode($result,true));

        // dd([$i,$result]); 

        $domains = ($result['aaData'] ?? []);
        if (count($domains) == 0 || $x > 50) {
            break;
        }

        foreach ($domains as $key => $domain) {
            $fdomains[] = $domain; 
            $records_domains[] = strtolower($domain['col0']);
            
            $domain_records[strtolower($domain['col0'])] = [
                'expiry_domain_statistics_id' => $existingRecord->id,
                'domain_name' => strtolower($domain['col0']),
                'len' => $domain['col4'],
                'age' => 0,
                'da' => 0,
                'pa' => 0,
                'dr' => 0,
                'cf' => 0,
                'tf' => 0,
                'total_backlinks' => 0,
                'referring_domains' => 0,                
                'created_at' => now(),
                'updated_at' => now(),
            ];
            // where('expiry_domain_statistics_id',$existingRecord->id)->
            // if (DB::table('domain_details')->where('domain_name', strtolower($domain['col0']))->count() == 0){
            //     DB::table('domain_details')->insert($domain_record);
            // }
        }
        
            
        // print_r($records_domains);
        // $records_domains=[];
    }
}

$_exists = DB::table('domain_details')->WhereIn('domain_name',$records_domains)->get()->pluck('domain_name')->toArray();
        

        foreach($domain_records as $d => $dr){
            if(!in_array($d, $_exists)){
                DB::table('domain_details')->insert($dr);
                $inserted++;
            } else {
                $exists++;
            }
            
        }

print_r($records_domains);
// dd($inserted);

$total = DB::table('domain_details')->where('expiry_domain_statistics_id',$existingRecord->id)->count();
        DB::table('expiry_domain_cronjob')->where('id',$existingRecord->id)->update([
            'total_domain' => $total,
            'api2_page' => $i
        ]);

echo $i;

exit();











    $utcTime = gmdate('Y-m-d H:i:s');
    $timestamp = strtotime($utcTime) * 1000; // Convert seconds to milliseconds
    $today = Carbon::now()->toDateString();    
    $fourHoursAgo = Carbon::now()->subHours(4);
    $existingRecord = DB::table('expiry_domain_cronjob')
    ->where('created_at', '>', $fourHoursAgo)
    ->where('cronjob', 1)
    ->first();
if (!$existingRecord) {
    $total = 100;
    $iDisplayLength = 50;
    $iDisplayStart = 0;
        
     $response = Http::get('https://www.expired-domains.co/ajax/?sEcho=1&iColumns=13&sColumns=,,,,,,,,,,,,&iDisplayStart='.$iDisplayStart.'&iDisplayLength='.$iDisplayLength.'&mDataProp_0=col0&bSortable_0=true&mDataProp_1=col1&bSortable_1=true&mDataProp_2=col2&bSortable_2=true&mDataProp_3=col3&bSortable_3=true&mDataProp_4=col4&bSortable_4=true&mDataProp_5=col5&bSortable_5=true&mDataProp_6=col6&bSortable_6=true&mDataProp_7=col7&bSortable_7=true&mDataProp_8=col8&bSortable_8=true&mDataProp_9=col9&bSortable_9=true&mDataProp_10=col10&bSortable_10=true&mDataProp_11=col11&bSortable_11=true&mDataProp_12=col12&bSortable_12=true&iSortCol_0=12&sSortDir_0=asc&iSortingCols=1&tileId=TILE_NS02&isMobile=false&_='.$timestamp);

    dd($response->body()); 
    if ($response->successful() && $response->body()) {        
        //$data = $response->json();
        $data = $response->body();
        $response = array();
        dd($data);
        $response['date']= date('Y-m-d H:i:s');        
        if (json_last_error() === JSON_ERROR_NONE) {
            $fixedJsonString = json_encode($data, JSON_PRETTY_PRINT);            
        } else {   
            return response()->json([
            'success' => false,
            'message' => 'Error: Unable to fetch JSON data.',
            'data' => '',
                ]);
        }

        $total= $count = $data['iTotalRecords'];
       
        $array_data = [
            'total_domain' => $count, // Set your values here
            'is_successful' => true, // Set your values here
            'cronjob'=> 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $newRecordId = DB::table('expiry_domain_cronjob')                
        ->insertGetId($array_data);        
        $array_data['id'] = $newRecordId;
        foreach($data['aaData'] as $res)
        {
            
            DB::table('domain_details')->insertOrIgnore([
                'expiry_domain_statistics_id' => $newRecordId,
                'domain_name' => $res['col0'],
                'age' => $res['col1'],
                'len' => $res['col4'],                              
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        $iDisplayStart+=$iDisplayLength;
        while($iDisplayStart <= $total)
        {
          $response = Http::get('https://www.expired-domains.co/ajax/?sEcho=1&iColumns=13&sColumns=,,,,,,,,,,,,&iDisplayStart='.$iDisplayStart.'&iDisplayLength='.$iDisplayLength.'&mDataProp_0=col0&bSortable_0=true&mDataProp_1=col1&bSortable_1=true&mDataProp_2=col2&bSortable_2=true&mDataProp_3=col3&bSortable_3=true&mDataProp_4=col4&bSortable_4=true&mDataProp_5=col5&bSortable_5=true&mDataProp_6=col6&bSortable_6=true&mDataProp_7=col7&bSortable_7=true&mDataProp_8=col8&bSortable_8=true&mDataProp_9=col9&bSortable_9=true&mDataProp_10=col10&bSortable_10=true&mDataProp_11=col11&bSortable_11=true&mDataProp_12=col12&bSortable_12=true&iSortCol_0=12&sSortDir_0=asc&iSortingCols=1&tileId=TILE_NS02&isMobile=false&_='.$timestamp);
        if ($response->successful()) {
        $data = $response->json();                                        
        foreach($data['aaData'] as $res)
        {            
            DB::table('domain_details')->insertOrIgnore([
                'expiry_domain_statistics_id' => $newRecordId,
                'domain_name' => $res['col0'],
                'age' => $res['col1'],
                'len' => $res['col4'],                              
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }}
    $iDisplayStart+=$iDisplayLength;
        }    
    
        
        // Display the JSON data
        //return response()->json($data);
        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $array_data,
            ]);
    } else {
        return response()->json([
        'success' => false,
        'message' => 'Error: Unable to fetch JSON data.',
        'data' => '',
            ]);
    }
    
    } else {
    // If a record exists for today, use its ID
    $newRecordId = $existingRecord->id;
    return response()->json([
        'success' => false,
        'message' => 'Today Data Already Exist.',
        'data' => $newRecordId,
            ]);
}
    
}        
public function todayexpirieddomainthree()
{   
    $today = Carbon::now()->toDateString();
    $existingRecord = DB::table('expiry_domain_cronjob')
    ->whereDate('created_at', $today)
   ->where('cronjob', 0)         
    ->first();

    // dd($existingRecord);

    echo date('d-m-Y');

    if (!$existingRecord){
        $array_data = [
            'total_domain' => 0,
            'is_successful' => true,
            'cronjob'=> 0,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
        $newRecordId = DB::table('expiry_domain_cronjob')                
            ->insertGetId($array_data);        

        $existingRecord = DB::table('expiry_domain_cronjob')
        ->whereDate('created_at', $today)
       ->where('cronjob', 0)         
        ->first();
    }


    if (file_exists('namecheap/namecheap'.date('d-m-Y').'.csv')) {
        $f = fopen('namecheap/namecheap'.date('d-m-Y').'.csv', 'rb');

        for ($i=0; $i < $existingRecord->api3_page; $i++) { 
            if (feof($f)) {
                break;
            } 
            fgetcsv($f);
        }

        // dd(fgetcsv($f));

        $x=$existingRecord->api3_page;
        $exists=0;
        $n=1;
        $records=[];
        $records_domains=[];
        
        while(! feof($f))
        {
            $x++;
            $n++;
            $data = fgetcsv($f);
            if (isset($data[1]) && $data[1] != '' && $data[17] != '') {
                 

                $date = Carbon::parse($data[17]);
                $now = Carbon::now();

                $diff = $date->diffInYears($now);

                $domain_record = [
                'expiry_domain_statistics_id' => $existingRecord->id,
                'domain_name' => strtolower($data[1]),
                'len' => 0,
                'age' => $diff,
                'da' => 0,
                'pa' => 0,
                'dr' => $data[8],
                'cf' => 0,
                'tf' => 0,
                'total_backlinks' => $data[11],
                'referring_domains' => 0,                
                'created_at' => now(),
                'updated_at' => now(),
                ];
                // dd(DB::table('domain_details')->where('domain_name',strtolower($data[1]))->count());
                // if (DB::table('domain_details')->where('domain_name',strtolower($data[1]))->count() == 0){
                //     $a = DB::table('domain_details')->insert($domain_record);
                // } else {
                //     $exists++;
                // }
                    // DB::table('domain_details')->insert($domain_record);
                $records[strtolower($data[1])] = $domain_record;
                $records_domains[]=strtolower($data[1]);
            }

            if ($n > 10000) {
                break;
            }

        }
        
        $_exists = DB::table('domain_details')->WhereIn('domain_name',$records_domains)->get()->pluck('domain_name')->toArray();
        

        foreach($records as $d => $dr){
            if(!in_array($d, $_exists)){
                DB::table('domain_details')->insert($dr);
            } else {
                $exists++;
            }
            
        }
        // dd();

        $total = DB::table('domain_details')->where('expiry_domain_statistics_id',$existingRecord->id)->count();
        DB::table('expiry_domain_cronjob')->where('id',$existingRecord->id)->update([
            'total_domain' => $total,
            'api3_page' => $x 
        ]);


        fclose($f);

        
        return 'done '.$x.' exists='.$exists ;
    }

    $a = file_get_contents('https://nc-aftermarket-www-production.s3.amazonaws.com/reports/Namecheap_Market_Sales.csv');

    file_put_contents('namecheap/namecheap'.date('d-m-Y').'.csv', $a);


    exit();
    $utcTime = gmdate('Y-m-d H:i:s');
    $timestamp = strtotime($utcTime) * 1000; // Convert seconds to milliseconds
    $today = Carbon::now()->toDateString();    
    $fourHoursAgo = Carbon::now()->subHours(4);
    $existingRecord = DB::table('expiry_domain_cronjob')
    ->where('created_at', '>', $fourHoursAgo)
    ->where('cronjob', 2)
    ->first();
    $total =0;
    $array_data = array();
    $checkpoint=0;
if (!$existingRecord) {
    $page = 1;
     do{
     $response = Http::asJson()
    ->withHeaders([
        'Content-Type' => 'application/json',
    ])
    ->timeout(60)
    ->post('https://aftermarketapi.namecheap.com/client/graphql', [
        'operationName' => 'SaleTable',
        'variables' => [
            'filter' => [
                'saleType' => 'auction',
            ],
            'sort' => [
                [
                    'column' => 'bidCount',
                    'direction' => 'desc',
                ],
            ],
            'page' => $page,
            'pageSize' => 100,
        ],
        'extensions' => [
            'persistedQuery' => [
                'version' => 1,
                'sha256Hash' => '82f5b636090cafd054595e9d8e5172ee71bc9355741960efe443effea7fd8aaa',
            ],
        ],
    ]);

      $page++;
       $checkpoint= $response->successful();
    if ($response->successful()) {        
        $data = $response->json();   
        //$data = $response->body();
        $response = array();
        $response['date']= date('Y-m-d H:i:s');        
        /*if (json_last_error() === JSON_ERROR_NONE) {
            $fixedJsonString = json_encode($data, JSON_PRETTY_PRINT);            
        } else {   
            return response()->json([
            'success' => false,
            'message' => 'Error: Unable to fetch JSON data.',
            'data' => '',
                ]);
        }*/
        if($total==0)
        {
            dd($data);
        $total= $count = $data['data']['sales']['total'];
        $array_data = [
            'total_domain' => $count, // Set your values here
            'is_successful' => true, // Set your values here
            'cronjob'=> 2,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        $newRecordId = DB::table('expiry_domain_cronjob')                
        ->insertGetId($array_data);        
        $array_data['id'] = $newRecordId;
        }
        foreach($data['data']['sales']['items'] as $res)
        {           
            $domainName = $res['product']['name'];
            $parts = explode('.', $domainName);
            $firstPart = $parts[0];
            $length = strlen($firstPart);
            
            DB::table('domain_details')->insertOrIgnore([
                'expiry_domain_statistics_id' => $newRecordId,
                'domain_name' => $res['product']['name'],
                'len' => $length,                              
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
       
        
        // Display the JSON data
        //return response()->json($data);
       
    } else {
        return response()->json([
        'success' => false,
        'message' => 'Error: Unable to fetch JSON data.',
        'data' => '',
            ]);
    }
}while($checkpoint);
 return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $array_data,
            ]);
    } else {
    // If a record exists for today, use its ID
    $newRecordId = $existingRecord->id;
    return response()->json([
        'success' => false,
        'message' => 'Today Data Already Exist.',
        'data' => $newRecordId,
            ]);
}
    
}        
    

    public function todayexpirieddomainfour(Request $request){

        $today = Carbon::now()->toDateString();
        $existingRecord = DB::table('expiry_domain_cronjob')
        ->whereDate('created_at', $today)
       ->where('cronjob', 0)         
        ->first();

        if (!$existingRecord){

            $array_data = [
                'total_domain' => 0,
                'is_successful' => true,
                'cronjob'=> 0,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DB::table('expiry_domain_cronjob')                
            ->insertGetId($array_data);        
            
            $existingRecord = DB::table('expiry_domain_cronjob')
            ->whereDate('created_at', $today)
           ->where('cronjob', 0)         
            ->first();
        }

        

        
        $domains =[];

        while (count($domains) < 1001) {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://thedomainrobot.com/wp-admin/admin-ajax.php');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "action=ajax_load_more_expired_domains_frontend&iExpiredDomainsRowCount=".(count($domains)+1)."&TLD=".$request->tld); 

            $headers = array();
            $headers[] = 'Accept: application/json, text/javascript, */*; q=0.01';
            $headers[] = 'Accept-Language: en-US,en;q=0.9,ur;q=0.8,de;q=0.7';
            $headers[] = 'Content-Type: application/x-www-form-urlencoded; charset=UTF-8';
            $headers[] = 'Cookie: _ga=GA1.1.297800779.1718014909; _ga_22YZ15M3Y2=GS1.1.1718014908.1.1.1718015683.60.0.0';
            $headers[] = 'Origin: https://thedomainrobot.com';
            $headers[] = 'Priority: u=1, i';
            $headers[] = 'Referer: https://thedomainrobot.com/';
            $headers[] = 'Sec-Ch-Ua: \"Google Chrome\";v=\"125\", \"Chromium\";v=\"125\", \"Not.A/Brand\";v=\"24\"';
            $headers[] = 'Sec-Ch-Ua-Mobile: ?0';
            $headers[] = 'Sec-Ch-Ua-Platform: \"Windows\"';
            $headers[] = 'Sec-Fetch-Dest: empty';
            $headers[] = 'Sec-Fetch-Mode: cors';
            $headers[] = 'Sec-Fetch-Site: same-origin';
            $headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/125.0.0.0 Safari/537.36';
            $headers[] = 'X-Requested-With: XMLHttpRequest';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
            $d = json_decode($result,true)['array'] ?? [];
            if (count($d) < 2){
                // dd($result);  
                return 'break';
                break;
            }

            foreach ($d as $row) { 

                $domains[] = $row;

                $date = Carbon::parse($row['dtCreated']);
                $now = Carbon::now();

                $diff = $date->diffInYears($now);

               DB::table('domain_details')->insertOrIgnore([
                    'expiry_domain_statistics_id' => $existingRecord->id,
                    'domain_name' => $row['sDomain'],
                     'len' => strlen($row['sDomain']),
                    'age' => $diff,
                    'da' => $row['iMoz_pda'],
                    'pa' => $row['iMoz_upa'],
                    'dr' => 0,
                    'cf' => 0,
                    'tf' => 0,
                    'total_backlinks' => 0,
                    'referring_domains' => 0,                
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            

            // dd($d);
        }

        $total = DB::table('domain_details')->where('expiry_domain_statistics_id',$existingRecord->id)->count();
        DB::table('expiry_domain_cronjob')->where('id',$existingRecord->id)->update([
            'total_domain' => $total
        ]);


        return 'end';
    }

   public function domain_category(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        
         
$postData = [
    'url' => 'huesbynadia.com',
    // Add any other necessary parameters here
];

$headers = [
    'Content-Type' => 'multipart/form-data',
    'Cookie' => 'cookiesession1=678A3E0F06A358FABD8E78C1991D8197',
    'User-Agent' => 'PostmanRuntime/7.33.0',
];

return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => 'Business',
        ]);
// Send a POST request to the FortiGuard URL with the specified headers
$response = Http::withHeaders($headers)->post('https://www.fortiguard.com/webfilter', $postData);

// Get the HTML content from the response
$html = $response->body();

echo $html; 
exit;

    // Use Symfony DomCrawler to parse the HTML
    $crawler = new Crawler($html);

    // Extract the data you need (e.g., h4.info_title)
    //$infoTitle = $crawler->filter('.well > h4.info_title')->text();
    $infoTitles = [];
    $crawler->filter('h4.info_title')->each(function ($node) use (&$infoTitles) {
    $infoTitles[] = $node->text();
});

        dd($infoTitles);
        return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully.',
        'data' => $data,
        ]);
}
 public function generic_crawling()
    {
        $client = new Client();
        $externalBacklinks = [];
        $pageNumber = 0;
        $website = 0;
        do {
            $searchUrl = "https://www.expireddomains.net/godaddy-expired-domains/?start=".$pageNumber."#listing";            
            try {
                $response = $client->request('GET', $searchUrl);
                $html = $response->getBody()->getContents(); // Get the HTML content

                // Create a Crawler object from the HTML content
                $crawler = new Crawler($html);
// dd($crawler);
                $crawler->filter('.base1 > tr')->each(function ($node) use (&$externalBacklinks, $website) {
                    // dd($node);
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
            } catch (\Exception $e) {
                dd($e);
                // Handle HTTP request errors or other exceptions here.
                break; // Exit the loop on error.
            }
        } while ($website);

        return response()->json([
            'success' => true,
            'message' => 'Data retrieved successfully, External Backlinks',
            'data' => $externalBacklinks,
        ]);
    }

///
public function search_expiry_domain(Request $request)
    {
        $keyword = $request->input('keyword');

        // Search for domains that match the keyword
        $domains = DB::table('domain_details')
            ->where('domain_name', 'LIKE', "%{$keyword}%")
            ->get();
            return response()->json([
        'success' => false,
        'message' => 'Data retrieved successfully..',
        'data' => $domains,
            ]);
    }
    
/////////
public function fetchData()
    {
        // Define the URL
        $url = 'https://www.namejet.com/store/search.action';

        // Create a Guzzle HTTP client
        $client = new Client();

        // Define the POST data
        $postData = [
            'searchTerm' => 'tax',
            'searchType' => 'contains',
            'category' => '',
            'orderByDate' => '',
            'event' => '',
            'tld' => '.com,.net,.org',
            'sourceType' => ',2,3,,,1,,,4,5,6,',
            'listingType' => '3,1,2',
            'exclusions' => '',
            'maxPrice' => '',
            'maxCharacters' => '',
            'maxWords' => '',
            'searchResultKey' => '11',
            'goToPage' => 'goToNext',
            'startIndex' => '1',
            'endIndex' => '25',
            'storeName' => 'domainerPlus',
        ];

        // Define headers
        $headers = [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
                'Referer' => 'https://www.namejet.com',
                'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8',
                // Add more headers if needed
            ],
            'form_params' => $postData,
            'cookies' => new FileCookieJar(storage_path('namejet_cookies.txt'), true),
        ];

        // Send the POST request
        $response = $client->post($url, $headers);

        // Get the response content
        $content = $response->getBody()->getContents();

        dd($content);
        // Process and display the content as needed
        return view('namejet', ['content' => $content]);
    }
    
/* currently above all working */
    /////////////////

    public function domain_age2(Request $request)
    {       
        $domainName = $request->input('domain');
        $domainName = strtolower(trim($domainName));
        $domainName = preg_replace('/^http:\/\//i', '', $domainName);
        $domainName = preg_replace('/^https:\/\//i', '', $domainName);
        $domainName = preg_replace('/^www\./i', '', $domainName);
        $domainName = str_replace('/', '', $domainName);
        $domainName = stripslashes($domainName);  
        
        $response = Http::get('https://explorekeywords.com/tools/api/website_audit/domain_age.php', [
            'domain' => $website,
        ]);
        $data = $response->json();
        
        
        $apiUrl = "https://explorekeywords.com/tools/api/website_audit/domain_age.php?domain=domcop.com";
        $client = new Client();
        $response = $client->post($apiUrl, [
        /*'headers' => [
            'Authorization' => "Bearer {$apiKey}",
        ],*/
        'form_params' => [
            'domain_name' => $website,            
        ],
    ]);            
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

    
    /*
    public function getDomainExpiration(Request $request)
    {
        $domainName = $request->input('domain');
        $whois = Factory::get()->createWhois();

        // Checking availability
        if ($whois->isDomainAvailable($domainName)) {
            return response()->json(['message' => 'Domain is available']);
        }

        try {
            $response = $whois->loadDomainInfo($domainName);
            $creationDate = date("Y-m-d", $response->creationDate);
            $expirationDate = date("Y-m-d", $response->expirationDate);
            $owner = $response->owner;

            return response()->json([
                'creation_date' => $creationDate,
                'expiration_date' => $expirationDate,
                'owner' => $owner,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch WHOIS data'], 500);
        }
    }*/

     
   
    
public function searchExpiredDomains(Request $request)
{        
    $keyword = $request->input('keyword');
    $keyword = strtolower(trim($keyword));
    $keyword = preg_replace('/^http:\/\//i', '', $keyword);
    $keyword = preg_replace('/^https:\/\//i', '', $keyword);
    $keyword = preg_replace('/^www\./i', '', $keyword);
    $keyword = str_replace('/', '', $keyword);
    $keyword = stripslashes($keyword);
    // Fetch expired domains based on the keyword (replace with your actual logic)
    $expiredDomains = $this->fetchExpiredDomains($keyword);
    $whois = Factory::get()->createWhois();
    $availableDomains = [];
    foreach ($expiredDomains as $domain) {
        if ($whois->isDomainAvailable($domain)) {
            $availableDomains[] = $domain;
        }
    }
    
    return response()->json([
        'success' => true,
        'message' => 'Data retrieved successfully. Available Domains',
        'data' => $availableDomains,
    ]);
    //return response()->json(['available_domains' => $availableDomains]);
}

private function fetchExpiredDomains($keyword)
{
    // List of top-level domains (TLDs)
    $tlds = ['.com', '.org', '.net', '.edu'];

    // Create expired domains by combining keyword with each TLD
    $expiredDomains = array_map(function ($tld) use ($keyword) {
        return $keyword . $tld;
    }, $tlds);
    
    $inputString = $keyword;
    $baseUrl = "https://api.dictionaryapi.dev/api/v2/entries/en/";
    
    $length = strlen($inputString);
    $substrings = '';
    $wordsFound = array();
    for ($i = 1; $i <= $length; $i++) {    
        $substring = substr($inputString, 0, $i);
        $substrings.= $substring;
        $response = Http::withoutVerifying()->get($baseUrl . $substrings);
    
        if ($response->successful()) {
            $responseData = $response->json();        
            if (!empty($responseData[0]['word'])) {
                $wordsFound[] = str_replace(['-', $substrings], ['', ''], $keyword) . '.com';
                $inputString = str_replace($substrings, '', $inputString);
                $substrings = '';
            }
        }
    }
    $expiredDomains = array_merge($wordsFound, $expiredDomains);
        return $expiredDomains;
    }
    
}


