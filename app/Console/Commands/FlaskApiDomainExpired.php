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
    protected $description = 'get expired domains from ExpiredDomains.net and save them in the database';

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
            ini_set('memory_limit', '5G'); 
            // Liste des TLD à exclure
            $excludedTlds = ['adult', 'sexy', 'sex', 'porn', 'xxx', 'love', 
            'dating', 'casino', 'bet', 'poker', 'gambling',
            'escort', 'cam', 'webcam', 'hot', 'gay', 'fun'];

            //DB::beginTransaction();
            try {
                $page = 1;  // Page initiale
                $perPage = 5000;  // Nombre d'éléments par page
                //$allDataExpiredFromExpDomains = [];  // Stocker toutes les données récupérées

                do {
                    // Récupérer les données paginées
                    $response = $this->flaskApiExpiredServiceFromExpDomains->getData($page, $perPage);
                    //print_r($response['status']);
                    //print_r($response['data']);
                    print("Response de l'api Flask from expired domains à la page: ".$page." \n");
                    //print_r($response);
                    
                    if (isset($response['status']) && $response['status'] === 'success' && !empty($response['data'])) {
                        $dataExpiredFromExpDomains = $response['data'];
                        if($response['size']===0){
                            break;
                        }
                        //print_r($dataExpiredFromExpDomains);
                        print("La taille des données de expired domains: ".count($dataExpiredFromExpDomains)." \n");
                        //$allDataExpiredFromExpDomains[] = $dataExpiredFromExpDomains;
                        // Ajouter les données récupérées à la liste globale
                        //$allDataExpiredFromExpDomains = array_merge($allDataExpiredFromExpDomains, $dataExpiredFromExpDomains);
                        foreach($dataExpiredFromExpDomains as $item) {
                            if (!isset($item['Domain']) || !isset($item['End Date']) || !isset($item['Domain']) || !isset($item['Backlinks']) ) {
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

                            $categories = $this->flaskApiExpiredServiceFromExpDomains->assignCategories($item);
                                
                            if (empty($categories)) {
                                $this->error('Aucune catégorie trouvée pour le domaine : ' . $item['domain']);
                                continue;
                            }
        
                            $domainRecord = DomainExpired::updateOrCreate(
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
                            $categories = $this->flaskApiExpiredServiceFromExpDomains->assignCategories($item);
                            $domainRecord->categories()->sync($categories);
                        }
                        print("Données seo métrics à la page ".$page." enrégistrées avec succés \n");
                        // Incrémenter la page pour la prochaine itération
                        $page++;
                        print("Page suivante: ".$page);
                    } else {
                        // Arrêter si aucune donnée n'est renvoyée
                        $dataExpiredFromExpDomains=[];
                        break;
                    }
                } while (count($dataExpiredFromExpDomains) !== 0);
               
                $page = 1;  // Page initiale
                $perPage = 1000;  // Nombre d'éléments par page
                //$allDataExpired = [];  // Stocker toutes les données récupérées

                do {
                    // Récupérer les données paginées
                    $response = $this->flaskApiDomainExpiredService->getData($page, $perPage);
                    print("Response de l'api Flask des seo métrics à la page ".$page." \n");
                    //print_r($response);
                    
                    if (isset($response['status']) && $response['status'] === 'success' && !empty($response['data'])) {
                        $dataExpired = $response['data'];
                        //print_r($dataExpired);
                        print("La taille des données de check page: ".count($dataExpiredFromExpDomains)." \n");

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
                             
                            
                           $categories = $this->flaskApiDomainExpiredService->assignCategories($item);
                            //print
                            
                            if (empty($categories)) {
                                $this->error('Aucune catégorie trouvée pour le domaine : ' . $item['domain']);
                                continue;
                            }
        
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
                                    'de_tld' => $item['de_tld'],
                                ]
                            );
                            //print($a);
                            //$allDataExpired = [];
                            $categories = $this->flaskApiDomainExpiredService->assignCategories($item);
                            $domainRecord->categories()->sync($categories);
                        }
                        $page++;
                        print("Page suivante: ".$page);
                    } else {
                        // Arrêter si aucune donnée n'est renvoyée
                        $dataExpired=[];
                        break;
                    }
                } while (count($dataExpired) !==0);
                //print("Response of all datas de l'api Flask");
                $deletedCount = DomainExpired::where('end_date', '<', Carbon::now())->delete();
                $this->info("Suppression terminée : {$deletedCount} domaines supprimés.");
                // Traitement des données de dataExpired
                
                
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
