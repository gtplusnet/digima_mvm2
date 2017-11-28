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
            <div class="content">
               <div class="container">
                  <div class="row">
                     <div class="col-md-11" >
                        <div class="card">
                           <div class="header">
                              <h4 class="title">Registered - Activated</h4>
                              <p class="category">Merchant Statistic</p>
                           </div>
                           <div class="content" style="">
                              <canvas id="Activated" width="1000" class="ct-chart " style="width: 1000px; height: 150px;"></canvas>
                              <div class="footer">
                                 <div class="legend">
                                    <i class="fa fa-circle text-success"></i>SignUp
                                    <i class="fa fa-circle text-info"></i>Activated Task
                                 </div>
                                 <hr>
                                 <div class="stats">
                                    <i class="fa fa-history"></i> Updated a minute ago
                                 </div>
                              </div>
                           </div>
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
   var pieOptions = 
       {
           segmentShowStroke : false,
           animateScale : true
       }
   
   var barData = 
       {
           labels : ["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],
           datasets : [
               {
                   fillColor : "#87CB19",
                   strokeColor : "#5D6D7E",
                   data : [{{$count_jan}},{{$count_feb}},{{$count_mar}},{{$count_apr}},{{$count_may}},{{$count_jun}},{{$count_jul}},{{$count_aug}},{{$count_sep}},{{$count_oct}},{{$count_nov}},{{$count_dec}}]
               },
               {
                   fillColor : "#1DC7EA",
                   strokeColor : "#5D6D7E",
                   data : [{{$counts_jan}},{{$counts_feb}},{{$counts_mar}},{{$counts_apr}},{{$counts_may}},{{$counts_jun}},{{$counts_jul}},{{$counts_aug}},{{$counts_sep}},{{$counts_oct}},{{$counts_nov}},{{$counts_dec}}]
               }
           ]
       }
   var activeReg = document.getElementById("Activated").getContext("2d");
   new Chart(activeReg).Bar(barData);
</script>

<script type="text/javascript">
   $(document).ready(function()
   {
   
   
     initChartist();
   
   });
   
   function initChartist()
   {          
       var data1 = {};
       var options1 = {};        
       var responsiveOptions1 = [];
       
       Chartist.Bar('#chartActivityPerMonth', data1, options1, responsiveOptions1);
       
       var data = {
         labels: ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'],
         series: [
            [{{$mona}}, {{$tuea}}, {{$weda}}, {{$thua}}, {{$fria}}, {{$sata}}, {{$suna}}],
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
   
       
       Chartist.Pie('#chartPreferencesPerWeek', 
       {
         labels: ['{{$total_c}}%','{{$total_r}}%'],
         series: [{{$total_c}}, {{$total_r}} ]
       });  
       Chartist.Pie('#chartPreferencesPerYear', {
         labels: ['80%','20%'],
         series: [80, 20 ]
       });   
   }
</script>

<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/agent/assets1/js/chartist.min.js"></script>
<script src="/assets/js/global.ajax.js"></script>
@endsection