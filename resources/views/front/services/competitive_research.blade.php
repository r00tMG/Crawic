@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">Free SEO Competitive Analysis Tool</h1>
                    <h3>Enter any domain, and we'll show you competitive intel like your
                        top competitors, keyword gaps, and content opportunities.
                    </h3>

                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                 
                    <form action="#" method="post" data-form="validate">
                        <div class="row">
                            <!-- <div class="col-md-6">
                                <div class="form-group"> <input type="text" name="website" class="form-control"
                                        placeholder="Enter a keyword *" required> </div>
                            </div> -->
                            <div class="col-md-12">
                                <div class="input-group"> <input type="email" name="email" class="form-control"
                                        placeholder="Enter a Domain" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Analyze Domain</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="services--section pd--100-0-40">
            <div class="container">
                <h3 class="text-center pd--80-0">Free SEO analysis. World-class data.</h3>
                <div class="row AdjustRow">
                    <div class="col-md-6 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Top Competitors</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Content Opportunities</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Keyword Opportunities</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                                    Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Site Overview Metrics</a></h2>
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
@endsection