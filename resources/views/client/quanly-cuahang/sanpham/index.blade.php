@extends('client.quanly-cuahang.template.master')

@section('title')
    Sản phẩm
@endsection

@section('title-page')
    Sản phẩm
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('sanpham.create') }}" class='btn btn-primary'>Thêm</a>
            </div>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Loại sản phẩm</th>
                            <th scope="col">Mô tả</th>
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
                                <td>{{ $item->ten_sp }}</td>
                                <td>{{ $item->ten_lsp }}</td>
                                <td>{{ $item->mota_sp }}</td>
                                <td>{{ $item->gia_sp }}</td>
                                <td>{{ $item->soluong_sp }}</td>


                                <td>
                                    <a href="{{ route('sanpham.edit', ['id'=>$item->id]) }}"><button class='btn btn-warning'>edit</button></a>
                                    <a href="{{ route('sanpham.delete', ['id'=>$item->id]) }}"><button class='btn btn-danger'>delete</button></a>
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