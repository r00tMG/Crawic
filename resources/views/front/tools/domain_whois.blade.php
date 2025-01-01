@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">Unveiling Website Ownership Details</h1>
                    <h3></h3>
                    <p>Discover the ownership details of a website with our Domain WHOIS tool. Get information about the registrant, administrative and technical contacts, registration and expiration dates, and more. Make informed decisions about websites you interact with.</p>
                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Check Domain Ownership</h2>
                    </div>
                    <form action="#" method="post" onsubmit="domainWhois(this,event)" data-form="validate">
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div class="input-group"> <input type="url" name="domain" class="form-control"
                                        placeholder="Enter Your domain" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Check Now</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div id="response" >
                        
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function domainWhois(node,e){
                document.node =node;
                e.preventDefault();
                $('.result').hide();
                $(node).find('button').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
                $.get('{{ route('api.domain_whois') }}',{domain: $('input[name=domain]').val()}).then(function (res){
                    response.innerHTML = res;
                    
                }).always(function(){
                    $(document.node).find('button').html(`Check Now`)
                })
            }
        </script>
      
        <div class="services--section pd--100-0-40">
            <div class="container">
                <h3 class="text-center pd--80-0">Unveiling Website Ownership Details</h3>
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Individual</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Websites registered by individuals may be personal projects or blogs. Be cautious when sharing personal information.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Business</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Business-registered websites are likely commercial entities. Verify their legitimacy and check for reviews.                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Organization</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Websites registered by organizations may be non-profits, government agencies, or educational institutions. Be aware of their purpose and goals.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Privacy Protected</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Websites with privacy protection may be hiding their ownership details. Exercise caution when interacting with these sites.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Expired</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Expired domains may be inactive or abandoned. Be cautious when interacting with these sites.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Redacted</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Some domains may have redacted information due to EU GDPR regulations. Be aware of data privacy laws.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection