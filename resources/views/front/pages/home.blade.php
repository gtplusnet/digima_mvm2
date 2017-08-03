@extends('front.layout.layout')
@section('content')
<div class="intro" style="background-image: url('/images/background_home.jpg')">	
	<div class="container">
		<div class="col-md-12">
			<div class="col-md-12 searchbox-container">
				<p class="introduction">THE <font class="yellow">RIGHT</font> PLACE</p>
				<p class="second-line">FOR BUSINESS</p>
			</div>
			<div class="col-md-1">
			</div>
			<div class="col-md-10 searchbox-holder">
				<form action="/searchresult">
					<div class="col-md-12 form-spacer">
						<div class="col-md-4 searchfields-format">
							<input class="business-name-textbox" type="text" placeholder="Business, Category or Keyword...">
						</div>
						<div class="col-md-3 searchfields-format">
							<select class="counties-selectbox">
								<option value="" disabled selected>Counties</option>
								<option>Zagreb County</option>
								<option>Dubrovnik–Neretva County</option>
								<option>Split-Dalmatia County</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="col-md-3 searchfields-format">
							<input class="zipcode-textbox" type="text" placeholder="ZIP Code">
						</div>
						<div class="col-md-2 searchfields-format">
							<button class="btn btn-search" name="search_btn" id="search_btn"><i class="fa fa-search"></i><p class="search-btn-text">Search</p></button>
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-1">
			</div>
		</div>
	</div>
</div>


<div class="row">
	<div class="col-md-12 featured-list">
	<div class="container">
		<p class="featured-text">FEATURED <font class="lists-text">LISTS</font></p>
	</div>
        <div id="Carousel" class="carousel slide">
        
        <script type="text/javascript">
        	$(document).ready(function() 
        	{
				$('#Carousel').carousel({interval: 5000})
			});
        </script>

           	<ol class="carousel-indicators">
                <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                <li data-target="#Carousel" data-slide-to="1"></li>
                <li data-target="#Carousel" data-slide-to="2"></li>
                <li data-target="#Carousel" data-slide-to="3"></li>
                <li data-target="#Carousel" data-slide-to="4"></li>
            </ol>     
            <!-- Carousel items -->
            <div class="carousel-inner">    
                <div class="item active">
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail">
		                	  			<img src="/images/walmart_pic.jpg" alt="Image">
		                	  		</a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/mcdo_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">Centar Joker | Put Brodarice 6, <br>Split 21000, Croatia</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/zara_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2430 Nouakchott Place<br>Washington, DC 20521-2430</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/ikea_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">3290 Hermosillo Place<br>Washington, DC 20521-3290</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/mcdo_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">Centar Joker | Put Brodarice 6, <br>Split 21000, Croatia</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/zara_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2430 Nouakchott Place<br>Washington, DC 20521-2430</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/ikea_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">3290 Hermosillo Place<br>Washington, DC 20521-3290</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                </div><!--.item-->
                 
                <div class="item">
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/mcdo_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">Centar Joker | Put Brodarice 6, <br>Split 21000, Croatia</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/zara_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2430 Nouakchott Place<br>Washington, DC 20521-2430</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/ikea_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">3290 Hermosillo Place<br>Washington, DC 20521-3290</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/honda_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">4150 Sydney Place<br>Washington, DC 20521-4150</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/hotel_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">7100 Athens Place<br>Washington, DC 20521-7100</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                </div><!--.item-->
                
                <div class="item">
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                </div><!--.item-->

                <div class="item">
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                	<div class="featured-list-layer">
	                	<div class="container">
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	  	<div class="col-md-3">
	                	  		<div class="business-holder">
		                	  		<a href="#" class="thumbnail business-thumbnail"><img src="/images/walmart_pic.jpg" alt="Image"></a>
		                	  		<div class="business-location-holder">
		                            	<i class="material-icons location-icon">location_on</i>
		                               	<div class="spacer-location-thumbnail">
		                               		<p class="business-location">2050 Bamako Place<br>Washington, DC 20521-2050</p>
		                            	</div>
	                            	</div>
	                            	<div class="rating-holder">
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            		<i class="glyphicon glyphicon-star"></i>
	                            	</div>
                            	</div>
	                	  	</div>
	                	</div>
                	</div><!--.row-->
                </div><!--.item-->

            </div><!--.carousel-inner-->
            <a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
            <a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
        </div><!--.Carousel-->                 
	</div>
</div>

<div class="container">
	<p class="main-text">MAIN <font class="categories-text">CATEGORIES</font></p>
</div>
<div class="category-layer">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">restaurant</i><p>Food</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-hotel fa-5x"></i><p>Hotels</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-automobile fa-5x"></i><p>Automotive</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">nature</i><p>Beauty & Spa</p>
					</div>
				</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">restaurant</i><p>Food</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-hotel fa-5x"></i><p>Hotels</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-automobile fa-5x"></i><p>Automotive</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">nature</i><p>Beauty & Spa</p>
					</div>
				</div>
				</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">restaurant</i><p>Food</p>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-hotel fa-5x"></i><p>Hotels</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="fa fa-automobile fa-5x"></i><p>Automotive</p></button>
					</div>
				</div>
				</a>
			</div>
			<div class="col-md-3">
				<a href="">
				<div class="category-icon-holder">
					<div class="icon-holder">
						<i class="material-icons category-icon">nature</i><p>Beauty & Spa</p>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>
</div>
@endsection