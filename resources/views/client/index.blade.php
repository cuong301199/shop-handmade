@extends('client.template.master')
@section('content')
{{-- {{ dd($now) }} --}}
{{-- @foreach ($report as $item )
    {{ dd($item->id_sp) }}
@endforeach --}}
<style>
  .category{
      width: auto;

      border: 1px solid;

  }
  .category img{
    width: 120px;
      height: 120px;
      padding-left: 0 auto;

      border-radius:50%;
    -moz-border-radius:15%;
    -webkit-border-radius:30%;

  }
  .category-product span{
      margin: 0 auto;
      text-align: center;

  }
  .category a{
    color: black;
    font-size: 13px;
    font-weight: 400;
  }
  .product-info i{
      margin: auto 4px;
  }
  .product-info i{
      margin:0px 5px 0px 0px;
      /* margin-right: 5px; */
  }
  /* .addcart i{
    color:#707070;
  } */

</style>
{{-- <div class="tp-banner-container rev-slider-content">
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
</div> --}}
<!-- / slider -->

<!-- content -->
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="clients">
                <ul class="client-carousel">
                    <li>
                        <a href="#"><img alt="clients logo" src="{{ asset('template-client') }}/img/clients/1.png"></a>
                        <span></span>
                    </li>
                    <li>
                        <a href="#"><img alt="clients logo" src="{{ asset('template-client') }}/img/clients/2.png"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="clients logo" src="{{ asset('template-client') }}/img/clients/3.png"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="clients logo" src="{{ asset('template-client') }}/img/clients/4.png"></a>
                    </li>
                    <li>
                        <a href="#"><img alt="clients logo" src="{{ asset('template-client') }}/img/clients/5.png"></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div> --}}
<div class="content">
    <div class="container">
        <div class="new-member-offer banner1 margin-bottom-30px text-center">
        </div>

        <div class="category">
            @foreach ($danhmuc as $item )
            <div class="col-md-2 text-center">
                <a href="{{ route('sanpham.danhmuc', ['id'=>$item->id]) }}">
                    <img class="center-block" src="{{ asset($item->hinhanh_dm) }}" alt="">
                    <span>{{ $item->ten_dm }}</span>
                </a>
            </div>
            @endforeach
        </div>

        <div class="trendify-items">
            <div class="trendify-tab-title">
                <ul>
                    <li class="active"><a data-toggle="tab" href="#new">Sản phẩm mới</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="all_product"></div>

                {{-- @foreach ($danhsachsanpham as $item)
                <div id="new" class="tab-pane fade in active">
                    <div class="col-md-2 col-sm-6">
                        <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                            <div class="product-img">
                                <a href = "{{ route('chitietsanpham.index', ['id'=>$item->id]) }}"><img height="100px" class="img-responsive" alt="Single product" src="{{ $item->hinhanh_sp }}"></a>
                            </div>
                            <div class="product-info">
                                <h2>{{ Str::limit($item->ten_sp, 15); }}</h2>
                                <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)"> {{ number_format($item->gia_sp) }} VDN</span>

                                <p><i class="fa fa-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->subHours(7)->diffForHumans() }}</p>
                                <p><i class="fa fa-map-marker-alt"></i>{{ $item->name_tp }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}
                <!-- / new -->
            </div>
        </div>
        @if (Auth::guard('nguoi_dung')->check())
        <div class="trendify-items">
            <div class="trendify-tab-title">
                <ul>
                    <li class="active"><a data-toggle="tab" href="#new">Sản phẩm dành cho bạn</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div id="all_product_like"></div>
            </div>
        </div>
        @endif



        <div class="clear-fix" ></div>

        <!-- trendify supports -->
        <div class="trendify-supports">
            <div class="col-md-4 col-sm-6">
                <div class="trendify-single-support xs-mb-40">
                    <div class="support-img">
                        <img src="img/icons/support-icon1.png" alt="" />
                    </div>
                    <div class="support-text">
                        <h2>fast delivery time</h2>
                        <p>Stet clita kasd gubergren, no takima</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="trendify-single-support xs-mb-40">
                    <div class="support-img">
                        <img src="img/icons/support-icon2.png" alt="" />
                    </div>
                    <div class="support-text">
                        <h2>Money back guarantee</h2>
                        <p>Stet clita kasd gubergren, no sea takima</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="trendify-single-support xs-mb-40">
                    <div class="support-img">
                        <img src="img/icons/support-icon3.png" alt="" />
                    </div>
                    <div class="support-text">
                        <h2>24/7 customer support</h2>
                        <p>Stet clita kasd gubergren, no sea takima</p>
                    </div>
                </div>
            </div>
        </div>
        <!--/ trendify supports -->
    </div>
</div>
@push('Add-Cart')
<script>
    $(document).on('click','#out-of', function () {
        $.alert({
            title: 'Thông báo!',
            content: 'Sản phẩm đã hết, nên bạn không thể thêm vào giỏ hàng!',
        });
    });
    load_more_product();
    load_more_product_like();
    function load_more_product(id=''){
       $.ajax({
           type: "get",
           url: "/client/load-more-product/",
           data: {
               id:id,
           },
           success: function (data) {
                $('#load-more-button').remove();
                $('#all_product').append(data);
           }
       });
    }
    function load_more_product_like(id=''){
        $.ajax({
           type: "get",
           url: "/client/load-more-product-like/",
           data: {
               id:id,
           },
           success: function (data) {
                $('#load-more-button-like').remove();
                $('#all_product_like').append(data);
           }
       });
    }

   $(document).on('click','#load-more-button', function () {
       var id = $(this).data('id')
       load_more_product(id);
   });
   $(document).on('click','#load-more-button-like', function () {
       var id = $(this).data('id')
       load_more_product_like(id);
   });



</script>
@endpush
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
    {{-- <script>
    </script> --}}
@endpush
@endsection
