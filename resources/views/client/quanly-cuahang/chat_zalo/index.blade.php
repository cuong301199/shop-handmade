@extends('client.quanly-cuahang.template.master')

@section('title')
Chat Widget Zalo
@endsection
{{-- {{ dd($oder) }} --}}
@section('title-page')
Chat Widget Zalo
@endsection

@section('content')
    <section class="content">
        <div class="container-fluit">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Chat Widget Zalo</h3>
                          <div class="card-tools">
                            <form action="" class="form-inline">
                                <div class="input-group input-group-sm" style="width: 500px;">
                                    <input type="text" name="key" class="form-control float-right key"
                                        placeholder="Tìm kiếm">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default"><i
                                                class="fas fa-search timKiem"></i></button>
                                    </div>
                                    <select name="orderBy"  id="by" class="form-control xaPhuong" style="width: 250px;">
                                        <option value=null>Tìm kiếm theo</option>
                                        {{-- <option value="code">Mã đơn hàng</option>
                                        <option value="ten" >Tên khách hàng</option> --}}
                                    </select>
                                </div>
                            </form>
                        </div>
                        </div>

                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr class="text-center">
                                @if ($id_zalo == null)
                                    <th style="width:13%">Tạo mã Widget zalo</th>
                                @else
                                    <th style="width:13%">Mã Widget zalo</th>
                                @endif

                              </tr>
                            </thead>
                            <?php $stt = 1; ?>
                            <tbody>
                                <tr class="text-center">
                                    <td >
                                        @if ($id_zalo == null)
                                            <form action="{{ route('chatZalo.store') }}" method="post">
                                                @csrf
                                                <input type="text" name="id_zalo" style="height: 35px; width:300px"  placeholder="Mã widget zalo">
                                                <button type="submit" style="height:35px" class="btn btn-default">Tạo mã Zalo chat </button>
                                            </form>
                                        @else
                                            <form action="{{ route('chatZalo.update') }}" method="post">
                                                @csrf
                                                <input type="text" name="id_zalo" style="height: 35px; width:300px" value="{{ $id_zalo->id_oa }}">
                                                <button type="submit" style="height:35px" class="btn btn-default">Thay đổi</button>
                                            </form>
                                        @endif

                                    </td>
                                </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@push('addCity')
    @if(Session::has('success'))
    <script>
        swal({
            title: "Thông báo",
            text: "Tạo mã widget chat zalo thành công",
            icon: "success",
            button: "Đóng",
            });
    </script>
    @endif
    @if(Session::has('update-success'))
    <script>
        swal({
            title: "Thông báo",
            text: "Thay đổi mã widget chat zalo thành công",
            icon: "success",
            button: "Đóng",
            });
    </script>
    @endif
@endpush
@endsection
