<div class="card col-md-8">
    <div class="header col-md-12" style="display:inline-block;">
        <div class="col-md-8">
            <h4 class="title">Agent Calls ({{$active_agent->first_name." ".$active_agent->last_name}})</h4>
            <p class="category">Line Charts</p>
        </div>
        <div class="col-md-4  pull-right">
            <select class="form-control " id="agent_calls">
                <option value="james">SELECT AGENT</option>
                @foreach($_agents as $agents)
                <option value="{{$agents->agent_id}}">{{$agents->first_name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="content" style="overflow-x:scroll;">
        <canvas id="agentCallsLine" width="600"  class="ct-chart "></canvas>
        
    </div>
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