@extends('client.quanly-cuahang.template.master')

@section('title')
    Phí vận chuyển
@endsection
{{-- {{ dd($danhsach) }} --}}
@section('title-page')
    Phí vận chuyển
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
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Phí vận chuyển</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width:5%">STT</th>
                                <th style="width:5%">Tỉnh/thành phố</th>
                                <th style="width:5%">Quận/huyện</th>
                                <th style="width:5%">Xã/phường</th>
                                <th style="width:5%">Phí vận chuyển</th>
                                <th style="width:5%">Thao tác</th>
                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach as $item)
                                <tr>
                                    <th scope="row">{{ $stt++ }}</th>
                                    <td>{{ $item->name_tp }}</td>
                                    <td>{{ $item->name_qh }}</td>
                                    <td>{{ $item->name_xa }}</td>
                                    <td>{{ number_format( $item->phi_pvc) }} VND</td>
                                    <td>
                                        <a href=""><span class="badge bg-warning">Chi tiết</span></a>
                                        <a href=""><span class="badge bg-danger">Xóa</span></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix float-right">
                            <div class="col-md-12 float-right">
                                <div class="float-right">{{$danhsach->links()}}</div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
