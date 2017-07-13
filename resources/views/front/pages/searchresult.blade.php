@extends('front.layout.layout')
@section('title', 'Search Result')
@section('content')
@if(count($business_search) > 0)
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-right">
			<p class="search-text">Search > <a class="search-link" href="">{{ $business_name }}</a></p>
		</div>
	</div>
</div>
<div class="container">
	<div>
		<p class="searched-business">SEARCH RESULT FOR: {{ $business_name }}</p>
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
					@foreach($business_search as $item)
						<div class="search-result-holder">
							<div class="col-md-5 business-profilepic-holder">
								<a href="/business">
									<img class="business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
								</a>
								<div class="icon-container">
									<a href="{{ $item->facebook_url }}" class="link-style" target="blank"><i class="fa fa-facebook icon-style-fb"></i> Like</a>
									<a href="" class="link-style"><i class="fa fa-twitter icon-style-twitter"></i> Tweet</a>
								</div>
							</div>
							<div class="col-md-7">
								<p class="business-title"><a href="/business_info?business_id={{ $item->business_id }}" style="text-decoration: none; color: #333;">{{ $item->business_name }}</a></p>
								<div class="business-details-holder">
									<div class="business-details">
										<i class="fa fa-phone details"></i><p>&nbsp;{{ $item->business_phone }}</p>
									</div>
									<div class="business-details">
										<i class="material-icons details">location_on</i><p>{{ $item->business_complete_address }}</p>
									</div>
								</div>
								<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
							</div>
						</div>
					@endforeach
				@else
			@endif
				<div class="pagination-holder">
					{!! $business_search->appends(Request::capture()->except('page'))->render() !!}
					{{-- <ul class="pagination">
					  <li class="active"><a href="#">1</a></li>
					  <li><a href="#">2</a></li>
					  <li><a href="#">3</a></li>
					  <li><a href="#">4</a></li>
					  <li><a href="#">5</a></li>
					  <li class="active"><a href="#">Next</a></li>
					</ul> --}}
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