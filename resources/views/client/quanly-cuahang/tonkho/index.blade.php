@extends('client.quanly-cuahang.template.master')

@section('title')
    Tồn kho
@endsection

@section('title-page')
    Tồn kho
@endsection
@section('content')

    @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif
    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
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
                                        <th style="width:20% ">Số lượng kho</th>
                                        <th style="width: ">Số lượng đã bán</th>

                                    </tr>
                                </thead>
                                <?php $stt = 1; ?>
                                {{-- {{ dd($product) }} --}}
                                <tbody>
                                    @foreach ($product as $item)
                                        <tr>
                                            <td>{{ $stt++ }}</td>
                                            <td>{{ $item->ten_sp }}</td>
                                            <td class="text-center">
                                                <img src="{{ asset($item->hinhanh_sp) }} " alt="" width=60px heigth=60px>
                                            </td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <input class="qty_{{$item->id }}"  type="number" value="{{ $item->soluong_sp }}" style="width:100%">
                                                        <input class="id_sp_{{ $item->id }}"  type="hidden" value="{{ $item->soluong_sp }}" style="width:100%">

                                                    </div>
                                                    <div class="col-md-6">
                                                        <button type="button" class="btn btn-light submit-qty" data-id_sp="{{ $item->id }}"style="height: 35px">Cập nhật</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $item->soluong_daban }} Sản phẩm</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                <div class="float-right">{{ $product->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @push('addCity')
        <script>
            $(document).ready(function () {
                $('.submit-qty').click(function (e) {
                    e.preventDefault();
                    var id_sp = $(this).data('id_sp');
                    var qty = $('.qty_'+id_sp).val();
                    $.ajax({
                        type: "get",
                        url: "/client/update/qty/inventory",
                        data: {
                            id_sp:id_sp,
                            qty:qty
                        },
                        success: function (response) {
                            swal({
                            title: "Thông báo",
                            text: "Cập nhật số lượng thành công",
                            icon: "success",
                            button: "Đóng",
                            });
                            // location.reload();
                            setInterval('location.reload()', 2000);
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
