@extends('admin.template.master')

@section('title')
    Sửa loại sản phẩm
@endsection

@section('title-page')
    Sửa loại sản phẩm
@endsection
@section('content')

    <body>
        <div class="container">
            <div class="row">
                <form action="{{ route('loaisanpham.update', ['id' => $danhsach_lsp->id]) }}" method="post">
                    @csrf
                    <div class="form-group">

                        <label for="">Tên loại sản phẩm </label>
                        <input type="text" class="form-control" id="exampleInputEmail1"
                            value="{{ $danhsach_lsp->ten_lsp }}" name="tenLoaiSanPham" placeholder="Tên">
                        <br>
                        <label for="">Tên danh mục</label>
                        {{-- {{ dd($danhsach_lsp) }} --}}
                        {{-- {{ dd($danhsach) }} --}}
                        <select name="tenDanhMuc" id="">
                            <option value="">{{ $danhsach_lsp->ten_dm }}</option>
                            @foreach ($danhsach as $item)
                                <option value="{{ $item->id }}">{{ $item->ten_dm }}</option>

                            @endforeach
                        </select>

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </body>
@endsection
