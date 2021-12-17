@extends('client.quanly-cuahang.template.master')

@section('title')
    Thêm bài viết
@endsection

@section('title-page')
    Thêm bài viết
@endsection
@section('content')
    {{-- {{ dd($danhsach_dm) }} --}}

    <body>
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="{{ route('baiviet-post.create') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Thêm thông tin bài viết
                                @if (Session::has('success'))
                                    <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
                                @endif
                                @if (Session::has('error'))
                                    <p style="color: rgb(218, 21, 31)">{{ Session::get('error') }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Tiêu đề bài viết</label>
                                            <input type="text" name="tieude_bv" id="" class="form-control"
                                                placeholder="Tiêu đề" aria-describedby="helpId">
                                            {{-- <small id="helpId" class="text-muted">Tên sản phẩm là bắt buộc</small> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Hình ảnh cho bài viết</label>
                                            <input type="file" name="hinhanh_bv" id="avatar-image" class="form-control-file"
                                                placeholder="Hình ảnh" aria-describedby="helpId"><br>
                                            <small id="helpId" class="text-muted">Hình ảnh bài viết là bắt buộc</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Tóm tắt bài viêt</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="tomtat_bv"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                            <label for="">Nội dung bài viết</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea class="textarea" placeholder="Place some text here"
                                                        name="noidung_bv"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Thêm bài viết</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>

    </body>
    {{-- @push('ajax-add-product')
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
        </script>
    @endpush
    @push('addCity')
    <script>
        $(document).ready(function() {
                const BASE_URL = window.location.origin //lấy base url
                $('select.thanhPho').change(function(e) {
                    e.preventDefault();
                    var getIDCity = $(this).children("option:selected").val();
                    console.log(getIDCity);
                    console.log('124')
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

