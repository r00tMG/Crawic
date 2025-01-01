<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\DomainPending;

class FlaskApiDomainPendingService
{
    protected $apiBaseUrl;

    public function __construct()
    {
        $this->apiBaseUrl = config('services.flask_api.url');
    }

    public function getData()
    {
        $response = Http::sink(storage_path('app/get_pending_domains.json'))
            ->get("{$this->apiBaseUrl}/get_pending_domains");

        if ($response->successful()) {
            $filePath = storage_path('app/get_pending_domains.json');
            
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

    private function filterDomains(array $domains): array
    {
        $filteredDomains = [];

        foreach ($domains as $domain) {
            $rdRatio = (int)$domain['referring_domains'] / max(1, (int)$domain['backlinks']);
            $classC_ratio = $this->calculateClassCRatio($domain['root_ip'] ?? []);
            $isIndexed = $this->checkGoogleIndexing($domain['domain']);
            $hasSuspiciousContent = $this->checkSuspiciousContent($domain['domain']);
            $hasQualityAnchors = $this->checkAnchorTexts($domain['domain']);
            $usedForSMM = $this->checkSMMHistory($domain['domain']);
            $hasQualityReferrers = $this->checkReferrerQuality($domain['referring_domains_list'] ?? []);

            if (
                $rdRatio >= 0.05 &&
                $classC_ratio >= 0.6 &&
                $isIndexed &&
                !$hasSuspiciousContent &&
                $hasQualityAnchors &&
                !$usedForSMM &&
                $hasQualityReferrers
            ) {
                $filteredDomains[] = $domain;
            }
        }

        usort($filteredDomains, function ($a, $b) {
            return strtotime($b['end_date']) - strtotime($a['end_date']);
        });

        return $filteredDomains;
    }

    private function checkGoogleIndexing(string $domain): bool
    {
        try {
            $response = Http::get("https://www.google.com/search", ['q' => "site:{$domain}"]);
            return !str_contains($response->body(), "did not match any documents");
        } catch (\Exception $e) {
            return false;
        }
    }

    private function checkSuspiciousContent(string $domain): bool
    {
        $suspiciousPatterns = [
            '/[\x{4E00}-\x{9FFF}]/u', // Chinois
            '/[\x{0400}-\x{04FF}]/u', // Cyrillique
            '/[\x{3040}-\x{309F}]/u', // Hiragana
            '/[\x{30A0}-\x{30FF}]/u', // Katakana
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
            return false;
        }
    }

     
    public function assignCategories(array $domain): array
    {
        $categoryKeywords = config('categories.keywords');

        $matchedCategories = [];
        foreach ($categoryKeywords as $pattern => $categoryId) {
            if (preg_match("/$pattern/i", $domain['domain_name'])) {
                $matchedCategories[] = $categoryId;
            }
        }
        print('matchedCategories:');
        print_r($matchedCategories);
        return $matchedCategories;
    }
    #checkAnchorTexts  checkSMMHistory  checkReferrerQuality
    private function checkAnchorTexts(string $domain): bool
    {
        return true; // Remplacez par la logique réelle
    }

    private function checkSMMHistory(string $domain): bool
    {
        return false; // Remplacez par la logique réelle
    }

    private function checkReferrerQuality(array $referringDomains): bool
    {
        if (empty($referringDomains)) {
            return false;
        }

        $qualityCount = 0;
        foreach ($referringDomains as $domain) {
            $qualityCount++; // Remplacez par la logique réelle
        }

        return ($qualityCount / count($referringDomains)) >= 0.6;
    }

    private function calculateClassCRatio(array $ipAddresses): float
    {
        if (empty($ipAddresses)) {
            return 0;
        }

        $classCNetworks = [];
        foreach ($ipAddresses as $ip) {
            $octets = explode('.', $ip);
            if (count($octets) === 4) {
                $classCNetworks[] = "{$octets[0]}.{$octets[1]}.{$octets[2]}";
            }
        }

        $uniqueClassC = count(array_unique($classCNetworks));
        $totalIPs = count($ipAddresses);

        return $totalIPs > 0 ? $uniqueClassC / $totalIPs : 0;
    }
}
