<div class="card ">
    <div class="header row">
        <div class="col-md-8">
            <h4 class="title">Team Calls</h4>
            <p class="category">{{$active_teams->team_name}}</p>
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
            <i class=""></i>Merchants
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