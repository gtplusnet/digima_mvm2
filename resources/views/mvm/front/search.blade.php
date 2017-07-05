@extends('mvm.front.front_layout')

@section('content')
	<div class="search-form">
		<div class="row">
			<form method="POST">
				<div class="col-md-4">
					<label for="search_business">Search Businesses :</label>
					<input type="text" class="form-control" name="search_business" id="search_business" placeholder="E.g., Mcdo">
				</div>
				<div class="col-md-2 search-button">
					<button type="button" class="btn btn-primary form-control" name="search_btn" id="search_btn">Search</button>
				</div>
			</form>
		</div>
		<br>
		<div class="search-result-container">
			@foreach($business_result as $business_result)
				<p>{{ $business_result->business_name }}</p>
				<hr>
			@endforeach
		</div>
	</div>
@endsection