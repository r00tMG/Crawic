<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\LockscreenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SEOController;
use App\Http\Controllers\DomainController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/reset', function () {
    // $u = \App\Models\User::find(1);
    // $u->password = Illuminate\Support\Facades\Hash::make('$2y$10$Cw5rUpydqDF');
    // $u->save();

    // $u = \App\Models\User::find(4);
    // $u->password = Illuminate\Support\Facades\Hash::make('user1@gmail.com');
    // $u->save();
});
Route::get('/seo-metrics/{url}', function($url) {
    \Log::info('Test de logging depuis la route');
    return app()->make(SEOController::class)->showMetrics($url);
})->where('url', '.*')->name('seo-metrics');


Route::get('/', [HomeController::class, 'index']);
Route::get('/cart', [HomeController::class, 'cart'])->name('cart');

Route::get('seo', [HomeController::class, 'seo'])->name('seo');
Route::get('learn', [HomeController::class, 'learn'])->name('learn');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('about', [HomeController::class, 'about'])->name('about');
Route::get('contact', [HomeController::class, 'contact'])->name('contact');

Route::get('keyword_research',[HomeController::class,'keyword_research'])->name('keyword_research');
Route::get('competitive_research',[HomeController::class,'competitive_research'])->name('competitive_research');
Route::get('link_research',[HomeController::class,'link_research'])->name('link_research');
Route::get('rank_tracking',[HomeController::class,'rank_tracking'])->name('rank_tracking');
Route::get('domain_overview',[HomeController::class,'domain_overview'])->name('domain_overview');
Route::get('site_crawl',[HomeController::class,'site_crawl'])->name('site_crawl');

Route::get('services',[HomeController::class,'services'])->name('services');
Route::get('stats',[HomeController::class,'stats'])->name('stats');
Route::get('moz_local',[HomeController::class,'moz_local'])->name('moz-local');
Route::get('mozapi',[HomeController::class,'mozapi'])->name('mozapi');

Route::get('domain_age',[HomeController::class,'domain_age'])->name('domain_age');
Route::get('domain_whois',[HomeController::class,'domain_whois'])->name('domain_whois');


Route::get('domain_global_rank',[HomeController::class,'domain_global_rank'])->name('domain_global_rank');
Route::get('domain_google_bing_rank',[HomeController::class,'domain_google_bing_rank'])->name('domain_google_bing_rank');
Route::get('domain_authority',[HomeController::class,'domain_authority'])->name('domain_authority');
Route::get('domain_audit',[HomeController::class,'domain_audit'])->name('domain_audit');
Route::get('domain_backlinks',[HomeController::class,'domain_backlinks'])->name('domain_backlinks');
Route::get('domain_owner',[HomeController::class,'domain_owner'])->name('domain_owner');
Route::get('domain_expiry',[HomeController::class,'domain_expiry'])->name('domain_expiry');
Route::get('team',[HomeController::class,'team'])->name('team');

Route::get('blog/{blog}', [HomeController::class, 'blog_detail']);



Route::get('/dashboard', function () {
    // dd(auth()->user());
    if ((auth()->user()->is_admin ?? null) == 1) {
        return view('admin.index');
    }
    $jc = new \App\Http\Controllers\JoshController(); 
    return $jc->showHome();
    // return view('typography');
})->middleware(['auth', 'verified'])->name('dashboard');

// dd(auth()->user());

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';





Route::pattern('slug', '[a-z0-9- _]+');

Route::group(
    ['prefix' => 'admin', 'namespace' => 'Admin','middleware'=>'auth'],
    function () {

        // Error pages should be shown without requiring login
        Route::get(
            '404',
            function () {
                return view('admin.404');
            }
        );
        Route::get(
            '500',
            function () {
                return view('admin.500');
            }
        );
        // Lock screen
        Route::get('{id}/lockscreen', [LockscreenController::class, 'show'])->name('lockscreen');
        Route::post('{id}/lockscreen', [LockscreenController::class, 'check'])->name('lockscreen');
        // All basic routes defined here
        Route::get('login', 'AuthController@getSignin')->name('login');
        Route::get('signin', 'AuthController@getSignin')->name('signin');
        Route::post('signin', 'AuthController@postSignin')->name('postSignin');
        Route::post('signup', 'AuthController@postSignups')->name('admin.signup');
        Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
        Route::get(
            'login2',
            function () {
                return view('admin.login2');
            }
        );

        // Register2
        Route::get(
            'register2',
            function () {
                return view('admin.register2');
            }
        );
        Route::post('register2', 'AuthController@postRegister2')->name('register2');

        // Forgot Password Confirmation
        //    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
        //    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

        // Logout
        Route::get('logout', 'AuthController@getLogout')->name('admin.logout');

        // Account Activation
        Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
    }
);

Route::group(
    ['prefix' => 'admin','namespace' => 'App\Http\Controllers','as' => 'admin.','middleware'=>'auth'],
    function () {
        // GUI Crud Generator
        Route::get('generator_builder', 'JoshController@builder')->name('generator_builder');
        Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
        Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
        // Model checking
        Route::post('modelCheck', 'ModelcheckController@modelCheck');

        // Dashboard / Index
        Route::get(
            '/',
            function () {
                return view('admin.index');
            }
        )->name('dashboard');
        Route::get('index1', 'JoshController@showHome');
        // crop demo
        Route::post('crop_demo', 'JoshController@cropDemo')->name('crop_demo');
        //Log viewer routes
        Route::get('log_viewers', 'Admin\LogViewerController@index')->name('log-viewers');
        Route::get('log_viewers/logs', 'Admin\LogViewerController@listLogs')->name('log_viewers.logs');
        Route::delete('log_viewers/logs/delete', 'Admin\LogViewerController@delete')->name('log_viewers.logs.delete');
        Route::get('log_viewers/logs/{date}', 'Admin\LogViewerController@show')->name('log_viewers.logs.show');
        Route::get('log_viewers/logs/{date}/download', 'Admin\LogViewerController@download')->name('log_viewers.logs.download');
        Route::get('log_viewers/logs/{date}/{level}', 'Admin\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
        Route::get('log_viewers/logs/{date}/{level}/search', 'Admin\LogViewerController@search')->name('log_viewers.logs.search');
        Route::get('log_viewers/logcheck', 'Admin\LogViewerController@logCheck')->name('log-viewers.logcheck');
        //end Log viewer
        // Activity log
        Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
        //    Route::get('/', 'JoshController@index')->name('index');
    }
);

Route::group(
    ['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => 'admin', 'as' => 'admin.'],
    function () {

        // User Management
        Route::group(
            ['prefix' => 'users'],
            function () {
                Route::get('data', 'UsersController@data')->name('users.data');
                Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
                Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
                Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
                //        Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
                Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');
            }
        );
        Route::resource('users', 'UsersController');
        /*
     * bulk import
    */
        Route::get('bulk_import_users', 'UsersController@import');
        Route::post('bulk_import_users', 'UsersController@importInsert');
        /*
     bulk download
    */
        Route::get('download_users/{type}', 'UsersController@downloadExcel');

        Route::get('deleted_users', ['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

        // Email System
        Route::group(
            ['prefix' => 'emails'],
            function () {
                Route::get('compose', 'EmailController@create');
                Route::post('compose', 'EmailController@store');
                Route::get('inbox', 'EmailController@inbox');
                Route::get('sent', 'EmailController@sent');
                Route::get('{email}', ['as' => 'emails.show', 'uses' => 'EmailController@show']);
                Route::get('{email}/reply', ['as' => 'emails.reply', 'uses' => 'EmailController@reply']);
                Route::get('{email}/forward', ['as' => 'emails.forward', 'uses' => 'EmailController@forward']);
            }
        );
        Route::resource('emails', 'EmailController');

        // Role Management
        Route::group(
            ['prefix' => 'roles'],
            function () {
                Route::get('{group}/delete', 'RolesController@destroy')->name('roles.delete');
                Route::get('{group}/confirm-delete', 'RolesController@getModalDelete')->name('roles.confirm-delete');
                Route::get('{group}/restore', 'RolesController@getRestore')->name('roles.restore');
            }
        );
        Route::resource('roles', 'RolesController');

        /*routes for blog*/
        Route::group(
            ['prefix' => 'blog'],
            function () {
                Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
                Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
                Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
                Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
            }
        );
        Route::resource('blog', 'BlogController');

        /*routes for blog category*/
        Route::group(
            ['prefix' => 'blogcategory'],
            function () {
                Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
                Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
                Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
            }
        );
        Route::resource('blogcategory', 'BlogCategoryController');
        /*routes for file*/
        Route::group(
            ['prefix' => 'file'],
            function () {
                Route::post('create', 'FileController@store')->name('store');
                Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
                //        Route::delete('delete', 'FileController@delete')->name('delete');
                Route::get('{id}/delete', 'FileController@destroy')->name('file.delete');
                Route::get('data', 'FileController@data')->name('file.data');
                Route::get('{user}/delete', 'FileController@destroy')->name('users.delete');
            }
        );

        /*routes for News*/
        Route::group(
            ['prefix' => 'news'],
            function () {
                Route::get('data', 'NewsController@data')->name('news.data');
                Route::get('{news}/delete', 'NewsController@destroy')->name('news.delete');
                Route::get('{news}/confirm-delete', 'NewsController@getModalDelete')->name('news.confirm-delete');
            }
        );
        Route::resource('news', 'NewsController');

        Route::get(
            'crop_demo',
            function () {
                return redirect('admin/imagecropping');
            }
        );

        /* laravel example routes */
        // Charts
        Route::get('laravel_charts', 'ChartsController@index')->name('laravel_charts');
        Route::get('database_charts', 'ChartsController@databaseCharts')->name('database_charts');

        // datatables
        Route::get('datatables', 'DataTablesController@index')->name('index');
        Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

        // datatables
        Route::get('jtable/index', 'JtableController@index')->name('index');
        Route::post('jtable/store', 'JtableController@store')->name('store');
        Route::post('jtable/update', 'JtableController@update')->name('update');
        Route::post('jtable/delete', 'JtableController@destroy')->name('delete');

        // SelectFilter
        Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
        Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
        Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

        // editable datatables
        Route::get('editable_datatables', 'EditableDataTablesController@index')->name('index');
        Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
        Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
        Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
        Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

        //    # custom datatables
        Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
        Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
        Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
        Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
        Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
        Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

        //tasks section
        Route::post('task/create', 'TaskController@store')->name('store');
        Route::get('task/data', 'TaskController@data')->name('data');
        Route::post('task/{task}/edit', 'TaskController@update')->name('update');
        Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');
    }
);

// Remaining pages will be called from below controller method
// in real world scenario, you may be required to define all routes manually

Route::group(
    ['prefix' => 'admin', 'middleware' => 'admin'],
    function () {
        Route::get('{name?}', 'JoshController@showView');
    }
);


Route::group(
    ['prefix' => 'user', 'namespace' => 'App\Http\Controllers', 'middleware' => 'auth'],//
    function () {

    Route::get('domain_available', [DomainController::class, 'domain_available'])->name('domain_available');
    Route::get('domain_available_expired', [DomainController::class, 'domain_available_expired'])->name('domain_available_expired');
    Route::get('domain_available_pending', [DomainController::class, 'domain_available_pending'])->name('domain_available_pending');

    Route::get('domain_available_expired_da', [DomainController::class, 'domain_available_expired_da'])->name('domain_available_expired_da');
    Route::get('domain_available_pending_da', [DomainController::class, 'domain_available_pending_da'])->name('domain_available_pending_da');

    Route::get('domain_available_search', [DomainController::class, 'domain_available_search'])->name('domain_available_search');



    Route::get('website-status-checker', 'DomainController@website_status_checker')->name('website-status-checker');

    Route::get('ssl-checker', 'DomainController@ssl_checker')->name('ssl-checker'); 
    Route::get('dns-lookup', 'DomainController@dns_lookup')->name('dns-lookup'); 

    Route::get('whois-lookup', 'DomainController@whois_lookup')->name('whois-lookup'); 

    Route::get('content_generation', 'DashboardController@content_generation')->name('content_generation');
    
       
});



Route::fallback(function () {
    return view('front.404');
});