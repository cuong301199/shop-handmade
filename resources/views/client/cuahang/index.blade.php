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
        .folow{
            margin-left:3px;
        }
        .box{
            border: 2px solid;
            padding: 6px 20px 40px 20px ;
            border-color: #efebebf0;
            width:700px;
            margin: 0 auto;
        }

    </style>

    {{-- <div class="benner">
</div> --}}
@if ($id_oa != null)
<div class="zalo-chat-widget" data-oaid="{{ $id_oa->id_oa }}" data-welcome-message="R???t vui khi ???????c h??? tr??? b???n!" data-autopopup="0" data-width="300" data-height="300"></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
@endif
    <div class="page_title_area" style="margin-bottom: 0px">
        <div class="container">
            <div class="row infor">
                <div class="col-sm-4">
                    <div class="col-md-3 text-center">
                        <img src="{{ asset('hinh-anh-san-pham') }}/1.jpg" class="img-circle" alt="Hot girl" width="90"
                            height="90">
                    </div>
                    <div class="col-md-9 box-folow">
                        <div class="name">{{ $thongtin->ten_nd }}</div>
                        {{-- <a class="folow " href=""><i class="fa fa-comments"></i>Chat ngay</a>
                        <a class="folow folower" href=""><i class="fa fa-eye"></i>Theo d??i</a> --}}
                        <?php
                            if(Auth::guard('nguoi_dung')->check()){
                                $id_nd = Auth::guard('nguoi_dung')->user()->id;
                                $folow = DB::table('chi_tiet_theo_doi')
                                ->join('theo_doi','theo_doi.id','chi_tiet_theo_doi.id_td')
                                ->where('theo_doi.id_nd',$thongtin->id)
                                ->where('chi_tiet_theo_doi.id_nd',$id_nd)
                                ->select(DB::raw('count(chi_tiet_theo_doi.id) as total'))
                                ->first();
                            }
                            $qty_rate = DB::table('danh_gia_nguoi_dung')
                            ->where('id_nb',$thongtin->id)
                            ->select(DB::raw('count(id) as total'))
                            ->first();

                            $qty_product = DB::table('san_pham')
                            ->where('id_nb',$thongtin->id)
                            ->select(DB::raw('count(id) as total'))
                            ->first();

                            $qty_folow = DB::table('chi_tiet_theo_doi')
                                ->join('theo_doi','theo_doi.id','chi_tiet_theo_doi.id_td')
                                ->where('theo_doi.id_nd',$thongtin->id)
                                ->select(DB::raw('count(theo_doi.id) as total'))
                                ->first();
                        ?>
{{-- {{ dd( $qty_folow) }} --}}
                        <div class="right" style="display: flex">
                            <div class="chat">
                                <a class="folow" href=""><i class="fa fa-comments"></i>Chat ngay</a>
                            </div>
                            @if (Auth::guard('nguoi_dung')->check() && $folow->total ==0)
                                <div class="folow">
                                    <a class="folow folower" href=""><i class="fa fa-eye"></i>Theo d??i</a>
                                </div>
                            @elseif(Auth::guard('nguoi_dung')->check() && $folow->total != 0)
                                <div class="folow">
                                    <a class="folow un-folow" style="padding:0px 5px;" href=""><i class="fa fa-eye"></i>H???y theo d??i</a>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="col-md-4">
                        <div>
                            <label for="">????nh gi?? :</label>
                            <span>{{ $qty_rate->total }} ????nh gi??</span>
                        </div>
                        <div>
                            <label for="">S???n ph???m :</label>
                            <span>{{ $qty_product->total }} s???n ph???m</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="">Ph???n h???i :</label>
                            <span>100%</span>
                        </div>
                        <div>
                            <label for="">Th???i gian ph???n h???i :</label>
                            <span>Ch??a x??c ?????nh</span>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div>
                            <label for="">Ng??y tham gia:</label>
                            <span>{{ \Carbon\Carbon::parse($thongtin->created_at)->subHours(7)->diffForHumans() }}</span>
                        </div>
                        <div>
                            <label for="">Ng?????i theo d??i :</label>
                            <span>{{   $qty_folow->total }} ng?????i theo d??i</span>
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
                    <li class="active"><a data-toggle="tab" href="#new">S???n ph???m</a></li>
                    <li><a data-toggle="tab" href="#latest">B??i Vi???t</a></li>
                    <li><a data-toggle="tab" href="#men">Li??n h???</a></li>
                    <li><a data-toggle="tab" href="#women">????nh gi??</a></li>
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
                                            <option value="-1">s???p x???p theo danh m???c</option>
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
                                            <option value="-1">S???p x???p m???c ?????nh</option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'asc']) }}>S???n ph???m c??
                                            </option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'desc']) }}>S???n ph???m m???i
                                            </option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'price_max']) }}>Gi??
                                                gi???m d???n</option>
                                            <option value={{ request()->fullUrlWithQuery(['oderBy' => 'price_min']) }}>Gi??
                                                t??ng d???n</option>
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
                                        @if ($item->soluong_sp > 0)
                                            <a id="{{ $item->id }}" class="addcart"
                                                href="{{ route('Add.cart', ['id' => $item->id]) }}"><i
                                                    class="fa fa-cart-plus"></i>Th??m v??o gi??? h??ng</a>
                                        @else
                                            <a id="out-of" style="color:#939098;cursor:pointer;"><i class="fa fa-cart-plus"></i>Th??m v??o gi??? h??ng</a>
                                        @endif
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
                                                    href="{{ route('baiviet.detail', ['id' => $item->id]) }}">Xem b??i
                                                    vi???t</a>
                                            </div>
                                            {{-- <a class="like" href="#"><i class="fa fa-heart"></i></a> --}}
                                            <div class="col-md-3 pull-right">Ng??y ????ng : {{ $item->created_at }}</div>
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
                                @if ($infor != null)
                                    <div class="col-md-8">
                                        <article class="single_blog_post">
                                            <a href="#">
                                                <h3 class="post_title">B???n ?????</h3>
                                            </a>
                                            <br>
                                            {!! $infor->bando_ttlh !!}
                                        </article>
                                    </div>
                                    <div class="col-md-4">
                                        <article class="single_blog_post">
                                            <a href="#">
                                                <h3 class="post_title">Th??ng tin li??n h???</h3>
                                            </a>
                                            <br>
                                            <i class="fa fa-phone" style="margin:5px;"></i><label>S??? ??i???n tho???i</label>:
                                            <span>{{ $infor->sdt_nd }}</span><br>
                                            <i class="fa fa-envelope-square" style="margin:5px;"></i><label>Email</label> :
                                            <span>{{ $infor->email_nd }}</span><br>
                                            <i class="fa fa-map-marker-alt" style="margin:5px;"></i><label>?????a ch???</label> :
                                            <span>{{ $infor->diachi_ttlh }}</span><br>
                                        </article>
                                    </div>
                                @endif
                            </div> <!-- end of col-md-9 -->
                        </div> <!-- end of row-->
                    </div>
                </div>

                <div id="women" class="tab-pane">
                    <div class="box ">
                        <div class="row" style="margin-bottom: 7px">
                            <div class="post_comments col-md-12">
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
                                            $count_rate= DB::table('danh_gia_nguoi_dung')
                                            ->where('id_nm',$id_nd)
                                            ->where('id_nb',$thongtin->id)
                                            ->select(DB::raw('count(id) as total'))
                                            ->first();


                                        ?>
    {{-- {{ dd(  $count_rate) }} --}}
                                        @if ($danhsach1 != null && $count_rate->total > 0)
                                            <div class="row">
                                                <div class="col-md-12 center-block text-center" >
                                                    <button  style="padding:14px 12px;border-radius:0px;color:#333; background-color:#faf5f5;border:#fff;font-size:15px;width:100%" type="button" class="btn btn-success from-control">B???n ???? th???c hi???n ????nh gi?? ng?????i d??ng n??y </button>
                                                </div>
                                            </div>
                                        @elseif($danhsach1 != null && $count_rate->total == 0)
                                            <li class="media" style="margin-top: 10px;">
                                                <a class="pull-left" href="#">
                                                    <img width="90px" height="100px" class="media-object "
                                                        src="{{ asset($user->anhdaidien_nd) }}" alt="" />
                                                    {{-- {{ asset('template-client') }}/img/blog/comment1.png --}}
                                                </a>
                                                <div class="media-body" style="padding-top: 0px">
                                                    <h4 class="media-heading"><a href="#">{{ $user->ten_nd }}</a></h4>
                                                    <input class="input-comment" type="text" placeholder="Vi???t ????nh gi?? c???a b???n">
                                                    <button type="submit" class="btn btn-comment" id="btn-comment">????nh gi??</button>
                                                    <div class="success-comment"></div>
                                                </div>
                                            </li>
                                        @elseif($danhsach1 == null)
                                        <div class="row">
                                            <div class="col-md-12 center-block text-center" >
                                                <button  style="padding:14px 12px;border-radius:0px;color:#333; background-color:#faf5f5;border:#fff;font-size:15px;width:100%" type="button" class="btn btn-success from-control">Do b???n ch??a mua s???n ph???m c???a ng?????i d??ng n??y n??n ch??a th??? ????nh gi?? </button>
                                            </div>
                                        </div>
                                        @endif
                                    @else
                                    <div class="row">
                                        <div class="col-md-12 center-block text-center" >
                                            <button  style="padding:14px 12px;border-radius:0px;color:#333; background-color:#faf5f5;border:#fff;font-size:15px;width:100%" type="button" class="btn btn-success from-control">B???n c???n ????ng nh???p v?? mua s???n ph???m ????? ????nh gi?? ng?????i d??ng</button>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="media-comment">
                                    </div>
                                </ul>
                            </div>
                        </div>

                        <div class="load_cmt">
                            {{-- <div class="post_comments col-md-12">
                                <ul class="media-list">
                                    <li class="media" style="margin-top: 10px">
                                        <a class="pull-left" href="#">
                                            <img width="100px" height="90px" class="media-object"
                                                src="{{ asset($comment->anhdaidien_nd) }} " alt="" />
                                        </a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">{{ $comment->ten_nd }}</a><span>{{ \Carbon\Carbon::parse($comment->created_at)->subHours(7)->diffForHumans() }}</span></h4>
                                            <p>{{ $comment->noidung_dg }}</p>
                                        </div>
                                    </li> <!-- end of media -->
                                    <div class="media-comment">
                                    </div>
                                </ul>
                            </div> --}}
                        </div>

                    </div>
                </div>
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
                alertify.success('Th??m v??o gi??? h??ng th??nh c??ng');
            </script>
        @endif
        @if (Session::has('success-deleteItemCart'))
            <script>
                alertify.success('X??a s???n ph???m kh???i gi??? h??ng th??nh c??ng');
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
            $(document).on('click','#out-of', function () {
                $.alert({
                    title: 'Th??ng b??o!',
                    content: 'S???n ph???m ???? h???t, n??n b???n kh??ng th??? th??m v??o gi??? h??ng!',
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
                            // $('.media-comment').append(data);
                            $('.load_cmt').append(data)
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
                    // $('.media-comment').empty()
                    //   $('.success-comment').removeAttr("style")
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
                            swal({
                                title: "Th??ng b??o",
                                text: "C???p nh???t tr???ng th??i ????n h??ng  th??nh c??ng",
                                icon: "success",
                                button: "????ng",
                                });
                                // location.reload();
                                setInterval('location.reload()', 2000);
                       }
                   });
                //    load_more_comment();
                //    $('.success-comment').html('<span style="color:#45e312;">????nh gi?? th??nh c??ng</span>')
                //     $('.input-comment').val('')
                //     $('.success-comment').fadeOut(5000)
                });

                $('.folower').click(function (e) {
                    e.preventDefault();
                    $.ajax({
                        type: "get",
                        url: "/client/folow",
                        data: {
                            id_nb:id_nb
                        },

                        success: function (data) {
                            $('div.folow').html(data);
                        }
                    });
                });
                $('.un-folow').click(function (e) {
                    e.preventDefault();

                    $.ajax({
                        type: "get",
                        url: "/client/un-folow",
                        data: {
                            id_nb:id_nb
                        },

                        success: function (data) {
                            $('div.folow').html(data);
                        }
                    });
                });

           });
        </script>
    @endpush
@endsection
