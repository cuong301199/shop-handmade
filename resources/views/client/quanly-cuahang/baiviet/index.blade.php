@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection

@section('title-page')
    Sản phẩm
@endsection
@section('content')

    @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif
    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('baiviet.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm bài viết</a>
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
                                <th style="width:5%px">STT</th>
                                <th style="width:30%" scope="col">Tiêu đề bài viết</th>
                                <th style="width:10%">Hình ảnh</th>
                                <th style="width:33%" scope="col">Tóm tắt</th>
                                <th style="width:10%" scope="col">Ngày viết</th>
                                <th style="width:">Thao tác</th>
                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach as $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{$item->tieude_bv}}</td>
                                    <td>
                                        <img src="{{ asset($item->hinhanh_bv) }}" alt="" width = 60px heigth=60px>
                                    </td>
                                    <td>{!! Str::limit($item->tomtat_bv, 100); !!}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a href="{{ route('baiviet.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a href="{{ route('baiviet.delete', ['id'=>$item->id]) }}"><span class="badge bg-danger">Xóa</span></a>
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
@endsection
