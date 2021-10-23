@extends('admin.template.master')

@section('title')
    Thêm danh mục
@endsection

@section('title-page')
    Them danh mục
@endsection
@section('content')

    <body>
        <div class="container">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('loaisanpham.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            {{-- {{ dd($danhsach) }} --}}
                            <label for="">Tên loại sản phẩm </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tenLoaiSanPham"
                                placeholder="Tên">
                            <br>
                            <label for="">Tên danh mục</label>
                            <select name="tenDanhMuc" id="" class="form-control">
                                <?php $stt = 1; ?>
                                @foreach ($danhsach as $item => $key)
                                    <option value="{{ $key->id }}">{{ $key->ten_dm }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
