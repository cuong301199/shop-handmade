@extends('client.template.master')
@section('content')


<div class="col-md-9 col-md-push-3 col-sm-12">
    <div class="trendify-banner">
        <img src="{{ asset('template-client') }}/img/banner.jpg" class="img-responsive" alt="image banner">
        <div class="banner-text">
            <h3 class="animate fadeInDown wow">ELEGANT & MODERN fashion</h3>
            <h4 class="animate fadeInDown wow" data-wow-delay="0.5s">CLOTHES & STYLES FOR EVEYRONE</h4>
            <a class="trendify-btn default-bordered margin-left-0" href="#">Sign Up Now</a>
        </div>
    </div>
    <div class="product-listing-view">
        <div class="view-navigation">
            <div class="info-text">
                <p>Showing 1-8 from 124 products</p>
            </div>
            <div class="right-content">
                <div class="grid-list">
                    <ul>
                        <li><a href="shop-list-sidebar.html" ><i class="fa fa-align-justify"></i></a></li>
                        <li><a href="#" class="active"><i class="fa fa-th"></i></a></li>
                    </ul>
                </div>
                <div class="input-select">
                    <select name="sorted" id="sorted">
                        <option value="-1">Sorted by</option>
                          <option>Price</option>
                          <option>Useless</option>
                          <option>Important</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($danhsach as $item )
            <div class="col-md-4 col-sm-6">
                <div class="product-single margin-bottom-70px">
                    <div class="product-img">
                        <img class="img-responsive" alt="Single product" src="{{ asset($item->hinhanh_sp) }}">
                        <div class="actions">
                            <ul>
                                <li><a class="zoom" href="{{ asset('template-client') }}/mg/single_1.jpg"><i class="fa fa-search"></i></a></li>
                                <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                <li><a href="product-details-1.html"><i class="fa fa-expand"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product-info">
                        <h2>New Look Stripe T-Shirt</h2>
                        <div class="star-rating">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-full"></i></li>
                            </ul>
                        </div>
                        <div class="price">
                            <del> $50 </del> $40
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    <div class="pagination">
        <div class="col-xs-1 no-padding">
            <a href="#"><span class="pagicon arrow_left"></span></a>
        </div>
        <div class="col-xs-offset-1 col-sm-offset-3 col-xs-7">
            <ul class="pagination-number">
                <li>01</li>
                <li class="active">02</li>
                <li>03</li>
                <li>04</li>
                <li>05</li>
                <li>06</li>
            </ul>
        </div>
        <div class="col-xs-1 no-padding text-right">
            <a href="#"><span class="pagicon arrow_right"></span></a>
        </div>
    </div>
    <!-- / pagination -->

 </div>
{{-- <div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="page_title">
                    <h1>OUR SHOP WITH SIDEBAR</h1>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Men's</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--/ page title -->


<!-- content area -->
 {{-- <div class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3 col-sm-12">
                <div class="trendify-banner">
                    <img src="{{ asset('template-client') }}/img/banner.jpg" class="img-responsive" alt="image banner">
                    <div class="banner-text">
                        <h3 class="animate fadeInDown wow">ELEGANT & MODERN fashion</h3>
                        <h4 class="animate fadeInDown wow" data-wow-delay="0.5s">CLOTHES & STYLES FOR EVEYRONE</h4>
                        <a class="trendify-btn default-bordered margin-left-0" href="#">Sign Up Now</a>
                    </div>
                </div>
                <div class="product-listing-view">
                    <div class="view-navigation">
                        <div class="info-text">
                            <p>Showing 1-8 from 124 products</p>
                        </div>
                        <div class="right-content">
                            <div class="grid-list">
                                <ul>
                                    <li><a href="shop-list-sidebar.html" ><i class="fa fa-align-justify"></i></a></li>
                                    <li><a href="#" class="active"><i class="fa fa-th"></i></a></li>
                                </ul>
                            </div>
                            <div class="input-select">
                                <select name="sorted" id="sorted">
                                    <option value="-1">Sorted by</option>
                                      <option>Price</option>
                                      <option>Useless</option>
                                      <option>Important</option>
                                </select>
                            </div>
                        </div>
                    </div>
                     --}}
                    {{-- <div class="row">
                        @foreach ($danhsach as $item )
                        <div class="col-md-4 col-sm-6">
                            <div class="product-single margin-bottom-70px">
                                <div class="product-img">
                                    <img class="img-responsive" alt="Single product" src="{{ asset($item->hinhanh_sp) }}">
                                    <div class="actions">
                                        <ul>
                                            <li><a class="zoom" href="{{ asset('template-client') }}/mg/single_1.jpg"><i class="fa fa-search"></i></a></li>
                                            <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                            <li><a href="product-details-1.html"><i class="fa fa-expand"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h2>New Look Stripe T-Shirt</h2>
                                    <div class="star-rating">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-half-full"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price">
                                        <del> $50 </del> $40
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- pagination -->
                <div class="pagination">
                    <div class="col-xs-1 no-padding">
                        <a href="#"><span class="pagicon arrow_left"></span></a>
                    </div>
                    <div class="col-xs-offset-1 col-sm-offset-3 col-xs-7">
                        <ul class="pagination-number">
                            <li>01</li>
                            <li class="active">02</li>
                            <li>03</li>
                            <li>04</li>
                            <li>05</li>
                            <li>06</li>
                        </ul>
                    </div>
                    <div class="col-xs-1 no-padding text-right">
                        <a href="#"><span class="pagicon arrow_right"></span></a>
                    </div>
                </div> --}}
                <!-- / pagination -->

            {{-- </div>
            <div class="col-md-3 col-md-pull-9 col-sm-12">
                <div class="side-bar">
                    <div class="sidebar-list widget">
                        <h4> Categories</h4>
                        <ul>
                            <li><a href="#" class="triangle">Loungewear <span>(8)</span></a></li>
                            <li><a href="#" class="triangle">Oversized & Longline <span>(10)</span></a></li>
                            <li><a href="#" class="triangle">Polo Shirts <span>(30)</span></a></li>
                            <li><a href="#" class="triangle">Shirts <span>(41)</span></a></li>
                            <li><a href="#" class="triangle">Shorts <span>(31)</span></a></li>
                            <li><a href="#" class="triangle">Suits & Blazers <span>(16)</span></a></li>
                            <li><a href="#" class="triangle">Sunglasses <span>(12)</span></a></li>
                            <li><a href="#" class="triangle">Swimwear <span>(52)</span></a></li>
                            <li><a href="#" class="triangle">Trousers & Chinos <span>(31)</span></a></li>
                        </ul>
                    </div>

                    <div class="checkboxes widget">
                        <h4> Select a brand</h4>
                        <ul>
                            <li>
                                <input type="checkbox" name="aberrombie" id="aberrombie" class="css-checkbox" />
                                <label for="aberrombie" class="css-label">Aberrombie</label>
                            </li>
                            <li>
                                <input type="checkbox" name="adidas" id="adidas" class="css-checkbox" />
                                <label for="adidas" class="css-label">Adidas</label>
                            </li>
                            <li>
                                <input type="checkbox" name="antony-morato" id="antony-morato" class="css-checkbox" />
                                <label for="antony-morato" class="css-label">Antony Morato</label>
                            </li>
                            <li>
                                <input type="checkbox" name="armani-jeans" id="armani-jeans" class="css-checkbox" />
                                <label for="armani-jeans" class="css-label">Armani Jeans</label>
                            </li>
                            <li>
                                <input type="checkbox" name="baldessarini" id="baldessarini" class="css-checkbox" />
                                <label for="baldessarini" class="css-label">Baldessarini</label>
                            </li>
                            <li>
                                <input type="checkbox" name="bench" id="bench" class="css-checkbox" />
                                <label for="bench" class="css-label">Bench</label>
                            </li>
                            <li>
                                <input type="checkbox" name="boxfresh" id="boxfresh" class="css-checkbox" />
                                <label for="boxfresh" class="css-label">Boxfresh</label>
                            </li>
                            <li>
                                <input type="checkbox" name="bjorn-borg" id="bjorn-borg" class="css-checkbox" />
                                <label for="bjorn-borg" class="css-label">Bjorn Borg</label>
                            </li>
                            <li>
                                <input type="checkbox" name="boom-bap" id="boom-bap" class="css-checkbox" />
                                <label for="boom-bap" class="css-label">Boom Bap</label>
                            </li>
                            <li>
                                <input type="checkbox" name="boss" id="boss" class="css-checkbox" />
                                <label for="boss" class="css-label">Boss</label>
                            </li>
                        </ul>
                    </div>

                    <div class="slider-range widget">
                        <h4>Refine a price</h4>
                        <div id="slider-range"></div>
                        <div class="values">
                            <input type="text" class="minamount" /> <span class="filter-gap"> - </span>
                            <input type="text" class="maxamount" />
                            <input type="submit" value="Filter" name="filter" />
                        </div>
                    </div>

                    <div class="size widget">
                        <h4> Choose a size </h4>
                        <ul>
                            <li><a href="#">XS</a></li>
                            <li><a href="#">S</a></li>
                            <li><a class="active" href="#">M</a></li>
                            <li><a href="#">L</a></li>
                            <li><a href="#">XL</a></li>
                        </ul>
                    </div>

                    <div class="item-color  widget">
                        <h4>sort by colour</h4>
                        <ul>
                            <li class="color1 active"></li>
                            <li class="color2"></li>
                            <li class="color3"></li>
                            <li class="color4"></li>
                            <li class="color5"></li>
                            <li class="color6"></li>
                            <li class="color7"></li>
                            <li class="color8"></li>
                            <li class="color9"></li>
                            <li class="color10"></li>
                        </ul>
                    </div>
                    <div class="popular-products widget">
                        <h4>Popular Products</h4>
                        <div class="product-single">
                            <div class="product-img">
                                <img class="img-responsive" alt="Single product" src="img/single_1.jpg">
                            </div>
                            <div class="product-info">
                                <h2>New Look Stripe Shirt</h2>
                                <div class="star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-full"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del> $50 </del> $40
                                </div>
                            </div>
                        </div>

                        <div class="product-single">
                            <div class="product-img">
                                <img class="img-responsive" alt="Single product" src="img/single_1.jpg">
                            </div>
                            <div class="product-info">
                                <h2>New Look Stripe Shirt</h2>
                                <div class="star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-full"></i></li>
                                    </ul>
                                </div>
                                <div class="price">
                                    <del> $50 </del> $40
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  --}}
@endsection
