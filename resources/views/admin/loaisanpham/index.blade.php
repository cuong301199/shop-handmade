@extends('admin.template.master')

@section('title')
    Loại sản phẩm
@endsection

@section('title-page')
    Loại sản phẩm
@endsection
@section('content')



    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('loaisanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm danh mục</a>
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
                                <th scope="col">Tên loại sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thao tác</th>

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach_lsp as $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{  $item->ten_lsp  }}</td>
                                    <td>{{$item->ten_dm}}</td>
                                    <td>
                                        <a href="{{ route('loaisanpham.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('loaisanpham.delete', ['id' => $item->id]) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="col-md-12 pull-right">
                                <div class="pull-right">{{$danhsach_lsp->links()}}</div>
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
