@extends('front/layout/app')

@section('content')
    <div class="preloader"></div>
    <div class="wrapper">
        <div class="f0f--section pd--180-0-80">
            <div class="f0f--error pd--80-0">
                <div class="container">
                    <p>Error !</p>
                </div>
            </div>
            <div class="f0f--content">
                <div class="container">
                    <div class="img"> <img src="img/404-img/404.png" alt=""> </div>
                    <div class="title">
                        <h1 class="h1"><span>Oops !</span> This page doesn't exist anymore ;-(</h1> </div>
                    <div class="content">
                        <p>The page you are looking for might have been moved, removed, renamed, might never existed, or temporarily unavailable. but you can follow us or search anything. press go to home butoon to go to home. There are many variations of
                            passages of Lorem Ipsum available, but the majority have suffered If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                    </div>
                    <div class="buttons"> <a href="index-2.html" class="btn btn-default"><i class="fa fa-home"></i>Go To Home</a>
                        <div class="search--widget">
                            <form action="#" method="get" data-form="validate">
                                <div class="input-group">
                                    <input type="text" name="search" placeholder="Search..." class="form-control" required>
                                    <div class="input-group-btn">
                                        <button type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection