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
                    <a href="{{ route('sanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px">Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <h3 class="card-title">Sản</h3> --}}
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
                                            <option value="ten_dm">Danh mục</option>
                                            <option value="ten_lsp" >Loại sản phẩm</option>
                                        </select>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered  ">
                                <thead>
                                    <tr class="text-center">
                                        <th style="width: ">STT</th>
                                        <th style="width:25% ">Tên sản phẩm</th>
                                        <th style="width: ">Hình ảnh</th>
                                        <th style="width: ">Loại sản phẩm</th>
                                        <th style="width: ">Danh mục</th>
                                        <th style="width: ">Giá</th>
                                        <th style="width: ">Trạng thái</th>
                                        <th style="width:11% " class="text-right">Thao tác</th>
                                    </tr>
                                </thead>
                                <?php $stt = 1; ?>

                                <tbody>
                                    @foreach ($danhsach as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->ten_sp }}</td>
                                            <td>
                                                <img src="{{ asset($item->hinhanh_sp) }}" alt="" width=60px heigth=60px>
                                            </td>
                                            <td>{{ $item->ten_lsp }}</td>
                                            <td>{{ $item->ten_dm }}</td>
                                            <td>{{ number_format($item->gia_sp) }} VND</td>
                                            <td>
                                                @if ($item->id_trangthai == 1)
                                                    <a href=""><span
                                                            class="badge bg-success">{{ $item->trangthai_sp }}</span></a>
                                                @elseif( $item->id_trangthai == 2)
                                                    <a href=""><span
                                                            class="badge bg-warning">{{ $item->trangthai_sp }}</span></a>
                                                @else
                                                    <a href=""><span
                                                            class="badge bg-danger">{{ $item->trangthai_sp }}</span></a>
                                                @endif
                                            </td>
                                            <td class="text-right">
                                                <a href="{{ route('sanpham.edit', ['id' => $item->id]) }}"><span
                                                        class="badge bg-warning">Chi tiết</span></a>
                                                <a class="twitter badge bg-danger" data-title="Thông báo"
                                                    href="{{ route('sanpham.delete', ['id' => $item->id]) }}">Xóa</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                <div class="float-right">{{ $danhsach->links() }}</div>
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
            $(document).ready(function () {
                $('a.twitter').confirm({
                    content: "Bạn có muốn xóa sản phẩm này",
                });
                $('a.twitter').confirm({
                    buttons: {
                        hey: function() {
                            location.href = this.$target.attr('href');
                        }
                    }
                });


                    // $('.timKiem').click(function (e) {
                    //     var key = $('.key').val();
                    //     var url = $(this).children("option:selected").val();
                    //     // if(url){
                    //         window.location = url;
                    //     // }
                    //     // $('#form-oder').submit();
                    //     });
            });
        </script>
    @endpush
@endsection
