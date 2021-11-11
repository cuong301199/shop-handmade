@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection
{{-- {{ dd($oder) }} --}}
@section('title-page')
    Sản phẩm
@endsection
@section('content')
    @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif
    <section class="content">
        <div class="container-fluit">
            {{-- <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên người đặt</th>
                                <th scope="col">Tổng đơn hàng</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Tình trạng đơn hàng</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ( $oder as  $item)
                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $item->ten_nd}}</td>
                                    <td>{{ $item->tong_tien}}</td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->subHours(7)->diffForHumans() }}</td>
                                    <td>{{ $item->ten_tt }}</td>
                                    <td>
                                        <a href="{{ route('oder.detail', ['id'=>$item->id]) }}"><button
                                                class='btn btn-warning'>Chi tiết đơn hàng</button></a>
                                        <a href=""><button
                                                class='btn btn-danger'>Xóa</button></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Bordered Table</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: ">#</th>
                                <th style="width:15%">Tên khách hàng</th>
                                <th style="width:30% ">Địa chỉ</th>
                                <th style="width: ">Tổng tiền</th>
                                <th style="width: ">Ngày đặt hàng</th>
                                <th style="width:">Trạng thái</th>
                                <th style="width:">Thao tác</th>

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>
                            <tbody>
                            @foreach ( $oder as  $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{ $item->ten_nd}}</td>
                                    <td>{{ $item->diachi_ttvc }},{{ $item->name_tp }},{{ $item->name_qh }},{{ $item->name_xa }}
                                    </td>
                                    <td>{{ number_format( $item->tong_tien) }} VND</td>
                                    <td>{{ $item->created_at }}</td>
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
                                        <a href="{{ route('manage_oder.detail', ['id'=>$item->id]) }}"><span class="badge bg-warning">Chi tiết</span></a>
                                        <a class="twitter badge bg-danger" data-title="Thông báo" href="">hủy</a>
                                    </td>
                                </tr>
                            @endforeach
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
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@push('addCity')
    <script>
        $('a.twitter').confirm({
            content: "Bạn có hủy đơn hàng này",
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
