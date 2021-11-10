@extends('client.quanly-cuahang.template.master')

@section('title')
    Sửa bài viết
@endsection

@section('title-page')
Sửa bài viết
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
                    <form action="{{ route('baiviet.update', ['id'=>$danhsach->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                Sửa bài viết
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
                                                placeholder="Tiêu đề" aria-describedby="helpId" value="{{ $danhsach->tieude_bv }}">
                                            {{-- <small id="helpId" class="text-muted">Tên sản phẩm là bắt buộc</small> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group form-img">
                                            <img class="img" src="{{ asset($danhsach->hinhanh_bv) }}"
                                                width="40%" alt="">
                                            <input type="hidden" name="hinhAnhHienTai" id=""
                                                value="{{ $danhsach->hinhanh_bv }}"><br> <label for=""></label>
                                                <div class="form-group">
                                                    <input type="file" name="hinhanh_bv" id="" class="form-control-file"
                                                        placeholder="Hình ảnh" aria-describedby="helpId">
                                                    <small id="helpId" class="text-muted">Chỉnh sửa hình ảnh cho bài viêt</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Tóm tắt bài viêt</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea  value="{{ $danhsach->tomtat_bv }}" class="textarea" placeholder=""
                                                        name="tomtat_bv"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $danhsach->tomtat_bv }}</textarea>
                                                </div>
                                            </div>
                                            <label for="">Nội dung bài viết</label>
                                            <div class="card-body pad" style="padding-left: 0px">
                                                <div class="mb-3">
                                                    <textarea value="{{ $danhsach->noidung_bv }}" class="textarea" placeholder="Place some text here"
                                                        name="noidung_bv"
                                                        style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $danhsach->noidung_bv }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Lưu</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </main>
    </body>

@endsection
