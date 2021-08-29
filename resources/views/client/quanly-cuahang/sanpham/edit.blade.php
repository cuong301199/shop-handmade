@extends('client.quanly-cuahang.template.master')

@section('title')
    Sửa sản phẩm
@endsection

@section('title-page')
    Sửa sản phẩm
@endsection
@section('content')

    <body>
        {{-- {{ dd($danhsach_sp) }} --}}
        <main class="container">
            <header class="row text-center"></header>
            <section class="row">
                <div class="col-md-12">
                    <form action="{{ route('sanpham.update', ['id'=>$danhsach->id]) }}" method="post">
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
                                            <select class="form-control" name="danhMuc" id="">
                                                @foreach ($danhsach_dm as $item)
                                                    <option value="{{ $item->id }}" @if ($danhsach->id_dm == $item->id) selected   @endif>
                                                        {{ $item->ten_dm }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Loại sản phẩm</label>
                                            <select class="form-control" name="loaiSanPham" id="">

                                                @foreach ($danhsach_lsp as $item)
                                                    <option value="{{ $item->id }}" @if ($danhsach->id_lsp == $item->id) selected   @endif>
                                                        {{ $item->ten_lsp }}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <img src="" width="90%"
                                            class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}"
                                            alt="">
                                        <div class="form-group">
                                            <label for=""></label>
                                            <input type="file" name="hinhAnh" id="" class="form-control-file"
                                                placeholder="Hình ảnh" aria-describedby="helpId"><br>
                                            <small id="helpId" class="text-muted">Hình ảnh sản phẩm là bắt buộc</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="">Mô tả</label>
                                            <textarea class="form-control" value="{{ $danhsach->mota_sp }}" name="moTa" id="" rows="3">{{ $danhsach->mota_sp }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Lưu sản phẩm</button>
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
