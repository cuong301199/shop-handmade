@extends('admin.template.master')

@section('title')
    Loại sản phẩm
@endsection

@section('title-page')
    Loại sản phẩm
@endsection
@section('content')


    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <a href="{{ route('loaisanpham.create') }}" class='btn btn-primary'>Thêm</a>
            </div>

            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên loại sản phẩm</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($danhsach_lsp as $item)
                            <tr>
                                <th scope="row">{{ $stt++ }}</th>
                                <td>{{ $item->ten_lsp }}</td>
                                <td>{{ $item->ten_dm }}</td>
                                <td>
                                    <a href="{{ route('loaisanpham.edit', ['id'=>$item->id]) }}"><button class='btn btn-warning'>edit</button></a>
                                    <a href="{{ route('loaisanpham.delete', ['id' => $item->id]) }}"><button
                                            class='btn btn-danger'>delete</button></a>
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
