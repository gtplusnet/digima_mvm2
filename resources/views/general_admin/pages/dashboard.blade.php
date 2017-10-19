@extends('general_admin.pages.general_admin_layout')
@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('content')
<link href="/assets/agent/assets1/css/bootstrap.min.css" rel="stylesheet" />
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<div class="page-title">
    <h3>Dashboard</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
</div>
<div class="wrapper">
    <div class="main-panel">
        <div class="col-lg-3 col-md-6">
            <div class="panel info-box panel-white">
                <div class="panel-body">
                    <div class="info-box-stats">
                        <p class="counter">{{$resultCountM}}</p>
                        <span class="info-box-title">Registered Merchants</span>
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
                        <span class="info-box-title">Registered Supervisor/Admin</span>
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
        <!--   TWITTER-->
        <!--end of james-->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistics</h4>
                                <p class="category">Registered</p>
                            </div>
                            <div class="content">
                                <div id="piechart" class="ct-chart ct-perfect-fourth"></div>
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
                    </div>
                    <div class="col-md-6" >
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Merchant Statistic</h4>
                                <p class="category">Monthly Registered</p>
                            </div>
                            <div class="content" style="">
                                <div id="chartContainer" style="height:313px; width: 100%;"></div>
                                <div class="footer">
                                    <div class="legend">
                                        <i class=""></i>
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
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/assets/admin/general_admin/assets/js/chart.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart() {
var data = google.visualization.arrayToDataTable([
['Task', 'Hours per Day'],
['Agent Call', {{$countAgent}}],
['MP3 Upload',{{$countSupervisor}}],
['Invoice', {{$countAdmin}}],
['Unpaid', {{$countAdminP}}],
['activated', {{$countAdminA}}]
]);
var options = {'title':'Registered Merchant', 'width':370, 'height':320};
var chart = new google.visualization.PieChart(document.getElementById('piechart'));
chart.draw(data, options);
}

window.onload = function () {
var chart = new CanvasJS.Chart("chartContainer", {
title:{
text: ""
},
data: [
{
type: "column",
dataPoints: [
{ label: "Jan",  y: 97 },
{ label: "Feb", y: 11  },
{ label: "Mar", y: 0  },
{ label: "Apr",  y: 63  },
{ label: "May",  y: 28  },
{ label: "Jun",  y: 28  },
{ label: "Jul",  y: 82  },
{ label: "Aug", y: 18  },
{ label: "Sep", y: 27  },
{ label: "Oct",  y: 34  },
{ label: "Nov",  y: 28  },
{ label: "Dec",  y: 28  },
]
}
]
});
chart.render();
}
</script>

{{-- <script src="/assets/admin/general_admin/assets/js/admin_dashboard.js"></script> --}}

@endsection