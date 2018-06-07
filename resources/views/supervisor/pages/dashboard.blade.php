@extends('layout.general_layout')
@section('content')
<link href="/assets/agent/assets1/css/light-bootstrap-dashboard.css" rel="stylesheet"/>
<script src='/assets/admin/general_admin/assets/plugins/chartsjs/Chart.min.js'></script>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="graph-container">
        {{-- <div class="col-md-4">
            <div class="card ">
                <div class="header col-md-12" style="display:inline-block;">
                    <div class="col-md-12">
                        <h4 class="title">Agent Calls</h4>
                        <p class="category">Pie Chart</p>
                    </div>
                    
                </div>
                <div class="content"  style="overflow-x:scroll;">
                    <canvas id="agentCallsPie"  class="ct-chart "></canvas>
                    
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i>Mon
                        <i class="fa fa-circle text-danger"></i>Tue
                        <i class="fa fa-circle text-warning"></i>Wed
                        <i class="fa fa-circle text-primary"></i>Thu
                        <i class="fa fa-circle " style="color:#22BAA0"></i>Fri
                        <i class="fa fa-circle " style="color:#34425A"></i>Sat
                        <i class="fa fa-circle " style="color:#87CB16"></i>Sun
                        
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12" id="showAgentCalls">
            <div class="card">
                <div class="header row">
                    <div class="col-md-8">
                        <h4 class="title">Agent Calls</h4>
                        <p class="category">Line Charts</p>
                    </div>
                    <div class="col-md-4  pull-right">
                        <select class="form-control " id="agent_calls">
                            <option value="james">SELECT AGENT</option>
                            @foreach($_agents as $agents)
                                <option value="{{$agents->user_id}}">{{$agents->user_first_name.' '.$agents->user_last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="content" style="overflow-x:scroll;">
                    <canvas id="agentCallsLine" width="940"  class="ct-chart "></canvas>
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class=""></i>
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
            <script>
                var agentData = 
                    {
                        labels : ["Mon {{$date_mon}}","Tue {{$date_tue}}","Wed {{$date_wed}}","Thu {{$date_thu}}","Fri {{$date_fri}}","Sat {{$date_sat}}","Sun {{$date_sun}}"],
                        datasets : [
                        {
                            fillColor : "rgba(172,194,132,0.4)",
                            strokeColor : "#ACC26D",
                            pointColor : "#fff",
                            pointStrokeColor : "#9DB86D",
                            data : [{{$mon}},{{$tue}},{{$wed}},{{$thu}},{{$fri}},{{$sat}},{{$sun}}]
                        }
                    ]
                    }
                var agents = document.getElementById('agentCallsLine').getContext('2d');
                new Chart(agents).Line(agentData);
            </script>
        </div>
        {{-- <div class="col-md-4">
            <div class="card ">
                <div class="header col-md-12" >
                    <div class="col-md-12">
                        <h4 class="title">Team Calls</h4>
                        <p class="category">Pie Chart</p>
                    </div>
                    
                </div>
                <div class="content"  style="overflow-x:scroll;">
                    <canvas id="teamCallsPie"  class="ct-chart "></canvas>
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i>Mon
                        <i class="fa fa-circle text-danger"></i>Tue
                        <i class="fa fa-circle text-warning"></i>Wed
                        <i class="fa fa-circle text-primary"></i>Thu
                        <i class="fa fa-circle " style="color:#22BAA0"></i>Fri
                        <i class="fa fa-circle " style="color:#34425A"></i>Sat
                        <i class="fa fa-circle " style="color:#87CB16"></i>Sun
                        
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="col-md-12" id="showTeamCalls">
            <div class="card ">
                <div class="header row">
                    <div class="col-md-8">
                        <h4 class="title">Team Calls</h4>
                        <p class="category">Line Charts</p>
                    </div>
                    <div class="col-md-4  pull-right">
                        <select class="form-control " id="team_calls">
                            <option>SELECT TEAM</option>
                            @foreach($_teams as $teams)
                                <option value="{{$teams->team_id}}">{{$teams->team_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="content"  style="overflow-x:scroll;">
                    <canvas id="teamCallsLine" width="940"  class="ct-chart "></canvas>
                    
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class=""></i>
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
            <script>
                var teamData = 
                    {
                        labels : ["Mon {{$date_mon}}","Tue {{$date_tue}}","Wed {{$date_wed}}","Thu {{$date_thu}}","Fri {{$date_fri}}","Sat {{$date_sat}}","Sun {{$date_sun}}"],
                        datasets : [
                        {
                            fillColor : "rgba(172,194,132,0.4)",
                            strokeColor : "#ACC26D",
                            pointColor : "#fff",
                            pointStrokeColor : "#9DB86D",
                            data : [{{$mon}},{{$tue}},{{$wed}},{{$thu}},{{$fri}},{{$sat}},{{$sun}}]
                        }
                        ]
                    }
                var teams = document.getElementById('teamCallsLine').getContext('2d');
                new Chart(teams).Line(teamData);
            </script>
        </div>
        {{-- <div class="col-md-11" >
            <div class="card">
                <div class="header">
                    <h4 class="title">Registered - Activated By: Agent</h4>
                    <p class="category">Merchant Statistic</p>
                </div>
                <div class="content"  style="overflow-x:scroll;">
                    
                    <canvas id="activateRegisterAgent" width="1000" class="ct-chart "></canvas>
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-success"></i>SignUp
                        <i class="fa fa-circle text-primary"></i>Activated Task
                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> Updated 3 minutes ago
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
 </div>
<script>

// pie chart data
var pieData = 
[
    {
        value: {{$mon}},
        color:"#1DC7EA"
    },
    {
        value : {{$tue}},
        color : "#1DC7EA"
    },
    {
        value: {{$wed}},
        color:"#FF9500"
    },
    {
        value : {{$thu}},
        color : "#1D62F0"
    },
    {
        value: {{$fri}},
        color:"#22BAA0"
    },
    {
        value : {{$sat}},
        color : "#34425A"
    },
    {
        value : {{$sun}},
        color : "#87CCA7"
    },


];
// pie chart options
var pieOptions = 
    {
        segmentShowStroke : false,
        animateScale : true
    }
// get pie chart canvas
var countries= document.getElementById("agentCallsPie").getContext("2d");
// draw pie chart
new Chart(countries).Pie(pieData, pieOptions);
// bar chart data
//agent end

// pie chart data
var pieDataTeams = 
    [
         {
            value: {{$mon}},
            color:"#1DC7EA"
        },
        {
            value : {{$tue}},
            color : "#1DC7EA"
        },
        {
            value: {{$wed}},
            color:"#FF9500"
        },
        {
            value : {{$thu}},
            color : "#1D62F0"
        },
        {
            value: {{$fri}},
            color:"#22BAA0"
        },
        {
            value : {{$sat}},
            color : "#34425A"
        },
        {
            value : {{$sun}},
            color : "#87CCA7"
        },


    ];
// pie chart options
var pieOptionsTeams = 
    {
        segmentShowStroke : false,
        animateScale : true
    }
// get pie chart canvas
var teamPie= document.getElementById("teamCallsPie").getContext("2d");
// draw pie chart
new Chart(teamPie).Pie(pieDataTeams, pieOptionsTeams);
// bar chart data
//team end

//activated vs registered team
var barData = 
    {
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
var activeReg = document.getElementById("activateRegisterAgent").getContext("2d");
// draw bar chart
new Chart(activeReg).Bar(barData);


</script>
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/js/supervisor/supervisor_dashboard.js"></script>
@endsection