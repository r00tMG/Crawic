@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active"><span>Blog</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">Blog</h1>
                </div>
            </div>
        </div>
        <div class="blog--section pd--100-0-40">
            <div class="container">
                <div class="row">
                    <div class="blog--content col-md-8 pbottom--60 float--right float--sm-none">
                        <div class="row MasonryRow">
                            <?php foreach ($blogs as $blog): ?>
                            <div class="col-xs-6 col-xxs-12">
                                <div class="post--item">
                                    <div class="img"> <img src="{{ url('/front') }}/img/blog-img/post-item-01.jpg" alt=""> </div>
                                    <div class="title">
                                        <h2 class="h4"><a href="<?= url('blog').'/'.$blog->slug ?>"><?= $blog->title ?></a></h2>
                                    </div>
                                    <div class="meta">
                                        <p>Posted on <a href="#"><?= date('M d, Y',strtotime($blog->created_at)) ?></a></p>
                                    </div>
                                    <div class="content">
                                        <p><?= substr($blog->content, 0,100); ?>...</p>
                                    </div>
                                    <div class="action"> <a href="<?= url('blog').'/'.$blog->slug ?>" class="active">Continue
                                            Reading...</a> </div>
                                </div>
                            </div> 
                            <?php endforeach ?>

                            <?php if (count($blogs) == 0): ?>
                                <h3  >No Blogs Found!</h3>
                            <?php endif ?>
                            
                            
                        </div>
                        <div class="pagination--wrapper">
                            <ul class="pagination">
                                <?php if (count($blogs) > 0):
                                    $page=request()->p ?? 0;
                                    $pre = $page-1;
                                    $nxt = $page+1;
                                 ?>
                                    <li > <a href="<?= ($page > 0) ? ('?p='.$page-1) : '#' ?>" class="prev"><i class="fa fa-angle-double-left"></i></a> </li>
                                    <li {!! request()->p == null || request()->p == 0 ? 'class="active"' : '' !!} ><a href="<?= ('?p=0') ?>">1</a></li>
                                    <?php
                                    $x=1;
                                    for ($i=1; $i < $total; $i+=10) { 
                                        $x++;
                                        ?>
                                        <li><a href="<?= ('?p='.$x) ?>"><?= $x ?></a></li>
                                        <?php
                                    }
                                    ?>
                                    <li> <a href="<?= ('?p='.$nxt) ?>" class="next"><i class="fa fa-angle-double-right"></i></a> </li>
                                <?php endif ?>

                                
                            </ul>
                        </div>
                    </div>
                    <div class="blog--sidebar sidebar--widgets col-md-4 pbottom--60">
                        <div class="widget">
                            <div class="search--widget">
                                <form action="#" method="get" data-form="validate">
                                    <div class="input-group"> <input type="text" name="s" value="<?= $_GET['s'] ?? '' ?>" placeholder="Search..."
                                            class="form-control" required>
                                        <div class="input-group-btn"> <button type="submit"><i
                                                    class="fa fa-search"></i></button> </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="widget">
                            <div class="widget--title">
                                <h2 class="h4">Catagory</h2>
                            </div>
                            <div class="links--widget">
                                <ul class="nav">
                                    <?php foreach (\App\Models\BlogCategory::get() as $cat): ?>
                                        <li><a href="?cat=<?= $cat->id ?>"><?= $cat->title ?><span>(<?= count($cat->blog) ?>)</span></a></li>
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
                            <div class="ad--widget"> <img src="{{ url('/front') }}/img/blog-img/sidebar-ad.jpg" alt="" class="center-block">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection