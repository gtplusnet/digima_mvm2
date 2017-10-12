@extends('front.layout.layout')
@section('title', 'Search Result')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		
	</div>
</div>
<div class="container">
	<div>
	    <p class="searched-business">SEARCH RESULT FOR: <a class="search-link" href=""></a></p>
	</div>
	<div>
		<div class="col-md-8 search-table">
			<div class="sort-holder">
				<div class="pull-left">
					<select class="sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="sort-tabs">
						<div class="sort-icon-holder">
							<a class="sort-icon" href="/searchresult"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="sort-icon-holder">
								<a class="sort-icon" href="/searchtabular"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 search-result-container">
				
				<div class="search-result-holder">
					<div class="col-md-5 business-profilepic-holder">
						<a href="/business">
							<img class="business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
						</a>
						<div class="icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<a href="/business_info?business_id="><p class="business-title"></p></a>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p></p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p></p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...<a target="blank" href="/business_location">Read More</a></p>
					</div>
				</div>
				<div class="col-md-12">
				<div class="map-container">
			     <div id="map"></div>
			    <script>
			      function initMap() {
			      	
			      	var uluru = {lat: {{$coordinates1}}, lng: {{$coordinates}}};
			        // var uluru = {lat: -25.363, lng: 131.044};
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 4,
			          center: uluru
			        });
			        var marker = new google.maps.Marker({
			          position: uluru,
			          map: map
			        });
			      }
			    </script>
		        </div>
	          </div>

				
			</div>
		</div>
		<div class="col-md-4">
			
			<div class="featuredlist-holder">
				<div class="featuredlist-title-holder">
					<p class="featuredlist-title">FEATURED LIST</p>
				</div>
				<div class="featuredlist-container">
			        <div id="carousel-pager" class="carousel slide featured-carousel" data-ride="carousel" data-interval="3000">
			            <!-- Carousel items -->
			            <div class="carousel-inner vertical inner-vertical-carousel">
			                <div class="active item">
			                	<div class="featured-details-container">
			                		<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="2">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			            </div>			                
			            <!-- Controls -->
			            <a style="margin-top:40px;" class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
			                <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
			                <span class="sr-only">Previous</span>
			            </a>
			            <a style="margin-top:20px;" class="right carousel-control features-control" href="#carousel-pager" role="button" data-slide="next">
			                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
			                <span class="sr-only">Next</span>
			            </a>
			        </div>
				</div>
			</div>
			<script type="text/javascript">

				// function smyMap() {
				// 	var lat={{$coordinates1}};
				// 	var long={{$coordinates}};
				//   var myCenter = new google.maps.LatLng(lat,long);
				//   var mapCanvas = document.getElementById("googleMap");
				//   var mapOptions = {center: myCenter, zoom: 5};
				//   var map = new google.maps.Map(mapCanvas, mapOptions);
				//   var marker = new google.maps.Marker({position:myCenter});
				//   marker.setMap(map);
				// }

				$('.carousel .vertical .item').each(function(){
				  var next = $(this).next();
				  if (!next.length) {
				    next = $(this).siblings(':first');
				  }
				  next.children(':first-child').clone().appendTo($(this));
				  
				  for (var i=1;i<8;i++) {
				    next=next.next();
				    if (!next.length) {
				    	next = $(this).siblings(':first');
				  	}
				    
				    next.children(':first-child').clone().appendTo($(this));
				  }
				});
			</script>
			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBr0DttJQ2kkNjyughGhLAF8UfsMjI2WHY&callback=myMap"></script>
		</div>
	</div>
</div>
@endsection