@extends('merchant.layout.layout')
@section('content')
<!-- <link href="/assets/agent/assets1/css/bootstrap.min.css" rel="stylesheet" /> -->
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

<div class="page-title">
   <h3>{{ $page }}</h3>
   <div class="page-breadcrumb">
      <ol class="breadcrumb">
         <li><a href="index.html">Home</a></li>
         <li class="active">{{ $page }}</li>
      </ol>
   </div>
</div>

<div id="main-wrapper">
   <div class="row">
      <div class="col-lg-3 col-md-6">
         <div class="panel info-box">
            <div class="panel-body">
               <div class="info-box-stats">
                  <p class="counter">{{$page_view->business_views}}</p>
                  <span class="info-box-title">Page views</span>
               </div>
               <div class="info-box-icon">
                  <i class="icon-eye"></i>
               </div>
               <div class="info-box-progress">
                  <div class="progress progress-xs progress-squared bs-n">
                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
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
               <div class="info-box-icon">
                  <i style="color: royalblue ;"" class="fa fa-facebook"></i>
               </div>
               <div class="info-box-stats">
                  <p class="counter">{{$fb}}</p>
                  <span class="info-box-title">Page Likes</span>
               </div>
               <div class="info-box-progress">
                  <div class="progress progress-xs progress-squared bs-n">
                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="10" style="width: 80%">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--   TWITTER-->
      <div class="col-lg-3 col-md-6">
         <div class="panel info-box panel-white">
            <div class="panel-body">
               <div class="info-box-stats">
                  <p class="counter">680</p>
                  <span class="info-box-title">Page tweet</span>
               </div>
               <div class="info-box-icon">
                  <i style="color:#00aced;" class="fa fa-twitter"></i>
               </div>
               <div class="info-box-progress">
                  <div class="progress progress-xs progress-squared bs-n">
                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
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
                  <p class="counter">256</p>
                  <span class="info-box-title">Page Views Business</span>
               </div>
               <div class="info-box-icon">
                  <i class="icon-eye"></i>
               </div>
               <div class="info-box-progress">
                  <div class="progress progress-xs progress-squared bs-n">
                     <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      {{-- mula dito james --}}
      <div class="content">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="card">
                     <div class="header">
                        <h4 class="title">Merchant Statistics</h4>
                        <p class="category">Views</p>
                     </div>
                     <div class="content">
                        <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>
                        <div class="footer">
                           <div class="legend">
                              <i class="fa fa-circle text-info"></i>Views
                              <i class="fa fa-circle text-danger"></i>Merchants
                           </div>
                           <hr>
                           <div class="stats">
                              <i class="fa fa-clock-o"></i> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card">
                     <div class="header">
                        <h4 class="title">Page Likes</h4>
                        <p class="category">Likes</p>
                     </div>
                     <div class="content">
                        <div id="chartPreferences1" class="ct-chart ct-perfect-fourth"></div>
                        <div class="footer">
                           <div class="legend">
                              <i class="fa fa-circle text-info"></i>Views
                              <i class="fa fa-circle text-danger"></i>Merchants
                           </div>
                           <hr>
                           <div class="stats">
                              <i class="fa fa-clock-o"></i> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3">
                  <div class="card">
                     <div class="header">
                        <h4 class="title">Page Tweets</h4>
                        <p class="category">Tweets</p>
                     </div>
                     <div class="content">
                        <div id="chartPreferences2" class="ct-chart ct-perfect-fourth"></div>
                        <div class="footer">
                           <div class="legend">
                              <i class="fa fa-circle text-info"></i>Views
                              <i class="fa fa-circle text-danger"></i>Merchants
                           </div>
                           <hr>
                           <div class="stats">
                              <i class="fa fa-clock-o"></i> 
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="col-md-8">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Users Behavior</h4>
                          <p class="category">24 Hours performance</p>
                      </div>
                      <div class="content">
                          <div id="chartHours" class="ct-chart"></div>
                          <div class="footer">
                              <div class="legend">
                                  <i class="fa fa-circle text-info"></i> Open
                                  <i class="fa fa-circle text-danger"></i> Click
                                  <i class="fa fa-circle text-warning"></i> Click Second Time
                              </div>
                              <hr>
                              <div class="stats">
                                  <i class="fa fa-history"></i> Updated 3 minutes ago
                              </div>
                          </div>
                      </div>
                  </div>
                  </div> -->
            </div>
         </div>
      </div>
      {{-- hanggang dito nalang --}}
   </div>
   <!-- Row -->
   <!-- Row -->
</div>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
<script src="/assets/agent/assets1/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/agent/assets1/js/chartist.min.js"></script>
<script src="/assets/agent/assets1/js/demo.js"></script>
<script type="text/javascript">
   $(document).ready(function(){
   demo.initChartist();
   
   });
</script>
@endsection