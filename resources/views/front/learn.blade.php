@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>Learn SEO</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">Learn SEO</h1>
                </div>
            </div>
        </div>
        <div class="services--section pd--100-0-40">
            <div class="container">
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="Beginner-Guide-SEO.html">Beginner's Guide to SEO</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="SEO-Learning-Center.html">SEO Learning Center</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="On-Demand-Webinars.html">On-Demand Webinars</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="How-To-Guides.html">How-To Guides</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-05.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="Moz-Academy.html">Moz Academy</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="SEO-QA.html">SEO Q&A</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
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
        
@endsection