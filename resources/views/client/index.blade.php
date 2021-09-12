@extends('client.template.master')
@section('content')
<div class="tp-banner-container rev-slider-content">
    <div class="slider_one" >
        <ul>
            <!-- slide one -->
            <li data-transition="zoomin" data-slotamount="3">

                <img src="{{ asset('template-client') }}/img/slider/3.png" alt="slidebg3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                <div class="caption sft caption-one" style="z-index: 3" data-x="center" data-y="center" data-voffset="-50" data-speed="700" data-start="1700">MODERN SUITS COLLECTION FOR MEN</div>

                <div class="caption sft caption-two"  style="z-index: 4" data-x="center" data-y="center" data-speed="500" data-start="1900">GET 30% OFF FOR ALL NEW SUITS</div>

                <div class="caption slider-3-btn sfl" style="z-index: 5" data-x="center" data-y="center" data-voffset="80" data-speed="300" data-start="2300">
                    <a href="#" style="width:200px;" class="trendify-btn default-bordered"><span class="elg-sld-icon arrow_right"></span> Show now</a>
                </div>

            </li>

            <!-- slide two -->
            <li data-transition="curtain-3" data-slotamount="3">

                <img src="{{ asset('template-client') }}/img/slider/5.png" alt="slidebg3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                <div class="caption sfl caption-one" style="z-index: 3" data-x="center" data-y="center" data-voffset="-50" data-speed="700" data-start="1700">MODERN SUITS COLLECTION FOR MEN</div>

                <div class="caption sfr caption-two"  style="z-index: 4" data-x="center" data-y="center" data-speed="500" data-start="1900">GET 30% OFF FOR ALL NEW SUITS</div>

                <div class="caption slider-3-btn sft" style="z-index: 5" data-x="center" data-y="center" data-voffset="80" data-speed="300" data-start="2300">
                    <a href="#" style="width:220px;" class="trendify-btn default-bordered"><span class="elg-sld-icon arrow_right"></span> View Details</a>
                </div>

            </li>

            <!-- slide three -->
            <li data-transition="slideleft" data-slotamount="3">

                <img src="{{ asset('template-client') }}/img/slider/6.png" alt="slidebg3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">

                <div class="caption lfl caption-one" style="z-index: 3" data-x="center" data-y="center" data-voffset="-50" data-speed="700" data-start="1700">MODERN SUITS COLLECTION FOR MEN</div>

                <div class="caption lfr caption-two"  style="z-index: 4" data-x="center" data-y="center" data-speed="500" data-start="2200">GET 30% OFF FOR ALL NEW SUITS</div>

                <div class="caption slider-3-btn lft" style="z-index: 5" data-x="center" data-y="center" data-voffset="80" data-speed="300" data-start="2600">
                   <a href="#" style="width:245px;" class="trendify-btn default-bordered"><span class="elg-sld-icon arrow_right"></span> See Collection</a>
                </div>

            </li>

        </ul>
    </div>
</div>
<!-- / slider -->

<!-- content -->
<div class="content">
    <div class="container">
        <!-- Tredy Offers Collection Tab -->
        <div class="trendy-offers-tab margin-bottom-60px margin-top-20px">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="right-dash">trendy fashion offers </h3>
                </div>
                <div class="col-md-8">
                    <div class="trendify-tab-title">
                        <ul>
                            <li class="active"><a data-toggle="tab" href="#latest-offer">Latest Trends</a></li>
                            <li><a data-toggle="tab" href="#men-offer">Men's Fashion</a></li>
                            <li><a data-toggle="tab" href="#women-offer">Women's Fashion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                 <div class="tab-content">
                    <div id="latest-offer" class="tab-pane fade in active masonry">
                        <div class="col-sm-3">
                            <div class="single-masonry-product">
                                <span>$279</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-bag.png" alt="bag">
                                <h4>White Leather Handbag</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$69</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-braclet.png" alt="Bracelet">
                                <h4>Thing Stack Bracelet</h4>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="single-masonry-product">
                                <span>$229</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-cala.png" alt="Grey Winter Jacket Women">
                                <h4>Grey Winter Jacket Women</h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-shoe.png" alt="Modern Biege Leather Shoes">
                                <h4>Modern Biege Leather Shoes</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-watch.png" alt="Brown Tan Leather Men Watch">
                                <h4>Brown Tan Leather Men Watch</h4>
                            </div>
                        </div>
                     </div>

                    <div id="men-offer" class="tab-pane fade">
                        <div class="col-sm-4">
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-shoe.png" alt="Modern Biege Leather Shoes">
                                <h4>Modern Biege Leather Shoes</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-watch.png" alt="Brown Tan Leather Men Watch">
                                <h4>Brown Tan Leather Men Watch</h4>
                            </div>
                        </div>

                        <div class="col-sm-5">
                            <div class="single-masonry-product">
                                <span>$229</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-cala.png" alt="Grey Winter Jacket Women">
                                <h4>Grey Winter Jacket Women</h4>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="single-masonry-product">
                                <span>$279</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-bag.png" alt="bag">
                                <h4>White Leather Handbag</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$69</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-braclet.png" alt="Bracelet">
                                <h4>Thing Stack Bracelet</h4>
                            </div>
                        </div>
                    </div>

                    <div id="women-offer" class="tab-pane fade">
                         <div class="col-sm-5">
                            <div class="single-masonry-product">
                                <span>$229</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-cala.png" alt="Grey Winter Jacket Women">
                                <h4>Grey Winter Jacket Women</h4>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-shoe.png" alt="Modern Biege Leather Shoes">
                                <h4>Modern Biege Leather Shoes</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$169</span>
                                <span class="new2">New</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-watch.png" alt="Brown Tan Leather Men Watch">
                                <h4>Brown Tan Leather Men Watch</h4>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-masonry-product">
                                <span>$279</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-bag.png" alt="bag">
                                <h4>White Leather Handbag</h4>
                            </div>
                            <div class="single-masonry-product">
                                <span>$69</span>
                                <img class="img-responsive" src="{{ asset('template-client') }}/img/masonary-braclet.png" alt="Bracelet">
                                <h4>Thing Stack Bracelet</h4>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Tredy Offers Collection Tab -->

        <!-- new member offer -->
        <div class="new-member-offer banner1 margin-bottom-60px text-center">
            <div class="row">
                <h2>WE OFFER BRAND NEW STYLES</h2>
                <h3>SIGN UP NOW AND GET 50% OFF</h3>
                <a class="trendify-btn default-bordered margin-top-30px" href="#">SIGN UP NOW</a>
            </div>
        </div>
        <!-- / new member offer -->

        <!-- Latest items -->
        <div class="latest-items margin-bottom-70px">
            <div class="trendify-tab-title">
                <ul>
                    <li class="active"><a data-toggle="tab" href="#new">New Arrivals</a></li>
                    <li><a data-toggle="tab" href="#latest">Latest Trends</a></li>
                    <li><a data-toggle="tab" href="#men">Men's Fashion</a></li>
                    <li><a data-toggle="tab" href="#women">Women's Fashion</a></li>
                </ul>
            </div>
            <div class="tab-content">

                <div class="trendify-prev"></div>
                <div class="trendify-next"></div>

{{-- {{ dd($danhsachsanpham) }} --}}

                <div id="new" class="tab-pane fade in active">
                    @foreach ($danhsachsanpham as $item)
                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset($item->diachi_ha) }}">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href=""><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="{{ route('chitietsanpham.index', ['id'=>$item->id_sp]) }}">Chi tiết<i class="fa fa-expand"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-info">
                            <h2>{{ $item->ten_sp }}</h2>
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
                                <del>   </del>{{ $item->gia_sp }} VND
                            </div>
                        </div>
                        <!-- Product pop-up -->
                        <div class="product-preview-1 modal fade" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <a class="close" href="#" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></a>

                                    <div class="modal-body col-md-12">
                                        <div class="col-md-5 no-padding-left">
                                            <img src="{{ asset('template-client') }}/img/single_2.jpg" class="img-responsive" alt="" />
                                        </div>
                                        <div class="col-md-7">
                                            <div class="right-content">
                                                <a href="#"><h3>{{ $item->ten_sp }}</h3></a>
                                                {{-- <span class="amount off">$50</span> --}}
                                                <span class="amount">{{ $item->gia_sp }}</span><br>
                                                <span class="sku">available in stock</span>
                                                <h4>DESCRIPTION</h4>
                                                <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. </p>

                                                <div class="clear-fix"></div>
                                                <div>
                                                    <div class="quantity">
                                                        <label>Quantity</label>
                                                        <input type="number" step="1" min="0" max="99" name="cart" value="1" title="Qty" class="qty">
                                                    </div>
                                                    <div class="add-to-cart">
                                                        <input type="submit" name="add-to-cart" value="Add To Cart" class="calculate">
                                                    </div>
                                                </div>
                                                <div class="clear-fix"></div>
                                                <div>
                                                    <span class="item-number"><b>Product Number:</b>  #41121120</span><br>
                                                    <span class="item-tag"><b>Tags:</b>  elegant, men, suits, beige, modern</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Product pop-up -->
                    </div>
                    @endforeach
                    {{-- <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="product-details-1.html">Chi tiết<i class="fa fa-expand"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_4.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_4.jpg"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="product-details-1.html">Chi tiết<i class="fa fa-expand"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_1.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_1.jpg"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="product-details-1.html">Chi Tiết<i class="fa fa-expand"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_2.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_2.jpg"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="product-details-1.html">Chi Tiết<i class="fa fa-expand"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                    <li><a href="product-details-1.html">Chi Tiết<i class="fa fa-expand"></i></a></li>
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
                    </div> --}}
                </div>

                <div id="latest" class="tab-pane fade">
                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_2.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_2.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_4.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_4.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_1.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_1.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_2.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_2.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
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

                <div id="men" class="tab-pane fade">
                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_2.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_2.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_4.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_4.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_1.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_1.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_2.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_2.jpg"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/single_3.jpg">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/single_3.jpg"><i class="fa fa-search"></i></a></li>
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

                <div id="women" class="tab-pane fade">
                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women.png"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women2.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women2.png"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women3.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women3.png"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women.png"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women2.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women2.png"><i class="fa fa-search"></i></a></li>
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

                    <div class="product-single">
                        <div class="product-img">
                            <img class="img-responsive" alt="Single product" src="{{ asset('template-client') }}/img/women3.png">
                            <div class="actions">
                                <ul>
                                    <li><a class="zoom" href="{{ asset('template-client') }}/img/women3.png"><i class="fa fa-search"></i></a></li>
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

            </div>
        </div>
        <!-- Latest items -->

        <!-- location -->
        <div class="location margin-bottom-90px">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="trendify-heading middle-align">
                        <span class="lg">OUR LOCATION</span>
                        <span class="sm">fashion store locator</span>
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img class="store img-responsive" src="{{ asset('template-client') }}/img/store.jpg" alt="store image">
                    <div class="store-info-box">
                        <h4>Where Do You Find Our Store?</h4>
                        <ul>
                            <li>78 Fashion Street, Beverly Hill <br> Abony, NYC 12045</li>
                            <li> Phone: <span>(800) 0123 4567 8910</span> <br> E-mail:  trendify@envato.com</li>
                        </ul>
                        <div></div>
                        <h4>Opening Hours</h4>
                        <ul>
                            <li>Monday - Friday 8:00 AM - 8:00 PM</li>
                            <li>Saturday from 9:00 AM - 6:00 PM</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- / location -->

        <div class="footer-top margin-bottom-50px text-center">
            <!--  Boxed Content -->
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="boxed-content-container sm-mb-40">
                         <div class="dh-overlay"></div>
                        <div class="boxed-content" data-wow-delay="0.5s">
                            <h4>fast delivery</h4>
                            <p>within<span class="hours"> 48h</span></p>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="boxed-content-container sm-mb-40">
                        <div class="dh-overlay"></div>
                        <div class="boxed-content" data-wow-delay="0.9s">
                            <h4>support area</h4>
                            <p class="phone-email">Phone: (800) 0123 4567 890</p>
                            <span class="and">&</span>
                            <p class="phone-email">E-mail:  trendify@envato.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="boxed-content-container">
                        <div class="dh-overlay"></div>
                        <div class="boxed-content" data-wow-delay="0.9s">
                            <h4>OUR NEWSLETTER</h4>
                            <p>Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Stet clita kasd gubergren, no sea takimata sanctus es.</p>
                            <form class="subscribe">
                                <input type="email" name="email" placeholder="enter your email address" />
                                <input type="image" src="{{ asset('template-client') }}/img/long-right-arrow.png" alt="submit" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- / Boxed Content -->
        </div>

    </div>
</div>
@endsection
