@extends('admin.template.master')

@section('title')
   Danh mục
@endsection

@section('title-page')
  Danh mục
@endsection
@section('content')
{{-- {{ dd($danhsach) }} --}}
@if (Session::has('success'))
<p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
@endif
<section class="content">
<div class="container-fluit">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('danhmuc.create')}}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm danh mục</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Danh sách danh mục</h3>
                  <div class="card-tools">
                    <form action="" class="form-inline">
                        <div class="input-group input-group-sm" style="width: 250px;">
                            <input type="text" name="key" class="form-control float-right key"
                                placeholder="Tìm kiếm">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default"><i
                                        class="fas fa-search timKiem"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr class="text-center">
                        <th style="width: ">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Hình ảnh danh mục</th>
                        <th style="width:15% " scope="col">Thao tác</th>

                      </tr>
                    </thead>
                    <?php $stt = 1; ?>

                    <tbody>
                        @foreach ($danhsachdanhmuc as $item)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td >{{$item->ten_dm}}</td>
                            <td class="text-center" >
                                <img src="{{ asset($item->hinhanh_dm) }}" alt="" width = 60px heigth=60px>
                            </td>
                            <td class="text-right">
                                <a href="{{ route('danhmuc.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chỉnh sửa</span></a>
                                <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('danhmuc.delete',['id'=>$item->id])}}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix float-right">
                    <div class="col-md-12 float-right">
                        <div class="float-right">{{$danhsachdanhmuc->links()}}</div>
                    </div>
                </div>
              </div>
        </div>
    </div>

    <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
@push('addCity')
<script>
$('a.twitter').confirm({
    content: "Bạn có muốn xóa sản phẩm này",
});
$('a.twitter').confirm({
    buttons: {
        hey: function(){
            location.href = this.$target.attr('href');
        }
    }
});
</script>
@endpush
@endsection
