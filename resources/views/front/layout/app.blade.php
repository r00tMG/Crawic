<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--CSRF Token--}}
    <title>
        @section('title')
        | Crawic
        @show
    </title>
    <meta name="author" content="Company Name">
    <meta name="description" content="Company Name">
    <meta name="keywords" content="Company Name">
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="icon" href="favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700%7CRoboto:300,400,500,700" rel="stylesheet">
    <link href="{{ url('/front') }}/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/jquery-ui.min.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/fakeLoader.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/owl.carousel.min.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/magnific-popup.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/fontawesome-stars-o.min.css" rel="stylesheet">
    <link href="{{ url('/front') }}/style.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/responsive-style.css" rel="stylesheet">
    <link href="{{ url('/front') }}/css/colors/color-1.css" rel="stylesheet" id="changeColorScheme">
    <link href="{{ url('/front') }}/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
        <div class="header--section">
            <!--<div class="header--topbar">-->
            <!--    <div class="container">-->
            <!--        <ul class="nav social float--left">-->
            <!--            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
            <!--            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
            <!--            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
            <!--            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
            <!--            <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
            <!--        </ul>-->
            <!--        <ul class="nav cart float--right">-->
            <!--            <li><a href="{{ route('cart') }}"><i class="fa fm fa-shopping-basket"></i>(<span>3</span>)</a>-->
            <!--            </li>-->
            <!--        </ul>-->
                    <!--<ul class="nav register float--right">-->
                    <!--    <li> <a href="{{ url('/') }}/login#toregister"><i class="fa fm fa-key"></i>Signup</a></li>-->
                    <!--</ul>-->
            <!--    </div>-->
            <!--</div>-->
            <nav class="header--navbar navbar" data-trigger="sticky">
                <div class="container">
                    <div class="navbar-header">
                        <div class="header--btn float--right hidden-md hidden-lg hidden-xxs"> <a
                                href="{{ route('login') }}" class="btn btn-default">Login</a> </div><button
                            type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#headerNav" aria-expanded="false" aria-controls="headerNav"> <span
                                class="sr-only">Toggle Navigation</span> <span class="icon-bar"></span> <span
                                class="icon-bar"></span> <span class="icon-bar"></span> </button> <a
                            href="{{ url('/') }}" class="navbar-brand"> <img src="{{ asset('images/dologo.png') }}"
                                alt="Crawic "> </a>
                    </div>
                    <div class="header--btn float--right hidden-sm hidden-xs"> <a href="{{ route('login') }}"
                            class="btn btn-default">Sign Up</a> <a href="{{ route('login') }}"
                            class="btn btn-default">Login</a> </div>
                    <div id="headerNav" class="navbar-collapse collapse float--right">
                        <ul class="header--nav-links nav navbar-right">
                            <li class="active"><a href="{{ url('/') }}">Home</a></li>


                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                    role="button" aria-haspopup="true" aria-expanded="false">Products <i
                                        class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('domain_expiry') }}">Expired Domain</a></li>
                                    <li><a href="">Research</a></li>
                                    <li><a href="">Domain Analysis</a></li>
                                    <li><a href="">Backlink Insight</a></li>
                                    <li><a href="">Keyword Insight</a></li>
                                    <li><a href="">SEO Management</a></li>
                                    <li><a href="">Content Management</a></li>
                                    <li><a href="">Free SEO Tools</a></li>
                                    <li><a href="">View All</a></li>
                                </ul>
                            </li>
                            <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                                role="button" aria-haspopup="true" aria-expanded="false">Resources  <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('blog') }}">Blog</a></li>
                                <li><a href="">Help Center</a></li>
                                <li><a href="">Success Stories</a></li>
                            </ul>
                        </li>
                        <li><a href="">Pricing</a></li>
                        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                            role="button" aria-haspopup="true" aria-expanded="false">Company   <i
                                class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('about') }}">About Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                            <li><a href="">New Releases</a></li>
                        </ul>
                    </li>
                            
                            <!-- <li><a href="{{ route('seo') }}">Free SEO Tools</a></li>
                            <li><a href="{{ route('learn') }}">Learn SEO</a></li>
                            <li><a href="{{ route('blog') }}">Blog</a></li>
                            <li><a href="{{ route('about') }}">Why Us</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li> -->
                        </ul>
                    </div>
                </div>
            </nav>
        </div>


        @yield('content')



        <div class="footer--section">
            <div class="footer--widgets">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-4 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--logo"> <img src="{{ asset('images/dologo.png') }}" alt=""> </div>
                                <div class="about--widget">
                                    <div class="content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                                        </p>
                                    </div>
                                    <div class="action"> <a href="#">Read More<i
                                                class="fa fa-angle-double-right"></i></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Usefull Links</h2>
                                </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('contact') }}">Contact Us</a></li>
                                        <li><a href="{{ route('blog') }}">Blogs &amp; Reviews</a></li>
                                        <li><a href="term.html">Term & Condition</a></li>
                                        <li><a href="Privacy">Privacy Policy</a></li>
                                        <li><a href="Support">Support Forum</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Recent Blog or Latest News</h2>
                                </div>
                                <div class="recent-posts--widget">
                                    <ul class="nav">
                                        <?php foreach (\App\Models\Blog::orderBy('id','desc')->take(2)->get() as $blog): ?>

                                        <li>
                                            <div class="title"> <a href="<?= url('blog').'/'.$blog->slug ?>">
                                                    <?= $blog->title ?? '' ?>
                                                </a> </div>
                                            <div class="date"> <a href="#" class="active">
                                                    <?= date('d M Y',strtotime($blog->created_at)) ?>
                                                </a> </div>
                                        </li>
                                        <?php endforeach ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-md-3 col-xs-6 col-xxs-12">-->
                        <!--    <div class="widget">-->
                        <!--        <div class="widget--title">-->
                        <!--            <h2 class="h4">Contact Information</h2>-->
                        <!--        </div>-->
                        <!--        <div class="contact--widget">-->
                        <!--            <div class="content">-->
                        <!--                <p>You can contact or visit us during working time, our contact info is below-->
                        <!--                </p>-->
                        <!--            </div>-->
                        <!--            <ul class="info nav">-->
                        <!--                <li><span>Tel :</span><a href="tel:+01234567894321">+0123 456 789 4321</a></li>-->
                        <!--                <li><span>E-mail :</span><a-->
                        <!--                        href="mailto:example@example.com">example@example.com</a></li>-->
                        <!--                <li><span>Address :</span>148 - Mirpur, Dhaka, Bangladesh</li>-->
                        <!--                <li><span>Working Hour :</span>Mon - Sat 09 am - 10 pm</li>-->
                        <!--            </ul>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
            <div class="footer--copyright">
                <div class="container">
                    <p class="float--left">Copyright &copy; by <a href="#">Crawic</a> 2024. All Rights Reserved.</p>
                    <ul class="social nav float--right">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="back-to-top-btn"> <a href="#" class="active"><i class="fa fa-chevron-up"></i></a> </div>
    </div>
    <script src="{{ url('/front') }}/js/jquery-3.2.1.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery-ui.min.js"></script>
    <script src="{{ url('/front') }}/js/bootstrap.min.js"></script>
    <script src="{{ url('/front') }}/js/fakeLoader.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery.sticky.min.js"></script>
    <script src="{{ url('/front') }}/js/owl.carousel.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery.validate.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ url('/front') }}/js/isotope.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ url('/front') }}/js/jquery.barrating.min.js"></script>
    <script src="{{ url('/front') }}/js/retina.min.js"></script>
    <script src="{{ url('/front') }}/js/main.js"></script>
    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>

</html>