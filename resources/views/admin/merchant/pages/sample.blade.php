<!DOCTYPE html>
<html>
<head>
<title>Top Categories of New Year Resolution</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
 
<?php
	$dataPoints = array(
		array("y" => 35, "name" => "Activated"),
		array("y" => 50, "name" => "Pending"),
		array("y" => 15, "name" => "Merchants"),
		// array("y" => 15, "name" => "Education"),
		// array("y" => 5, "name" => "Family"),
		// array("y" => 7, "name" => "Real Estate")
	);
?>   
 
<body>
	<div class="col-md-4">
<div id="chartContainer" ></div>
</div>


<div class="col-md-4">
<div id="chartContainer2"></div>
</div>
<script type="text/javascript">
$(function () {
var chart = new CanvasJS.Chart("chartContainer", {
	theme: "theme2",
	title:{
		text: "Top Categories of New Year's Resolution"
	},
	exportFileName: "New Year Resolutions",
	exportEnabled: true,
	animationEnabled: true,		
	data: [
	{       
		type: "pie",
		showInLegend: true,
		toolTipContent: "{name}: <strong>{y}%</strong>",
		indexLabel: "{name} {y}%",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
});
</script>
</body>
 
</html>


<!DOCTYPE html>
<html>
<head>
<title>Basic Column Chart using CanvasJS</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
 
<?php
	$dataPoints = array();
	$y = 40;
	for($i = 0; $i < 10000; $i++){
		$y += rand(0, 10) - 5; 
		array_push($dataPoints, array("x" => $i, "y" => $y));
	}
?>
 
<body>

<script type="text/javascript">
$(function () {
var chart = new CanvasJS.Chart("chartContainer2", {
	theme: "theme2",
	zoomEnabled: true,
	animationEnabled: true,
	title: {
		text: "Performance Demo - 10000 DataPoints"
	},
	subtitles:[
		{   text: "(Try Zooming & Panning)" }
	],
	data: [
	{
		type: "line",                
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}
	]
});
chart.render();
});
</script>
</body> 
</html>






<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form name="my-form" class="my-form">
		
		<input type="text" name="input_1" class="input_1" value="input1" readonly >
		<input type="text" name="input2" class="input_2" value="input2" readonly >	
		<button type="button" class="onEdit" >Edit</button>
	</form>
	<div class="col-md-12">
		<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
	<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FAngDiaryNgLoyal%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="500" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe><div id="fb-root"></div>
<div class="fb-page" data-href="https://www.facebook.com/AngDiaryNgLoyal/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/AngDiaryNgLoyal/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/AngDiaryNgLoyal/">Funny Earth</a></blockquote></div>
</div>
</body>
</html>
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script type="text/javascript">
	

	$('.onEdit').unbind('click');
	$('.onEdit').bind('click', function(){
		$('.my-form input').removeAttr('readonly');	
	});

</script>