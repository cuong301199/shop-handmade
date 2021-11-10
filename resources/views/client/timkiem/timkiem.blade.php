@extends('client.timkiem.template.master')
@section('content')
{{-- {{ dd($search_product) }} --}}
<div class="page_title_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="page_title">
                    <h1>Tìm kiếm </h1>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="bredcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">ìm kiếm</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-9 col-md-push-3 col-sm-12">
    {{-- <div class="trendify-banner">
        <img src="{{ asset('hinh-anh-san-pham') }}/banner2.jpg" class="img-responsive" alt="image banner">
        <div class="banner-text">
            <h3 class="animate fadeInDown wow">ELEGANT & MODERN fashion</h3>
            <h4 class="animate fadeInDown wow" data-wow-delay="0.5s">CLOTHES & STYLES FOR EVEYRONE</h4>
            <a class="trendify-btn default-bordered margin-left-0" href="#">Sign Up Now</a>
        </div>
    </div> --}}
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
                        <option value="-1">sắp xếp theo nơi bán</option>
                        @foreach ($tp as $item)
                          <option value= {{request()->fullUrlWithQuery(['id_city'=>$item->matp])}}>{{ $item->name_tp }}</option>
                        @endforeach
                    </select>
                    </form>
                </div>
                <div class="input-select">
                    <form action="" id="form-desc" method="get">
                    <select name="sort_by" id="sort_by">
                        <option value="-1">Sắp xếp mặc định</option>
                        <option value= {{request()->fullUrlWithQuery(['oderBy'=>'asc'])}}>Sản phẩm cũ</option>
                        <option value= {{request()->fullUrlWithQuery(['oderBy'=>'desc'])}}>Sản phẩm mới</option>
                        <option value= {{request()->fullUrlWithQuery(['oderBy'=>'price_max'])}}>Giá giảm dần</option>
                        <option value= {{request()->fullUrlWithQuery(['oderBy'=>'price_min'])}}>Giá tăng dần</option>
                    </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ( $search_product as $item )
                <div id="new" class="tab-pane fade in active">
                    <div class="col-md-3 col-sm-6">
                        <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                            <div class="product-img">
                                <a href = "{{ route('chitietsanpham.index', ['id'=>$item->id]) }}"><img class="img-responsive" alt="Single product" src="{{asset($item->hinhanh_sp)  }}"></a>
                                {{-- <div class="actions">
                                    <ul>
                                        <li><a class="zoom" href="img/products/1.jpg"><i class="fa fa-search"></i></a></li>
                                        <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                        <li><a href="product-details-1.html"><i class="fa fa-expand"></i></a></li>
                                    </ul>
                                </div> --}}
                            </div>
                            <div class="product-info">
                                {{-- <h2>{{ Str::limit($item->ten_sp, 3); }}</h2> --}}
                                <h2>{{Str::limit($item->ten_sp, 16)}}</h2>
                                <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)"> {{ number_format($item->gia_sp) }} VDN</span>
                                <p><i class="fa fa-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->subHours(7)->diffForHumans() }}</p>
                                <p><i class="fa fa-map-marker-alt"></i>{{ $item->name_tp }}</p>
                                {{-- <div class="star-rating">
                                    <ul>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star-half-full"></i></li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="price">

                                 <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)"> {{ number_format($item->gia_sp) }} VDN</span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- pagination -->
    {{-- <div class="pagination">
        <div class="col-md-12 pull-right">
            <div class="pull-right">{{ $search_product->links() }}</div>
        </div>
    </div>> --}}
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

        });


    </script>
@endpush

@endsection
