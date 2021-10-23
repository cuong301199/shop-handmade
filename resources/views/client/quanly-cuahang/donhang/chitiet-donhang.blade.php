@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection

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
          <h3 class="card-title">Thông tin khách hàng</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Số điện thoại</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>{{ $khachhang->ten_nd }}</td>
                <td>{{ $khachhang->sdt_nd }}</td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
{{-- {{ dd($khachhang) }} --}}
{{-- thông tin vận chuyển --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Thông tin vận chuyển</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Địa chỉ</th>
                <th>Ghi chú</th>
                <th>Phí vận chuyển</th>
              </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{{ $khachhang->ten_nd }}</td>
                    <td>{{ $ttvc->diachi_ttvc }},{{ $ttvc->name_tp}},{{ $ttvc->name_qh }},{{ $ttvc->name_xa }}</td>
                    <td>{{ $khachhang->ghi_chu }}</td>
                    <td>{{ $khachhang->phi_van_chuyen }} VND</td>
                </tr>
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
{{-- {{ dd($khachhang) }} --}}
{{-- Chi tiết đơn hàng --}}
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Chi tiết đơn hàng</h3>
            <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
                </div>
            </div>
        </div>
        {{-- <!-- /.card-header -->{{ dd($danhsach) }} --}}
        <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên sản phẩm</th>
                  <th>Số lượng</th>
                    @if ($mgg!=null)
                    <th>Mã giảm giá</th>
                    @endif

                </tr>
              </thead>
              <tbody>
                @foreach ($danhsach as $item)
                <tr>
                    <td>1</td>
                    <td>{{ $item->ten_sp }}</td>
                    <td>{{ $item->so_luong }}</td>
                    @if ($mgg!=null)
                        <td>{{ $mgg->ma_mgg }}</td>
                    @endif


                </tr>

                @endforeach
                <?php

                ?>
                <tr>
                    <td></td>
                    @if ($mgg!=null)
                    <td>
                        <strong>Tổng tiền :{{ $khachhang->tong_tien}}</strong>
                        @if ($mgg->dieukien_mgg ==1 )
                        <h6>Mã giảm giá :{{ $mgg->giatri_mgg }} %</h6>
                        <h6>Số tiền giảm : {{ ($khachhang->tong_tien *  $mgg->giatri_mgg /100) }} VND</h6>
                        <h6>Phí vận chuyển :{{ $khachhang->phi_van_chuyen}} VND</h6>
                        <h6>Tổng đơn hàng : {{ $khachhang->tong_tien  - ($khachhang->tong_tien *  $mgg->giatri_mgg /100)+  $khachhang->phi_van_chuyen}}</h6>
                        @else
                        <h6>Mã giảm giá :{{ $mgg->giatri_mgg }} VND</h6></p>
                        {{-- <h6>Số tiền giảm : {{  $mgg->giatri_mgg }} VND</h6> --}}
                        <h6>Phí vận chuyển :{{ $khachhang->phi_van_chuyen}} VND</h6>
                        <h6>Tổng đơn hàng : {{ $khachhang->tong_tien -$mgg->giatri_mgg +  $khachhang->phi_van_chuyen}}</h6>
                        @endif

                    </td>
                    @else
                    <td>
                        <strong>Tổng tiền :{{ $khachhang->tong_tien}}</strong>
                        <h6>Phí vận chuyển :{{ $khachhang->phi_van_chuyen}} VND</h6>
                        <h6>Tổng đơn hàng : {{ $khachhang->tong_tien +  $khachhang->phi_van_chuyen}}</h6>
                    </td>
                    @endif
                </tr>
                <tr>
                    <td></td>
                    <td>
                        @if($khachhang->id_tt == 2)
                            <a href="{{ route('accepOder', ['id'=>$khachhang->id]) }}"><button
                            class='btn btn-success'>Xác nhận đơn hàng</button></a>
                        @elseif ($khachhang->id_tt == 3)
                            <a href=""><button
                                class='btn btn-success disabel'>Đơn hàng đang được giao</button></a>
                        @else
                            <a href=""><button
                                class='btn btn-success disabel'>Đã nhận hàng</button></a>
                        @endif
                    </td>
                </tr>
              </tbody>
            </table>
          </div>
        <div class="card-footer">
            <div class="card-tools">
                <ul class="pagination pagination-sm float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
</div>
@endsection





{{-- <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>STT</th>
          <th>Tên sản phẩm</th>
          <th>Số lượng</th>
        </tr>
      </thead>
      <tbody>
      @foreach ($danhsach as $item)
          <tr>
              <td>{{ $stt++ }}</td>
              <td>{{ $item->ten_sp }}</td>
              <td>{{ $item->so_luong }}</td>
          </tr>
      @endforeach
              <td><strong>TỔNG TIỀN  :{{ $item->tong_tien}} VND </strong> </td>
          <tr>
              <td><strong>TỔNG TIỀN  :{{ $item->tong_tien}} VND </strong> </td>
          </tr>
      </tbody>
    </table>
  </div> --}}
