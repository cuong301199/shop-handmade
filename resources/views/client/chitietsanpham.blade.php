@extends('client.template.master')
@section('content')
    {{-- {{ dd($danhsach) }} --}}
    <style>
        /* .name-user {
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
                        } */

        .infor {
            width: auto;
            height: 40px;
            border: 1px solid;
        }

        .modal-content {
            padding: 20px;


        }

        .btn-comment {
            margin-top: 10px;

        }

        .input-comment {
            border: 1px solid rgb(221, 209, 209)
        }

        .related_blog_post {
            margin-left: 0px
        }

        .media-object {
            padding: 0px;
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

    {{-- {{ dd($danhsach) }} --}}
    <!-- content area -->
    <div class="single-product">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="pro-single-sd margin-bottom-50px">
                        <ul class="owl-slider">
                            <li class="item">
                                <div class="single-latest-product">
                                    <span class="price-label"> {{ number_format($danhsach->gia_sp) }} VND </span>
                                    <img style="height:500;width:550px;" class="img-responsive"
                                        src="{{ asset($danhsach->hinhanh_sp) }}" alt="Shoe">
                                    <a href="#">
                                        <h3>Leather Watch</h3>
                                    </a>
                                </div>
                            </li>
                            @foreach ($hinhanh as $item)

                                <li class="item">
                                    <div class="single-latest-product">
                                        <span class="price-label"> {{ number_format($danhsach->gia_sp) }} VND</span>
                                        <img style="height:500;width:550px;" class="img-responsive"
                                            src="{{ asset($item->duongdan_ha) }}" alt="Shoe">
                                        <a href="#">
                                            <h3>Leather Watch</h3>
                                        </a>
                                    </div>
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
                        </div>
                        <span style="font-size:14px; font-weight:bold; color:rgb(15, 14, 14)"
                            class="amount">{{ number_format($danhsach->gia_sp) }} VND </span><br>

                        <h3>MÔ TẢ</h3>
                        <p style="font-size: 14px">{!! $danhsach->mota_sp !!}</p>

                        {{-- <div class="clear-fix"></div> --}}
                        <div class="row">
                            <div class="col-md-5">
                                <div class="product-desc">
                                    <span class="item-number"><b>Giá:</b> {{ number_format($danhsach->gia_sp) }} VND
                                    </span><br>
                                    <span class="item-cat"><b>Danh mục: </b>{{ $danhsach->ten_lsp }}</span><br>
                                    <span class="item-cat"><b>Tên người bán: </b><a
                                            href="{{ route('cuahang.index', ['id' => $danhsach->id_nb]) }}">{{ $danhsach->ten_nd }}</a></span><br>
                                    <span class="item-cat"><b>Ngày đăng bán:
                                        </b>{{ \Carbon\Carbon::parse($danhsach->created_at)->subHours(7)->diffForHumans() }}</span><br>
                                    {{-- <span class="item-tag"><b>Tags:</b>  elegant, men, suits, beige, modern</span> --}}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product-desc">
                                    <div>
                                        <a style="margin-top:px; margin-left:0px;width:220px;"
                                            href="{{ route('Add.cart', ['id' => $danhsach->id]) }}"
                                            class="trendify-btn black-bordered"><i class="fa fa-cart-plus"
                                                style="margin: 0px 5px"></i>thêm vào giỏ hàng</a>
                                    </div>
                                    <div>
                                        <a style="margin-top:10px; margin-left:0px;width:220px;"
                                            href="{{ route('cuahang.index', ['id' => $danhsach->id_nb]) }}"
                                            class="trendify-btn black-bordered">Xem trang người bán</a>
                                    </div>
                                    <div>
                                        <a style="margin-top:10px; margin-left:0px;width:220px;" href=""
                                            class="trendify-btn black-bordered">Chat với người bán</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="infor">
                    </div> --}}


                </div>
            </div>
            <div class="report-product">

                <button style="font-size:11px; margin-bottom:15px" type="button" class="btn btn-lg" data-toggle="modal"
                    data-target="#exampleModal">Báo cáo sản phẩm vi phạm</button>

                <!-- Modal -->
                <form action="{{ route('report.product') }}" method="post">
                    @csrf
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nội dung báo cáo</label>
                                        <textarea name="noidung_bc" class="form-control noidung-bc"
                                            id="exampleFormControlTextarea1" rows="3"></textarea>
                                    </div>
                                    <input type="hidden" value="{{ $danhsach->id }}" name="id_sp" class="id_sp">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- comment --}}
            <div class="row">
                <div class="post_comments col-md-6">
                    <h3 class="comment_title"><span>4 comments</span></h3>
                    <ul class="media-list">
                        @if (Auth::guard('nguoi_dung')->check())
                            <?php
                            $id_nd = Auth::guard('nguoi_dung')->user()->id;
                            $user = DB::table('nguoi_dung')
                                ->where('id', $id_nd)
                                ->first();
                            ?>
                            <li class="media">
                                <a class="pull-left" href="#">
                                    <img width="100px" height="90px" class="media-object "
                                        src="{{ asset($user->anhdaidien_nd) }}" alt="" />
                                    {{-- {{ asset('template-client') }}/img/blog/comment1.png --}}
                                </a>
                                <div class="media-body" style="padding-top: 0px">
                                    <h4 class="media-heading"><a href="#">{{ $user->ten_nd }}</a></h4>
                                    <input class="input-comment" type="text" placeholder="Viết bình luận của bạn">
                                    <button type="submit" class="btn btn-comment" id="btn-comment">Bình luận</button>
                                    <div class="success-comment"></div>
                                </div> <!-- end of media-body -->
                            </li> <!-- end of media -->
                        @endif
                        <div class="media-comment">
                        </div>
                    </ul>
                </div>
            </div>

            {{-- sản phẩm liên quan --}}
            <div class="row" style="margin-top:20px ">
                <div class="related-products latest-product margin-bottom-60px" style="height: 100px">
                    <div class="col-sm-12">
                        <h4>Sản phẩm liên quan</h4>
                    </div>
                    @foreach ($sp as $item)
                        <div class="col-md-2 col-sm-6" style="height: 100px">
                            <div class="single-latest-product inside" style="height: 100px">
                                <span class="price-label"> {{ number_format($item->gia_sp) }} VND</span>
                                <a href="{{ route('chitietsanpham.index', ['id' => $item->id]) }}"><img
                                        class="img-responsive" src="{{ asset($item->hinhanh_sp) }}" alt="Shoe"></a>
                                <h4 class="margin-bottom-0"></h4>
                                <div class="actions">
                                    <div class="row">
                                        {{-- <div class="col-md-6">
									<a href="#"><i class="fa fa-plus"></i>Add Cart</a>
								</div> --}}
                                        {{-- <div class="col-md-6">
									<ul class="pull-right">
										<li><a class="zoom" href="img/lastest-product-1.png"><i class="fa fa-search"></i></a></li>
										<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
										<li><a href="product-details-2.html"><i class="fa fa-expand"></i></a></li>
									</ul>
								</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            {{-- sản phẩm cùng cửa hàng --}}
            <div class="row">
                <div class="related-products latest-product margin-bottom-60px">
                    <div class="col-sm-12">
                        <h4>Sản phẩm Cùng người bán</h4>
                    </div>
                    @foreach ($sp_cungcuahang as $item)
                        <div class="col-md-2 col-sm-6">
                            <div class="single-latest-product inside">
                                <span class="price-label"> {{ number_format($item->gia_sp) }} VND</span>
                                <a href="{{ route('chitietsanpham.index', ['id' => $item->id]) }}"><img
                                        class="img-responsive" src="{{ asset($item->hinhanh_sp) }}" alt="Shoe"></a>
                                <h4 class="margin-bottom-0"></h4>
                                <div class="actions">
                                    <div class="row">
                                        {{-- <div class="col-md-6">
									<a href="#"><i class="fa fa-plus"></i>Add Cart</a>
								</div> --}}
                                        {{-- <div class="col-md-6">
									<ul class="pull-right">
										<li><a class="zoom" href="img/lastest-product-1.png"><i class="fa fa-search"></i></a></li>
										<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
										<li><a href="product-details-2.html"><i class="fa fa-expand"></i></a></li>
									</ul>
								</div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
    @push('Add-Cart')
        @if (Session::has('success-report'))
            <script>
                $.alert({
                    title: 'Thông báo!',
                    content: 'Báo cáo sản phẩm thành công!',
                });
            </script>
        @elseif(Session::has('error-report'))
            <script>
                $.alert({
                    title: 'Thông báo!',
                    content: 'Cần đăng nhập để báo cáo sản phẩm',
                });
            </script>
        @endif
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
