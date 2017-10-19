@extends('front.layout.layout')
@section('content')
<div class="main-body">		
	<div class="banner-tabledcategory" style="background-image: url('/images/banner_registration.jpg')">
		<div class="container">
			<div class="pull-left">
	            <div class="tabledcategory-logo-container">
	                <img class="tabledcategory-logo" src="/images/food_logo.png">
	                <p class="tabledcategory-name">FOOD</p>
	            </div>
	        </div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-8 tabledcategory-table">
			<div class="tabledcategory-sort-holder">
				<div class="pull-left">
					<select class="tabledcategory-sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="tabledcategory-sort-tabs">
						<div class="tabledcategory-sort-icon-holder">
							<a class="tabledcategory-sort-icon" href="/category"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="tabledcategory-sort-icon-holder">
								<a class="tabledcategory-sort-icon" href="/resultsortgrid"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="col-md-12 tabled-main-body">
				<div class="col-md-12 tabled-result-container">
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 tabled-result-container">
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 tabled-result-container">
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 tabled-result-holder">
						<div class="col-md-12 tabled-padding-format">
							<div class="col-md-12">
								<img class="img-responsive tabled-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 tabled-title-container">
								<a href="/business"><p class="tabled-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="fa fa-phone tabled-contact-icon"></i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<div class="col-md-2 tabled-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 tabled-padding-format">
									<p class="tabled-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 tabled-detail-container">
								<p class="tabled-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 tabled-socialnetwork-container">
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-facebook tabled-fb-icon"></i> Like</a>
								<a href="" class="tabled-socialnetwork-link"><i class="fa fa-twitter tabled-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- PAGINATION -->
			<div class="col-md-12 tabularsort-pagination-section">
				<div class="pagination">
					<a class="active" href="#">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#">4</a>
					<a href="#">5</a>
					<a href="#">6</a>
					<a href="#" class="pagination-next-btn">NEXT</a>
				</div>
			</div>

		</div>
		<div class="col-md-4">
			<div class="tabledcategory-search-listing-holder">
				<div class="tabledcategory-search-listing-container">
					<p class="tabledcategory-searchlisting-title">SEARCH LISTING</p>
				    <form>
					    <div class="tabledcategory-form-container">
							<label class="tabledcategory-form-label">Keyword</label>
						    <input class="category-box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="tabledcategory-form-container">
						    <label class="tabledcategory-form-label">Category</label>
						    <select class="tabledcategory-box-format">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="tabledcategory-form-container">
						    <label class="tabledcategory-form-label">Counties</label>
						    <select class="tabledcategory-box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="tabledcategory-form-container">
						    <label class="tabledcategory-form-label">ZIP Code</label>
						    <input class="tabledcategory-box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="tabledcategory-searchlisting-btn">
					    </div>
				    </form>
				</div>
			</div>


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
				                    	<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="2">
				                    </div>
				                    <div class="detail-name-container">	
				                    	<p class="detail-name-title">Name of Business</p>
				                    </div>
				                </div>
				            </div>
				       	</div>			                
				        <!-- Controls -->
				        <a class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
				            <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
				       	    <span class="sr-only">Previous</span>
				        </a>
				        <a class="right carousel-control features-control" href="#carousel-pager" role="button" data-slide="next">
				            <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
				            <span class="sr-only">Next</span>
				        </a>
				    </div>
				</div>
			</div>
			<script type="text/javascript">
				$('.carousel .vertical .item').each(function(){
					var next = $(this).next();
					if (!next.length) {
						next = $(this).siblings(':first');
					}
					next.children(':first-child').clone().appendTo($(this));
					  
					for (var i=1;i<2;i++) {
					    next=next.next();
					   	if (!next.length) {
					   	next = $(this).siblings(':first');
				 	}
					    
				    	next.children(':first-child').clone().appendTo($(this));
				  	}
				});
			</script>
		</div>
	</div>
</div>
@endsection