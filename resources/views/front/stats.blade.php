@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">STAT Search Analytics</h1>
                    <h3>Built for experts. Priced for scale.</h3>
                    <p>Enterprise rank tracking and SERP analytics to fuel SEO insights.</p>
                </div>
            </div>
        </div>
        <div class="container pd--80-0">
            <h3 class="text-center">Granular search data to help you scale, pivot, and optimize.</h3>
        </div>
        <div class="services--section pd--100-0-40">
            <div class="container">
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Daily tracking</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Whether you're tracking a thousand keywords or a million, STAT hunts out relevant SERPs across the globe.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Competitor intelligence</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Track infinite sites, automate your insights, and customize alerts to ensure that when it comes to the competition, nothing gets by you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Priced for scale</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>We're built to track big data at competitive rates. Tracking starts at $720/month for 6,000 keywords.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Local & mobile SERPs</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Search is on the move. Your tracking should be too. Uncover pinpoint-local and mobile SERPs, everywhere your customers are searching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-05.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Expert support</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Big or small, every client deserves on-call, top-notch service — including extra training, custom insights, and reporting.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Flexible app & API</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>We won't lock up your data. In fact, thanks to our API and endlessly adaptable web app, you can access it hassle-free.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="subscribe--section pd--100-0">
            <div class="container">
                <div class="section--title">
                    <h2 class="h2">Subscribe To Our Newsletter</h2>
                </div>
                <div class="subscribe--form">
                    <p>We will never spam you, or sell your email to third parties.</p>
                    <p>By clicking "Subcribe Now" you accept our Terms of Use and Privacy Policy.</p>
                    <form
                        action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d"
                        method="post" name="mc-embedded-subscribe-form" target="_blank" data-form="mailchimpAjax">
                        <div class="form-group"> <input type="email" name="EMAIL"
                                placeholder="Enter Your E-mail Address" class="form-control" autocomplete="off"
                                required> </div>
                        <p class="status"></p><button type="submit" class="btn btn-default">Subscribe Now</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="footer--section">
            <div class="footer--widgets">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--logo"> <img src="{{ url('/front') }}/img/footer-img/logo.png" alt=""> </div>
                                <div class="about--widget">
                                    <div class="content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    </div>
                                    <div class="action"> <a href="#">Read More<i
                                                class="fa fa-angle-double-right"></i></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Usefull Links</h2>
                                </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="blog.html">Blogs &amp; Reviews</a></li>
                                        <li><a href="term.html">Term & Condition</a></li>
                                        <li><a href="Privacy">Privacy Policy</a></li>
                                        <li><a href="Support">Support Forum</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Recent Blog or Latest News</h2>
                                </div>
                                <div class="recent-posts--widget">
                                    <ul class="nav">
                                        <li>
                                            <div class="title"> <a href="blog-details.html">There are many variations of
                                                    passages of Lorem Ipsum available, but the major.</a> </div>
                                            <div class="date"> <a href="#" class="active">19 January 2017</a> </div>
                                        </li>
                                        <li>
                                            <div class="title"> <a href="blog-details.html">There are many variations of
                                                    passages of Lorem Ipsum available, but the major.</a> </div>
                                            <div class="date"> <a href="#" class="active">10 January 2017</a> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Contact Information</h2>
                                </div>
                                <div class="contact--widget">
                                    <div class="content">
                                        <p>You can contact or visit us during working time, our contact info is below
                                        </p>
                                    </div>
                                    <ul class="info nav">
                                        <li><span>Tel :</span><a href="tel:+01234567894321">+0123 456 789 4321</a></li>
                                        <li><span>E-mail :</span><a
                                                href="mailto:example@example.com">example@example.com</a></li>
                                        <li><span>Address :</span>148 - Mirpur, Dhaka, Bangladesh</li>
                                        <li><span>Working Hour :</span>Mon - Sat 09 am - 10 pm</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection