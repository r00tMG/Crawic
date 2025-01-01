<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FlaskApiDomainExpiredService;
use App\Models\DomainExpired;
use App\Services\FLaskApiExpiredServiceFromExpDomains;
use Illuminate\Support\Facades\DB;

class FlaskApiDomainExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:domain-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'get expired domains from ExpiredDomains.net 
                                and save them in the database';

    protected $flaskApiService;

    public function __construct(FlaskApiDomainExpiredService $flaskApiDomainExpiredService, FLaskApiExpiredServiceFromExpDomains $flaskApiExpiredServiceFromExpDomains)
    {
        parent::__construct();
        $this->flaskApiDomainExpiredService = $flaskApiDomainExpiredService;
        $this->flaskApiExpiredServiceFromExpDomains = $flaskApiExpiredServiceFromExpDomains;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        try {
            // Liste des TLD à exclure
            $excludedTlds = [
                'adult', 'sexy', 'sex', 'porn', 'xxx', 'love', 
                'dating', 'casino', 'bet', 'poker', 'gambling',
                'escort', 'cam', 'webcam', 'hot', 'gay', 'fun', 
            ];

            DB::beginTransaction();
            try {
                $dataExpiredFromExpDomains = $this->flaskApiExpiredServiceFromExpDomains->getData();
                $dataExpired = $this->flaskApiDomainExpiredService->getData();
                logger("Expired domains: ",$dataExpiredFromExpDomains);
                logger("expired: ",$dataExpired);
                // Traitement des données de dataExpiredFromExpDomains
                foreach ($dataExpiredFromExpDomains as $item) {
                    $domainParts = explode('.', strtolower(trim($item['Domain'])));
                    $tld = end($domainParts);
                    
                    if (in_array($tld, $excludedTlds)) {
                        continue;
                    }

                    $age = ($item['Creation Date'] === '-' || $item['First Seen'] === '-') 
                        ? 0 
                        : abs((int)$item['Creation Date'] - (int)$item['First Seen']);

                    DomainExpired::updateOrCreate(
                        ['domain_name' => $item['Domain']],
                        [
                            'DA' => -1,
                            'PA' => -1,
                            'DR' => -1,
                            'TF' => -1,
                            'CF' => -1,
                            'spam_rating' => -1,
                            'total_backlinks' => (int)$item['Backlinks'],
                            'referring_domains' => -1,
                            'external_links' => -1,
                            'internal_links' => -1,
                            'add_date' => $item['Add Date'],
                            'end_date' => $item['Dropped'],
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
                            'de_tld' => $item['.de']
                        ]
                    );
                }

                // Traitement des données de dataExpired
                foreach ($dataExpired as $item) {
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

                    DomainExpired::updateOrCreate(
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
                            'de_tld' => $item['de_tld']
                        ]
                    );
                }

                DB::commit();
                logger("Données expired récupérées et enregistrées avec succès.");
                $this->info('Données expired récupérées et enregistrées avec succès.');
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            $this->error('Erreur après la récupération des données expirés de l\'API Flask : ' . $e->getMessage());
        }
    }


}
