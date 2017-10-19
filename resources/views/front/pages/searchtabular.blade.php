@extends('front.layout.layout')
@section('content')
<div class="main-body">	
	<div class="banner-searchtabular" style="background-image: url('/images/banner_registration.jpg')">
		<div class="container">
			<div class="pull-right">
				<p class="searchtabular-text">Search > <a class="searchtabular-link" href="">Mc'Donalds</a></p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="col-md-8 searchtabular-table">
			<div class="searchtabular-sort-holder">
				<div class="pull-left">
					<select class="searchtabular-sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="searchtabular-sort-tabs">
						<div class="searchtabular-sort-icon-holder">
							<a class="searchtabular-sort-icon" href="/searchresult"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="searchtabular-sort-icon-holder">
								<a class="searchtabular-sort-icon" href="/searchtabular"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
				
			<div class="col-md-12 searchtabular-main-body">
				<div class="col-md-12 searchtabular-result-container">
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 searchtabular-result-container">
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12 searchtabular-result-container">
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
							</div>
						</div>
					</div>
					<div class="col-md-4 searchtabular-result-holder">
						<div class="col-md-12 searchtabular-padding-format">
							<div class="col-md-12">
								<img class="img-responsive searchtabular-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
							</div>
							<div class="col-md-12 searchtabular-title-container">
								<a href="/business"><p class="searchtabular-business-title">Mc'Donalds</p></a>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="fa fa-phone searchtabular-contact-icon"></i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-contact-details">123-456-7890</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<div class="col-md-2 searchtabular-padding-format">
									<i class="material-icons">location_on</i>
								</div>
								<div class="col-md-10 searchtabular-padding-format">
									<p class="searchtabular-address-details">167 W 74th St, Upper West Side, New York, NY 10023, United States</p>	
								</div>
							</div>
							<div class="col-md-12 searchtabular-detail-container">
								<p class="searchtabular-business-description">Description of the store Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do...</p>
							</div>
							<div class="col-md-12 searchtabular-socialnetwork-container">
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-facebook searchtabular-fb-icon"></i> Like</a>
								<a href="" class="searchtabular-socialnetwork-link"><i class="fa fa-twitter searchtabular-twitter-icon"></i> Tweet</a>
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
			<div class="searchtabular-search-listing-holder">
				<div class="searchtabular-search-listing-container">
					<p class="searchtabular-searchlisting-title">SEARCH LISTING</p>
				    <form>
					    <div class="searchtabular-form-container">
							<label class="searchtabular-form-label">Keyword</label>
						    <input class="category-box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="searchtabular-form-container">
						    <label class="searchtabular-form-label">Category</label>
						    <select class="searchtabular-box-format">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="searchtabular-form-container">
						    <label class="searchtabular-form-label">Counties</label>
						    <select class="searchtabular-box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="searchtabular-form-container">
						    <label class="searchtabular-form-label">ZIP Code</label>
						    <input class="searchtabular-box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="searchtabular-searchlisting-btn">
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