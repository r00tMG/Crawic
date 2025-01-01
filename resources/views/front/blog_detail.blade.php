@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="blog.html">Blog</a></li>
                    <li class="active"><span>Blog Details</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">Blog Details</h1>
                </div>
            </div>
        </div>
        <div class="blog--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="blog--content col-md-8 pbottom--60">
                        <div class="post--item">
                            <div class="img"> <img src="<?= asset('uploads/blog/'.$blog->image) ?>" alt=""> </div>
                            <div class="title">
                                <h2 class="h4"><?= $blog->title ?></h2>
                            </div>
                            <div class="meta">
                                <p>Posted on <a href="#"><?= date('M d, Y',strtotime($blog->created_at)) ?></a></p>
                            </div>
                            <div class="content">
                                <?= $blog->content ?>
                            </div>
                        </div>
                        <div class="post--footer">
                            <div class="meta row">
                                <div class="col-sm-6">
                                    <ul class="nav">
                                        <li><span><i class="fa fa-folder-open"></i>Catagory:</span></li>
                                        <li><a href="#"><?= $blog->category->title ?></a></li>
                                        
                                    </ul>
                                </div>
                                <!-- <div class="col-sm-6">
                                    <ul class="nav float--right float--xs-none">
                                        <li><span><i class="fa fa-tags"></i>Tags:</span></li>
                                        <li><a href="#">Social</a></li>
                                        <li><a href="#">Management</a></li>
                                        <li><a href="#">Envato</a></li>
                                        <li><a href="#">Codecanyon</a></li>
                                    </ul>
                                </div> -->
                            </div>
                            
                            <!-- <div class="nav footer-nav">
                                <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="#"><i class="fa fa-rss"></i></a></li>
                                </ul> <a href="#" class="prev"><i class="fa fa-angle-double-left"></i>Previous Post</a>
                                <a href="#" class="next">Next Post<i class="fa fa-angle-double-right"></i></a>
                            </div> -->
                        </div>
                        <!-- <div class="comment--list">
                            <h3 class="comment--title h4">02 Reviews</h3>
                            <ul class="comment--items">
                                <li>
                                    <div class="comment--item clearfix">
                                        <div class="img"> <img src="img/shop-details-img/reviewer-01.png" alt=""> </div>
                                        <div class="content">
                                            <div class="header clearfix">
                                                <div class="float--left">
                                                    <h4 class="h4">Karla Gleichauf</h4>
                                                    <p class="date">(Friday, 24 February 2017 at 06:56 pm)</p>
                                                </div>
                                                <div class="float--right">
                                                    <div class="reply"> <a href="#"><i
                                                                class="fa fa-mail-reply"></i>Reply</a> </div>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <p>It is a long established fact that a reader will be distracted by the
                                                    readable content of a page when looking at its layout. The point of
                                                    using Lorem Ipsum is that it has a more-or-less normal distribution
                                                    of letters, as opposed to using 'Content here, content here', making
                                                    it look like readable English.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul>
                                        <li>
                                            <div class="comment--item clearfix">
                                                <div class="img"> <img src="img/shop-details-img/reviewer-02.png"
                                                        alt=""> </div>
                                                <div class="content">
                                                    <div class="header clearfix">
                                                        <div class="float--left">
                                                            <h4 class="h4">Arthur Schopenhauer</h4>
                                                            <p class="date">(6 hours ago)</p>
                                                        </div>
                                                        <div class="float--right">
                                                            <div class="reply"> <a href="#"><i
                                                                        class="fa fa-mail-reply"></i>Reply</a> </div>
                                                        </div>
                                                    </div>
                                                    <div class="body">
                                                        <p>It is a long established fact that a reader will be
                                                            distracted by the readable content of a page when looking at
                                                            its layout. The point of using Lorem Ipsum is that it has a
                                                            more-or-less.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <div class="comment--item clearfix">
                                        <div class="img"> <img src="img/shop-details-img/reviewer-03.png" alt=""> </div>
                                        <div class="content">
                                            <div class="header clearfix">
                                                <div class="float--left">
                                                    <h4 class="h4">Liz Montano</h4>
                                                    <p class="date">(Sunday, 21 January 2017 at 06:56 pm)</p>
                                                </div>
                                                <div class="float--right">
                                                    <div class="reply"> <a href="#"><i
                                                                class="fa fa-mail-reply"></i>Reply</a> </div>
                                                </div>
                                            </div>
                                            <div class="body">
                                                <p>It is a long established fact that a reader will be distracted by the
                                                    readable content of a page when looking at its layout. The point of
                                                    using Lorem Ipsum is that it has a more-or-less normal distribution
                                                    of letters, as opposed to using 'Content here, content here', making
                                                    it look like readable English.</p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comment--form">
                            <h3 class="comment--title h4">Leave a Comment</h3>
                            <form action="#" method="post" data-form="validate" novalidate="novalidate">
                                <div class="form-group"> <textarea name="message" placeholder="Message *"
                                        class="form-control" required></textarea> </div>
                                <div class="form-group"> <input type="text" name="name" placeholder="Name *"
                                        class="form-control" required> </div>
                                <div class="form-group"> <input type="email" name="email" placeholder="E-mail *"
                                        class="form-control" required> </div>
                                <div class="form-group"> <input type="text" name="website" placeholder="Website"
                                        class="form-control"> </div><button type="submit"
                                    class="btn btn-block btn-default">Post Comment</button>
                            </form>
                        </div> -->
                    </div>
                    <div class="blog--sidebar sidebar--widgets col-md-4 pbottom--60">
                        <div class="widget">
                            <div class="search--widget">
                                <!-- <form action="#" method="get" data-form="validate">
                                    <div class="input-group"> <input type="text" name="search" placeholder="Search..."
                                            class="form-control" required>
                                        <div class="input-group-btn"> <button type="submit"><i
                                                    class="fa fa-search"></i></button> </div>
                                    </div>
                                </form> -->
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Catagory</h2>
                            </div>
                            <div class="links--widget">
                                <ul class="nav">
                                    <?php foreach (\App\Models\BlogCategory::get() as $cat): ?>
                                        <li><a href="{{ url('/blog') }}?cat=<?= $cat->id ?>"><?= $cat->title ?><span>(<?= count($cat->blog) ?>)</span></a></li>
                                    <?php endforeach ?>
                                </ul>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Recent Post/Latest Blog</h2>
                            </div>
                            <div class="recent-posts--widget">
                                <ul class="nav">
                                    <?php foreach (\App\Models\Blog::orderBy('id','desc')->take(3)->get() as $blog): ?>
                                        <li>
                                            <div class="cat"> <a href="#"><?= $blog->category->title ?? '' ?></a> </div>
                                            <div class="title"> <a href="<?= url('blog').'/'.$blog->slug ?>"><?= $blog->title ?></a> </div>
                                            <div class="date"> <a href="#"><?= date('d M Y',strtotime($blog->created_at)) ?></a> </div>
                                        </li>
                                    <?php endforeach ?>
                                    
                                </ul>
                            </div>
                        </div>
                        <!-- <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Tags</h2>
                            </div>
                            <ul class="tags--widget">
                                <li><a href="#">SEO</a></li>
                                <li><a href="#">Marketing</a></li>
                                <li><a href="#">Branding</a></li>
                                <li><a href="#">Management</a></li>
                                <li><a href="#">Web Development</a></li>
                                <li><a href="#">Design</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Envato</a></li>
                            </ul>
                        </div> -->
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Follow Us</h2>
                            </div>
                            <ul class="social--widget">
                                <li><a href="#"><i class="fa fa-facebook"></i>Facebook</a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i>Linkedin</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i>Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-rss"></i>Follow</a></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Advertisement</h2>
                            </div>
                            <div class="ad--widget"> <img src="img/blog-img/sidebar-ad.jpg" alt="" class="center-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection