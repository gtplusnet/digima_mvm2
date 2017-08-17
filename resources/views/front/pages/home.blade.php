@extends('front.layout.layout')
@section('title', 'Home')
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
	<div class="homecarousel-list-container">
	<div class="homecarousel-title-container">
		<p class="homecarousel-title">FEATURED <font class="homecarousel-title-thin">LIST</font></p>
	</div>


	<!-- HOME CAROUSEL -->
	<div id="homeCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
  	<!-- Indicators -->
	  	<ol class="carousel-indicators home-indicators">
	    	<li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
	    	<li data-target="#homeCarousel" data-slide-to="1"></li>
	    	<li data-target="#homeCarousel" data-slide-to="2"></li>
	  	</ol>
	  	<!-- Wrapper for slides -->
	  	<div class="container">
		  	<div class="carousel-inner">
		    	<div class="item active">
		    		<div class="col-md-12">
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="item">
		      		<div class="col-md-12">
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
		    		</div>
		    	</div>
		    	<div class="item">
		    		<div class="col-md-12">
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
			    		<div class="col-md-3">
				    		<div class="col-md-12 homecarousel-item-container">	
				    			<div class="col-md-12 homecarousel-overlay-container">
				    				<img class="img-responsive" src="/images/walmart_pic.jpg">
				    				<div class="overlay">
				    					<div class="homecarousel-btn-call-container">
											<button class="homecarousel-overlay-btn-call">
												<i class="fa fa-phone"></i><p class="homecarousel-overlay-btn-name">Call Now</p>
											</button>
										</div>
										<div class="homecarousel-btn-send-container">
											<button class="homecarousel-overlay-btn-send">
												<i class="fa fa-mobile-phone"></i><p class="homecarousel-overlay-btn-name">Send to Mobile</p>
											</button>
										</div>
									</div>
				    			</div>
				    			<div class="col-md-12 homecarousel-details-address-container">
					    			<div class="col-md-2 homecarousel-details-container">
					    				<i class="material-icons homecarousel-location-icon">location_on</i>
					    			</div>
					    			<div class="col-md-10 homecarousel-details-container">
					                    <p>2050 Bamako Place Washington, DC 20521-2050</p>
					    			</div>
					    		</div>
					    		<div class="col-md-12 homecarousel-details-container">
						    		<div class="col-md-12 homecarousel-rating-container">
						    			<i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                        <i class="glyphicon glyphicon-star"></i>
				                    </div>
					    		</div>
					    	</div>
			    		</div>
		    		</div>
		    	</div>
		  	</div>
		</div>
		<!-- Left and right controls -->
		<a class="left carousel-control homecarousel-control" href="#homeCarousel" data-slide="prev">
	    	<span class="glyphicon glyphicon-chevron-left"></span>
	    	<span class="sr-only">Previous</span>
	  	</a>
	  	<a class="right carousel-control homecarousel-control" href="#homeCarousel" data-slide="next">
	    	<span class="glyphicon glyphicon-chevron-right"></span>
	    	<span class="sr-only">Next</span>
	  	</a>
	</div>

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