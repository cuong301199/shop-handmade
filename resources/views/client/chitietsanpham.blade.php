@extends('client.template.master')
@section('content')
    <style>
        .name-user {
            margin-top: 1px
        }

        .comment {
            margin-top: 50px;
            padding: 0px;
        }
        .star{
            margin-top: -10px
        }
        h5{
            clear: both;
            font-weight:550;
            text-transform: lowercase;
            font-size: 15px;
        }

    </style>
    <div class="page_title_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <div class="page_title">
                        <h1>Chi tiết sản phẩm</h1>
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
    </div>
    <!--/ page title -->


    <!-- content area -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    {{-- @foreach ($danhsach as $item) --}}
                    <div class="col-md-6">
                        <div class="single-slider-item">
                            <ul class="owl-slider">
                                <li class="item">
                                    <img src="{{ asset($danhsach->hinhanh_sp) }}" alt="" class="img-responsive">
                                    <a class="expand-img" href="#"><i class="fa fa-expand"></i></a>
                                </li>

                                @foreach ($hinhanh as $item)
                                    <li class="item">
                                        <img src="{{ asset($item->duongdan_ha) }}" alt="" class="img-responsive">
                                        <a class="expand-img" href="#"><i class="fa fa-expand"></i></a>
                                    </li>
                                @endforeach
                            </ul>
                            <ul class="thumbnails-wrapper">
                                <li class="thumbnail">
                                    <a href="#"><img src="{{ asset($danhsach->hinhanh_sp) }}" alt=""
                                            class="img-responsive"></a>
                                </li>
                                @foreach ($hinhanh as $item)
                                    <li class="thumbnail">
                                        <a href="#"><img src="{{ asset($item->duongdan_ha) }}" alt=""
                                                class="img-responsive"></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="right-content">
                            <a href="#">
                                <h3>{{ $danhsach->ten_sp }}</h3>
                            </a>
                            <div class="rated">
                                <ul>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li><i class="fa fa-star"></i></li>
                                    <li class="un-rated"><i class="fa fa-star"></i></li>
                                </ul>
                                <span>(24 reviews)</span>
                            </div>
                            {{-- <span class="amount off">$399</span> --}}
                            <span class="amount">{{ $danhsach->gia_sp }}</span><br>
                            <span class="sku">available in stock</span>
                            <h4>Mô tả</h4>
                            <p>{!! $danhsach->mota_sp !!}</p>
                            <div class="color-size">
                                <div class="item-color">
                                    <h4>select a colour</h4>
                                    <ul>
                                        <li class="raffia active"></li>
                                        <li class="bombay"></li>
                                        <li class="steel-gray"></li>
                                        <li class="anzac"></li>
                                        <li class="mine-shaft"></li>
                                    </ul>
                                </div>

                                <div class="clear-fix"></div>

                                <div class="item-size">
                                    <h4>chọn kích cỡ</h4>
                                    <ul>
                                        <li class="x-small">XS</li>
                                        <li class="small">S</li>
                                        <li class="medium active">M</li>
                                        <li class="large">L</li>
                                        <li class="x-large">XL</li>
                                    </ul>
                                </div>
                            </div>

                            <div class="clear-fix"></div>

                            <div>
                                <div class="quantity">
                                    <label>Số lượng</label><input type="number" step="1" min="0" max="99" name="cart"
                                        value="1" title="Qty" class="qty">
                                </div>
                                <div class="add-to-cart">
                                    <a href="#" class="trendify-btn black-bordered">Thêm vào giỏ hàng</a>
                                </div>
                            </div>
                            <div class="product-desc">
                                {{-- <span class="item-number"><b>Product Number:</b>  #41121120</span><br> --}}
                                <span class="item-cat"><b>Loại sản phẩm : </b>{{ $danhsach->ten_lsp }}</span>
                            </div>
                            <div class="product-desc">
                                <span class="item-cat"><b>Tên cửa hàng : </b><a
                                        href="{{ route('hienthich.showStore', ['id' => $danhsach->id_ch]) }}">{{ $danhsach->ten_ch }}</a></span>
                            </div>
                        </div>
                    </div>
                    {{-- @endforeach --}}
                    <div class="col-md-12">
                        <div class="row">
                            <div class="product-tab">
                                <ul class="nav nav-tabs">
                                    <li class="nav active"><a data-toggle="tab" href="#tab1">PRODUCT DESCRIPTION</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-7">
                                <div class="col-md-1 comment">
                                    <img src="{{ asset('template-client') }}/img/avatar1.png" width="90%"
                                        class="img-circle" alt="">
                                </div>
                                <div class="col-md-11 comment">
                                    <a class="name-user">Tiến Cường</a>
                                    <div class="rated">
                                        <ul>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="un-rated star"><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5>I love love love this bag. It is very well done, an authentic piece made with love and passion. I am very happy :) The team and Katerina are very nice, easy to deal with and very
                                             professional and friendly. I really hope that enterprises like this </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-7">
                                <div class="col-md-1 comment">
                                    <img src="{{ asset('template-client') }}/img/avatar1.png" width="90%"
                                        class="img-circle" alt="">
                                </div>
                                <div class="col-md-11 comment">
                                    <a class="name-user">Tiến Cường</a>
                                    <div class="rated">
                                        <ul>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="un-rated star"><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5>I love love love this bag. It is very well done, an authentic piece made with love and passion. I am very happy :) The team and Katerina are very nice, easy to deal with and very
                                             professional and friendly. I really hope that enterprises like this </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-7">
                                <div class="col-md-1 comment">
                                    <img src="{{ asset('template-client') }}/img/avatar1.png" width="90%"
                                        class="img-circle" alt="">
                                </div>
                                <div class="col-md-11 comment">
                                    <a class="name-user">Tiến Cường</a>
                                    <div class="rated">
                                        <ul>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="un-rated star"><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>
                                    <div>
                                        <h5>I love love love this bag. It is very well done, an authentic piece made with love and passion. I am very happy :) The team and Katerina are very nice, easy to deal with and very
                                             professional and friendly. I really hope that enterprises like this </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-7">
                                <div class="col-md-1 comment">
                                    <img src="{{ asset('template-client') }}/img/avatar1.png" width="90%"
                                        class="img-circle" alt="">
                                </div>
                                <div class="col-md-11 comment">
                                    <a class="name-user">Tiến Cường</a>
                                    <div class="rated">
                                        <ul>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="star"><i class="fa fa-star"></i></li>
                                            <li class="un-rated star"><i class="fa fa-star"></i></li>
                                        </ul>
                                    </div>

                                    <div>
                                        <h5>I love love love this bag. It is very well done, an authentic piece made with love and passion. I am very happy :) The team and Katerina are very nice, easy to deal with and very
                                             professional and friendly. I really hope that enterprises like this </h5>
                                    </div>
                                    <div>
                                        26-9-2019
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="related-products margin-top-70px">
                            <h4>related products</h4>
                            <ul class="related-products-slider">
                                <li class="item">
                                    <div class="product-single">
                                        <div class="product-img">
                                            <img class="img-responsive" alt="Single product" src="img/single_4.jpg">
                                            <div class="actions">
                                                <ul>
                                                    <li><a class="zoom" href="img/single_4.jpg"><i
                                                                class="fa fa-search"></i></a></li>
                                                    <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                                    <li><a href="product-details-1.html"><i class="fa fa-expand"></i></a>
                                                    </li>
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
                                </li>
                            </ul>
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
                </div>
            </div>
        </div>
    </div>
@endsection
