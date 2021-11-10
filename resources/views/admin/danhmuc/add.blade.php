@extends('admin.template.master')

@section('title')
Thêm danh mục
@endsection

@section('title-page')
Thêm danh mục
@endsection

@section('content')
<body>
<div class="container">

</div>
<div class="container">
    <div class="row">
   <div class="col-md-6">
    <form action="{{ route('danhmuc.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="tenDanhMuc" placeholder="Ten danh muc">
            <br>
            <label for="">Mô tả</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="moTa" placeholder="Ten danh muc">
        </div>
        <div class="form-group">
            <label for=""></label>
            <input type="file" name="hinhAnh" id="avatar-image" class="form-control-file"
                placeholder="Hình ảnh" aria-describedby="helpId"><br>
            <small id="helpId" class="text-muted">Hình ảnh danh mục là bắt buộc</small>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>
    </div>
</div>

</body>
@endsection
