@extends('client.quanly-cuahang.template.master')

@section('title')
    Sửa sản phẩm
@endsection

@section('title-page')
    Sửa sản phẩm
@endsection
@section('content')
    {{-- {{ dd($hinhanh) }} --}}
    <style>
        .form-img {
            display: flex;
            overflow: auto;
        }

        .img {
            margin: 5px;
            border: 3px solid;
        }

    </style>

    <body>
        {{-- {{ dd($danhsach_sp) }} --}}
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="{{ route('sanpham.update', ['id' => $danhsach->id]) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Sửa thông tin sản phẩm
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="">Tên sản phẩm</label>
                                            <input type="text" name="tenSanPham" value="{{ $danhsach->ten_sp }}" id=""
                                                class="form-control" placeholder="Tên sản phẩm" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Tên sản phẩm là bắt buộc</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Số lượng</label>
                                            <input type="text" name="soLuong" value="{{ $danhsach->soluong_sp }}" id=""
                                                class="form-control" placeholder="" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Số lượng là bắt buộc</small>
                                        </div>
                                        <div class="input-group form-group">
                                            <span class="input-group-text">Giá sản phẩm</span>
                                            <input class="form-control" type="number" value="{{ $danhsach->gia_sp }}"
                                                name="giaSanPham" placeholder="Giá sản phẩm" aria-label="Recipient's ">
                                            <span class="input-group-text">VND</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Danh mục</label>
                                            <select class="form-control danhMuc" name="danhMuc" id="">
                                                @foreach ($danhsach_dm as $item)
                                                    <option value="{{ $item->id }}" @if ($danhsach->id_dm == $item->id) selected   @endif>
                                                        {{ $item->ten_dm }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại sản phẩm</label>
                                            <select class="form-control loaiSanPham" name="loaiSanPham" id="">
                                                <option class="itemLSP" value="{{ $danhsach->id_lsp }}">
                                                    {{ $danhsach->ten_lsp }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group form-img">
                                            <img class="img-avatar" src="{{ asset($danhsach->hinhanh_sp) }}"
                                                width="40%" alt="">
                                            <input type="hidden" name="hinhAnhHienTai" id=""
                                                value="{{ $danhsach->hinhanh_sp }}"><br> <label for=""></label>
                                        </div>
                                        <div class="form-group">
                                            <input type="file" name="hinhAnh" id="" class="form-control-file"
                                                placeholder="Hình ảnh" aria-describedby="helpId">
                                            <small id="helpId" class="text-muted">Hình ảnh chính cho sản phẩm</small>
                                        </div>
                                        <div class="form-group form-img" id="show-image" data-id= "{{ $danhsach->id }}">
                                            {{-- @foreach ($hinhanh as $item) --}}
                                                {{-- <img class="img" src="{{ asset($item->duongdan_ha) }}" width="30%" alt="">
                                                <input type="hidden" name="imgcurrent[]" id="" class="form-control-file"
                                                    placeholder="Hình ảnh" aria-describedby="helpId">
                                                    <i data-id-ha="{{ $item->id }}"data-id-pro="{{ $item->id_sp }}" id="delete-image" class="far fa-times-circle"></i> --}}
                                                     {{-- <a data-id-ha="{{ $item->id }}"data-id-pro="{{ $item->id_sp }}" href="{{ route('avatar.delete', ['id'=>])}}" id="delete-image" ><i class="far fa-times-circle"></i></a> --}}
                                            {{-- @endforeach --}}
                                        </div>
                                        <div class="col">
                                            <a href="" id="addfile">Thêm hình ảnh chi tiết cho sản phẩm</a>
                                        </div>
                                        <div id="insert"></div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">Mô tả</label>
                                                <div class="card-body pad" style="padding-left: 0px">
                                                    <div class="mb-3">
                                                        <textarea class="textarea" placeholder="Place some text here"
                                                            name="moTa" value="{{ $danhsach->mota_sp }}"
                                                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $danhsach->mota_sp }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
                                    </div>
                                </div>
                                <input id=" id-product"type="hidden" value={{ $danhsach->id }}>
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
                load_data();
                const BASE_URL = window.location.origin //lấy base url
                $('select.danhMuc').change(function(e) {
                    e.preventDefault();
                    var getIDCat = $(this).children("option:selected").val();
                    console.log(getIDCat);
                    $('.itemLSP').remove();
                    $.ajax({
                        type: "get",
                        url: BASE_URL + "/client/get-product-type/" + getIDCat,
                        //  data: "data",
                        dataType: "json",
                        success: function(response) {
                            for (let i = 0; i < response.length; i++) {
                                //    $('.loaiSanPham').append('<option value="'+response[i].id+'" class = "itemLSP">'+response[i].ten_lsp+'</option>');
                                $('.loaiSanPham').append('<option value="' + response[i].id +
                                    '" class = "itemLSP" @if ('+response[i].id+' == $item->id) selected @endif>' + response[
                                        i].ten_lsp + '</option>')
                            }
                        }
                    });
                });
                $(document).ready(function(){
                $('#addfile').click(function (e) {
                   e.preventDefault();
                   $('#insert').append('<input type="file" name="hinhAnhChiTiet[]" id="" class="form-control-file"placeholder="Hình ảnh" aria-describedby="helpId"><br>')
                    });
                })


                // $('i#delete-image').click(function () {
                //     // e.preventDefault();
                //     var idSp = $(this).data('id-pro')
                //     var idHa = $(this).data('id-ha')
                //     console.log(idSp)
                //     $('#show-image').empty();
                //     $.ajaxSetup({
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         }
                //     });

                //     $.ajax({
                //         type: "get",
                //         url: BASE_URL + "/client/delete-image-edit/" ,
                //         data: { idSp:idSp,
                //             idHa:idHa},
                //         success: function (response) {
                //             console.log(response)
                //             for(let i =0 ; i<response.length;i++){
                //                 $('#show-image').append('<img class="img" src=" asset("'+response[i].duongdan_ha+'")" width="30%">')
                //                 $('#show-image').append('<input type="hidden" name="imgcurrent[]" id="" class="form-control-file" placeholder="Hình ảnh" aria-describedby="helpId">')
                //                 $('#show-image').append(  '<i data-id-ha=" '+response[i].id+'"data-id-pro=" '+response[i].id_sp+'" id="delete-image" class="far fa-times-circle"></i>')

                //             }


                //          }
                //     });
                // });

                function load_data(){
                    const BASE_URL = window.location.origin
                    var id= $('#show-image').data('id')
                   $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: "get",
                        url: BASE_URL + "/client/load-image" ,
                        data: { id:id
                           },
                        success: function (response) {
                            // console.log(response)
                            for(let i =0 ; i<response.length;i++){
                                $('#show-image').append('<img class="img" src="'+BASE_URL+'/'+response[i].duongdan_ha+'" width="30%">')
                                $('#show-image').append('<input type="hidden" name="imgcurrent[]" id="" class="form-control-file" placeholder="Hình ảnh" aria-describedby="helpId">')
                                // $('#show-image').append(  '<i data-idha=" '+response[i].id+'"data-id-pro=" '+response[i].id_sp+'" id="delete-image" class="far fa-times-circle"></i>')
                                $('#show-image').append('<a onclick="deleteImg()" data-id-ha="'+response[i].id+'"data-id-pro="'+response[i].id_sp+'" href="javascript:" id="delete-image" ><i class="far fa-times-circle"></i></a>')
                                // console.log('href="{{ route('avatar.delete', ['id'=>'+response[i].id+'])}}')
                            }
                         }
                    });
                }


            });



        </script>
    @endpush
@endsection
