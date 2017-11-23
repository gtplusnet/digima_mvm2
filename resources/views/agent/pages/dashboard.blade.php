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


        
        <div class="content">
            <div class="container">

                <div class="row col-md-12">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered / Activated -Per Week</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferencesPerWeek" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-danger"></i> Registered Merchant
                                        <i class="fa fa-circle text-info"></i> Activated Merchant
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history-o"></i> Updated a minute ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered / Activated -Per Day</p>
                            </div>
                            <div class="content">
                                <div id="chartActivityPerDay" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-danger"></i> Registered Merchant
                                        <i class="fa fa-circle text-info"></i> Activated Merchant
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated a minute ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div >
                <div class="row col-md-12">

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered / Activated -Per Year</p>
                            </div>
                            <div class="content">
                                <div id="chartPreferencesPerYear" class="ct-chart ct-perfect-fourth"></div>

                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-danger"></i> Registered Merchant
                                        <i class="fa fa-circle text-info"></i> Activated Merchant
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history-o"></i> Updated a minute ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                   

                    <div class="col-md-7">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered / Activated -Per Month</p>
                            </div>
                            <div class="content">
                                <div id="chartActivityPerMonth" class="ct-chart"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class="fa fa-circle text-danger"></i> Registered Merchant
                                        <i class="fa fa-circle text-info"></i> Activated Merchant
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated a minute ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div >
            </div>
        </div>
   
</div>
<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/agent/assets1/js/chartist.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{


  initChartist();

});

function initChartist()
{    
        
        var data1 = {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          series: [
            [450, 303, 220, 350, 350, 453, 326, 220, 350, 350, 453, 326],
            [152, 180, 280, 300, 280, 353, 300, 220, 350, 350, 453, 326]
          ]
        };
        
        var options1 = {
            seriesBarDistance: 10,
            axisX: {
                showGrid: false
            },
            height: "230px"
        };
        
        var responsiveOptions1 = [
          ['screen and (max-width: 640px)', {
            seriesBarDistance: 5,
            axisX: {
              labelInterpolationFnc: function (value) {
                return value[0];
              }
            }
          }]
        ];
        
        Chartist.Bar('#chartActivityPerMonth', data1, options1, responsiveOptions1);
        
        var data = {
          labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
          series: [
            [{{$mon}}, {{$tue}}, {{$wed}}, {{$thu}}, {{$fri}}, {{$sat}}, {{$sun}}],
            [{{$mona}}, {{$tuea}}, {{$weda}}, {{$thua}}, {{$fria}}, {{$sata}}, {{$suna}}],
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
        
        Chartist.Bar('#chartActivityPerDay', data, options, responsiveOptions);
    
        
        
        Chartist.Pie('#chartPreferencesPerWeek', {
          labels: ['{{$total_c}}%','{{$total_r}}%'],
          series: [{{$total_c}}, {{$total_r}} ]
        });  
        Chartist.Pie('#chartPreferencesPerYear', {
          labels: ['80%','20%'],
          series: [80, 20 ]
        });   
}
</script>


@endsection