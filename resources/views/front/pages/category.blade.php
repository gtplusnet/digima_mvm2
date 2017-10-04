@extends('front.layout.layout')
@section('title', 'Category')
@section('content')
<div class="banner-category" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
            <div class="category-logo-container">
                <img class="category-logo" src="/images/food_logo.png">
                <p class="category-name">FOOD</p>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div>
		<div class="col-md-8 category-table">
			<div class="category-sort-holder">
				<div class="pull-left">
					<select class="category-sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="category-sort-tabs">
						<div class="category-sort-icon-holder">
							<a class="category-sort-icon" href="/category"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="category-sort-icon-holder">
								<a class="category-sort-icon" href="/resultsortgrid"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 category-result-container">
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
						<a href="/business">
							<img class="category-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
						</a>
						<div class="category-icon-container">
							<a href="" class="category-link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="category-link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<a href="/business"><p class="category-business-title">McDonald's</p></a>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>123-456-7890</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
						<img class="category-business-profilepic" src="/images/chowking_pic.jpg" alt="Image">
						<div class="category-icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="category-business-title">Chowking</p>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>123-456-7890</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
						<img class="category-business-profilepic" src="/images/kfc_pic.jpg" alt="Image">
						<div class="category-icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="category-business-title">KFC</p>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>123-456-7890</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
						<img class="category-business-profilepic" src="/images/wendy_pic.jpg" alt="Image">
						<div class="category-icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="category-business-title">Wendy's</p>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>123-456-7890</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
						<img class="category-business-profilepic" src="/images/max_pic.jpg" alt="Image">
						<div class="category-icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="category-business-title">Max's Restaurant</p>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>123-456-7890</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
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
		</div>
		<div class="col-md-4">
			<div class="category-search-listing-holder">
				<div class="category-search-listing-container">
					<p class="category-searchlisting-title">SEARCH LISTING</p>
				    <form>
				    	<div class="category-form-container">
						    <label class="category-form-label">Keyword</label>
						    <input class="category-box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="category-form-container">
						    <label class="category-form-label">Category</label>
						    <select class="category-box-format">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="category-form-container">
						    <label class="category-form-label">Counties</label>
						    <select class="category-box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="category-form-container">
						    <label class="category-form-label">ZIP Code</label>
						    <input class="category-box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="category-searchlisting-btn">
					    </div>
				    </form>
				</div>
			</div>
			<!-- <div class="category-featuredlist-holder">
				<div class="category-featuredlist-title-holder">
					<div>
						<p class="category-featuredlist-title">FEATURED LIST</p>
					</div>
				</div>
				<div class="category-featuredlist-container">
					<div class="category-featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="category-business-name-title">Name of Business</p>
					</div>
					<div class="category-featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="category-business-name-title">Name of Business</p>
					</div>
					<div class="category-featured-details-container-last">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="category-business-name-title">Name of Business</p>
					</div>
				</div>
			</div> -->
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