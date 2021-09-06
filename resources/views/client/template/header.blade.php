<div class="header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="left"> Welcome to Trendify <span><i class="fa fa-phone"></i>Call us</span>
                        +49 1234 5678 9</div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="right">
                        <ul>
                            <li class="toggle">
                                @if(Auth::guard('nguoi_dung')->check())
                                <span style="font-size: 20px"><i class="far fa-user-circle"></i></span>
                                <span><i class="fa fa-angle-down"></i></span>
                                @else
                                <li><a href="{{ route('nguoidung.login') }}">Đăng nhập</a></li>
                                @endif
                                <ul>
                                    @if (Auth::guard('nguoi_dung')->check() && Auth::guard('nguoi_dung')->user()->id_q == 2)
                                        <li><a href="{{ route('register.store') }}">Đăng kí cửa hàng</a></li>
                                        <li><a href="{{ route('profile.edit', ['id'=> Auth::guard('nguoi_dung')->user()->id]) }}">Thông tin cá nhân</a></li>
                                        <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>

                                    @elseif(Auth::guard('nguoi_dung')->check() &&
                                        Auth::guard('nguoi_dung')->user()->id_q == 3 )
                                        <li><a href="{{ route('quanlycuahang.index') }}">Quản lý cửa hàng</a></li>
                                        <li><a href="{{ route('profile.edit', ['id'=> Auth::guard('nguoi_dung')->user()->id]) }}">Thông tin cá nhân</a></li>
                                        <li><a href="{{ route('nguoidung.logout') }}">Đăng xuất</a></li>

                                    @endif

                                </ul>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="logo-part">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 search">
                    <form>
                        <input type="text" name="search" placeholder="Search for something" />
                        <button type="submit"><span class="arrow_right"></span></button>
                    </form>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 text-center">
                    <img src="{{ asset('template-client') }}/img/logo.png" alt="Trendify logo" />
                </div>
                <div class="col-md-4 col-sm-4 col-xs-6 cart-icon">
                    <div class="cart">
                        <a href="#">
                            <img alt="cart" src="{{ asset('template-client') }}/img/cart.png">
                            <span>2</span>
                        </a>

                        <div class="cart-list hidden-xs">
                            <h5 class="title">your shopping cart <span>(2 items)</span></h5>
                            <div class="cart-item">
                                <img class="img-responsive" alt="Single product"
                                    src="{{ asset('template-client') }}/img/products/1.jpg">
                                <span class="icon_close close-icon"></span>
                                <div class="product-info">
                                    <h5>New Yorker Suit</h5>
                                    <div class="star-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-full"></i></li>
                                        </ul>
                                    </div><br>
                                    <div class="price">
                                        <del> $399 </del> $259
                                    </div>
                                </div>
                            </div>

                            <div class="cart-item">
                                <img class="img-responsive" alt="Single product"
                                    src="{{ asset('template-client') }}/img/products/1.jpg">
                                <span class="icon_close close-icon"></span>
                                <div class="product-info">
                                    <h5>New Yorker Suit</h5>
                                    <div class="star-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-full"></i></li>
                                        </ul>
                                    </div><br>
                                    <div class="price">
                                        <del> $399 </del> $259
                                    </div>
                                </div>
                            </div>

                            <div class="order-total">
                                <h5 class="title">TOTAL ON YOUR CART<span class="amount">$166</span>
                                </h5>
                            </div>
                            <a href="#" class="trendify-btn black-bordered">View Cart</a>
                            <a href="#" class="trendify-btn black-bordered">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="navbar trendify-nav megamenu">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".collapse"
                    aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Home</a>
                        <ul class="dropdown-menu">
                            <li><a href="home-1.html">Home 1</a></li>
                            <li><a href="home-2.html">Home 2</a></li>
                            <li><a href="home-3.html">Home 3</a></li>
                            <li><a href="home-4.html">Home 4</a></li>
                            <li><a href="home-5.html">Home 5</a></li>
                            <li><a href="home-6.html">Home 6</a></li>
                        </ul>
                    </li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">Shop Pages</h5>
                                        <ul>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="shop-list-sidebar.html">Shop List With Sidebar</a></li>
                                            <li><a href="shop-grid.html">Shop Grid</a></li>
                                            <li><a href="shop-grid-sidebar.html">Shop Grid With Sidebar</a></li>
                                            <li><a href="shop-masonry.html">Shop Masonry</a></li>
                                            <li><a href="shop-grid-3.html">Shop grid 3</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="title">Shop Pages</h5>
                                        <ul>
                                            <li><a href="shop-grid-4.html">Shop grid 4</a></li>
                                            <li><a href="product-details-1.html">Product Details 1</a></li>
                                            <li><a href="product-details-2.html">Product Details 2</a></li>
                                            <li><a href="product-details-sidebar.html">Product Details With Sidebar</a>
                                            </li>
                                            <li><a href="product-details-popup.html">Product Details Popup</a></li>
                                            <li><a href="cart-2.html">Cart</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <h5 class="title">Other Pages</h5>
                                        <ul>
                                            <li class="active"><a href="about-1.html">About 1</a></li>
                                            <li><a href="about-2.html">About 2</a></li>
                                            <li><a href="categories.html">categories</a></li>
                                            <li><a href="login.html">Login</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="footer.html" target="_blank">Footer Styles</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-3">
                                        <img src="img/blog_listed1.jpg" alt=""
                                            class="{{ asset('template-client') }}/img-responsive">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Men</a></li>
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false">SHOP</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-3">
                                        <h5 class="title">our fashion shop</h5>
                                        <ul>
                                            <li class="active"><a href="#">Home Website</a></li>
                                            <li><a href="#">About Us</a></li>
                                            <li><a href="#">Our Services</a></li>
                                            <li><a href="#">Fashion Trends</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="title">Men's Wear</h5>
                                        <ul>
                                            <li><a href="#">Shorts<span class="sell">Sell</span></a></li>
                                            <li><a href="#">Suits & Blazers</a></li>
                                            <li><a href="#">Swimwear</a></li>
                                            <li><a href="#">Trousers & Chinos<span class="new">New</span></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <h5 class="title">Women's Wear</h5>
                                        <ul>
                                            <li><a href="#">Jackets<span class="sell">Sell</span></a></li>
                                            <li><a href="#">Bouses</a></li>
                                            <li><a href="#">Night Wear<span class="hot">Hot</span></a></li>
                                            <li><a href="#">Jeans & Trousers</a></li>
                                        </ul>
                                    </div>

                                    <div class="col-md-3">
                                        <img src="{{ asset('template-client') }}/img/blog_listed1.jpg" alt=""
                                            class="img-responsive">
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Women</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu">
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="blog-list.html">Blog List</a></li>
                            <li><a href="blog-archive.html">Blog Archive</a></li>
                            <li><a href="single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                            aria-expanded="false">Contact</a>
                        <ul class="dropdown-menu">
                            <li><a href="contact-1.html">Contact 1</a></li>
                            <li><a href="contact-2.html">Contact 2</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

        </div>
        <!-- /.container-fluid -->
    </div>

</div>
