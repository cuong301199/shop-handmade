@extends('admin.template.master')

@section('title')
    Cửa hàng
@endsection

@section('title-page')
    Cửa hàng
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">

            </div>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên cửa hàng</th>
                            <th scope="col">Tên chủ cửa hàng</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Trạng thái</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($danhsach as $item)

                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td>{{ $item->ten_ch }}</td>
                                <td>{{ $item->ten_nd }}</td>
                                <td>{{ $item->sdt_ch }}</td>
                                <td>{{ $item->diachi_ch }}</td>
                                <td>
                                    @if ($item->trangthai_ch == 0)
                                        <a href=""><button class="btn btn-light" class='btn btn-danger'>Đang chờ
                                                duyệt</button></a>

                                        <a href="{{ route('cuahang.eccep', ['id' => $item->id]) }}"><button
                                                class="btn btn-primary">Duyệt cửa hàng</button></a>

                                    @elseif($item->trangthai_ch == 1)
                                        <a href=""><button class="btn btn-light" class='btn btn-danger'>Đang hoạt
                                                động</button></a>

                                        <a href="{{ route('cuahang.stop', ['id' => $item->id]) }}"><button
                                                class='btn btn-danger'>Khóa cửa hàng</button></a>
                                    @else
                                        <a href=""><button class="btn btn-light" class='btn btn-danger'>Đang bị
                                                khóa</button></a>

                                        <a href="{{ route('cuahang.eccep', ['id' => $item->id]) }}"><button
                                                class='btn btn-success'>Mở khóa</button></a>

                                    @endif
                                </td>


                            </tr>
                        @endforeach

                    </tbody>
                </table>

                <!-- ./col -->
            </div>


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
