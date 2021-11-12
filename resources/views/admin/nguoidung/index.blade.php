@extends('admin.template.master')

@section('title')
    Người dùng
@endsection

@section('title-page')
    Người dùng
@endsection
@section('content')
{{-- {{ dd($danhsach) }} --}}
<section class="content">
    <div class="container-fluit">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Danh sách người dùng</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th style="width: ">STT</th>
                            <th scope="col">Tên người dùng</th>
                            <th scope="col">Tên tài khoản</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Email</th>
                            <th style="width:10%" scope="col">Thao tác</th>

                          </tr>
                        </thead>
                        <?php $stt = 1; ?>

                        <tbody>
                            @foreach ($danhsach as $item)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
                                <td>{{$item->ten_nd}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->sdt_nd}}</td>
                                <td>{{$item->email_nd}}</td>
                                <td>
                                    <a href="{{ route('loaisanpham.edit', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <div class="col-md-12 pull-right">
                            <div class="pull-right">{{$danhsach->links()}}</div>
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
