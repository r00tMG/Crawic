@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">A Key to Website Credibility</h1>
                    <h3></h3>
                    <p>
                        Unlock the secrets of Domain Authority and its impact on your website's online presence. Get insights into its calculation, factors that influence it, and practical strategies to boost your Domain Authority and drive online success.
                    </p>
                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Check Domain Authority</h2>
                    </div>
                    <form action="#" method="post" onsubmit="domainRank(this,event)" data-form="validate">
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div class="input-group"> <input type="url" name="domain" class="form-control"
                                        placeholder="Enter Your domain authority" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Check
                                            Now</button> </div>
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
            function domainRank(node,e){
                document.node =node;
                e.preventDefault();
                $('.result').hide();
                $(node).find('button').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
                $.get('{{ route('api.domain_authority') }}',{domain: $('input[name=domain]').val()}).then(function (res){
                    // console.log(res)
                    response.innerHTML = res;
//                     $('.result').show();
//                     $('.result').html(``);
//                     if (res['data'][0]['rank'] != undefined){
//                        $('.result').html(`<div class="col-sm-12 col-md-6 col-lg-6">
//                             <h3>Domain Name</h3>
//                             <h3>`+res['data'][0]['domain']+`</h3>
//                         </div>
//                         <div class="col-sm-12 col-md-6 col-lg-6">
//                             <h3>Rank
//                             <span data-toggle="tooltip" data-placement="top" title="Traffic rank of this site. Shown for the country where it gets the most traffic"  >
//                             <svg  width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg" style="
//     fill: rebeccapurple;
// "><path fill-rule="evenodd" clip-rule="evenodd" d="M7.004 1.513a5.5 5.5 0 1 0 .018 11 5.5 5.5 0 0 0-.018-11ZM.513 7.023a6.5 6.5 0 1 1 13-.02 6.5 6.5 0 0 1-13 .02Z"></path><path d="M7 5.667c-.4 0-.667.266-.667.666v3.334c0 .4.267.666.667.666s.667-.266.667-.666V6.333c0-.4-.267-.666-.667-.666ZM7 5a.667.667 0 1 0 .052-1.333A.667.667 0 0 0 7 5Z"></path></svg>
//                             </span>
//                             </h3>
//                             <h3>#`+(parseInt(res['data'][0]['rank']).toFixed(1).replace(/\d(?=(\d{3})+\.)/g, '$&,')) +`</h3>
//                         </div>`); 
//                        $(function () {
//                           $('[data-toggle="tooltip"]').tooltip()
//                         });
//                     } else {
//                         $('.result').html(`<div class="col-sm-12 col-md-12 col-lg-12">
//                             <h2>No data Found!</h2>
//                         </div>
//                         `); 
//                     }
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
                                    <h2 class="h4"><a>Domain Authority 101</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    A beginner's guide to understanding Domain Authority and its impact on online success.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Boosting Domain Authority</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    "A comprehensive guide to improving your website's Domain Authority and driving online success.
                                 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>The Ultimate Domain Authority Guide</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    A detailed resource for understanding and optimizing Domain Authority for maximum online visibility.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>A Ranking Factor</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Learn how Domain Authority affects your website's search engine ranking and how to improve it.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Domain Authority and SEO</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>
                                    Discover the connection between Domain Authority and SEO, and how to optimize both for online success.
                                </p>
                            </div>
                        </div>
                    </div>
                  
                </div>
            </div>
        </div>
@endsection