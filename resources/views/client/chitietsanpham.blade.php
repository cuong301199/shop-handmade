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
                    {{-- <div class="infor">
                    </div> --}}
                    <div>
                        <a style="margin-top:10px; margin-left:0px;width:250px;"
                            href="{{ route('cuahang.index', ['id' => $danhsach->id_nb]) }}"
                            class="trendify-btn black-bordered">Xem trang người bán</a>
                    </div>
                    <div>
                        <a style="margin-top:10px; margin-left:0px;width:250px;" href=""
                            class="trendify-btn black-bordered">Chat với người bán</a>
                    </div>
                </div>
            </div>
            <div class="report-product">
                <button style="font-size:11px; margin-bottom:15px" type="button" class="btn btn-lg" data-toggle="modal"
                    data-target="#myModal">Báo cáo sản phẩm vi phạm</button>
                <div class="modal fade" id="myModal" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <form action="">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="">Báo cáo vi phạm</h4>
                                </div>
                                <div class="modal-body">
                                    {{-- <p>Some text in the modal.</p> --}}
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nội dung báo cáo</label>
                                        <textarea name="noidung-_bc" class="form-control noidung-bc" id="exampleFormControlTextarea1"
                                            rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Số điện thoại:</label>
                                        <input type="number" name="sodienthoai_bc" class="form-control sodienthoai-bc " id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email :</label>
                                        <input type="email" name="email_bc" class="form-control email-bc" id="email">
                                    </div>
                                    <input type="hidden" value="{{ $danhsach->id }}" class="id_sp">
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success btn-report" data-dismiss="modal">Báo cáo </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="related-products latest-product margin-bottom-60px">
                    <div class="col-sm-12">
                        <h4>Sản phẩm liên quan</h4>
                    </div>
                    @foreach ($sp as $item)
                        <div class="col-md-2 col-sm-6">
                            <div class="single-latest-product inside">
                                <span class="price-label"> {{ number_format($danhsach->gia_sp) }} VND</span>
                                <a href=""><img class="img-responsive" src="{{ asset($item->hinhanh_sp) }}"
                                        alt="Shoe"></a>
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
    <script>
        $(document).ready(function () {
            $('.btn-report').click(function (e) {
                var noidung_bc = $('.noidung-bc').val();
                var sodienthoai_bc = $('.sodienthoai-bc').val();
                var email_bc = $('.email-bc').val();
                var id_sp = $('.id_sp').val();

                $.ajax({
                    type: "get",
                    url: "/client/report-product",
                    data: {
                        noidung_bc: noidung_bc,
                        sodienthoai_bc:sodienthoai_bc,
                        email_bc : email_bc ,
                        id_sp:id_sp,
                    },
                    // dataType: "dataType",
                    success: function (response) {

                    }
                });
                $.alert({
                    title: 'Thông báo!',
                    content: 'Báo cáo sản phẩm thành công!',
                });
                $('.noidung-bc').val('');
                $('.sodienthoai-bc').val('');
                $('.email-bc').val('');
                // $('.id_sp').val('');

            });
        });
    </script>
    @endpush
@endsection
