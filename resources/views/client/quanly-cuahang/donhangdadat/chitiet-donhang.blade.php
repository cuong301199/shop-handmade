
@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection
{{-- {{ dd($ttvc) }} --}}
@section('title-page')
    Sản phẩm
@endsection
@section('content')
<?php  $stt=1 ?>
{{-- thông tin khách hàng --}}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Thông tin giao hàng</h3>
            </div>
            <div class="card-body ">
                <label>Tên người nhận :  </label><span>{{ $khachhang->ten_nd }}</span><br>
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
            {{-- <div class="card-footer ">
                <label for="">Cập nhật trạng thái đơn hàng</label>
                <form class="form-inline col-md-8" action="{{ route('accepOder', ['id'=>$ttvc->id]) }}" method="get">
                    @csrf
                    <div class="form-group  mb-2 ">
                        <select name="id_tt" id="" class="form-control quanHuyen">
                            <option value="">chọn trạng thái</option>
                            <option value="2">Xác nhận đơn hàng</option>
                            <option value="3">Đang giao hàng</option>
                            <option value="4">Đã nhận hàng</option>
                            <option value="5">Hủy đơn hàng</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">Cập nhật</button>
                  </form>

            </div> --}}
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
              <h3 class="card-title">Chi tiết hóa đơn</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: ">#</th>
                        <th style="width:10%">Hình ảnh</th>
                        <th style="width:40% ">Tên sản phẩm</th>
                        <th style="width: ">Số lượng</th>
                        <th style="width: ">Đơn giá</th>
                        <th style="width:">Thành tiền</th>
                    </tr>
                </thead>
                <?php $stt = 1; ?>
                <tbody>
                @foreach ($danhsach as  $item)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td> <img src="{{ asset($item->hinhanh_sp) }}" alt="" width = 60px heigth=60px></td>
                        <td>{{ $item->ten_sp }} </td>
                        <td>{{ $item->so_luong }}</td>
                        <td>{{  number_format($item->gia_sp) }} VND</td>
                        <td>{{  number_format($item->gia_sp*$item->so_luong )}} VND</td>
                    </tr>
                @endforeach
                <tr>
                    <td>Tổng tiền</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <strong>Tổng tiền :{{ number_format( $khachhang->tong_tien - $khachhang->phivanchuyen_hd) }} VND</strong>
                        <h6>Phí vận chuyển :{{ number_format( $khachhang->phivanchuyen_hd)}} VND</h6>
                        <h6>Tổng đơn hàng : {{ number_format( $khachhang->tong_tien)}} VND</h6>
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

@endsection




