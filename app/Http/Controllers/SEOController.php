<?php

namespace App\Http\Controllers;

use App\Services\SEOStatsService;

class SEOController extends Controller
{
    public function showMetrics($url)
    {
        try {
            logger('Début de la requête SEO');
            $decodedUrl = urldecode($url);
        
            if (!filter_var($decodedUrl, FILTER_VALIDATE_URL)) {
                return response()->json(['error' => 'URL invalide'], 400);
            }
            $seoStats = new SEOStatsService($decodedUrl);
            logger('URL analysée : ' . $decodedUrl);
            //dd($seoStats);
            $alexaRank = $seoStats->getGlobalAlexaRank();
            $googlePageRank = $seoStats->getGooglePageRank();
            $pagespeedScore = $seoStats->getPagespeedScore();
            
            return response()->json([
                'alexa_rank' => $alexaRank,
                'google_page_rank' => $googlePageRank,
                'pagespeed_score' => $pagespeedScore,
            ]);
        } catch (\Exception $e) {
            logger('Erreur lors de l\'analyse de l\'URL : ' . $e->getMessage());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
