@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>Contact</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">Contact Us</h1>
                </div>
            </div>
        </div>
        <div class="contact--section pd--170-0-110">
            <div class="contact--bg-img pd--100-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <div data-bg-img="img/contact-img/bg.jpg"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row--vc">
                    <div class="col-md-3"></div>
                    <!--<div class="col-md-6">-->
                    <!--    <div class="row AdjustRow">-->
                    <!--        <div class="col-xs-6 col-xxs-12">-->
                    <!--            <div class="contact--info-item">-->
                    <!--                <div class="icon"> <img src="{{ url('/front') }}/img/contact-img/icon-01.png" alt=""> </div>-->
                    <!--                <div class="title">-->
                    <!--                    <h2 class="h4">Office Address</h2>-->
                    <!--                </div>-->
                    <!--                <div class="content">-->
                    <!--                    <p>House-896, 123 Lorem St., East Shewrapara, Dhaka-1216, Bangladesh</p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-xs-6 col-xxs-12">-->
                    <!--            <div class="contact--info-item">-->
                    <!--                <div class="icon"> <img src="{{ url('/front') }}/img/contact-img/icon-02.png" alt=""> </div>-->
                    <!--                <div class="title">-->
                    <!--                    <h2 class="h4">Make A Call Now</h2>-->
                    <!--                </div>-->
                    <!--                <div class="content">-->
                    <!--                    <p><a href="tel:+0012345678900">+0012345678900</a>, <a-->
                    <!--                            href="tel:+0056992546499">+0056992546499</a></p>-->
                    <!--                    <p>(Available From 10 pm - 08 am)</p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-xs-6 col-xxs-12">-->
                    <!--            <div class="contact--info-item">-->
                    <!--                <div class="icon"> <img src="{{ url('/front') }}/img/contact-img/icon-03.png" alt=""> </div>-->
                    <!--                <div class="title">-->
                    <!--                    <h2 class="h4">E-mail Address</h2>-->
                    <!--                </div>-->
                    <!--                <div class="content">-->
                    <!--                    <p><a href="mailto:example@example.com">example@example.com</a></p>-->
                    <!--                    <p><a href="mailto:example@example.com">example@example.com</a></p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="col-xs-6 col-xxs-12">-->
                    <!--            <div class="contact--info-item">-->
                    <!--                <div class="icon"> <img src="{{ url('/front') }}/img/contact-img/icon-04.png" alt=""> </div>-->
                    <!--                <div class="title">-->
                    <!--                    <h2 class="h4">Our Websites</h2>-->
                    <!--                </div>-->
                    <!--                <div class="content">-->
                    <!--                    <p><a href="#">www.example.com</a></p>-->
                    <!--                    <p><a href="#">www.example.com</a></p>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                    <div class="col-md-6 pbottom--60">
                        <div class="contact--form">
                            <div class="title">
                                <h2 class="h2">Just Say Hello!</h2>
                            </div>
                            <form action="https://themelooks.us/demo/seocrack/html/preview/forms/contact-form.php"
                                method="post" data-form="ajax">
                                <div class="status"></div>
                                <div class="row">
                                    <div class="col-xs-6 col-xxs-12">
                                        <div class="form-group"> <label> <span>Name *</span> <input type="text"
                                                    name="name" class="form-control" required> </label> </div>
                                    </div>
                                    <div class="col-xs-6 col-xxs-12">
                                        <div class="form-group"> <label> <span>Phone</span> <input type="text"
                                                    name="phone" class="form-control"> </label> </div>
                                    </div>
                                    <div class="col-xs-6 col-xxs-12">
                                        <div class="form-group"> <label> <span>E-mail *</span> <input type="email"
                                                    name="email" class="form-control" required> </label> </div>
                                    </div>
                                    <div class="col-xs-6 col-xxs-12">
                                        <div class="form-group"> <label> <span>Subject *</span> <input type="text"
                                                    name="subject" class="form-control" required> </label> </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group"> <label> <span>Message *</span> <textarea name="message"
                                                    class="form-control" required></textarea> </label> </div>
                                    </div>
                                    <div class="col-sm-12"> <button type="submit" class="btn btn-block btn-default">Send
                                            Message</button> </div>
                                </div>
                            </form>
                        </div>
                    </div>
                     <div class="col-md-3"></div>
                </div>
            </div>
        </div>
        
@endsection