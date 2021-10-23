@extends('client.template.master')
@section('content')
<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>Thanh Toán</h1>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Thanh Toán</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-9 col-md-push-3 col-sm-12">
    <div class="trendify-banner">
        <img src="{{ asset('hinh-anh-san-pham') }}/banner2.jpg" class="img-responsive" alt="image banner">
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
            @foreach ( $danhsach as $item )
            <div class="col-md-4 col-sm-6">
                <div class="product-single margin-bottom-70px">
                    <div class="product-img">
                        <img style="width: 262px;"  class="img-responsive" alt="Single product" src="{{ asset($item->hinhanh_sp) }}">
                        <div class="actions">
                            <ul>
                                <li><a class="zoom" href="{{ asset($item->hinhanh_sp) }}"><i class="fa fa-search"></i></a></li>
                                <li><a id="{{ $item->id }}" class="addcart" href="{{ route('Add.cart', ['id'=>$item->id]) }}"><i class="fa fa-cart-plus"></i></a></li>
                                {{-- <li><a onclick="AddCart({{ $item->id }})" href="javascript:"><i class="fa fa-heart-o">ADD-CARD</i></a></li> --}}
                                <li><a href="{{ route('chitietsanpham.index', ['id'=>$item->id]) }}"><i class="fa fa-expand"></i></a></li>
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
                            <del>{{ $item->gia_sp + ($item->gia_sp*20/100) }} VND</del>{{ $item->gia_sp }} VND
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
@push('Add-Cart')
@if (Session::has('success'))
    <script>
        alertify.success('Thêm vào giỏ hàng thành công');
    </script>
@endif
@if (Session::has('success-deleteItemCart'))
    <script>
        alertify.success('Xóa sản phẩm thành công');
    </script>
@endif
    <script>
    </script>
@endpush
@endsection
