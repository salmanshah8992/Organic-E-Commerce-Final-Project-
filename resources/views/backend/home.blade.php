@extends('layouts.admin_dashboard')

@section('admin_content')

<style>
    #pie_chart{
        width: 200px;
        height: 200px;
    }
</style>

@php
    $date = date("j F Y");
    $today = App\Models\Order::where('order_date', $date)
        ->where('status', '=', '2')
        ->sum('amount');

    $month = date('F');
    $monthly = App\Models\Order::where('order_month', $month)
        ->where('status', '=', '2')
        ->sum('amount');

    $year = date('Y');
    $yearly = App\Models\Order::where('order_year', $year)->where('status','=', '2')->sum('amount');
    $pending_order = App\Models\Order::where('status','0')->get();
    $processing_order = App\Models\Order::where('status','1')->get();
    $total_delivered_order = App\Models\Order::where('status','2')->get();
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

<div class="row">
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            @php
                                $admins = App\Models\Admin::all()->count();
                            @endphp
                            <p class="text-muted mb-1 text-truncate">Total Admin</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $admins }}</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            @php
                                $admins = App\Models\User::all()->count();
                            @endphp
                            <p class="text-muted mb-1 text-truncate">Total User</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $admins }}</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">today Sale</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $today }} Tk</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">Monthly Sale</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $monthly }} Tk</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>

    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">Yearly Sale</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $yearly }}</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">Pending Order</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($pending_order) }}</span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">Processing Order</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($processing_order) }} </span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
    <div class="col-lg-3">
        <div class="widget-rounded-circle card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="avatar-lg">
                            <i class="fas fa-user-friends font-22 avatar-title text-warning"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="text-end">
                            <p class="text-muted mb-1 text-truncate">Order Delivered</p>
                            <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($total_delivered_order) }} </span></h3>
                        </div>
                    </div>
                </div>
                <!-- end row-->
            </div>
        </div> <!-- end col-->
    </div>
</div>

<div class="row">
    <div class="col-lg-6">
        <div class="pie-chart">
                <div class="Chart card">
                    <div class="card-body">
                        <h4 class="header-title d-flex justify-content-center">Pie Chart</h4>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative">
                                <canvas id="pie_chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="donut-chart">
                <div class="Chart card">
                    <div class="card-body">
                        <h4 class="header-title d-flex justify-content-center">Donut Chart</h4>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative">
                                <canvas id="donut_chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="bar-chart">
                <div class="Chart card">
                    <div class="card-body">
                        <h4 class="header-title d-flex justify-content-center">Bar Chart</h4>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative">
                                <canvas id="bar-chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </canvas>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="bar-chart">
                <div class="Chart card">
                    <div class="card-body">
                        <h4 class="header-title d-flex justify-content-center">Line Chart</h4>
                        <div class="d-flex justify-content-center">
                            <div class="mt-4 chartjs-chart" style="height: 420px; width:420px; position:relative">
                                <canvas id="line-chart" style="display: block; box-sizing: border-box; height: 420px; width: 420px;" width="420" height="420"></canvas>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div>
            </canvas>
        </div>
    </div>
</div>


@endsection


@section('script')


  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<script>

    var categoryName = [];
    var number_of_products = [];
    var colorchart = [];

    $.ajax({
        type: "GET",
        url: "/get/pie",
        success: function (data) {
            //console.log(data);

             for(var i = 0;i<data.length;i++)
            {
                categoryName.push(data[i].category_name_en);
                number_of_products.push(data[i].products_count);
                var randomColor = random_rgba();
                colorchart.push(randomColor);

            }
            const ctx = document.getElementById('pie_chart');
            const myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: categoryName ,
                    datasets: [{
                        label: 'category wise product',
                        data: number_of_products,
                        backgroundColor:
                            colorchart,
                        borderColor:
                            colorchart
                        ,
                        borderWidth: 1
                    }]
                }

            });
        }

    });

    function random_rgba() {
            var o = Math.round, r = Math.random, s = 255;
            return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
    }

</script>

<script>
    var donutValue = [];
     $.ajax({
        type:'GET',
        url:'/get/donut',
        success:function(data) {
            // console.log(data);
            const ctx = document.getElementById('donut_chart');
            const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                    labels: ['Selling Product', 'Current Stock'],
                    datasets: [{
                        label: '# of Votes',
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }]
                },
            });
        }
    });

</script>

<script>

    $.ajax({
        type: "GET",
        url: "/get/bar",
        success: function (data) {
            // console.log(data);
            var barkeys = Object.keys(data);
            // console.log(barkeys);
            var barArray=[];

            for(var i=1;i<=12;i++)
            {
                if(i<10)
                {
                    var check = '0'+i;
                    check =  check.toString();
                }
                else
                {
                   var check=i;
                   check =  check.toString();
                }

                if(data[check] !== undefined)
                {
                    barArray.push(data[check]);
                }
                else
                {
                    barArray.push(0);
                }
            }
            const ctx = document.getElementById('bar-chart');
            const myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets: [{
                        label: 'Order Based On Month',
                        data: barArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }
            });
        }
    });

</script>

<script>

    $.ajax({
        type: "GET",
        url: "/get/line",
        success: function (data) {
            var barkeys = Object.keys(data);
            // console.log(barkeys);
            var lineArray=[];
            console.log(data);
            for(var i=1;i<=12;i++)
            {
                if(i<10)
                {
                    var check = '0'+i;
                    check =  check.toString();
                }
                else
                {
                   var check=i;
                   check =  check.toString();
                }

                if(data[check] !== undefined)
                {
                    lineArray.push(data[check]);
                }
                else
                {
                    lineArray.push(0);
                }
            }

            const ctx = document.getElementById('line-chart');
            const myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul','Aug','Sep','Oct','Nov','Dec'],
                    datasets: [{
                        label: 'Total Number of Registered User',
                        data: lineArray,
                        backgroundColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                }
            });
        }
    });

</script>

@endsection
