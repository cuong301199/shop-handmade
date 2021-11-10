@extends('admin.template.master')

@section('title')
    Người dùng
@endsection

@section('title-page')
Người dùng
@endsection
@section('content')


<section class="content">
      <div class="container-fluid">
        {{-- <div class="row">
         <a href="{{ route('danhmuc.create')}}" class='btn btn-primary'>Thêm</a>
        </div> --}}

        <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên người dùng</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Thao tác</th>

                </tr>
            </thead>
            <tbody>
               <?php $stt=1 ?>
            @foreach($danhsach as $item)
                <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{$item->ten_nd}}</td>
                    <td>{{$item->sdt_nd}}</td>
                    <td>{{$item->email_nd}}</td>
                    <td>

                      <a href="{{ route('danhmuc.delete',['id'=>$item->id])}}"><button class='btn btn-danger'>delete</button></a>
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
