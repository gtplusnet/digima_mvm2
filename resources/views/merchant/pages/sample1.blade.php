

<?php

 $fb_page = '742953982442308'; 
 $access_token = 'EAAD6rZBdEZBzABALWYhj5EtQIYLedACll6rwjOQwgbauhb0o34lPWOqzhd6FK6qs1qNo73KvIJZAHBCJVTe3eM05AMDpXsH1zkt5zZAj48bEBzVL6rAKupxJwMFxnZA8OB9vaPz1fybkBQNg1JuoPn08dvnTRDQ44ez43vySolQT4VzNMiocRZBaVjdVtw33HqqHt0NK2fagZDZD';
 $url = "https://graph.facebook.com/v2.10/".$fb_page.'?fields=id,name,fan_count&access_token='.$access_token;
 $curl = curl_init($url);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);   
 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
 $result = curl_exec($curl);  
 curl_close($curl);
 $details = json_decode($result,true);
 echo $details['fan_count']." likes";
 
?>


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



 
