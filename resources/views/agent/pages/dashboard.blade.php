@extends('agent.layout.layout')
@section('content')
<link href="/assets/agent/assets1/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/agent">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div> 
<div id="main-wrapper">
</div>
<div class="wrapper">
   <div class="main-panel">
        
        <div class="content">
            <div class="container">

                <div class="row">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered / Sign up</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Sign Up Merchant
                                        <i class="fa fa-circle text-danger"></i> Registered Merchant
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history-o"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Quantity Registered</p>
                            </div>
                            <div class="content">
                                <div id="chartActivity" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Date
                                        <i class="fa fa-circle text-danger"></i> Quantity Registered
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                 <p class="category">Quantity Sign Up</p>
                            </div>
                            <div class="content">
                                <div id="chartHours" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-info"></i> Date
                                        <i class="fa fa-circle text-danger"></i> Quantity Sign-up
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div >
            </div>
        </div>
    </div>
</div>
<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/agent/assets1/js/chartist.min.js"></script>
<script src="/assets/agent/assets1/js/demo.js"></script>
<script type="text/javascript">
        $(document).ready(function(){


            demo.initChartist();


            initChartist();

        });

        function initChartist(){    
        
        var dataSales = {
          labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
          series: [
             [200, 285, 390, 492, 554, 586, 698,],
             [150, 22, 133, 200, 87, 350, 35,],
         
          ]
        };
        var optionsSales = {
          lineSmooth: true,
          low: 0,
          high: 1000,
          showArea: true,
          height: "245px",
          axisX: {
            showGrid: false,
          },
          lineSmooth: Chartist.Interpolation.simple({
            divisor: 3
          }),
          showLine: false,
          showPoint: false,
        };
        
        var responsiveSales = [
          ['screen and (max-width: 640px)', {
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
    
        Chartist.Line('#chartHours', dataSales, optionsSales, responsiveSales);
        
        var data = {
          labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
          series: [
            [542, 443, 320, 780, 553, 453, 326],
            [412, 243, 280, 580, 453, 353, 300]
          ]
        };
        
        var options = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "230px"
        };
        
        var responsiveOptions = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
        
        Chartist.Bar('#chartActivity', data, options, responsiveOptions);
    
        var dataPreferences = {
            series: [
                [25, 30, 20, 25]
            ]
        };
        
        var optionsPreferences = 
        {
            donut: true,
            donutWidth: 40,
            startAngle: 0,
            total: 200,
            showLabel: false,
            axisX: {
                showGrid: false
            }
        };
    
        Chartist.Pie('#chartPreferences', dataPreferences, optionsPreferences);
        
        Chartist.Pie('#chartPreferences', {
          labels: ['62%','10%'],
          series: [62, 10 ]
        });   
    }
</script>

@endsection