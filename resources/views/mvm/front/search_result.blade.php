@extends('mvm.front.front_layout')

@section('content')
	<div class="search-result-form" style="background-color: #DCDCDC;">
		<div class="search-result-content" style="padding-top: 50px; padding-bottom: 100px;">
			<div class="row">
				@if(count($business_search) > 0)
					@foreach($business_search as $business_search)
						<div class="col-md-3" style="padding: 10px 25px;">
							<p><a href="/business_info?business_id={{ $business_search->business_id }}" style="font-size: 20px;">{{ $business_search->business_name }}</a></p>
							<p style="font-size: 15px; color: #FF4500; font-style: italic;">Complete Address : <span style="color: black; font-style: normal;">{{ $business_search->business_complete_address }}</span></p>
						</div>
					@endforeach
				@else
					<div style="margin-top: 60px;">
						<p style="text-align: center; font-size: 30px;">{{ 'No results found.' }}</p>
					</div>
				@endif
			</div>
		</div>
	</div>

@endsection

	
