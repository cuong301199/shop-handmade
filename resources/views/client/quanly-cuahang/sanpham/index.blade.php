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
                    <a href="{{ route('sanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($danhsach as $item)
                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $item->ten_sp  }}</td>
                                    <td>
                                        <img src="{{ asset($item->hinhanh_sp) }}" alt="" width = 50px heigth=50px>
                                    </td>
                                    <td>{{ $item->ten_lsp }}</td>
                                    <td>{{ $item->gia_sp }} VND</td>
                                    <td>{{ $item->soluong_sp }}</td>
                                    <td>
                                        <a href="{{ route('sanpham.edit', ['id' => $item->id]) }}"><button
                                                class='btn btn-warning'>Chỉnh sửa</button></a>
                                        <a href="{{ route('sanpham.delete', ['id' => $item->id]) }}"><button
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
