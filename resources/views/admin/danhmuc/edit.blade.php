@extends('admin.template.master')

@section('title')
Sửa danh mục
@endsection

@section('title-page')
Sửa danh mục
@endsection

@section('content')
<body>
<div class="container">

</div>
<div class="container">
    <div class="row">
    <form action="{{ route('danhmuc.update', ['id'=>$danhmuc->id]) }}" method="post">


        @csrf
            <div class="form-group">

                <label for="">Tên danh mục</label>
                <input type="text" class="form-control" value="{{$danhmuc->ten_dm}}" id="exampleInputEmail1" name="tenDanhMuc" placeholder="Ten danh muc">
                <br>
                <label for="">Mô tả</label>
                <input type="text" class="form-control" value="{{$danhmuc->mota_dm }}" id="exampleInputEmail1" name="moTa" placeholder="mo ta">

            </div>

                <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>

</body>
@endsection
