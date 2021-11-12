@extends('client.template.master')
@section('content')
{{-- {{ dd($tp) }} --}}
<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>Danh mục sản phẩm</h1>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Danh mục sản phẩm</a></li>
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
                    <form action="" id="form-oder" method="get">
                    <select name="id_city" id="city">
                        <option value={{request()->fullUrlWithQuery(['id_city'=>null])}}>sắp xếp theo nơi bán</option>
                        @foreach ($tp as $item)
                          <option {{Request::get('id_city')==$item->matp?"selected='selected'":""}} value= {{request()->fullUrlWithQuery(['id_city'=>$item->matp])}}>{{ $item->name_tp }}</option>
                        @endforeach
                    </select>
                    </form>
                </div>
                <div class="input-select">
                    <form action="" id="form-desc" method="get">
                    <select name="sort_by" id="sort_by">
                        <option value={{request()->fullUrlWithQuery(['oderBy'=>null])}}>Sắp xếp mặc định</option>
                        <option {{Request::get('oderBy')=="asc"?"selected='selected'":""}} value= {{request()->fullUrlWithQuery(['oderBy'=>'asc'])}}>Sản phẩm cũ</option>
                        <option {{Request::get('oderBy')=="desc"?"selected='selected'":""}}value= {{request()->fullUrlWithQuery(['oderBy'=>'desc'])}}>Sản phẩm mới</option>
                        <option {{Request::get('oderBy')=="price_max"?"selected='selected'":""}}value= {{request()->fullUrlWithQuery(['oderBy'=>'price_max'])}}>Giá giảm dần</option>
                        <option {{Request::get('oderBy')=="price_min"?"selected='selected'":""}}value= {{request()->fullUrlWithQuery(['oderBy'=>'price_min'])}}>Giá tăng dần</option>
                    </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($danhsach2 as $item)

            <div class="col-md-3 col-sm-6">
                <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                    <div class="product-img">
                        <a href = "{{ route('chitietsanpham.index', ['id'=>$item->id]) }}"><img class="img-responsive" alt="Single product" src="{{asset($item->hinhanh_sp)  }}"></a>
                    </div>
                    <div class="product-info">
                        {{-- <h2>{{ Str::limit($item->ten_sp, 3); }}</h2> --}}
                        <h2>{{Str::limit($item->ten_sp, 15) }}</h2>
                        <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)"> {{ number_format($item->gia_sp) }} VDN</span>
                        <p><i class="fa fa-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->subHours(7)->diffForHumans() }}</p>
                        <p><i class="fa fa-map-marker-alt"></i>{{ $item->name_tp }}</p>
                    </div>
                </div>
            </div>

            @endforeach
        </div>
    </div>

    <!-- pagination -->
    <div class="pagination">
        {{-- <div class="col-xs-1 no-padding">
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
        </div> --}}
        <div class="col-md-12 pull-right">
            <div class="pull-right">{{$danhsach2->links()}}</div>
        </div>

    </div>
    <!-- / pagination -->

</div>
@push('input-total-price')
    <script>
        $(document).ready(function () {
            $('#city').change(function (e) {
                var url = $(this).children("option:selected").val();
               if(url){
                   window.location = url;
               }
            // $('#form-oder').submit();
            });

            $('#sort_by').change(function (e) {
                var url = $(this).children("option:selected").val();
               if(url){
                   window.location = url;
               }
            // $('#form-oder').submit();
            });

            $('#price').click(function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                if(url){
                   window.location = url;
               }
            });
            $('#product-type').click(function (e) {
                e.preventDefault();
                var url = $(this).attr('href');

                if(url){
                   window.location = url;
               }
            });

        });


    </script>
@endpush
@endsection
