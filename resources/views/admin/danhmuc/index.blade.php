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
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: ">STT</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Hình ảnh danh mục</th>
                        <th scope="col">Thao tác</th>

                      </tr>
                    </thead>
                    <?php $stt = 1; ?>

                    <tbody>
                        @foreach ($danhsachdanhmuc as $item)
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td>{{$item->ten_dm}}</td>
                            <td>
                                <img src="{{ asset($item->hinhanh_dm) }}" alt="" width = 60px heigth=60px>
                            </td>
                            <td>
                                <a href="{{ route('danhmuc.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('danhmuc.delete',['id'=>$item->id])}}">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                  <ul class="pagination pagination-sm m-0 float-right">
                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                  </ul>
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
