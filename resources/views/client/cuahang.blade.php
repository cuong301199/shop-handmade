@extends('client.template.master')
@section('content')
<style>
    /* *{
        margin: 0px;
        padding: 0px;
    } */
    .page_title_area{
        margin:0;
          padding:0px;
          background-color: white;
    }

    .page_title{
        box-sizing: border-box;
        /* width: 500px;*/
        height: 150px;
        background-color: #4d4d4d;
        /* border: 1px solid #4d4d4d; */
        border-radius: 5px;
        margin: 10px 0 10px 0;

    }

    .avatar{
        width: 80px;
        height: 80px;
        margin: 15px 0px 0px 30px;
        border: 4px solid #9f9f9f;
    }
    .love{
        box-sizing: content-box;
        background-color: red;
        width: 60px;
        height: 30px;
        border-radius: 5px;
        margin-left: 0px 0px 50px 20px;
        position:absolute;
        left: 55px;
        bottom: -4px;
    }
    .love p {
        margin-bottom: 10px;
        color:white;
        font-size: 10px;
        height: 25px;
        padding-left: 5px;

    }
    .name-store{
        margin-top: 20px;
    }
    .name-store .p{
        color: white;
        font-size:20px ;
    }
    .name-store p{
        color: green;
    }
    .box{
        padding: 0px;
    }

    .contact{
        width: 160px;
        height: 30px;
        border: 1px solid;
        border-color:white;
        border-radius: 3px;
    }
    .see{
        margin:5px 0px 0px 30px;
    }
    .chat{
        margin: 5px 0px 0px 3px;
    }
    .character {
        color: white;
        font-size: 13px;
        text-align: center;
    }
    .infor{
        margin: 20px 0px 0px 40px;
        font-size: 13px;
        font-weight: bold;
    }
    span{
        color: red;
        font-weight:20px;
    }



</style>

<div class="page_title_area">
    <div class="container box">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="img">
                                <img class="img-circle avatar" src="img/single_1.jpg" alt="">
                            </div>
                            <div class="love">
                                <p>Yêu Thích +</p>
                            </div>
                        </div>
                        <div class="col-md-8 name-store">
                            <p class="p">{{ $cuahang->ten_ch }}</p>
                            <p>Online</p>
                        </div>

                    </div>
                    <div class="row box">
                        <div class="col-md-6 box">
                            <div class="contact see">
                                <p class="character">Theo dõi</p>
                            </div>
                        </div>
                        <div class="col-md-6 box">
                            <div class="contact chat">
                                <p  class="character">Chat</p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <p class="infor">Sản phẩm : <span>20</span></p>
                </div>
                <div class="row">
                    <p class="infor">Đang theo dõi : <span>0</span></p>
                </div>
                <div class="row">
                    <p class="infor">Tỉ lệ phản hồi : <span>99% (Trong vài giờ)</span></p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="row">
                    <p class="infor">Tỉ lệ shop hủy đơn : <span>2%</span></p>
                </div>
                <div class="row">
                    <p class="infor">Người theo dõi : <span>100</span></p>
                </div>
                <div class="row">
                    <p class="infor">Đánh giá : <span>4.9</span></p>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="col-md-9 col-md-push-3 col-sm-12">
    <div class="trendify-banner">
        {{-- <img src="{{ asset('template-client') }}/img/banner.jpg" class="img-responsive" alt="image banner"> --}}
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
            @foreach ($sanpham as $item )


            <div class="col-md-4 col-sm-6">
                <div class="product-single margin-bottom-70px">
                    <div class="product-img">
                        <img class="img-responsive" alt="Single product" src="{{ asset($item->hinhanh_sp) }}">
                        <div class="actions">
                            <ul>
                                <li><a class="zoom" href=""><i class="fa fa-search"></i></a></li>
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
{{-- {{ dd($sanpham) }} --}}
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
@endsection
