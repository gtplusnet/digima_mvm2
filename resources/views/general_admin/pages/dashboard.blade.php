@extends('general_admin.pages.general_admin_layout')
@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('content')
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<script src='/assets/admin/general_admin/assets/plugins/chartsjs/Chart.min.js'></script>
<div class="page-title">
    <h3>Dashboard</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/general_admin/dashboard">Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
         <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <?php
                        $timestamp = strtotime('+3 years');
                        echo date('Y-m-d H:i:s', $timestamp);
                        ?>
                        <p class="counter">{{$resultCountM}}</p>
                        <span class="info-box-title">Merchants</span>
                    </div>
                    <div class="info-box-icon">
                        <i style="color: #00aced ;"" class="fa fa-user"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$sumP1}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$sumP1}}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Facebook
        -->
        
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">{{$resultCountA}}</p>
                        <span class="info-box-title">Registered Agents</span>
                    </div>
                    <div class="info-box-icon">
                        <i style="color: #00aced ;"" class="fa fa-user"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$sumP2}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$sumP2}}%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--   Others-->
        
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">{{$resultCountS + $resultCountAd}}</p>
                        <span class="info-box-title">Registered Supervisor / Admin</span>
                    </div>
                    <div class="info-box-icon">
                        <i style="color: #00aced ;"" class="fa fa-user"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{$sumP3 + $sumP4}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$sumP3 + $sumP4}}%">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">{{$sum}}</p>
                        <span class="info-box-title">Total User</span>
                    </div>
                    <div class="info-box-icon">
                        <i style="color: #00aced ;"" class="fa fa-user"></i>
                    </div>
                    <div class="info-box-progress">
                        <div class="progress progress-xs progress-squared bs-n">
                            <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="10" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 card">
                        <div class="header">
                            <h4 class="title">Registered Per Month</h4>
                            <p class="category">Merchant Statistic</p>
                        </div>
                        <div class="content" style="overflow-x: scroll;">
                            <canvas id="signUp" width="600"  class="ct-chart "></canvas>
                            <div class="footer">
                                <div class="legend">
                                    <i class=""></i>Merchants
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 card">
                        <div class="header">
                            <h4 class="title">User Level Task</h4>
                            <p class="category">Over All</p>
                        </div>
                        <div class="content" style="overflow-x: scroll;">
                            <canvas id="countries"  class="ct-chart "></canvas>
                            <div class="footer">
                                <div class="legend">
                                <i class="fa fa-circle text-info"></i>Agent Task
                                <i class="fa fa-circle text-danger"></i>Supervisor Task
                                <i class="fa fa-circle text-warning"></i>Admin Task
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    
                    <div class="" >
                        <div class=" col-md-12 card ">
                            <div class="header">
                                <h4 class="title">Registered - Activated Per Month</h4>
                                <p class="category">Merchant Statistic</p>
                            </div>
                            <div class="content" style="overflow-x: scroll;">
                            
                                <canvas id="income" width="1140" class="ct-chart" style="width: 100% !important;height: auto !important;"></canvas>
                           
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-success"></i>Registered
                                        <i class="fa fa-circle text-primary"></i>Activated Task
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    
       
 </div>       
        <script>
            // line chart data
            var buyerData = {
                labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets : [
                {
                    fillColor : "rgba(172,194,132,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [{{$count_jan}},{{$count_feb}},{{$count_mar}},{{$count_apr}},{{$count_may}},{{$count_jun}},{{$count_jul}},{{$count_aug}},{{$count_sep}},{{$count_oct}},{{$count_nov}},{{$count_dec}}]
                }
            ]
            }
            // get line chart canvas
            var buyers = document.getElementById('signUp').getContext('2d');
            // draw line chart
            new Chart(buyers).Line(buyerData);
            // pie chart data
            var pieData = [
                {
                    value: {{$countCall}},
                    color:"#1DC7EA"
                },
                {
                    value : {{$countMP3}},
                    color : "#FF4A55"
                },
                {
                    value : {{$countInvoice + $countPayment}},
                    color : "#FF9500"
                },
                
                
            ];
            // pie chart options
            var pieOptions = {
                 segmentShowStroke : false,
                 animateScale : true
            }
            // get pie chart canvas
            var countries= document.getElementById("countries").getContext("2d");
            // draw pie chart
            new Chart(countries).Pie(pieData, pieOptions);
            // bar chart data
            var barData = {
                labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                datasets : [
                    {
                        fillColor : "#87CB16",
                        strokeColor : "#5D6D7E",
                        data : [{{$count_jan}},{{$count_feb}},{{$count_mar}},{{$count_apr}},{{$count_may}},{{$count_jun}},{{$count_jul}},{{$count_aug}},{{$count_sep}},{{$count_oct}},{{$count_nov}},{{$count_dec}}]
                    },
                    {
                        fillColor : "#1D62F0",
                        strokeColor : "#5D6D7E",
                        data : [{{$counts_jan}},{{$counts_feb}},{{$counts_mar}},{{$counts_apr}},{{$counts_may}},{{$counts_jun}},{{$counts_jul}},{{$counts_aug}},{{$counts_sep}},{{$counts_oct}},{{$counts_nov}},{{$counts_dec}}]
                    }
                ]
            }
            // get bar chart canvas
            var income = document.getElementById("income").getContext("2d");
            // draw bar chart
            new Chart(income).Bar(barData);
        </script>
   @endsection