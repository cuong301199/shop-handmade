@extends('client.cuahang.template.master')
@section('content')
    {{-- <style>
     *{
        margin: 0px;
        padding: 0px;
    }
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
    } */



</style> --}}
    <style>
        .benner {
            background: url("{{ asset('hinh-anh-san-pham/banner.jpg') }}") no-repeat center center;
            padding: 100px 0;
            background-size: cover;
        }

        .benner {
            background-image: url("{{ asset('hinh-anh-san-pham/banner.jpg') }}");
        }

        .page_title_area {
            margin-top: 10px
        }

        .box-folow {
            margin-top: 14spx
        }

        .folow {
            background-color: #fad6c9;
            color: rgb(27, 26, 26);
            font-size: bold;
            border: 1px hidden #706b6b;
            padding: 0px 15px;
            width: 113px;
            /* border-radius: 20px; */
            /* box-shadow: inset 0px 0px 5px rgb(117, 115, 115); */
        }

        .infor img {
            border: 1px solid #e9e9e9;
            padding: 0px;
        }

        .page_title_area {
            height: auto;
        }

        .name {
            font-size: 17px;
            color: #111010
        }

        span {
            color: #ee4d2d;
            font-size: 13px;
        }

        .image-post {
            height: 250px;
        }

        .pull-right {
            margin-top: 80px
        }
        /* .ccc{
            background-color: #111010;
        } */
        .btn-comment {
            margin-top: 10px;

        }
        .input-comment {
            border: 1px solid rgb(221, 209, 209);
            border-radius: 5px;
            padding-left: 10px
        }
        .media-object {
            padding: 0px;
        }
        .post_comments{
            border: 2px solid;
            padding: 10px;
            border-color: #efebebf0;
        }

    </style>

    {{-- <div class="benner">
</div> --}}
    <div class="page_title_area" style="margin-bottom: 0px">
        <div class="container">
            <div class="row infor">
                <div class="col-sm-4">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('hinh-anh-san-pham') }}/1.jpg" class="img-circle" alt="Hot girl" width="90"
                            height="90">
                    </div>
                    <div class="col-md-9 box-folow ">
                        <div class="name">{{ $thongtin->ten_nd }}</div>
                        <a class="folow" href=""><i class="fa fa-comments"></i>Chat ngay</a>
                        <a class="folow" href=""><i class="fa fa-eye"></i>Theo dõi</a>
                    </div>

                </div>
                <div class="col-sm-8">
                    <div class="col-md-4">
                        <div>
                            <label for="">Đánh giá :</label>
                            <span>Chưa có đánh giá</span>
                        </div>
                        <div>
                            <label for="">Sản phẩm :</label>
                            <span>Chưa có đánh giá</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="">Phản hồi :</label>
                            <span>Chưa xác định</span>
                        </div>
                        <div>
                            <label for="">Thời gian phản hồi :</label>
                            <span>Chưa xác định</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="">Ngày tham gia:</label>
                            <span>Chưa có đánh giá</span>
                        </div>
                        <div>
                            <label for="">Người theo dõi :</label>
                            <span>Chưa có đánh giá</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="trendify-items">
            <div class="trendify-tab-title">
                <ul>
                    <li class="active"><a data-toggle="tab" href="#new">Sản phẩm</a></li>
                    <li><a data-toggle="tab" href="#latest">Bài Viết</a></li>
                    <li><a data-toggle="tab" href="#men">Liên hệ</a></li>
                    <li><a data-toggle="tab" href="#women">Đánh giá</a></li>
                </ul>
            </div>

            <div class="tab-content">
                <div id="new" class="tab-pane fade in active">
                    <div class="row">
                        <div class="view-navigation">
                            {{-- <div class="info-text">
                            <p>Showing 1-8 from 124 products</p>
                        </div> --}}
                            <div class="right-content">
                                <div class="grid-list">
                                    <ul>
                                        <li><a href="shop-list-sidebar.html"><i class="fa fa-align-justify"></i></a></li>
                                        <li><a href="#" class="active"><i class="fa fa-th"></i></a></li>
                                    </ul>
                                </div>
                                <div class="input-select">
                                    <form action="" id="form-oder" method="get">
                                        <select name="id_cat" id="category">
                                            <option value="-1">sắp xếp theo danh mục</option>
                                            @foreach ($danhmuc as $item)
                                                <option value={{ request()->fullUrlWithQuery(['id_cat' => $item->id]) }}>
                                                    {{ $item->ten_dm }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div class="input-select">
                                    <form action="" id="form-desc" method="get">
                                        <select name="sort_by" id="sort_by">
                                            <option value="-1">Sắp xếp mặc định</option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'asc']) }}>Sản phẩm cũ
                                            </option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'desc']) }}>Sản phẩm mới
                                            </option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'price_max']) }}>Giá
                                                giảm dần</option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'price_min']) }}>Giá
                                                tăng dần</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- {{ dd($sanpham) }} --}}
                    <div class="row">
                        @foreach ($sanpham as $item)

                            <div class="col-md-2 col-sm-6">
                                <div class="product-single fadeInUp wow" data-wow-delay="0.5s">
                                    <div class="product-img">
                                        <a href="{{ route('chitietsanpham.index', ['id' => $item->id]) }}"><img
                                                class="img-responsive" alt="Single product"
                                                src="{{ asset($item->hinhanh_sp) }}"></a>
                                    </div>
                                    <div class="product-info">
                                        {{-- <h2></h2> --}}
                                        <h2>{{ Str::limit($item->ten_sp, 14) }}</h2>
                                        <span style="font-size:14px; font-weight:bold; color:rgb(92, 17, 17)">
                                            {{ number_format($item->gia_sp) }} VDN</span>
                                        <p><i
                                                class="fa fa-clock"></i>{{ \Carbon\Carbon::parse($item->created_at)->subHours(7)->diffForHumans() }}
                                        </p>
                                        <p><i class="fa fa-map-marker-alt"></i>{{  Str::limit($item->name_tp,15) }}</p>
                                        <a id="{{ $item->id }}" class="addcart"
                                            href="{{ route('Add.cart', ['id' => $item->id]) }}"><i
                                                class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    </div>
                </div>

                <div id="latest" class="tab-pane">
                    @foreach ($post as $item)
                        <div class="product-listing-view">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="list-item product-single margin-top-0">
                                        <div class="thumb-holder" style="height: 200px">
                                            <img class="img-responsive image-post" src="{{ asset($item->hinhanh_bv) }}"
                                                alt="">
                                        </div>
                                        <div class="product-info">
                                            <a href="#">
                                                <h2>{{ $item->tieude_bv }}</h2>
                                            </a>
                                            <p>{!! $item->tomtat_bv !!}</p>
                                            <div class="link-button">
                                                <a class="trendify-btn black-bordered margin-top-20px"
                                                    href="{{ route('baiviet.detail', ['id' => $item->id]) }}">Xem bài
                                                    viết</a>
                                            </div>
                                            {{-- <a class="like" href="#"><i class="fa fa-heart"></i></a> --}}
                                            <div class="col-md-3 pull-right">Ngày đăng : {{ $item->created_at }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div id="men" class="tab-pane">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="blog_content">
                                <div class="col-md-8">
                                    <article class="single_blog_post">
                                        <a href="#">
                                            <h3 class="post_title">Bản đồ</h3>
                                        </a>
                                        <br>
                                        {!! $infor->bando_ttlh !!}
                                    </article>
                                </div>
                                <div class="col-md-4">
                                    <article class="single_blog_post">
                                        <a href="#">
                                            <h3 class="post_title">Thông tin liên hệ</h3>
                                        </a>
                                        <br>
                                        <i class="fa fa-phone" style="margin:5px;"></i><label>Số điện thoại</label>:
                                        <span>{{ $infor->sdt_nd }}</span><br>
                                        <i class="fa fa-envelope-square" style="margin:5px;"></i><label>Email</label> :
                                        <span>{{ $infor->email_nd }}</span><br>
                                        <i class="fa fa-map-marker-alt" style="margin:5px;"></i><label>Địa chỉ</label> :
                                        <span>{{ $infor->diachi_ttlh }}</span><br>
                                    </article>
                                </div>
                            </div> <!-- end of col-md-9 -->
                        </div> <!-- end of row-->
                    </div>
                </div>

                <div id="women" class="tab-pane">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="post_comments col-md-8">
                            <ul class="media-list">
                                @if (Auth::guard('nguoi_dung')->check())
                                    {{-- ///php/// --}}
                                    <?php
                                    $id_nd = Auth::guard('nguoi_dung')->user()->id;
                                    $user = DB::table('nguoi_dung')
                                        ->where('id', $id_nd)
                                        ->first();
                                        $danhsach1 = DB::table('hoa_don')
                                        ->where('hoa_don.id_nm', $id_nd)
                                        ->where('hoa_don.id_nb',$thongtin->id)
                                        ->select(DB::raw('count(*) as total'))
                                        ->groupBy('id_nm')
                                        ->first();
                                    ?>
                                    @if ($danhsach1 != null)
                                        {{-- ///php/// --}}
                                        {{-- ////////comment-input//////// --}}
                                        <li class="media">
                                            <a class="pull-left" href="#">
                                                <img width="100px" height="90px" class="media-object "
                                                    src="{{ asset($user->anhdaidien_nd) }}" alt="" />
                                                {{-- {{ asset('template-client') }}/img/blog/comment1.png --}}
                                            </a>
                                            <div class="media-body" style="padding-top: 0px">
                                                <h4 class="media-heading"><a href="#">{{ $user->ten_nd }}</a></h4>
                                                <input class="input-comment" type="text" placeholder="Viết đánh giá của bạn">
                                                <button type="submit" class="btn btn-comment" id="btn-comment">Đánh giá</button>
                                                <div class="success-comment"></div>
                                            </div> <!-- end of media-body -->
                                        </li> <!-- end of media -->
                                        {{-- ////////comment-input//////// --}}
                                    @endif
                                @endif
                                <div class="media-comment">
                                </div>
                            </ul>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>

                <!-- / men -->
            </div>
        </div>
        <!-- Latest items -->
        <div class="clear-fix"></div>
        <!-- clients -->
        {{-- <div class="clients margin-bottom-80px">
        <ul class="client-carousel">
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/1.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/2.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/3.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/4.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/5.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/1.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/2.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/3.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/4.png"></a>
            </li>
            <li>
                <a href="#"><img alt="clients logo" src="img/clients/5.png"></a>
            </li>
        </ul>
    </div> --}}
        <!--/ clients -->

    </div>
    {{-- <div class="col-md-12 col-md-push-3 col-sm-12">
    <div class="trendify-banner">
        <img src="{{ asset('template-client') }}/img/banner.jpg"
        class="img-responsive" alt="image banner">
        <div class="banner-text">
            <h3 class="animate fadeInDown wow">ELEGANT & MODERN fashion</h3>
            <h4 class="animate fadeInDown wow" data-wow-delay="0.5s">CLOTHES & STYLES FOR EVEYRONE</h4>
            <a class="trendify-btn default-bordered margin-left-0" href="#">Sign Up Now</a>
        </div>
    </div>

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


</div> --}}
<input type="hidden" class="id_nb" value="{{ $thongtin->id }}">
    @push('input-total-price')
        @if (Session::has('success'))
            <script>
                alertify.success('Thêm vào giỏ hàng thành công');
            </script>
        @endif
        @if (Session::has('success-deleteItemCart'))
            <script>
                alertify.success('Xóa sản phẩm khỏi giỏ hàng thành công');
            </script>
        @endif
        <script>
            $(document).ready(function() {
                $('#category').change(function(e) {
                    var url = $(this).children("option:selected").val();
                    if (url) {
                        window.location = url;
                    }
                    // $('#form-oder').submit();
                });
                $('#sort_by').change(function(e) {
                    var url = $(this).children("option:selected").val();
                    if (url) {
                        window.location = url;
                    }
                    // $('#form-oder').submit();
                });
            });
        </script>
    @endpush
    @push('Add-Cart')
        <script>
           $(document).ready(function () {
               var id_nb = $('.id_nb').val();
                load_more_comment();

                function load_more_comment(id = '') {
                    $.ajax({
                        type: "get",
                        url: "/client/load-moreo-rate/",
                        data: {
                            id: id,
                            id_nb:id_nb,
                        },
                        success: function(data) {
                            $('#load-more-button').remove();
                            $('.media-comment').append(data);
                        }
                    });
                }

                $(document).on('click', '#load-more-button', function() {
                    var id = $(this).data('id')
                    // alert(id)
                    load_more_comment(id);
                });

                $('.btn-comment').click(function (e) {
                    e.preventDefault();
                    var comment = $('.input-comment').val()
                    $('.media-comment').empty()
                      $('.success-comment').removeAttr("style")
                   $.ajax({
                       type: "get",
                       url: "/client/rate-user/",
                    //    url:"client/chitietsanpham/client/comment-product"
                       data: {
                            id_nb:id_nb,
                            comment:comment,
                        },
                       dataType: "dataType",
                       success: function (data) {
                        //
                       }
                   });
                   load_more_comment();
                   $('.success-comment').html('<span style="color:#45e312;">Đánh giá thành công</span>')
                    $('.input-comment').val('')
                    $('.success-comment').fadeOut(5000)
                });

           });
        </script>
    @endpush
@endsection
