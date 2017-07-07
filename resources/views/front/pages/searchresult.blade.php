@extends('front.layout.layout')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-right">
			<p>Search > Mc'Donalds</p>
		</div>
	</div>
</div>
<div class="container">
	<div>
		<p>SEARCH RESULT FOR: MC'DONALDS</p>
	</div>
	<div>
		<div class="col-md-8">
			<div>
				<div class="pull-left">
					<select>
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<i class="glyphicon glyphicon-th-list"></i>
					<div class="pull-right">
						<i class="glyphicon glyphicon-th"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			
		</div>
	</div>
</div>
@endsection