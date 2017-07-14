@extends('mvm.front.front_layout')

@section('content')
	<div class="search-form">
		<div class="search-content">
			<form class="form-inline" id="search-form" action="/search_result" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
				    <input type="text" class="form-control input-lg" name="business_name" id="business_name" style="width: 400px;" placeholder="Enter Business Name..">
				</div>
					<button type="button" class="btn btn-primary btn-lg" name="search_btn" id="search_btn">SEARCH</button>
			</form>
		</div>
	</div>
@endsection
