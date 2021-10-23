@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection

@section('title-page')
    Sản phẩm
@endsection
@section('content')
    @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif
    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên người đặt</th>
                                {{-- <th scope="col">Tổng đơn hàng</th> --}}
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
                                    {{-- <td>
                                        @if ($mgg!=null)
                                            @if ($mgg->dieukien_mgg ==1 )
                                            {{ $khachhang->tong_tien  - ($khachhang->tong_tien *  $mgg->giatri_mgg /100)+  $khachhang->phi_van_chuyen}}
                                            @else
                                            {{ $khachhang->tong_tien -$mgg->giatri_mgg +  $khachhang->phi_van_chuyen}}
                                            @endif
                                        @else
                                        {{ $khachhang->tong_tien +  $khachhang->phi_van_chuyen}}
                                        @endif
                                    </td> --}}
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
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
