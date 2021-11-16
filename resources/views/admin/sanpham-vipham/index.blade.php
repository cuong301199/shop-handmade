@extends('admin.template.master')

@section('title')
   Sản phẩm vi phạm
@endsection

@section('title-page')
Sản phẩm vi phạm
@endsection
@section('content')
{{-- {{ dd($danhsach) }} --}}
<section class="content">
    <div class="container-fluit">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                      <h3 class="card-title"> Sản phẩm vi phạm</h3>
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
                                    <option value="email">Email</option>
                                    <option value="ten_nd" >Tên người dùng</option>
                                    <option value="ten_tk" >Tên tài khoản</option>
                                    <option value="sdt" >Số điện thoại</option>
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
                            <th style="width:5%">STT</th>
                            <th style="width:20%" scope="col">Tên sản phẩm</th>
                            <th style="width:10%"scope="col">Hình ảnh </th>
                            <th style="width:10%" scope="col">Tên người bán</th>
                            <th style="width:10%" scope="col">Ngày đăng</th>
                            <th style="width:14%" scope="col">Thao tác</th>
                          </tr>
                        </thead>
                        <?php $stt = 1; ?>

                        <tbody>
                            @foreach ($danhsach as $item)
                            <tr>
                                <th scope="row">{{$stt++}}</th>
                                <td>{{$item->ten_sp}}</td>
                                <td>
                                    <img src="{{asset($item->hinhanh_sp)}}" alt="" width="90px" height="90px">
                                </td>
                                <td>{{$item->ten_nd}}</td>
                                <td class="text-center">{{  \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                <td class="text-right">
                                    <a href="{{ route('chitietsanpham.index', ['id'=>$item->id]) }}"><span class="badge bg-warning">Xem sản phẩm</span></a>
                                    <a href="{{ route('product-report-detail.index', ['id'=>$item->id]) }}"><span class="badge bg-info">Chi tiết</span></a>
                                    <a href="{{ route('loaisanpham.edit', ['id'=>$item->id]) }}"><span class="badge bg-danger">Xóa</span></a>
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
