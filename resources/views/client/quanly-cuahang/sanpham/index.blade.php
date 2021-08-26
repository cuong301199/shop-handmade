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
                <a href="" class='btn btn-primary'>Thêm</a>
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
                            <th scope="col">Thao tác</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>

                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href=""><button class='btn btn-warning'>edit</button></a>
                                <a href=""><button class='btn btn-danger'>delete</button></a>
                            </td>


                        </tr>


                    </tbody>
                </table>

                <!-- ./col -->
            </div>


            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>



@endsection
