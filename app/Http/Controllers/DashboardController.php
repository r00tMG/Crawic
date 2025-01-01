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
use OpenAI;


class DashboardController extends Controller
{

    public function content_generation(Request $request){

        $content = '';

        if ($request->keyword) {
            $client = OpenAI::client(env('OPENAI_API_KEY'));
            $result = $client->completions()->create([
                "model" => 'text-davinci-003',
                "temperature" => 0,
                'max_tokens' => (int)$request->max_result_length,
                'prompt' => sprintf('Write 1 Blog Idea & Outline About '.$request->keyword.' in English (US)'),
            ]);
            $content = trim($result['choices'][0]['text']);
            \DB::table('user_content')->insert([
                'user_id' => auth()->id(),
                'content' => $content
            ]);
        }

        return view('content_generation',compact('content'));
    }



}


