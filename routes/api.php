<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\DomainController;
use App\Http\Controllers\Api\BacklinkController;
#use App\Http\Controllers\SEOController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/sample', [ApiController::class, 'sample']);




Route::get('/get_domain_age', [DomainController::class, 'domain_age'])->name('api.domain_age');
Route::get('/get_domain_whois', [DomainController::class, 'domain_whois'])->name('api.domain_whois');
Route::get('/get_domain_rank', [DomainController::class, 'domain_global_rank'])->name('api.domain_global_rank');
Route::get('/get_domain_google_bing_rank', [DomainController::class, 'domain_google_bing_rank'])->name('api.domain_google_bing_rank');
Route::get('/get_domain_authority', [DomainController::class, 'domain_authority'])->name('api.domain_authority');
Route::get('/get_domain_audit', [DomainController::class, 'domain_audit'])->name('api.domain_audit');
Route::post('/get-domain-owner-detail', [DomainController::class, 'getDomainOwnerdetail']);
Route::get('/get-domain-owner-detail', [DomainController::class, 'getDomainOwnerdetail']);
Route::post('/search-expired-domains', [DomainController::class, 'searchExpiredDomains']);
Route::get('/search-expired-domains', [DomainController::class, 'searchExpiredDomains']);

Route::post('/clean-expired-domains', [DomainController::class, 'findExpiredDomains']);
Route::get('/clean-expired-domains', [DomainController::class, 'findExpiredDomains']);
//Route::get('/expired-domains', [DomainController::class, 'fetchData']);
Route::get('/expired-domains', [DomainController::class, 'todayexpirieddomain']);
Route::get('/search_expiry_domain', [DomainController::class, 'search_expiry_domain']);
Route::get('/expired-domainstwo', [DomainController::class, 'todayexpirieddomaintwo']);
Route::get('/expired-domainsthree', [DomainController::class, 'todayexpirieddomainthree']);
Route::get('/expired-genericcrowling', [DomainController::class, 'generic_crawling']);
Route::get('/domain_category', [DomainController::class, 'domain_category']);


Route::get('/expired-domainsfour', [DomainController::class, 'todayexpirieddomainfour']);




Route::post('/checkexternalbacklinks', [BacklinkController::class, 'checkExternalBacklinks']);
Route::get('/checkexternalbacklinks', [BacklinkController::class, 'checkExternalBacklinks']);

Route::get('/backlinks', [BacklinkController::class, 'getBacklinks']);



// routes/user.php
Route::prefix('api')->group(function () {
    // Define your API routes here
    
       

});



