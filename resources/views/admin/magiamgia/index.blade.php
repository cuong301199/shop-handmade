@extends('admin.template.master')

@section('title')
    Mã giảm giá
@endsection

@section('title-page')
    Mã giảm giá
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('coupon.create') }}" class='btn btn-primary'>Thêm</a>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên mã giảm giá</th>
                            <th scope="col">Mã giảm</th>
                            <th scope="col">Điều kiện</th>
                            <th scope="col">Giá trị</th>
                            <th scope="col">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($danhsach as $item)
                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td>{{ $item->ten_mgg }}</td>
                                <td>{{ $item->ma_mgg }}</td>
                                @if($item->dieukien_mgg == 1)
                                <td>Giảm theo %</td>
                                @else
                                <td>Giảm theo tiền</td>
                                @endif
                                <td>{{ $item->giatri_mgg }}</td>
                                <td>
                                    <a href=""><button class='btn btn-warning'>Chỉnh sửa</button></a>
                                    <a href=""><button
                                            class='btn btn-danger'>Xóa</button></a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>



@endsection
