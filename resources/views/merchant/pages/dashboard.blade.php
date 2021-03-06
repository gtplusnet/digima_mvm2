@extends('merchant.layout.layout')
@section('content')
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant/dashboard">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-4">
                <div class="panel info-box">
                    <div class="panel-body">
                        <div class="info-box-stats">
                            
                            <p class="counter">{{$page_view}}</p>
                            
                            <span class="info-box-title">Prikazi Stranice</span>
                        </div>
                        <div class="info-box-icon">
                            <i class="icon-eye"></i>
                        </div>
                        {{-- <div class="info-box-progress">
                            <div class="progress progress-xs progress-squared bs-n">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!-- Facebook-->
            <div class="col-lg-4">
                <div class="panel info-box panel-white">
                    <div class="panel-body">
                        <div class="info-box-icon">
                            <i style="color: royalblue;" class="fa fa-facebook"></i>
                        </div>
                        <div class="info-box-stats">
                            <p class="counter">{{$fb}}</p>
                            <span class="info-box-title">Facebook Stranica Lajkovi</span>
                        </div>
                    </div>
                </div>
            </div>
            <!--   Others-->
            <div class="col-lg-4">
                <div class="panel info-box panel-white">
                    <div class="panel-body">
                        <div class="info-box-stats">
                            <p class="counter">{{$guest_messages}}</p>
                            <span class="info-box-title">Poruka Gostiju</span>
                        </div>
                        <div class="info-box-icon">
                            <i class="icon-envelope"></i>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- graph -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="header">
                        <h4 class="title transform-capitalize">Statistika Gostiju</h4>
                        <p class="category">Pregledi</p>
                    </div>
                    <div class="content">
                        <div id="chartPreferencesPerYear" class="ct-chart ct-perfect-fourth"></div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i>Prikazi Stranice
                                <i class="fa fa-circle text-danger"></i>Poruka Gostiju
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i>Ažurirajte prije nekoliko minuta.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="header">
                        <h4 class="title transform-capitalize">Statistika Gostiju</h4>
                        <p class="category">Pregledi</p>
                    </div>
                    <div class="content">
                        <div id="chartActivityPerMonth" class="ct-chart ct-perfect-fourth"></div>
                        <div class="footer">
                            <div class="legend">
                                <i class="fa fa-circle text-info"></i>Pregledi
                                <i class="fa fa-circle text-danger"></i>Trgovci
                            </div>
                            <hr>
                            <div class="stats">
                                <i class="fa fa-clock-o"></i>Ažurirajte prije nekoliko minuta.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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

[{{$jan}}, {{$feb}}, {{$mar}}, {{$apr}}, {{$may}}, {{$jun}}, {{$jul}}, {{$aug}}, {{$sep}}, {{$oct}}, {{$nov}}, {{$dec}}]
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
Chartist.Line('#chartActivityPerMonth', data1, options1, responsiveOptions1);
Chartist.Pie('#chartPreferencesPerYear', {
labels: ['{{$stat_views}}%','{{$stat_message}}%'],
series: [{{$stat_views}},  {{$stat_message}}]
});
}
</script>
@endsection