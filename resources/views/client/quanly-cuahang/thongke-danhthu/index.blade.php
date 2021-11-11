@extends('client.quanly-cuahang.template.master')

@section('title')
    Thống kê danh thu
@endsection

@section('title-page')
    Thống kê danh thu
@endsection
@section('content')

    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- AREA CHART -->
                    <div class="card">
                        {{-- card-primary --}}
                        <div class="card-header">
                            <h3 class="card-title">Area Chart</h3><br>

                                <form action="" method="get">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="">Từ ngày</label>
                                            <input type="date" name="from_date" id="" class="form-control from_date"
                                                placeholder="Tên sản phẩm" aria-describedby="helpId">
                                        </div>
                                        <div class="form-group ">
                                            <button class="btn btn-primary">Lọc</button>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label for="">Đến ngày</label>
                                            <input type="date" name="to_date" id="" class="form-control to_date"
                                                placeholder="Tên sản phẩm" aria-describedby="helpId">
                                        </div>

                                    </div>


                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="form-group">
                                                <label for="">Lọc theo</label>
                                                <select class="form-control filter" name="">
                                                    <option>---Chọn---</option>
                                                    <option value="thangnay">Danh thu tháng này</option>
                                                    <option value="7truoc">Danh thu 7 ngày qua</option>
                                                    <option value="30truoc">Danh thu 30 ngày qua</option>
                                                    <option value="365truoc">Danh thu 366 ngày qua </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="card-tools">
                                <div class="card-tools">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="myfirstchart" style="height: 300px;"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Line Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                        class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="lineChart"
                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                </div>
            </div>

        </div>
    </section>
    <!-- /.content -->


    @push('addCity')
        <script>
            $(document).ready(function () {
              var chart = new Morris.Line({
                // ID of the element in which to draw the chart.
                element: 'myfirstchart',
                lineColors :['#2fa528','#03fc4e','#03dbfc','#1403fc'],
                // Chart data records -- each entry in this array corresponds to a point on
                // the chart.
                // The name of the data record attribute that contains x-values.
                xkey: 'created_at',
                parseTime:false,
                // A list of names of data record attributes that contain y-values.
                ykeys: ['tong_tien'],
                // Labels for the ykeys -- will be displayed when you hover over the
                // chart.
                // behaveLikeline:true;
                labels: ['Tổng Tiền']
                });


                $('.btn-filter').click(function (e) {
                    e.preventDefault();
                    var from_date = $('.from_date').val();
                    var to_date = $('.to_date').val();
                    $.ajax({
                        type: "get",
                        url: "/client/filter-by-date",
                        data: {
                            from_date:from_date,
                            to_date:to_date
                        },
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                           chart.setData(data)
                        }
                    });

                });
                $('.filter').change(function (e) {
                    e.preventDefault();
                    var filter = $(this).children("option:selected").val();
                    console.log(filter)
                    $.ajax({
                        type: "get",
                        url: "/client/filter-dashboard",
                        data: {
                            filter:filter,
                        },
                        dataType: "json",
                        success: function (data) {
                            console.log(data)
                           chart.setData(data)
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
