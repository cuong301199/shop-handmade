@extends('admin.template.master')

@section('title')
    Thêm mã giảm giá
@endsection

@section('title-page')
    Thêm mã giảm giá
@endsection
@section('content')
    <body>
        <div class="container">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('coupon.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            {{-- {{ dd($danhsach) }} --}}
                            @if (Session::has('success'))
                            <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
                            @endif
                            <label for="">Tên mã giảm giá </label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tenMaGiamGia"
                                placeholder="Tên">
                            <br>
                            <label for="">Mã code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="maGiamGia"
                                placeholder="Tên">
                            <br>
                            <label for="">Điều kiện</label>
                            <select name="dieuKienGiam" id="" class="form-control">
                                <option value="">--Giảm giá theo--</option>
                                <option value="1">Giá tiền</option>
                                <option value="2">Phần trăm</option>
                            </select>
                            <br>
                            <label for="">Giá trị mã</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="giaTriGiam"
                                placeholder="Tên">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
