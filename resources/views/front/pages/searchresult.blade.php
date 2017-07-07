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
			<div class="col-md-12">
				<div>
					<div class="col-md-5">
						<img src="/images/mcdo_pic.jpg" alt="Image">
					</div>
					<div class="col-md-7">
						<p>McDonald's</p>
						<p>123-456-7890</p>
						<p>167 W 74th St, Upper West Side, <br>New York, NY 10023, United States</p>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
</div>
@endsection