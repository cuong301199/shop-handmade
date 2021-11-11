@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection

@section('title-page')
    Sản phẩm
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
                    <a href="{{ route('sanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: ">STT</th>
                                <th style="width:30% ">Tên sản phẩm</th>
                                <th style="width: ">Hình ảnh</th>
                                <th style="width: ">Loại sản phẩm</th>
                                <th style="width: ">Giá</th>
                                <th style="width: ">Trạng thái</th>
                                <th style="width: ">Thao tác</th>
                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach as $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{$item->ten_sp}}</td>
                                    <td>
                                        <img src="{{ asset($item->hinhanh_sp) }}" alt="" width = 60px heigth=60px>
                                    </td>
                                    <td>{{ $item->ten_lsp }}</td>
                                    <td>{{ number_format($item->gia_sp) }} VND</td>
                                    <td>
                                        @if ( $item->id_trangthai == 1)
                                            <a href=""><span class="badge bg-success">{{ $item->trangthai_sp}}</span></a>
                                        @elseif( $item->id_trangthai == 2)
                                            <a href=""><span class="badge bg-warning">{{ $item->trangthai_sp}}</span></a>
                                        @else
                                            <a href=""><span class="badge bg-danger">{{ $item->trangthai_sp }}</span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('sanpham.edit', ['id' => $item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('sanpham.delete', ['id' => $item->id]) }}">Xóa</a>
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
