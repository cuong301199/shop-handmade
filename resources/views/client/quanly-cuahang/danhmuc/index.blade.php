@extends('client.quanly-cuahang.template.master')

@section('title')
    Danh mục
@endsection

@section('title-page')
    Danh mục
@endsection
@section('content')
    {{-- @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif --}}
    {{-- {{ dd($danhsach_dm) }} --}}


    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-12">
                    @if (empty($danhsach_dm))
                    <a href="{{ route('quanlydanhmuc.create') }}" class='btn btn-primary'
                    style="margin-bottom: 10px">Chọn danh mục</a>
                    @else
                    <a href="{{ route('quanlydanhmuc.edit') }}" class='btn btn-primary'
                    style="margin-bottom: 10px">Sửa danh mục</a>
                    @endif

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Thao tác</th>


                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1; ?>
                            @foreach ($danhsach as $item)

                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $item->ten_dm }}</td>

                                    <td>

                                        <a
                                            href="{{ route('quanlydanhmuc.delete', ['id_nb' => $item->id_nb, 'id_dm' => $item->id_dm]) }}"><button
                                                class='btn btn-danger'>delete</button></a>
                                    </td>


                                </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <!-- ./col -->
                </div>

            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
