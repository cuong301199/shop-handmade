@extends('admin.template.master')

@section('title')
    Mã giảm giá
@endsection

@section('title-page')
    Mã giảm giá
@endsection
@section('content')



    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('coupon.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm mã giảm giá</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Danh sách mã giảm giá</h3>
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
                                <th scope="col">Tên mã giảm giá</th>
                                <th scope="col">Mã</th>
                                <th scope="col">Giá trị giảm</th>
                                <th style="width: 15%" scope="col">Thao tác</th>

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach as $item)
                                <tr >
                                    <td>{{ $stt++ }}</td>
                                    <td>{{  $item->ten_mgg}}</td>
                                    <td>{{  $item->ma_mgg}}</td>
                                    @if($item->dieukien_mgg == 1)
                                    <td>{{ number_format($item->giatri_mgg)}} VDN</td>
                                    @else
                                    <td>{{$item->giatri_mgg}}%</td>
                                    @endif
                                    <td class="text-right">
                                        <a href=""><span class="badge bg-warning">Chi tiết</span></a>
                                        <a class="twitter badge bg-danger" data-title="Thông báo" href="{{ route('coupon.delete', ['id'=>$item->id]) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                {{-- <div class="float-right">{{$danhsach->links()}}</div> --}}
                            </div>
                        </div>
                      </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
        </section>
        @push('addCity')
        @if(Session::has('success'))
        <script>
            swal({
                title: "Thông báo",
                text: "Thêm mã giảm giá thành công",
                icon: "success",
                button: "Đóng",
                });
        </script>
        @endif
        @if(Session::has('delete-success'))
        <script>
            swal({
                title: "Thông báo",
                text: "Xóa mã giảm giá thành công",
                icon: "success",
                button: "Đóng",
                });
        </script>
        @endif
        <script>
        $('a.twitter').confirm({
            content: "Bạn có muốn xóa mã giảm giá này",
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
