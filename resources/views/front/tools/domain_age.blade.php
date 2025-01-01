@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
             
                <div class="title">
                    <h1 class="h1">Uncovering the History of a Website</h1>
                    <h3></h3>
                    <p>Discover the age of a website with our Domain Age tool. Learn when a domain was registered, its expiration date, and other vital information to assess its credibility and reliability. Make informed decisions about websites you interact with.</p>
                </div>
               
            </div>
        </div>
        <div class="checker--section">
            <div class="container">
                <div class="checker--form">
                    <div class="title">
                        <h2 class="h2">Check Your Domain Age</h2>
                    </div>
                    <form action="#" method="post" onsubmit="domainAge(this,event)" >
                        <div class="row">
                          
                            <div class="col-md-12">
                                <div class="input-group"> <input type="url" name="domain" class="form-control"
                                        placeholder="Enter Your domain" required>
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Check Now
                                    </button> </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-dark result" style="margin: 29px 0px;border: 1px solid lightgrey;display: none;">
                      <thead>
                        <tr>
                          <th scope="col">Domain Name</th>
                          <th scope="col">Domain Created on</th>
                          <th scope="col">Age</th>
                          <th scope="col">Domain Updated on</th>
                          <th scope="col" >Domain Expiration Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function domainAge(node,e){
                document.node =node;
                e.preventDefault();
                $('.result').hide();
                $(node).find('button').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`);
                $.get('{{ route('api.domain_age') }}',{domain: $('input[name=domain]').val()}).then(function (res){
                    $('.result').show();
                    if (res['data']['domain']['isAvailable'] == false){
                       $('.result tbody').html(`<tr>
                        <td>`+res['data']['domain']['name']+`</td>
                        <td>`+res['data']['domain']['creationDate']+`</td>
                        <td>`+res['data']['domain']['age']+`</td>
                        <td>`+res['data']['domain']['updatedDate']+`</td>
                        <td>`+res['data']['domain']['expirationDate']+`</td>
                       </tr>`); 
                    } else {
                        $('.result tbody').html(`<tr>
                        <td colspan="5" style="text-align: center;" >No data Found!</td>
                       </tr>`); 
                    }
                }).always(function(){
                    $(document.node).find('button').html(`Check Now`)
                })
            }
        </script>
      
        <div class="services--section pd--100-0-40">
            <div class="container">
                <h3 class="text-center pd--80-0">Uncovering the History of a Website</h3>
                <div class="row AdjustRow">
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-01.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Newly Registered</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Websites registered recently may require extra caution. They may be new projects or untested entities.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-02.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Young</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Young websites are still establishing themselves. They may have limited credibility but are working to build their reputation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-03.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Established</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Established websites have a proven track record and are likely trustworthy. They have survived the initial challenges and are growing.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Mature</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Mature websites are well-established and reputable. They have a long history of stability and credibility.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-6 col-xxs-12">
                        <div class="service--item">
                            <div class="header">
                                <div class="icon"> <img src="{{ url('/front') }}/img/services-img/icon-04.png" alt=""> </div>
                                <div class="title">
                                    <h2 class="h4"><a>Veteran</a></h2>
                                </div>
                            </div>
                            <div class="body">
                                <p>Veteran websites are highly credible and trustworthy. They have been around for a long time and have built a strong reputation.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
@endsection