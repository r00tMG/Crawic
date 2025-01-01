<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class FLaskApiExpiredServiceFromExpDomains
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.flask_api.url');
    }
    public function getData()
    {
        $response = Http::sink(storage_path('app/get_deleted_domains_from_expired_domains.json'))
            ->get("{$this->apiBaseUrl}/get_deleted_domains_from_expired_domains");

        if ($response->successful()) {
            $filePath = storage_path('app/get_deleted_domains_from_expired_domains.json');
            
            // Lire et décoder le fichier JSON
            try {
                $jsonData = json_decode(file_get_contents($filePath), true);
                logger("Réponse API reçue", [
                    'status' => $response->status(),
                    'json_data' => $jsonData
                ]);
                if (json_last_error() === JSON_ERROR_NONE) {
                    return $jsonData;
                } else {
                    throw new \Exception("Erreur lors du décodage JSON : " . json_last_error_msg());
                }
            } catch (\Exception $e) {
                throw new \Exception("Erreur de traitement de la réponse : " . $e->getMessage());
            }
        }
        throw new \Exception("Erreur lors de la récupération des données de l'API Flask.");
    }
    
    private function filterDomains($domains)
    {
        $filteredDomains = [];
        foreach ($domains as $domain) {
            // Vérifier le ratio RD/backlinks
            $rdRatio = (int)$domain['referring_domains'] / max(1, (int)$domain['backlinks']);
            //print_r($rdRatio);

            
            // Vérifier si le domaine est indexé dans Google
            $isIndexed = $this->checkGoogleIndexing($domain['domain']);
            //print_r($isIndexed);
            
            // Vérifier le contenu suspect (caractères asiatiques, etc.)
            $hasSuspiciousContent = $this->checkSuspiciousContent($domain['domain']);
            //print_r($hasSuspiciousContent);
            if ($rdRatio >= 0.05 && $isIndexed && !$hasSuspiciousContent) {
                $filteredDomains[] = $domain;
            }
        }
        //print_r($filteredDomains);
        return $filteredDomains;
    }

    private function checkGoogleIndexing($domain)
    {
        try {
            $response = Http::get("https://www.google.com/search", [
                'q' => "site:{$domain}"
            ]);
            
            // Si on trouve "did not match any documents" dans la réponse
            return !str_contains($response->body(), "did not match any documents");
        } catch (\Exception $e) {
            // En cas d'erreur, on considère que le domaine n'est pas indexé
            return false;
        }
    }

    private function checkSuspiciousContent($domain)
    {
        // Vérifier les caractères suspects (chinois, cyrillique, etc.)
        $suspiciousPatterns = [
            '/[\x{4E00}-\x{9FFF}]/u',  // Caractères chinois
            '/[\x{0400}-\x{04FF}]/u',  // Caractères cyrilliques
            '/[\x{3040}-\x{309F}]/u',  // Hiragana
            '/[\x{30A0}-\x{30FF}]/u',  // Katakana
        ];

        try {
            $response = Http::get("http://{$domain}");
            $content = $response->body();
            
            foreach ($suspiciousPatterns as $pattern) {
                if (preg_match($pattern, $content)) {
                    return true;
                }
            }
            
            return false;
        } catch (\Exception $e) {
            // En cas d'erreur d'accès au domaine, on considère qu'il n'y a pas de contenu suspect
            return false;
        }
    }
}
