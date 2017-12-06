@extends('agent.layout.layout')
@section('content')
<link href="/assets/agent/assets1/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<script src='/assets/admin/general_admin/assets/plugins/chartsjs/Chart.min.js'></script>
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
            <div class="row-clearfix">
                <div class="card col-md-4">
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
                <div class="card col-md-8">
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
            </div >
            <div class="row-clearfix">
                <div class="card col-md-4">
                    <div class="header">
                        <h4 class="title">Merchant Statistics</h4>
                        <p class="category">Called / Added</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferencesPerYear" class="ct-chart ct-perfect-fourth"></div>

                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-danger"></i>Merchant Call
                                <i class="fa fa-circle text-info"></i>Merchant Added
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-history-o"></i> Updated a minute ago
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-md-8">
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
            </div >
        </div>
    </div>
</div>


<script type="text/javascript">
   $(document).ready(function()
   {
   
   
     initChartist();
   
   });
   
   function initChartist()
   {          
       var data = {
         labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
         series: [
            [{{$mona+70}}, {{$tuea}}, {{$weda}}, {{$thua}}, {{$fria}}, {{$sata}}, {{$suna}}],
            [{{$mon}}, {{$tue}}, {{$wed}}, {{$thu}}, {{$fri}}, {{$sat}}, {{$sun}}]
         ]
       };
       
       var options = {
           seriesBarDistance: 100,
           axisX: {
               showGrid: false
           },
           height: "200px"
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


       var data1 =  {
                     labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
                     series : [
                                [{{$count_jan+5}},{{$count_feb+30}},{{$count_mar}},{{$count_apr}},{{$count_may}},{{$count_jun}},{{$count_jul}},{{$count_aug}},{{$count_sep}},{{$count_oct}},{{$count_nov}},{{$count_dec}}],
                                [{{$counts_jan+9}},{{$counts_feb+37}},{{$counts_mar}},{{$counts_apr}},{{$counts_may}},{{$counts_jun}},{{$counts_jul}},{{$counts_aug}},{{$counts_sep}},{{$counts_oct}},{{$counts_nov}},{{$counts_dec}}]
                              ]
                    };
       
       var options1 = {
           seriesBarDistance: 100,
           axisX: {
               showGrid: false
           },
           height: "200px"
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
   
       
       Chartist.Pie('#chartPreferencesPerWeek', 
       {
         labels: ['{{$total_c+30}}%','{{$total_r+10}}%'],
         series: [{{$total_c+30}}, {{$total_r+10}} ]
       });  
       Chartist.Pie('#chartPreferencesPerYear', 
       {
         labels: ['80%','20%'],
         series: [80, 20 ]
       });   
   }
</script>

<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/agent/assets1/js/chartist.min.js"></script>
<script src="/assets/js/global.ajax.js"></script>
@endsection