<ul id="menu" class="page-sidebar-menu">

    <li {!! (Request::is('admin') ? 'class="active"' : '' ) !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="inbox" data-size="18" data-c="#a9b6bc" data-hc="#a9b6bc" data-loop="true"></i>
            <span class="title">Expired Domains</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('user/domain_available') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('user/domain_available') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Domain Avalible (keyword)
                </a>
            </li>
            <!-- <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Domain Analysis
                </a>
            </li> -->
            
        </ul>
    </li>
    <li 
    {!! (( 
        Request::is('user/website-status-checker') ||
        Request::is('user/ssl-checker') ||
        Request::is('user/dns-lookup') ||
        Request::is('user/whois-lookup') 

        
        ) ? 'class="active"' : '' ) !!}
    >
        <a href="#">
            <i class="livicon" data-name="globe" data-size="18" data-c="#67c5df" data-hc="#67c5df" data-loop="true"></i>
            <span class="title">Domain Analysis</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('user/website-status-checker') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('user/website-status-checker') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Website Status Checker
                </a>
            </li>

            <li {!! (Request::is('user/ssl-checker') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('user/ssl-checker') }}">
                    <i class="fa fa-angle-double-right"></i>
                   SSL Checker
                </a>
            </li>

            <li {!! (Request::is('user/dns-lookup') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('user/dns-lookup') }}">
                    <i class="fa fa-angle-double-right"></i>
                   DNS Lookup
                </a>
            </li>

            <li {!! (Request::is('user/whois-lookup') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('user/whois-lookup') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Whois Lookup
                </a>
            </li>

            
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   One-Page SEO Checker
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Backlink Audit
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Organic Traffice Insights
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Link Building Tool
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   PPC Keyword Tool
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Social Meida Tracker
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Social Media Poster
                </a>
            </li>
        </ul>
    </li>
    <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="globe" data-size="18" data-c="#67c5df" data-hc="#67c5df" data-loop="true"></i>
            <span class="title">Projects Setup</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Position Tracking
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Site Audit
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   One-Page SEO Checker
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Backlink Audit
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Organic Traffice Insights
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Link Building Tool
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   PPC Keyword Tool
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Social Meida Tracker
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Social Media Poster
                </a>
            </li>
        </ul>
    </li>
    <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="biohazard" data-size="18" data-c="#01bc8c" data-hc="#01bc8c" data-loop="true"></i>
            <span class="title">SEO Management</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Domain Overview
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Traffic Analytics
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   One-Page SEO Checker
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Position Tracking
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Organic Traffice Insights
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    SEO Content Template
                </a>
            </li>
        </ul>
    </li>
    <!-- <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="key" data-size="18" data-c="#f89a14" data-hc="#f89a14" data-loop="true"></i>
            <span class="title">Keyword Management</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Keyword Gap/Manager
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Keyword Overview
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Keyword Magic Tool
                </a>
            </li>
        </ul>
    </li> -->
    <!-- <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="link" data-size="18" data-c="#ef6f6c" data-hc="#ef6f6c" data-loop="true"></i>
            <span class="title">Backlink Management</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Backlink Analytics
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Backlink Audit
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                   Link Building Tool
                </a>
            </li>
        </ul>
    </li> -->
    
    <li {!! ( Request::is('admin/laravel_charts') || Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Reports</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/laravel_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Custom Reports
                </a>
            </li>
            <li {!! (Request::is('admin/database_charts') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/database_charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Usage Report
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/users') || Request::is('admin/bulk_import_users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C" data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) || Request::is('admin/user_profile') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::route('admin.users.show',1) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li>
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/roles') || Request::is('admin/roles/create') || Request::is('admin/roles/*') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">Roles</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/roles') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/roles') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Roles List
                </a>
            </li>
            <li {!! (Request::is('admin/roles/create') ? 'class="active" id="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/roles/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Role
                </a>
            </li>
        </ul>
    </li>
    <li {!! ((Request::is('admin/blogcategory') || Request::is('admin/blogcategory/create') || Request::is('admin/blog') || Request::is('admin/blog/create')) || Request::is('admin/blog/*') || Request::is('admin/blogcategory/*') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
            <span class="title">Blog</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/blogcategory') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/blogcategory') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Blog Category List
                </a>
            </li>
            <li {!! (Request::is('admin/blog') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/blog') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Blog List
                </a>
            </li>
            <li {!! (Request::is('admin/blog/create') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/blog/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Blog
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/news') || Request::is('admin/news_item') ? 'class="active"' : '' ) !!}>
        <a href="#">
            <i class="livicon" data-name="move" data-c="#ef6f6c" data-hc="#ef6f6c" data-size="18" data-loop="true"></i>
            <span class="title">News</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/news') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/news') }}">
                    <i class="fa fa-angle-double-right"></i>
                    News
                </a>
            </li>
            <li {!! (Request::is('admin/news_item') ? 'class="active"' : '' ) !!}>
                <a href="{{ URL::to('admin/news_item') }}">
                    <i class="fa fa-angle-double-right"></i>
                    News Details
                </a>
            </li>
        </ul>
    </li>
    <li {!! (Request::is('admin/activity_log') ? 'class="active"' : '' ) !!}>
        <a href="{{  URL::to('admin/activity_log') }}">
            <i class="livicon" data-name="eye-open" data-size="18" data-c="#F89A14" data-hc="#F89A14" data-loop="true"></i>
            Activity Log
        </a>
    </li>
    <li {!! (Request::is('admin/activity_log') ? 'class="active"' : '' ) !!}>
        <a href="{{  URL::to('admin/activity_log') }}">
            <i class="livicon" data-name="eye-open" data-size="18" data-c="#F89A14" data-hc="#F89A14" data-loop="true"></i>
            Hire a digital agency
        </a>
    </li>
    <!-- Menus generated by CRUD generator -->
    @include('layouts/menu')
</ul>
