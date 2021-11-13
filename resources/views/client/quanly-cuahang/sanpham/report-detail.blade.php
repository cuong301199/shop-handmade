@extends('client.quanly-cuahang.template.master')

@section('title')
    Chi tiết vi phạm
@endsection

@section('title-page')
    Chi tiết vi phạm
@endsection
@section('content')
{{-- {{ dd($danhsach) }} --}}
    @if (Session::has('success'))
        <p style="color: rgb(20, 163, 16)">{{ Session::get('success') }}</p>
    @endif
    <section class="content">
        <div class="container-fluit">
            {{-- <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('sanpham.create') }}" class='btn btn-primary' style="margin-bottom: 10px" >Thêm</a>
                </div>
            </div> --}}
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Nội dung</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: ">STT</th>
                                <th style="width:30% ">Nội dung báo cáo</th>
                                <th style="width: ">Mô tả báo cáo</th>
                                <th style="width: ">Tên người báo cáo</th>
                              </tr>
                            </thead>
                            <?php $stt = 1; ?>

                            <tbody>
                                @foreach ($danhsach as $item)
                                <tr>
                                    <td>{{ $stt++ }}</td>
                                    <td>{{$item->noidung_bc}}</td>
                                    @if($item->mota_bc==null)
                                    <td>Không có mô tả</td>
                                    @else
                                    <td>{{ $item->mota_bc }}</td>
                                    @endif
                                    <td>{{$item->ten_nd}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <div class="card-footer clearfix float-right">
                                <div class="col-md-12 float-right">
                                    <div class="float-right">{{$danhsach->links()}}</div>
                                </div>
                            </div>
                        </div>
                      </div>
                </div>
            </div>

            <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
@push('addCity')
    <script>
        $('a.twitter').confirm({
            content: "Bạn có muốn xóa sản phẩm này",
        });
        $('a.twitter').confirm({
            buttons: {
                hey: function(){
                    location.href = this.$target.attr('href');
                }
            }
        });
    </script>
@endpush
@endsection
