@extends('client.quanly-cuahang.template.master')

@section('title')
    Thêm sản phẩm
@endsection

@section('title-page')
    Thêm sản phẩm
@endsection
@section('content')
    {{-- {{ dd($danhsach_dm) }} --}}

    <body>
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="{{ route('sanpham-post.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Thêm thông tin cho sản phẩm
                                @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                    <p style="color: rgb(218, 21, 31)">{{ Session::get('error') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" name="tenSanPham" id="" class="form-control"
                                                placeholder="Tên sản phẩm" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Tên sản phẩm là bắt buộc</small>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Giá sản phẩm</span>
                                            <input class="form-control" type="number" name="giaSanPham"
                                                placeholder="Giá sản phẩm" aria-label="Recipient's ">
                                            <span class="input-group-text">VND</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Danh mục</label>
                                            <select class="form-control danhMuc" name="danhMuc">
                                                <option>Chọn danh mục</option>
                                                @foreach ($danhsach_dm as $item)
                                                    <option value="{{ $item->id }}">{{ $item->ten_dm }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Loại sản phẩm</label>
                                            <select class="form-control loaiSanPham" name="loaiSanPham" id="">
                                                {{-- @foreach ($danhsach_lsp as $item)

                                                @endforeach --}}
                                                <option value="">Chọn loại sản phẩm</option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="">Tên thành phố</label>
                                            <select name="thanhPho" id="" class="form-control thanhPho">
                                                <option value="80">Chọn thành phố</option>
                                                @foreach ($tp as $item )
                                                    <option value="{{ $item->matp }}">{{ $item->name_tp }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên quận huyện</label>
                                            <select name="quanHuyen" id="" class="form-control quanHuyen">
                                                <option value="">Chọn quận huyện</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Tên xã phường</label>
                                            <select name="xaPhuong" id="" class="form-control xaPhuong">
                                                <option value="">Chọn xã phường</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('template-client') }}/img/avatar.jpg" width="30%"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                            alt="">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="file" name="hinhAnh" id="avatar-image" class="form-control-file"
                                                placeholder="Hình ảnh" aria-describedby="helpId"><br>
                                            <small id="helpId" class="text-muted">Hình ảnh sản phẩm là bắt buộc</small>
                                        </div>
                                        @for ($i = 1; $i < 4; $i++)
                                            <input type="file" name="hinhAnhChiTiet[]" id="" class="form-control-file"
                                                placeholder="Hình ảnh" aria-describedby="helpId"><br>
                                            <small id="helpId" class="text-muted">Hình ảnh sản phẩm là bắt buộc</small>
                                        @endfor
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="moTa"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </body>
    @push('ajax-add-product')
        <script>
            $(document).ready(function() {
                const BASE_URL = window.location.origin //lấy base url
                $('select.danhMuc').change(function(e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    $('.itemLSP').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL+ "/client/get-product-type/" + getIDCat,
                        //  data: "data",
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.loaiSanPham').append('<option value="' + response[i].id +
                                    '" class = "itemLSP">' + response[i].ten_lsp + '</option>');
                            }
                        }
                    });
                });

            });
            // $('#avatar-image').change(function(e) {
            //     e.preventDefault();
            //     const BASE_URL = window.location.origin //lấy base url
            //     $.ajax({
            //         type: "get",
            //         url: "url",
            //         data: "data",
            //         dataType: "dataType",
            //         success: function(response) {

            //         }
            //     });
            // });

                const BASE_URL = window.location.origin //lấy base url
                $('select.thanhPho').change(function(e) {
                    e.preventDefault();
                    var getIDCity = $(this).children("option:selected").val();
                    console.log(getIDCity);
                    $('.itemProvince').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL+ "/client/get-province/" + getIDCity,
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.quanHuyen').append('<option value="' + response[i].maqh +
                                    '" class="itemProvince" >' + response[i].name_qh + '</option>');
                            }
                        }
                    });
                });
                $('select.quanHuyen').change(function(e) {
                    e.preventDefault();
                    var getIDProvince = $(this).children("option:selected").val();
                    // console.log(getIDCity);
                    // console.log('124')
                    $('.itemWards').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL+"/client/get-wards/" + getIDProvince,
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.xaPhuong').append('<option value="' + response[i].maxa +
                                    '"class="itemWards" >' + response[i].name_xa + '</option>');

                            }

                        }
                    });
                });


        </script>
    @endpush
    {{-- @push('addCity')
    <script>
        $(document).ready(function() {
                const BASE_URL = window.location.origin //lấy base url
                $('select.thanhPho').change(function(e) {
                    e.preventDefault();
                    var getIDCity = $(this).children("option:selected").val();
                    // console.log(getIDCity);
                    // console.log('124')
                    $('.itemProvince').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL+ "/client/get-province/" + getIDCity,
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.quanHuyen').append('<option value="' + response[i].maqh +
                                    '" class="itemProvince" >' + response[i].name_qh + '</option>');

                            }

                        }
                    });
                });
                $('select.quanHuyen').change(function(e) {
                    e.preventDefault();
                    var getIDProvince = $(this).children("option:selected").val();
                    // console.log(getIDCity);
                    // console.log('124')
                    $('.itemWards').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL+ "/client/get-wards/" + getIDProvince,
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                $('.xaPhuong').append('<option value="' + response[i].maxa +
                                    '"class="itemWards" >' + response[i].name_xa + '</option>');

                            }

                        }
                    });
                });

            });
    </script>
@endpush --}}
@endsection
