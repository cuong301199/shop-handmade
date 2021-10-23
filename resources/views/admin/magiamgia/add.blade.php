@extends('admin.template.master')

@section('title')
    Thêm danh mục
@endsection

@section('title-page')
    Them danh mục
@endsection
@section('content')
<style>
</style>
    <body>
        <div class="container">

        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="{{ route('coupon.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên mã giảm giá :</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="tenMaGiamGia"
                                placeholder="Tên">
                            <br>
                            <label for="">Mã giảm giá :</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="maGiamGia"
                                placeholder="Tên">
                            <br>
                            <label for="">Điều kiện giảm giá :</label>
                            <select name="dieuKienGiam" id="" class="form-control">
                                    <option value="">Chọn điều kiện giảm giá</option>
                                    <option value="1">Giảm theo %</option>
                                    <option value="2">Giảm theo tiền</option>
                            </select>
                            <br>
                            <label for="">Giá trị giảm:</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="giaTriGiam"
                                placeholder="Tên">
                            <br>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

    </body>
@endsection
