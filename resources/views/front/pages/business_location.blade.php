






<!DOCTYPE html>
<html>
<body>
<h1>My First Google Map</h1>
<div>{{$coordinates}}</div>
<div id="googleMap" style="left:50px;width:400px;height:200px;"></div>
<script>
function myMap() {
	var lat={{$coordinates1}};
	var long={{$coordinates}};
  var myCenter = new google.maps.LatLng(lat,long);
  var mapCanvas = document.getElementById("googleMap");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr0DttJQ2kkNjyughGhLAF8UfsMjI2WHY&callback=myMap"></script>
</body>
</html>



 
