@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>About Us</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">About Us</h1>
                </div>
            </div>
        </div>
        <div class="about--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 pbottom--60">
                        <div class="about--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Welcome to Crawic</h2>
                            </div>
                            <div class="body">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum, you need to be sure there isn't anything.</p>
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                                    unknown printer took a galley of type and scrambled it to make a type specimen book.
                                    It has survived not only five centuries, but also the leap into electronic
                                    typesetting, remaining essentially unchanged. It was popularised in the 1960s with
                                    the release of Letraset sheets containing Lorem Ipsum passages, and more recently
                                    with desktop publishing software like Aldus PageMaker including versions of Lorem
                                    Ipsum.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pbottom--60">
                        <div class="about--img"> <img src="{{ url('/front') }}/img/about-img/about.jpg" alt=""> </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="about--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 pbottom--60">
                        <div class="about--faq">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Who We Are?</h2>
                            </div>
                            <div class="panel-group" id="aboutFAQs">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title h4" data-toggle="collapse" data-target="#aboutFAQ01"
                                            data-parent="#aboutFAQs"> <span>Our Mission</span> </h3>
                                    </div>
                                    <div class="panel-collapse collapse in" id="aboutFAQ01">
                                        <div class="panel-body">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title h4 collapsed" data-toggle="collapse"
                                            data-target="#aboutFAQ02" data-parent="#aboutFAQs"> <span>Our Stories</span>
                                        </h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="aboutFAQ02">
                                        <div class="panel-body">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title h4 collapsed" data-toggle="collapse"
                                            data-target="#aboutFAQ03" data-parent="#aboutFAQs"> <span>Our
                                                Approach</span> </h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="aboutFAQ03">
                                        <div class="panel-body">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title h4 collapsed" data-toggle="collapse"
                                            data-target="#aboutFAQ04" data-parent="#aboutFAQs"> <span>Our
                                                Philosophy</span> </h3>
                                    </div>
                                    <div class="panel-collapse collapse" id="aboutFAQ04">
                                        <div class="panel-body">
                                            <p>There are many variations of passages of Lorem Ipsum available, but the
                                                majority have suffered alteration in some form, by injected humour, or
                                                randomised words which don't look even slightly believable.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-6 pbottom--60">-->
                    <!--    <div class="about--skills">-->
                    <!--        <div class="section--title section--title-left">-->
                    <!--            <h2 class="h2">Our Skill</h2>-->
                    <!--        </div>-->
                    <!--        <div class="progress">-->
                    <!--            <h3 class="h4">Search Engine Optimization</h3>-->
                    <!--            <div class="progress-bar" role="progressbar" aria-valuenow="95" aria-valuemin="0"-->
                    <!--                aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--        <div class="progress">-->
                    <!--            <h3 class="h4">Social Media Marketing</h3>-->
                    <!--            <div class="progress-bar" role="progressbar" aria-valuenow="92" aria-valuemin="0"-->
                    <!--                aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--        <div class="progress">-->
                    <!--            <h3 class="h4">Branding / Design</h3>-->
                    <!--            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"-->
                    <!--                aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--        <div class="progress">-->
                    <!--            <h3 class="h4">Web Design &amp; Development</h3>-->
                    <!--            <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="0"-->
                    <!--                aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--        <div class="progress">-->
                    <!--            <h3 class="h4">Conversion Optimization</h3>-->
                    <!--            <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0"-->
                    <!--                aria-valuemax="100"></div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
        <!--<div class="team--section pd--100-0">-->
        <!--    <div class="container">-->
        <!--        <div class="section--title">-->
        <!--            <h2 class="h2">Our Awesome Team Members</h2>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-3 col-xs-6 col-xxs-12">-->
        <!--                <div class="team--member">-->
        <!--                    <div class="img"> <img src="{{ url('/front') }}/img/team-img/member-01.jpg" alt="">-->
        <!--                        <ul class="social">-->
        <!--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="info">-->
        <!--                        <h3 class="h4">Cynthia Hayes</h3>-->
        <!--                        <p>CEO, Co-Founder</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-3 col-xs-6 col-xxs-12">-->
        <!--                <div class="team--member">-->
        <!--                    <div class="img"> <img src="{{ url('/front') }}/img/team-img/member-02.jpg" alt="">-->
        <!--                        <ul class="social">-->
        <!--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="info">-->
        <!--                        <h3 class="h4">Justin Walters</h3>-->
        <!--                        <p>SEO Expert</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-3 col-xs-6 col-xxs-12">-->
        <!--                <div class="team--member">-->
        <!--                    <div class="img"> <img src="{{ url('/front') }}/img/team-img/member-03.jpg" alt="">-->
        <!--                        <ul class="social">-->
        <!--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="info">-->
        <!--                        <h3 class="h4">Marie Edwards</h3>-->
        <!--                        <p>Developer</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-3 col-xs-6 col-xxs-12">-->
        <!--                <div class="team--member">-->
        <!--                    <div class="img"> <img src="{{ url('/front') }}/img/team-img/member-04.jpg" alt="">-->
        <!--                        <ul class="social">-->
        <!--                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
        <!--                            <li><a href="#"><i class="fa fa-rss"></i></a></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="info">-->
        <!--                        <h3 class="h4">Johnny Ortiz</h3>-->
        <!--                        <p>Marketing Executive</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="section--footer text-center"> <a href="{{ route('team') }}" class="btn btn-default">View All-->
        <!--                Members</a> </div>-->
        <!--    </div>-->
        <!--</div>-->
@endsection