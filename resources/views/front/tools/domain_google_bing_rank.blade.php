@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">Measuring Search Engine Visibility</h1>
                    <h3></h3>
                    <p>
                        Discover how visible a website is on Google and Bing search engines with our Domain-Google/Bing Rank tool. See how a website ranks for specific keywords and understand its search engine optimization (SEO) effectiveness.
                    </p>
                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Check Domain Rank</h2>
                    </div>
                    <form action="#" method="post" onsubmit="domainRank(this,event)" data-form="validate">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group"> <input type="url" name="domain" class="form-control"
                                        placeholder="Enter Your domain Rank" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Check Now</button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row text-center result" style="border: 1px solid lightgrey;margin: 21px 0px;border-radius: 6px;display: none;">
                        
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            function domainRank(node,e){
                document.node =node;
                e.preventDefault();
                $('.result').hide();
                $(node).find('button').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
                $.get('{{ route('api.domain_global_rank') }}',{domain: $('input[name=domain]').val()}).then(function (res){
                    console.log(res)
                    $('.result').show();
                    $('.result').html(``);
                    if (res['data'][0]['rank'] != undefined){
                       $('.result').html(`<div class="col-sm-12 col-md-6 col-lg-6">
                            <h3>Domain Name</h3>
                            <h3>`+res['data'][0]['domain']+`</h3>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <h3>SE Rank
                            <span data-toggle="tooltip" data-placement="top" title="Traffic rank of this site. Shown for the country where it gets the most traffic"  >
                            <svg  width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="
    fill: rebeccapurple;
"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.004 1.513a5.5 5.5 0 1 0 .018 11 5.5 5.5 0 0 0-.018-11ZM.513 7.023a6.5 6.5 0 1 1 13-.02 6.5 6.5 0 0 1-13 .02Z"></path><path d="M7 5.667c-.4 0-.667.266-.667.666v3.334c0 .4.267.666.667.666s.667-.266.667-.666V6.333c0-.4-.267-.666-.667-.666ZM7 5a.667.667 0 1 0 .052-1.333A.667.667 0 0 0 7 5Z"></path></svg>
                            </span>
                            </h3>
                            <h3>#`+(parseInt(res['data'][0]['rank']).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')) +`</h3>
                        </div>`); 
                       $(function () {
                          $('[data-toggle="tooltip"]').tooltip()
                        });
                    } else {
                        $('.result').html(`<div class="col-sm-12 col-md-12 col-lg-12">
                            <h2>No data Found!</h2>
                        </div>
                        `); 
                    }
                }).always(function(){
                    $(document.node).find('button').html(`Check Now`)
                })
            }
        </script>
      
        <div class="services--section pd--100-0-40">
            <div class="container">
                <h3 class="text-center pd--80-0"> Measuring Search Engine Visibility</h3>
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Rank 1-5 on Google/Bing</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites ranking among the top 5 results on Google or Bing have excellent SEO and are highly visible.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Rank 6-10 on Google/Bing</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites ranking on the first page (results 6-10) have good SEO and are easily discoverable.                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Rank 11-30 on Google/Bing</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites ranking on pages 2-3 (results 11-30) have fair SEO and may need improvement.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Rank 31+ on Google/Bing</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites ranking on lower pages (results 31+) may have poor SEO or need optimization.                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Not listed on Google/Bing</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites not indexed by Google or Bing may be new, unoptimized, or penalized.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>High ranking for specific keywords</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Websites ranking high for specific keywords have targeted SEO efforts and may be experts in their field.                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection