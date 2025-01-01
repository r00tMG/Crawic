@extends('front/layout/app')

@section('content')
        <div class="banner--section bg--color-theme">
            <div class="banner--slider owl-carousel pd--100-0-70" data-owl-dots="true">
                <div class="banner--item">
                    <div class="container">
                        <div class="row row--vc">
                            <div class="col-md-6">
                                <div class="banner--content">
                                    <div class="title">
                                        <h1 class="h1">Acquire Pristine Expired Domains Across Diverse Niches</h1>
                                    </div>
                                    <div class="desc">
                                        <p>Millions of domains expire every day, but only a few are clean and usable. We have done the hard work for you, providing ready-to-use, high-quality, clean expired domains with great backlinks.
                                        </p>
                                    </div>
                                    <div class="button"> <a href="#" class="btn btn-default active">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-xxs-12">
                                <div class="banner--img"> <img src="{{ url('/front') }}/img/banner-img/slider-img-01.png" alt=""> </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner--item">
                    <div class="container">
                        <div class="row row--vc">
                            <div class="col-md-6 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-xxs-12">
                                <div class="banner--img"> <img src="{{ url('/front') }}/img/banner-img/slider-img-02.png" alt=""> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner--content">
                                    <div class="title">
                                        <h1 class="h1">Research. Discover. Make Money!</h1>
                                    </div>
                                    <div class="desc">
                                        <p>Explore our premium clean expired domains with high-quality backlinks. Benefit from in-depth keyword research, detailed traffic insights, comprehensive domain overviews, essential performance metrics, SEO insights, and competitive backlinks analysis
                                        </p>
                                    </div>
                                    <div class="button"> <a href="#" class="btn btn-default active">Learn More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner--item">
                    <div class="container">
                        <div class="row row--vc">
                            <div class="col-md-6">
                                <div class="banner--content">
                                    <div class="title">
                                        <h1 class="h1">Energize your digital marketing with Crawic's SEO tools, API, and custom data solutions!</h1>
                                    </div>
                                    <div class="desc">
                                        <p>From intuitive software to powerful APIs and tailored data insights, Crawic equips you with everything you need to transform your digital marketing strategies into winning campaigns.
                                        </p>
                                    </div>
                                    <div class="button"> <a href="#" class="btn btn-default active">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-8 col-sm-offset-2 col-xs-10 col-xs-offset-1 col-xxs-12">
                                <div class="banner--img"> <img src="{{ url('/front') }}/img/banner-img/slider-img-03.png" alt=""> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Check Your Website SEO Score !</h2>
                    </div>
                    <form action="#" method="post" data-form="validate">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <input type="text" name="website" class="form-control"
                                        placeholder="Enter Your Website" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group"> <input type="email" name="email" class="form-control"
                                        placeholder="Enter Your E-mail Address" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Check
                                            Now</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="features--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="feature--item">
                            <div class="icon"> <img src="{{ url('/front') }}/img/features-img/icon-01.png" alt=""> </div>
                            <div class="title">
                                <h2 class="h4">Great Support</h2>
                            </div>
                            <div class="flipped">
                                <div class="title">
                                    <p class="h4">Great Support</p>
                                </div>
                                <div class="content">
                                    <p>Experience unparalleled support with Crawic—our dedicated team is always here to help you succeed!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="feature--item active">
                            <div class="icon"> <img src="{{ url('/front') }}/img/features-img/icon-02.png" alt=""> </div>
                            <div class="title">
                                <h2 class="h4">Unmatched Excellence</h2>
                            </div>
                            <div class="flipped">
                                <div class="title">
                                    <p class="h4">Unmatched Excellence</p>
                                </div>
                                <div class="content">
                                    <p>With unmatched classic service, experience the pinnacle of quality and reliability.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-md-3 col-xs-6 col-xxs-12">-->
                    <!--    <div class="feature--item ">-->
                    <!--        <div class="icon"> <img src="{{ url('/front') }}/img/features-img/icon-03.png" alt=""> </div>-->
                    <!--        <div class="title">-->
                    <!--            <h2 class="h4">Best Target</h2>-->
                    <!--        </div>-->
                    <!--        <div class="flipped">-->
                    <!--            <div class="title">-->
                    <!--                <p class="h4">Best Target</p>-->
                    <!--            </div>-->
                    <!--            <div class="content">-->
                    <!--                <p>Lorem Ipsum is simply dummy text of the printing and typesetting</p>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="feature--item">
                            <div class="icon"> <img src="{{ url('/front') }}/img/features-img/icon-04.png" alt=""> </div>
                            <div class="title">
                                <h2 class="h4">Excellent Value for Money</h2>
                            </div>
                            <div class="flipped">
                                <div class="title">
                                    <p class="h4">Excellent Value for Money</p>
                                </div>
                                <div class="content">
                                    <p>Get the best bang for your buck with Crawic's SEO solutions—powerful tools, insightful data, and unbeatable value for money</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pbottom--60">
                        <div class="intro--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">We Offer a Full Range of Digital Marketing Services</h2>
                            </div>
                            <div class="content">
                                <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                                    suffered alteration in some form, by injected humour, or randomised words which
                                    don't look even slightly believable. If you are going to use a passage of Lorem
                                    Ipsum, you need to be sure there isn't anything.</p>
                            </div>
                            <div class="list">
                                <ul class="nav">
                                    <li>SEO basics: How to use social media</li>
                                    <li>Social buttons: How to add and track them on your site</li>
                                    <li>Contact page examples: What makes a great contact page?</li>
                                    <li>SEO basics: How to optimize a blog post?</li>
                                </ul>
                            </div>
                            <div class="buttons"> <a href="#" class="btn btn-default">Learn More</a> <a href="#"
                                    class="btn btn-default active">Get a Quote</a> </div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12 pbottom--60">
                        <div class="intro--video">
                            <div class="inner"> <a href="https://www.youtube.com/watch?v=2GqExKSwTEA"
                                    data-popup="video"> <img src="{{ url('/front') }}/img/intro-img/video-poster.jpg" alt=""
                                        class="img-circle"> <i class="fa fa-play"></i> </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!--<div class="services--section pd--100-0">-->
        <!--    <div class="container">-->
        <!--        <div class="section--title">-->
        <!--            <h2 class="h2">Services We Offer</h2>-->
        <!--        </div>-->
        <!--        <div class="row AdjustRow">-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('keyword_research') }}">Keyword Research</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Identify and target the most effective keywords to boost your search engine rankings. Our in-depth research uncovers high-traffic, low-competition keywords that drive relevant, high-quality traffic to your site.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('competitive_research') }}">Competitive Research</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Gain a strategic edge by understanding your competitors' strengths and weaknesses. Our comprehensive analysis reveals their tactics, helping you identify opportunities and develop effective strategies to outperform them.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('link_research') }}">Link Research</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Strengthen your site's authority and rankings with strategic link-building insights. Our thorough research identifies high-quality backlink opportunities, enhancing your site's credibility and driving more traffic.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('rank_tracking') }}">Rank Tracking</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Monitor your website's performance with precise rank tracking. We provide detailed insights into your search engine rankings, helping you track progress and adjust strategies for optimal results.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-05.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('domain_overview') }}">Domain Overview</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Get a comprehensive snapshot of your domain’s performance. Our analysis covers key metrics, including traffic, rankings, and backlinks, giving you a clear understanding of your website’s strengths and areas for improvement.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-xs-6 col-xxs-12">-->
        <!--                <div class="service--item">-->
        <!--                    <div class="header">-->
        <!--                        <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>-->
        <!--                        <div class="title">-->
        <!--                            <h3 class="h4"><a href="{{ route('site_crawl') }}">Site Crawl</a></h3>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>Uncover and fix technical issues with our detailed site crawl. We identify problems affecting your site's performance and SEO, ensuring your website runs smoothly and efficiently.</p>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--        <div class="section--footer text-center"> <a href="{{ route('services') }}" class="btn btn-default">View All Services</a> </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pbottom--60">
                        <div class="intro--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Ignite Your Brand's Potential</h2>
                            </div>
                            <div class="content">
                                <p>Crawic's cutting-edge SEO arsenal is your gateway to the forefront of digital marketing. With our bespoke data solutions and robust tools, you'll gain unparalleled insights and control over your marketing outcomes. Streamline your strategy, target with precision, and watch your brand ascend to new heights of digital excellence</p>
                            </div>
                            <div class="list">
                                <ul class="nav">
                                    <li>Scalable real-time analytics</li>
                                    <li>Enhanced insights into market visibility</li>
                                    <li>In-depth analysis of SERP features</li>
                                    <li>Dynamic, customizable reporting</li>
                                </ul>
                            </div>
                            <div class="buttons"> <a href="{{ route('stats') }}" class="btn btn-default">Explore Stats</a></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12 pbottom--60">
                        <div class="intro--video">
                            <div class="inner"> <img src="{{ url('/front') }}/img/moz/in11-2.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12 pbottom--60">
                        <div class="intro--video">
                            <div class="inner"> <img src="{{ url('/front') }}/img/moz/in-1.png" alt=""></div>
                        </div>
                    </div>
                    <div class="col-md-7 pbottom--60">
                        <div class="intro--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Supercharge Your Online Success</h2>
                            </div>
                            <div class="content">
                                <p>Maximize visibility, drive engagement, and outperform the competition with Crawic's comprehensive suite of SEO tools. Get ready to energize your brand and connect with your audience like never before.</p>
                            </div>
                            <div class="list">
                                <ul class="nav">
                                    <li>Gain exclusive data insights</li>
                                    <li>Plan your SEO strategy</li>
                                    <li>Maximize the value of clean expired domains</li>
                                    <li>Monitor your site performance and gain a competitive edge</li>
                                </ul>
                            </div>
                            <div class="buttons"> <a href="{{ route('moz-local') }}" class="btn btn-default">Explore crawic Local</a></div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
        <div class="intro--section pd--100-0-40 bg--color-lightgray">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 pbottom--60">
                        <div class="intro--content">
                            <div class="section--title section--title-left">
                                <h2 class="h2">Crawic API: Empowering Custom Data Solutions</h2>
                            </div>
                            <div class="content">
                                <p>Whether managing extensive site portfolios, vast pages, or numerous keywords, Crawic API empowers you to discover growth opportunities, increase revenue, and validate the impact of your SEO strategies.</p>
                            </div>
                            <div class="list">
                                <ul class="nav">
                                    <li>Real-time analytics at scale</li>
                                    <li>Enhanced market visibility insights</li>
                                    <li>Deep dive into SERP features</li>
                                    <li>Customizable segmentation options</li>
                                    <li>Dynamic and adaptable reporting</li>
                                </ul>
                            </div>
                            <div class="buttons"> <a href="{{ route('mozapi') }}" class="btn btn-default">Explore crawic API</a></div>
                        </div>
                    </div>
                    <div class="col-md-5 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12 pbottom--60">
                        <div class="intro--video">
                            <div class="inner"> <img src="{{ url('/front') }}/img/moz/in2.png" alt=""></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--<div class="pricing--section pd--100-0-40 bg--overlay-95" data-bg-img="img/pricing-img/bg.jpg">-->
        <!--    <div class="container">-->
        <!--        <div class="section--title">-->
        <!--            <h2 class="h2">Pricing Plan</h2>-->
        <!--        </div>-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12">-->
        <!--                <div class="pricing--item">-->
        <!--                    <div class="title">-->
        <!--                        <h3 class="h3">Standard Plan</h3>-->
        <!--                        <h4 class="h4">($29.99/Month)</h4>-->
        <!--                    </div>-->
        <!--                    <div class="icon"> <img src="{{ url('/front') }}/img/pricing-img/icon-01.png" alt=""> </div>-->
        <!--                    <div class="features">-->
        <!--                        <ul class="nav">-->
        <!--                            <li>Number of keyphrases optimized<br><span>(Up to 80)</span></li>-->
        <!--                            <li><i class="fa fa-check"></i>Web server and on-page analysis &amp; reporting them-->
        <!--                                on your site</li>-->
        <!--                            <li><i class="fa fa-check"></i>Meta tags <span>(Title &amp; description)</span>-->
        <!--                                Website conversion analysis implement <span>(Custom)</span></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="action"> <a href="#" class="btn btn-default">Start Today</a> </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12">-->
        <!--                <div class="pricing--item active">-->
        <!--                    <div class="title">-->
        <!--                        <h3 class="h3">Enterprise Plan</h3>-->
        <!--                        <h4 class="h4">($49.99/Month)</h4>-->
        <!--                    </div>-->
        <!--                    <div class="icon"> <img src="{{ url('/front') }}/img/pricing-img/icon-02.png" alt=""> </div>-->
        <!--                    <div class="features">-->
        <!--                        <ul class="nav">-->
        <!--                            <li>Number of keyphrases optimized<br><span>(Up to 150)</span></li>-->
        <!--                            <li><i class="fa fa-check"></i>Web server and on-page analysis &amp; reporting them-->
        <!--                                on your site</li>-->
        <!--                            <li><i class="fa fa-check"></i>Meta tags <span>(Title &amp; description)</span>-->
        <!--                                Website conversion analysis implement <span>(Custom)</span></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="action"> <a href="#" class="btn btn-default">Start Today</a> </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-4 col-md-offset-0 col-xs-8 col-xs-offset-2 col-xxs-12">-->
        <!--                <div class="pricing--item">-->
        <!--                    <div class="title">-->
        <!--                        <h3 class="h3">Ecommerce Plan</h3>-->
        <!--                        <h4 class="h4">($99.99/Month)</h4>-->
        <!--                    </div>-->
        <!--                    <div class="icon"> <img src="{{ url('/front') }}/img/pricing-img/icon-03.png" alt=""> </div>-->
        <!--                    <div class="features">-->
        <!--                        <ul class="nav">-->
        <!--                            <li>Number of keyphrases optimized<br><span>(Up to 300)</span></li>-->
        <!--                            <li><i class="fa fa-check"></i>Web server and on-page analysis &amp; reporting them-->
        <!--                                on your site</li>-->
        <!--                            <li><i class="fa fa-check"></i>Meta tags <span>(Title &amp; description)</span>-->
        <!--                                Website conversion analysis implement <span>(Custom)</span></li>-->
        <!--                        </ul>-->
        <!--                    </div>-->
        <!--                    <div class="action"> <a href="#" class="btn btn-default">Start Today</a> </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
    
        
        <!--<div class="faq--section pd--100-0-40">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-md-6 pbottom--60">-->
        <!--                <div class="faq--content">-->
        <!--                    <div class="section--title section--title-left">-->
        <!--                        <h2 class="h2">Let Us Help You Grow Your Business Through The Web.</h2>-->
        <!--                    </div>-->
        <!--                    <div class="sub-title">-->
        <!--                        <p>Fill in the form right side and we'll contact you shortly.</p>-->
        <!--                    </div>-->
        <!--                    <div class="body">-->
        <!--                        <p>It is a long established fact that a reader will be distracted by the readable-->
        <!--                            content of a page when looking at its layout. The point of using Lorem Ipsum is that-->
        <!--                            it has a more-or-less normal distribution of letters, as opposed to using 'Content-->
        <!--                            here, content here', making it look like readable English. Many desktop publishing-->
        <!--                            packages and web page editors now many web sites still in their infancy.</p>-->
        <!--                        <p>Lorem Ipsum a long established fact that a reader will be distracted by the readable-->
        <!--                            content of a page when looking at its layout. The point of using Lorem Ipsum is that-->
        <!--                            it has a more-or-less normal distribution of letters, as opposed to using 'Content-->
        <!--                            here, content here', making it look like readable English. Many desktop publishing-->
        <!--                            packages and web page editors now many web sites still in their infancy.</p>-->
        <!--                    </div>-->
        <!--                    <div class="action"> <a href="#" class="btn btn-default">Learn More</a> </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-md-6 pbottom--60">-->
        <!--                <div class="faq--form">-->
        <!--                    <div class="row">-->
        <!--                        <div class="col-md-6 col-md-offset-3">-->
        <!--                            <div class="title">-->
        <!--                                <h2 class="h4">Fill the form below and we'll contact you shortly.</h2>-->
        <!--                            </div>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <form action="https://themelooks.us/demo/seocrack/html/preview/forms/faq-form.php"-->
        <!--                        data-form="ajax">-->
        <!--                        <div class="status"></div>-->
        <!--                        <div class="row">-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>Website</span> <input type="text"-->
        <!--                                            name="website" class="form-control" required> </label> </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>Name</span> <input type="text"-->
        <!--                                            name="name" class="form-control" required> </label> </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>E-mail</span> <input type="email"-->
        <!--                                            name="email" class="form-control" required> </label> </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>Phone</span> <input type="text"-->
        <!--                                            name="phone" class="form-control" required> </label> </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>Company</span> <input type="text"-->
        <!--                                            name="company" class="form-control" required> </label> </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-xs-6 col-xxs-12">-->
        <!--                                <div class="form-group"> <label> <span>Budget For This Project</span> <input-->
        <!--                                            type="text" name="budget" class="form-control" required> </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-md-12">-->
        <!--                                <div class="form-group"> <label> <span>Put Your Ideas (Optional)</span>-->
        <!--                                        <textarea name="message" class="form-control"></textarea> </label>-->
        <!--                                </div>-->
        <!--                            </div>-->
        <!--                            <div class="col-md-12"> <button type="submit" class="btn btn-block btn-default">Hear-->
        <!--                                    From An Expert</button> </div>-->
        <!--                        </div>-->
        <!--                    </form>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="testimonial--section pd--100-0 bg--overlay-50" data-bg-img="img/testimonial-img/bg.jpg">
            <div class="container">
                <div class="section--title">
                    <h2 class="h2">Reviews &amp; Our Trusted Clients</h2>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="testimonial--feedbacks">
                            <div class="testimonial--clients owl-carousel" data-owl-items="3" data-owl-margin="60"
                                data-increment="1" data-owl-responsive='{"0":{"margin": 30}, "481":{"margin": 60}}'>
                                <div class="item" data-target="#testimonialInfoTab01"> <img
                                        src="{{ url('/front') }}/img/testimonial-img/client-01.jpg" alt=""> </div>
                                <div class="item" data-target="#testimonialInfoTab02"> <img
                                        src="{{ url('/front') }}/img/testimonial-img/client-02.jpg" alt=""> </div>
                                <div class="item" data-target="#testimonialInfoTab03"> <img
                                        src="{{ url('/front') }}/img/testimonial-img/client-03.jpg" alt=""> </div>
                            </div>
                            <div class="testimonial--info">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="testimonialInfoTab01">
                                        <div class="item">
                                            <div class="header">
                                                <div class="title">
                                                    <h3 class="h4">Daniel Duncan</h3>
                                                </div>
                                                <div class="sub-title">
                                                    <p>Developer, Australia</p>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <blockquote>
                                                    <p>The point of using Lorem Ipsum is that it has a more-or-less
                                                        normal distribution of letters, as opposed to using 'Content
                                                        here, content here', making it look like readable English. Many
                                                        desktop publishing packages and web page There are many
                                                        variations of passages of Lorem Ipsum available, but the
                                                        majority have suffered alteration.</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="testimonialInfoTab02">
                                        <div class="item">
                                            <div class="header">
                                                <div class="title">
                                                    <h3 class="h4">Era Elizabeth</h3>
                                                </div>
                                                <div class="sub-title">
                                                    <p>Developer, Australia</p>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <blockquote>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Laudantium rerum, dolores explicabo quas consequatur ex aliquid,
                                                        eligendi ea ipsum, cumque ab quo excepturi quaerat sit eum neque
                                                        alias cupiditate. Magnam sint ducimus, distinctio natus
                                                        molestiae tempora debitis cumque animi obcaecati nam quo atque
                                                        quam perspiciatis.</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="testimonialInfoTab03">
                                        <div class="item">
                                            <div class="header">
                                                <div class="title">
                                                    <h3 class="h4">Randy Munoz</h3>
                                                </div>
                                                <div class="sub-title">
                                                    <p>Developer, Australia</p>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <blockquote>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                        Nesciunt dignissimos, asperiores aspernatur, cupiditate aliquam
                                                        nisi perspiciatis totam quam beatae fugiat voluptate, magnam
                                                        nihil officiis excepturi optio est nostrum, tenetur quo.
                                                        Obcaecati ex, officiis numquam nisi animi quibusdam consequuntur
                                                        esse magnam. Ut quo aliquid voluptas.</p>
                                                </blockquote>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section--footer text-center mtop--40"> <a href="#" class="btn btn-default">Become a Happy
                        Client</a> </div>
            </div>
        </div>
        <!--<div class="subscribe--section pd--100-0">-->
        <!--    <div class="container">-->
        <!--        <div class="section--title">-->
        <!--            <h2 class="h2">Subscribe To Our Newsletter</h2>-->
        <!--        </div>-->
        <!--        <div class="subscribe--form">-->
        <!--            <p>We will never spam you, or sell your email to third parties.</p>-->
        <!--            <p>By clicking "Subcribe Now" you accept our Terms of Use and Privacy Policy.</p>-->
        <!--            <form-->
        <!--                action="https://themelooks.us13.list-manage.com/subscribe/post?u=79f0b132ec25ee223bb41835f&amp;id=f4e0e93d1d"-->
        <!--                method="post" name="mc-embedded-subscribe-form" target="_blank" data-form="mailchimpAjax">-->
        <!--                <div class="form-group"> <input type="email" name="EMAIL"-->
        <!--                        placeholder="Enter Your E-mail Address" class="form-control" autocomplete="off"-->
        <!--                        required> </div>-->
        <!--                <p class="status"></p><button type="submit" class="btn btn-default">Subscribe Now</button>-->
        <!--            </form>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
@endsection     