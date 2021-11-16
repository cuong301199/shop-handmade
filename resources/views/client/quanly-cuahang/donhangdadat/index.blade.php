@extends('client.quanly-cuahang.template.master')

@section('title')
    Đơn hàng
@endsection

@section('title-page')
Đơn hàng
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
                                        <option value="code">Mã đơn hàng</option>
                                        <option value="ten" >Tên người bán</option>
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
                                <th style="width: 5%">#</th>
                                <th style="width:10% ">Mã đơn hàng</th>
                                <th style="width:20% ">Sản phẩm</th>
                                <th style="width:10% ">Tên người bán</th>
                                <th style="width:10% ">Tổng tiền</th>
                                <th style="width: 10% ">Ngày đặt hàng</th>
                                <th style="width:8%">Trạng thái</th>
                                <th style="width:10%">Thao tác</th>

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>
                            <tbody>

                            @foreach ( $oder as  $item)
                            <?php
                            $id_hd = $item->id;
                            $sp = DB::table('hoa_don')
                            ->join('chi_tiet_hoa_don','chi_tiet_hoa_don.id_hd','hoa_don.id')
                            ->join('san_pham','san_pham.id','chi_tiet_hoa_don.id_sp')
                            ->where('chi_tiet_hoa_don.id_hd',$id_hd)
                            ->select('chi_tiet_hoa_don.*','san_pham.*','hoa_don.*')
                            ->get();
                            $nguoiban = DB::table('hoa_don')
                            ->join('nguoi_dung','nguoi_dung.id','hoa_don.id_nb')
                            ->where('hoa_don.id_nb',$item->id_nb)
                            ->first()
                            ?>
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $item->ma_hd }}</td>
                                    <td>
                                        @foreach ($sp as $key)
                                        <li>
                                            {{ $key->ten_sp }}
                                        </li>
                                        @endforeach
                                    </td>
                                    <td><a href="">{{ $nguoiban->ten_nd }}</a></td>
                                    <td>{{ number_format($item->tong_tien) }} VND</td>
                                    <td class="text-center">{{  \Carbon\Carbon::parse($item->created_at)->format('d/m/Y')}}</td>
                                    <td>
                                        @if ( $item->id_tt == 1)
                                            <a href=""><span class="badge bg-warning">{{ $item->ten_tt }}</span></a>
                                        @elseif( $item->id_tt == 2)
                                            <a href=""><span class="badge bg-primary">{{ $item->ten_tt }}</span></a>
                                        @elseif( $item->id_tt == 3)
                                            <a href=""><span class="badge bg-info">{{ $item->ten_tt }}</span></a>
                                        @elseif( $item->id_tt == 4)
                                            <a href=""><span class="badge bg-success">{{ $item->ten_tt }}</span></a>
                                        @else
                                            <a href=""><span class="badge bg-danger">{{ $item->ten_tt }}</span></a>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('oder.detail', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a href=""><span class="badge bg-danger">Xóa</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                <div class="float-right">{{$oder->links()}}</div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
