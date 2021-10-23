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
    <form action="{{ route('danhmuc.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Tên danh mục</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="tenDanhMuc" placeholder="Ten danh muc">
            <br>
            <label for="">Mô tả</label>
            <input type="text" class="form-control" id="exampleInputEmail1" name="moTa" placeholder="Ten danh muc">
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
   </div>
    </div>
</div>

</body>
@endsection
