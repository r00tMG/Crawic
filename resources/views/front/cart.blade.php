@extends('front/layout/app')

@section('content')
        <div class="page-header--section bg--color-theme pd--80-0">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="index-2.html">Home</a></li>
                    <li><a href="shop.html">Shop</a></li>
                    <li class="active"><span>Cart</span></li>
                </ul>
                <div class="title">
                    <h1 class="h1">My Cart</h1>
                </div>
            </div>
        </div>
        <div class="cart--section pd--100-0">
            <div class="container">
                <div class="cart--items pbottom--100">
                    <form action="#" method="post">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Catalogue</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td data-label="Catalogue">
                                        <div class="img"> <img src="{{ url('/front') }}/img/cart-img/cart-item-01.jpg" alt=""> </div>
                                    </td>
                                    <td data-label="Product Name"><a href="shop-details.html">Drop and Drug Your Product
                                            Name No. 01</a></td>
                                    <td data-label="Price">$69.99</td>
                                    <td data-label="Quantity">
                                        <div class="product--quantity"> <input type="text" value="1"
                                                data-trigger="spinner" data-min="1" data-max="10" autocomplete="off">
                                        </div>
                                    </td>
                                    <td data-label="Total Price">$139.98</td>
                                    <td data-label="Remove"><a href="#" class="remove"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Catalogue">
                                        <div class="img"> <img src="{{ url('/front') }}/img/cart-img/cart-item-02.jpg" alt=""> </div>
                                    </td>
                                    <td data-label="Product Name"><a href="shop-details.html">Drop and Drug Your Product
                                            Name No. 02</a></td>
                                    <td data-label="Price">$69.99</td>
                                    <td data-label="Quantity">
                                        <div class="product--quantity"> <input type="text" value="1"
                                                data-trigger="spinner" data-min="1" data-max="10" autocomplete="off">
                                        </div>
                                    </td>
                                    <td data-label="Total Price">$139.98</td>
                                    <td data-label="Remove"><a href="#" class="remove"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td data-label="Catalogue">
                                        <div class="img"> <img src="{{ url('/front') }}/img/cart-img/cart-item-03.jpg" alt=""> </div>
                                    </td>
                                    <td data-label="Product Name"><a href="shop-details.html">Drop and Drug Your Product
                                            Name No. 03</a></td>
                                    <td data-label="Price">$69.99</td>
                                    <td data-label="Quantity">
                                        <div class="product--quantity"> <input type="text" value="1"
                                                data-trigger="spinner" data-min="1" data-max="10" autocomplete="off">
                                        </div>
                                    </td>
                                    <td data-label="Total Price">$139.98</td>
                                    <td data-label="Remove"><a href="#" class="remove"><i class="fa fa-remove"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="footer clearfix">
                            <div class="coupon--code float--left">
                                <div class="input-group"> <input type="text" name="coupon"
                                        placeholder="Enter your coupon code" class="form-control">
                                    <div class="input-group-btn"> <button type="submit" class="btn btn-default">Apply
                                            Coupon</button> </div>
                                </div>
                            </div>
                            <div class="update--btn float--right"> <button type="submit" class="btn btn-default">Update
                                    Cart</button> </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-8 col-sm-6 col-sm-offset-6">
                        <div class="cart--total">
                            <div class="title">
                                <h2 class="h4">Cart Totals</h2>
                            </div>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Sub Totals</td>
                                        <td>$419.94</td>
                                    </tr>
                                    <tr>
                                        <td>Shipping Charge</td>
                                        <td>$0.00</td>
                                    </tr>
                                    <tr>
                                        <td>VAT - 05.00%</td>
                                        <td>$20.94</td>
                                    </tr>
                                    <tr>
                                        <td>Total</td>
                                        <td>$440.93</td>
                                    </tr>
                                </tbody>
                            </table> <a href="checkout.html" class="btn btn-block btn-default">Proceed To Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer--section">
            <div class="footer--widgets">
                <div class="container">
                    <div class="row AdjustRow">
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--logo"> <img src="{{ url('/front') }}/img/footer-img/logo.png" alt=""> </div>
                                <div class="about--widget">
                                    <div class="content">
                                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
                                    </div>
                                    <div class="action"> <a href="#">Read More<i
                                                class="fa fa-angle-double-right"></i></a> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Usefull Links</h2>
                                </div>
                                <div class="links--widget">
                                    <ul class="nav">
                                        <li><a href="about.html">About Us</a></li>
                                        <li><a href="contact.html">Contact Us</a></li>
                                        <li><a href="blog.html">Blogs &amp; Reviews</a></li>
                                        <li><a href="term.html">Term & Condition</a></li>
                                        <li><a href="Privacy">Privacy Policy</a></li>
                                        <li><a href="Support">Support Forum</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Recent Blog or Latest News</h2>
                                </div>
                                <div class="recent-posts--widget">
                                    <ul class="nav">
                                        <li>
                                            <div class="title"> <a href="blog-details.html">There are many variations of
                                                    passages of Lorem Ipsum available, but the major.</a> </div>
                                            <div class="date"> <a href="#" class="active">19 January 2017</a> </div>
                                        </li>
                                        <li>
                                            <div class="title"> <a href="blog-details.html">There are many variations of
                                                    passages of Lorem Ipsum available, but the major.</a> </div>
                                            <div class="date"> <a href="#" class="active">10 January 2017</a> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6 col-xxs-12">
                            <div class="widget">
                                <div class="widget--title">
                                    <h2 class="h4">Contact Information</h2>
                                </div>
                                <div class="contact--widget">
                                    <div class="content">
                                        <p>You can contact or visit us during working time, our contact info is below
                                        </p>
                                    </div>
                                    <ul class="info nav">
                                        <li><span>Tel :</span><a href="tel:+01234567894321">+0123 456 789 4321</a></li>
                                        <li><span>E-mail :</span><a
                                                href="mailto:example@example.com">example@example.com</a></li>
                                        <li><span>Address :</span>148 - Mirpur, Dhaka, Bangladesh</li>
                                        <li><span>Working Hour :</span>Mon - Sat 09 am - 10 pm</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection