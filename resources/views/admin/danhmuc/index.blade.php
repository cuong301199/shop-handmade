@extends('admin.template.master')

@section('title')
   Danh mục
@endsection

@section('title-page')
  Danh mục
@endsection
@section('content')


<section class="content">
      <div class="container-fluid">
        <div class="row">
         <a href="{{ route('danhmuc.create')}}" class='btn btn-primary'>Thêm</a>
        </div>

        <div class="row">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Thao tác</th>

                </tr>
            </thead>
            <tbody>
               <?php $stt=1 ?>
            @foreach($danhsachdanhmuc as $item)
                <tr>
                    <th scope="row">{{$stt++}}</th>
                    <td>{{$item->ten_dm}}</td>
                    <td>
                      <a href="{{ route('danhmuc.edit', ['id'=>$item->id]) }}"><button class='btn btn-warning'>edit</button></a>
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
