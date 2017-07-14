@extends('front.layout.layout')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-right">
			<p class="search-text">Search > <a class="search-link" href="">Mc'Donalds</a></p>
		</div>
	</div>
</div>
<div class="container">
	<div>
		<p class="searched-business">SEARCH RESULT FOR: MC'DONALDS</p>
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
							<a class="sort-icon" href=""><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="sort-icon-holder">
								<a class="sort-icon" href=""><i class="glyphicon glyphicon-th"></i></a>
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
						<a href="/business"><p class="business-title">McDonald's</p></a>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p>123-456-7890</p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="search-result-holder">
					<div class="col-md-5 business-profilepic-holder">
						<img class="business-profilepic" src="/images/mcdo_pic01.jpg" alt="Image">
						<div class="icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="business-title">McDonald's</p>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p>123-456-7890</p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="search-result-holder">
					<div class="col-md-5 business-profilepic-holder">
						<img class="business-profilepic" src="/images/mcdo_pic02.jpg" alt="Image">
						<div class="icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="business-title">McDonald's</p>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p>123-456-7890</p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="search-result-holder">
					<div class="col-md-5 business-profilepic-holder">
						<img class="business-profilepic" src="/images/mcdo_pic03.jpg" alt="Image">
						<div class="icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="business-title">McDonald's</p>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p>123-456-7890</p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="search-result-holder">
					<div class="col-md-5 business-profilepic-holder">
						<img class="business-profilepic" src="/images/mcdo_pic03.jpg" alt="Image">
						<div class="icon-container">
							<a href="" class="link-style"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
							<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
						</div>
					</div>
					<div class="col-md-7">
						<p class="business-title">McDonald's</p>
						<div class="business-details-holder">
							<div class="business-details">
								<i class="fa fa-phone details"></i><p>123-456-7890</p>
							</div>
							<div class="business-details">
								<i class="material-icons details">location_on</i><p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				<div class="pagination-holder">
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
			<div class="search-listing-holder">
				<div class="search-listing-container">
					<p class="searchlisting-title">SEARCH LISTING</p>
				    <form>
				    	<div class="form-container">
						    <label class="form-label">Keyword</label>
						    <input class="box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="form-container">
						    <label class="form-label">Category</label>
						    <select class="box-format">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="form-container">
						    <label class="form-label">Counties</label>
						    <select class="box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="form-container">
						    <label class="form-label">ZIP Code</label>
						    <input class="box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="searchlisting-btn">
					    </div>
				    </form>
				</div>
			</div>
			<div class="featuredlist-holder">
				<div class="featuredlist-title-holder">
					<div>
						<p class="featuredlist-title">FEATURED LIST</p>
					</div>
				</div>
				<div class="featuredlist-container">
					<div class="featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
					<div class="featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
					<div class="featured-details-container-last">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection