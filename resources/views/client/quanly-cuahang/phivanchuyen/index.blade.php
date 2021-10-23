@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection
{{-- {{ dd($danhsach) }} --}}
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
                    <a href="{{ route('phivanchuyen.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tỉnh/thành phố</th>
                                <th scope="col">Quận/huyện</th>
                                <th scope="col">Xã/phường</th>
                                <th scope="col">Phí vận chuyển</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($danhsach as $item)
                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $item->name_tp }}</td>
                                    <td>{{ $item->name_qh }}</td>
                                    <td>{{ $item->name_xa }}</td>
                                    <td>{{ $item->phi_pvc }} VND</td>
                                    <td>
                                        <a href=""><button
                                                class='btn btn-warning'>Chỉnh sửa</button></a>
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
