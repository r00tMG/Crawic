<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;
use Spatie\Permission\Models\Role;
use ConsoleTVs\Charts\Facades\Charts;
use Analytics;
use App\Charts\Highcharts;
use App\Models\Blog;
use Artisan;
use Carbon\Carbon;
use File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;
use Sentinel;
use Spatie\Analytics\Period;
use Str;
use Yajra\DataTables\DataTables;

class JoshController extends Controller
{
    /**
     * Message bag.
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $messageBag = null;

    /**
     * Initializer.
     */
    public function __construct()
    {
        $this->messageBag = new MessageBag();
        $this->middleware('auth');
        $this->middleware('permission:view dashboard')->only('showHome');
        $this->middleware('permission:view activity log')->only('activityLogData');
    }

    /**
     * Crop Demo
     */
    public function cropDemo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $targ_w = $targ_h = 150;
            $jpeg_quality = 99;

            $src = base_path() . '/public/img/cropping-image.jpg';

            $img_r = imagecreatefromjpeg($src);

            $dst_r = imagecreatetruecolor($targ_w, $targ_h);

            imagecopyresampled($dst_r, $img_r, 0, 0, intval($_POST['x']), intval($_POST['y']), $targ_w, $targ_h, intval($_POST['w']), intval($_POST['h']));
            header('Content-type: image/jpeg');
            imagejpeg($dst_r, null, $jpeg_quality);

            exit;
        }
    }

    public function showView($name = null)
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'You must be logged in!');
        }

        if (View::exists('admin.' . $name)) {
            return view('admin.' . $name);
        }

        abort(404);
    }

    public function activityLogData()
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'You must be logged in!');
        }

        $logs = Activity::with('causer')
            ->latest()
            ->get(['causer_id', 'log_name', 'description', 'created_at']);

        return response()->json($logs);
    }

    public function showHome()
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'You must be logged in!');
        }

        // analytics related functionality
        $storagePath = storage_path() . '/app/analytics/';
        if (File::exists($storagePath . 'service-account-credentials.json')) {
            //Last week visitors statistics
            $month_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7))->groupBy(
                function (array $visitorStatistics) {
                    return $visitorStatistics['date']->format('Y-m-d');
                }
            )->map(
                function ($visitorStatistics, $yearMonth) {
                    [$year, $month, $day] = explode('-', $yearMonth);
                    return ['date' => "{$year}-{$month}-{$day}", 'visitors' => $visitorStatistics->sum('visitors'), 'pageViews' => $visitorStatistics->sum('pageViews')];
                }
            )->values();

            //yearly visitors statistics
            $year_visits = Analytics::fetchTotalVisitorsAndPageViews(Period::days(365))->groupBy(
                function (array $visitorStatistics) {
                    return $visitorStatistics['date']->format('Y-m');
                }
            )->map(
                function ($visitorStatistics, $yearMonth) {
                    [$year, $month] = explode('-', $yearMonth);
                    return ['date' => "{$year}-{$month}", 'visitors' => $visitorStatistics->sum('visitors'), 'pageViews' => $visitorStatistics->sum('pageViews')];
                }
            )->values();

            // total page visitors and views
            $visitorsData = Analytics::performQuery(Period::days(7), 'ga:visitors,ga:pageviews', ['dimensions' => 'ga:date']);
            $visitorsData = collect($visitorsData['rows'] ?? [])->map(
                function (array $dateRow) {
                    return [

                        'visitors' => (int) $dateRow[1],
                        'pageViews' => (int) $dateRow[2],
                    ];
                }
            );
            $visitors = 0;
            $pageVisits = 0;
            foreach ($visitorsData as $val) {
                $visitors += $val['visitors'];
                $pageVisits += $val['pageViews'];
            }

            //user types ['returning','new']
            $userTypesCollection = Analytics::fetchUserTypes(Period::days(7));
            $userTypes = $userTypesCollection->mapWithKeys(
                function ($item, $key) {
                    return [ $key => [
                        'label' => $item['type'],
                        'value' => $item['sessions'],
                    ],
                    ];
                }
            );
            $analytics_error = 0;
        } else {
            $month_visits = 0;
            $year_visits = 0;
            $visitors = 0;
            $pageVisits = 0;
            $analytics_error = 1;
            $userTypes = 0;
        }

        //total users
        $user_count = User::count();

        //total Blogs
        $blog_count = Blog::count();
        $blogs = Blog::orderBy('id', 'desc')->take(5)->get()->load('category', 'author');
        $users = User::orderBy('id', 'desc')->take(5)->get();

        //user stats
        $users_data = DB::table('users')
            ->select(DB::raw('month(created_at) as month'), DB::raw('count(id) as total'))
            ->whereBetween('created_at', [Carbon::parse('first day of january'), Carbon::parse('last day of december')])
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month')
            ->all();
        $edd = \DB::table('expiry_domain_cronjob')->orderBy('id', 'desc')->take(5)->get();
        $label=[];
        $data=[];
        foreach ($edd as $row) {
            $label[] = date('d, M Y',strtotime($row->created_at));
            $data[] = $row->total_domain;
        }
        $label= array_reverse($label);
        $data= array_reverse($data);
        
        $users_chart = new Highcharts();
        
        $users_chart->labels($label);
        $users_chart->dataset('Expired Domains', 'area', $data)->options(
            [
                'color' => '#00bc8c',
            ]
        );

        // user roles
        $roles = Role::all();
        $rolesCount = collect();
        foreach ($roles as $role) {
            $rolesCount->put($role->name, $role->users()->count());
        }
        $user_roles = new Highcharts();
        $user_roles->labels($rolesCount->keys());
        $user_roles->height(250);
        $user_roles->dataset('Users By Role', 'pie', $rolesCount->values())->options(
            [
                'color' => ['var(--primary)', 'var(--warning)', 'var(--danger)'],
            ]
        );

        //finally return view
        if (1) {
            return view('admin.index1', compact('analytics_error', 'users_chart', 'blog_count', 'user_count', 'users', 'blogs', 'visitors', 'pageVisits', 'month_visits', 'year_visits', 'user_roles', 'userTypes'));
        }
        return redirect('admin/signin')->with('error', 'You must be logged in!');
    }

    /**
     * CRUD BUILDER
     * Check for folder permissions and return view
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function builder()
    {
        //check for permissions
        $permissions['models'] = is_writable(app_path('Models'));
        $permissions['controllers'] = is_writable(app_path('Http/Controllers'));
        $permissions['requests'] = is_writable(app_path('Http/Requests'));
        $permissions['repositories'] = is_writable(app_path('Repositories'));
        $permissions['views'] = is_writable(resource_path('views/admin'));
        $permissions['migrations'] = is_writable(database_path('migrations'));
        $permissions['routes'] = is_writable(base_path('routes/web_builder.php'));
        $permissions['menu'] = is_writable(resource_path('views/admin/layouts/menu.blade.php'));

        //check for pending migrations
        $pendingMigrations = $this->checkMigrations();

        return view(config('infyom.generator_builder.views.builder'), compact('permissions', 'pendingMigrations'));
    }

    public function checkMigrations(): bool
    {
        Artisan::call('migrate:status');
        $output = Artisan::output();
        if (Str::contains(trim($output), 'No migrations')) {
            return true;
        }
        $output = collect(explode("\n", $output));
        $output = $output->reject(
            function ($item) {
                return ! Str::contains($item, '| N');
            }
        );
        $count = $output->count() !== 0;
        if ($count) {
            return false;
        }
        return true;
    }

    public function cropPicture(Request $request)
    {
        $targ_w = $targ_h = 150;
        $jpeg_quality = 90;

        $src = $request->input('imgUrl');
        
        if ($request->hasFile('image')) {
            $img_r = imagecreatefromjpeg($src);
            $dst_r = imagecreatetruecolor($targ_w, $targ_h);

            imagecopyresampled(
                $dst_r, 
                $img_r, 
                0, 
                0, 
                intval($request->input('x')), 
                intval($request->input('y')), 
                $targ_w, 
                $targ_h, 
                intval($request->input('w')), 
                intval($request->input('h'))
            );

            header('Content-type: image/jpeg');
            imagejpeg($dst_r, null, $jpeg_quality);
            exit;
        }
    }
}
