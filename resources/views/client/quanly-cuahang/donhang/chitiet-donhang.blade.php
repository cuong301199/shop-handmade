@extends('client.quanly-cuahang.template.master')

@section('title')
    Chi tiết đơn hàng
@endsection

@section('title-page')
Chi tiết đơn hàng
@endsection
@section('content')
<?php  $stt=1 ?>
{{-- thông tin khách hàng --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Thông tin khách hàng</h3>
            </div>
            <div class="card-body ">
                <label>Tên khách hàng :  </label><span>{{ $khachhang->ten_nd }}</span><a href="{{ route('cuahang.index', ['id' => $khachhang->id_nm ]) }}"><span class="badge bg-dark ml-2 ">Xem trang cá nhân</span></a><br>
                <label>Địa chỉ : </label><span>{{ $ttvc->diachi_ttvc }},{{ $ttvc->name_tp }},{{ $ttvc->name_qh }},{{ $ttvc->name_xa }}</span><br>
                <label>Số điện thoại :  </label><span>{{ $ttvc->sdt_ttvc }}</span><br>
                <label>Email :  </label><span>{{ $ttvc->email_nd }}</span><br>
                <label>Trạng thái :
                @if ( $ttvc->id_tt == 1)
                    <a href=""><span class="badge bg-warning">{{ $ttvc->ten_tt }}</span></a>
                @elseif( $ttvc->id_tt == 2)
                    <a href=""><span class="badge bg-primary">{{ $ttvc->ten_tt }}</span></a>
                @elseif( $ttvc->id_tt == 3)
                    <a href=""><span class="badge bg-info">{{ $ttvc->ten_tt }}</span></a>
                @elseif( $ttvc->id_tt == 4)
                    <a href=""><span class="badge bg-success">{{ $ttvc->ten_tt }}</span></a>
                @else
                    <a href=""><span class="badge bg-danger">{{ $ttvc->ten_tt }}</span></a>
                @endif
            </div>
            <div class="card-footer ">
                <label for="">Cập nhật trạng thái đơn hàng</label>
                <form class="form-inline col-md-8" action="{{ route('accepOder', ['id'=>$ttvc->id]) }}" method="get">
                    @csrf
                    <div class="form-group  mb-2 ">
                        <select name="id_tt" id="" class="form-control order_detail">
                            <option value="">chọn trạng thái</option>
                            <option value="2" @if ($khachhang->id_tt==2) selected @endif>Xác nhận đơn hàng</option>
                            <option value="3" @if ($khachhang->id_tt==3) selected @endif>Đang giao hàng</option>
                            <option value="4" @if ($khachhang->id_tt==4) selected @endif>Đã nhận hàng</option>
                            <option value="5" @if ($khachhang->id_tt==5) selected @endif>Hủy đơn hàng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>


            </div>
        </div>
    </div>
</div>
{{-- {{ dd($khachhang) }} --}}
{{-- {{ dd($danhsach) }} --}}
{{-- Chi tiết đơn hàng --}}
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
              <h3 class="card-title">Chi tiết đơn hàng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center"style="width: ">#</th>
                        <th class="text-center" style="width:10%">Hình ảnh</th>
                        <th class="text-center" style="width:20% ">Tên sản phẩm</th>
                        <th class="text-center" style="width:9% ">Số lượng kho</th>
                        <th class="text-center" style="width: 15%">Số lượng</th>
                        @if ($khachhang->magiamgia!=null)
                        <th class="text-center" style="width:10%">Tên mã giảm giá</th>
                        @endif
                        <th class="text-center" style="width: ">Đơn giá</th>
                        <th class="text-center" style="width:">Thành tiền</th>
                    </tr>
                </thead>
                <?php $stt = 1; ?>
                <tbody>
                    {{-- {{ dd($khachhang) }} --}}
                @foreach ($danhsach as  $item)
                    <tr class="color_{{ $item->id_sp }}">
                        <td>{{ $stt++ }}</td>
                        <td> <img src="{{ asset($item->hinhanh_sp) }}" alt="" width = 60px heigth=60px></td>
                        <td>{{ $item->ten_sp }} </td>
                        <td class="text-center">{{ $item->soluong_sp }} </td>
                        <td class="text-center">
                            <div class="row">
                                <div class="col-md-4">
                                    @if ($khachhang->id_tt != 3 && $khachhang->id_tt != 5 )
                                    <input class="qty_{{ $item->id_sp }}"  type="number" value="{{ $item->so_luong }}" style="width:50px">
                                    @else
                                    <input class="qty_{{ $item->id_sp }}"disabled type="number" value="{{ $item->so_luong }}" style="width:50px">
                                    @endif
                                    <input class="qty" type="hidden" value="{{ $item->so_luong }}" style="width:50px">

                                    <input class="soluong_kho_{{ $item->id_sp }}" type="hidden" name="" value="{{ $item->soluong_sp }}">
                                    <input class="soluong_order_{{ $item->id_sp }}" type="hidden" value="{{ $item->so_luong }}" style="width:50px">
                                    <input class="order_product_id" type="hidden" value="{{ $item->id_sp }}" style="width:50px">

                                    <input class="form-control cthd_hd_{{  $item->id_sp }}" type="hidden" name="" value="{{ $item->id }}">
                                    <input class="form-control id_hd" type="hidden" name="" value="{{ $item->id_hd }}">

                                    <input class="form-control id_tt_present" type="hidden" name="" value="{{ $item-> }}">
                                </div>
                                @if ($khachhang->id_tt != 3 && $khachhang->id_tt != 5 )
                                <div class="col-md-8">
                                    <button type="button" class="btn btn-light submit-qty" data-id_product="{{ $item->id_sp }}"style="height: 35px">Cập nhật</button>
                                </div>
                                @endif
                            </div>
                        </td>
                        @if ($khachhang->magiamgia!=null)
                        <td>{{ $item->magiamgia }}</td>
                        @endif
                        <td>{{ number_format( $item->gia_sp) }} VND</td>
                        <td>{{  number_format($item->gia_sp*$item->so_luong) }} VND</td>
                        <input type="hidden" name="id_sp[]" value="{{ $item->id_sp }}">
                        <input type="hidden" name="soluong_sp[]" value="{{ $item->so_luong }}">
                    </tr>
                @endforeach
            </form>
                <tr>
                    <td>Tổng tiền</td>
                    <td></td>
                    <td></td><td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php
                            $coupon = DB::table('ma_giam_gia')->where('ma_mgg',$khachhang->magiamgia)->first();
                        ?>
                       @if ($khachhang->magiamgia==null)
                       <h6>Tổng tiền :{{ number_format( $khachhang->tong_tien - $khachhang->phivanchuyen_hd) }} VND</h6>
                        <h6>Phí vận chuyển :{{ number_format( $khachhang->phivanchuyen_hd)}} VND</h6>
                       <strong>Tổng đơn hàng : {{ number_format( $khachhang->tong_tien)}} VND</strong>
                    @else
                        @if($coupon->dieukien_mgg==1)
                            <h6>Tổng tiền :{{ number_format( $khachhang->tong_tien - $khachhang->phivanchuyen_hd +  $coupon->giatri_mgg) }} VND</h6>
                            <h6>Phí vận chuyển :{{ number_format( $khachhang->phivanchuyen_hd)}} VND</h6>
                            <h6>Giá trị mã giảm giá :{{ number_format( $coupon->giatri_mgg)}} VND</h6>
                           <strong>Tổng đơn hàng : {{ number_format( $khachhang->tong_tien)}} VND</strong>
                        @else
                            <?php  ?>
                            <h6>Tổng tiền :{{ number_format( $khachhang->tong_tien - $khachhang->phivanchuyen_hd +  $khachhang->sotiengiam) }} VND</h6>
                            <h6>Phí vận chuyển :{{ number_format( $khachhang->phivanchuyen_hd)}} VND</h6>
                            <h6>Giá trị mã giảm giá :{{ $coupon->giatri_mgg }}% </h6>
                            <h6>Số tiền giảm :{{ number_format( $khachhang->sotiengiam)}} VND</h6>
                            <strong>Tổng đơn hàng : {{ number_format( $khachhang->tong_tien)}} VND</strong>
                        @endif
                    @endif

                    </td>

                </tr>
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
@push('accepOder')
    <script>
        $(document).ready(function () {
            $('.submit-qty').click(function (e) {
                e.preventDefault();


                var id_sp = $(this).data('id_product');
                var qty = $('.qty_'+id_sp ).val();
                var cthd_hd = $('.cthd_hd_'+id_sp).val();
                var id_hd = $('.id_hd').val();

                console.log(id_sp)
                console.log(qty)
                console.log(cthd_hd)

                $.ajax({
                    type: "get",
                    url: "/client/update/qty",
                    data: {
                        qty:qty,
                        id_sp:id_sp,
                        cthd_hd:cthd_hd,
                        id_hd:id_hd,
                    },
                    success: function (data) {

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
            $('.order_detail').change(function (e) {
                e.preventDefault();
                var id_tt = $('.order_detail').find(":selected").val();
                var id_hd = $('.id_hd').val();
                order_product_id = [];
                $(".order_product_id").each(function(){
                    order_product_id.push($(this).val());
                })
                soluong_sp = [];
                $(".qty").each(function(){
                    soluong_sp.push($(this).val());
                })

                j=0;
                for(i=0 ; i< order_product_id.length; i++){
                    var order_qty = $('.soluong_order_'+order_product_id[i]).val();
                    var order_qty_storage = $('.soluong_kho_'+order_product_id[i]).val();
                    if(parseInt(order_qty) > parseInt(order_qty_storage)){
                        j++;
                        alert('số lượng không đủ');
                        $('.color_'+order_product_id[i]).css('background','#e80d2b78');
                    }
                }
                if(j==0){
                   $.ajax({
                       type:"get",
                       url: "/client/accep-oder/",
                       data: {
                            id_tt:id_tt,
                            id_hd:id_hd,
                            order_product_id:order_product_id,
                            soluong_sp:soluong_sp,
                       },
                       success: function (data) {
                            swal({
                                title: "Thông báo",
                                text: "Cập nhật trạng thái đơn hàng  thành công",
                                icon: "success",
                                button: "Đóng",
                                });
                                // location.reload();
                                setInterval('location.reload()', 2000);

                       }
                   });

                }
            });
        });
    </script>
    @if(Session::has('success-aceepOder-3'))
        <script>
            swal({
                title: "Thông báo",
                text: "Đã cập nhập trạng thái đơn hàng và số lượng trong kho",
                icon: "success",
                button: "Đóng",
                });
        </script>
    @endif
    @if(Session::has('success-aceepOder'))
        <script>
            swal({
                title: "Thông báo",
                text: "Đã cập nhập trạng thái đơn hàng",
                icon: "success",
                button: "Đóng",
                });
        </script>
    @endif
@endpush
@endsection




