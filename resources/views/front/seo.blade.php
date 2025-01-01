@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>Free SEO Tools</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">Free SEO Tools</h1>
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
                                    <h2 class="h4"><a href="{{ route('domain_age') }}">Domain Age</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>The length of time since a website's domain name was registered. It influences search engine rankings, with older domains often seen as more credible and authoritative, reflecting the site's established presence online.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_whois') }}">Domain Whois</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Provides detailed information about a domain name's registration, including ownership details, registration date, expiration date, and domain registrar. It helps verify domain ownership and manage administrative aspects of domain management.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_global_rank') }}">Domain Global Rank</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Indicates a website's position relative to all other websites worldwide based on factors like traffic, engagement, and popularity. It serves as a benchmark to assess a website's visibility and reach across the internet.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_google_bing_rank') }}">Domain Google/Bing Rank</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Refers to the position of a website in search engine result pages (SERPs) on Google or Bing. It indicates how well a website ranks for specific keywords or queries, influencing its visibility and organic traffic from search engines.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-05.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_authority') }}">Domain Authority</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>A metric that predicts how well a website will rank on search engines based on factors like backlinks, content quality, and trustworthiness. It helps gauge a website's overall SEO strength and credibility in its niche.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_audit') }}">Domain Audit</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>A comprehensive evaluation of a website's health and performance, focusing on SEO factors like technical issues, content quality, backlink profile, and overall user experience. It helps identify areas for improvement to enhance search engine rankings and user satisfaction.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_backlinks') }}">Domain Backlinks</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Refers to external links pointing to a specific website's domain. These links are crucial for SEO, as they signal to search engines the credibility, authority, and popularity of the website. Analyzing domain backlinks helps assess SEO strength and competitive position in search engine rankings.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_owner') }}" >Domain Owner detail</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Information regarding the individual or organization that owns and controls a specific domain name. This typically includes contact information, registration date, and administrative details, essential for verifying ownership and managing domain-related operations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-06.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a href="{{ route('domain_expiry') }}">Domain Expiry</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>The date when a domain registration period ends. It signifies when the domain name will no longer be active unless renewed. Monitoring domain expiry dates is crucial to prevent unintended loss of website access and ensure continuous online presence.</p>
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