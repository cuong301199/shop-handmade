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
                    <a href="{{ route('loaisanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm loại sản phẩm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Danh sách danh mục</h3>
                          <div class="card-tools">
                            <form action="" class="form-inline">
                                <div class="input-group input-group-sm" style="width: 500px;">
                                    <input type="text" name="key" class="form-control float-right key"
                                        placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search timKiem"></i></button>
                                    </div>
                                    <select name="orderBy"  id="by" class="form-control xaPhuong" style="width: 250px;">
                                        <option value=null>Tìm kiếm theo</option>
                                        <option value="code">Danh mục</option>
                                        <option value="ten" >Loại Sản phẩm</option>
                                    </select>
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
                                <th scope="col">Tên loại sản phẩm</th>
                                <th scope="col">Danh mục</th>
                                <th style="width: 15%" scope="col">Thao tác</th>

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach_lsp as $item)
                                <tr >
                                    <td>{{ $stt++ }}</td>
                                    <td>{{  $item->ten_lsp  }}</td>
                                    <td>{{$item->ten_dm}}</td>
                                    <td class="text-right">
                                        <a href="{{ route('loaisanpham.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('loaisanpham.delete', ['id' => $item->id]) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                <div class="float-right">{{$danhsach_lsp->links()}}</div>
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
