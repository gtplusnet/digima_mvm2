@extends('front.layout.layout')
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
							<a class="category-sort-icon" href=""><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="category-sort-icon-holder">
								<a class="category-sort-icon" href=""><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 category-result-container">
				<div class="category-result-holder">
					<div class="col-md-5 category-business-profilepic-holder">
							<img class="category-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
						<div class="category-icon-container">
							<a href="" class="category-link-style"><i class="fa fa-facebook category-icon-style-fb"></i> Like</a>
							<a href="" class="category-link-style"><i class="fa fa-twitter category-icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<a href=""><p class="category-business-title">McDonald's</p></a>
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
				<div class="category-pagination-holder">
					<ul class="pagination">
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li class="active"><a href="#">Next</a></li>
					</ul>
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
			<div class="category-featuredlist-holder">
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
			</div>
		</div>
	</div>
</div>
@endsection