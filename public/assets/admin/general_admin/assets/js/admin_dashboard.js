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
{ label: "Jan",  y: 100  },
{ label: "Feb", y: 15  },
{ label: "Mar", y: 0  },
{ label: "Apr",  y: 30  },
{ label: "May",  y: 28  },
{ label: "Jun",  y: 28  },
{ label: "Jul",  y: 100  },
{ label: "Aug", y: 15  },
{ label: "Sep", y: 25  },
{ label: "Oct",  y: 30  },
{ label: "Nov",  y: 28  },
{ label: "Dec",  y: 28  },
]
}
]
});
chart.render();
}