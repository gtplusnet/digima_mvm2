@extends('general_admin.general_admin_layout')
@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('content')
	<div class="text-center" id="dashboard-button-container">
		<div class="dashboard-buttons">
			<button type="button" class="btn btn-primary btn-lg" id="merchant-button"><i class="fa fa-user-circle" aria-hidden="true"></i> Merchants <span class="badge badge-count">{{ $business_count }}</span></button>
			<button type="button" class="btn btn-primary btn-lg" id="agent-button"><i class="fa fa-phone-square" aria-hidden="true"></i> Agents <span class="badge badge-count">5</span></button>
		</div>
	</div>
	<div class="business-list">
		<div class="search-business text-center">
			<form class="form-inline" method="POST">
  				<div class="form-group">
    				<label for="search_merchant">Search Business:</label>
    				<input type="text" class="form-control" id="search_business" name="search_business">
  				</div>
  			</form>
		</div>
		<div class="table-responsive">
			<table class="table table-bordered" id="business-table">
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Business Name</th>
			        <th>Date of Membership</th>
			        <th>Details</th>
			        <th>Status</th>
			      </tr>
			    </thead>
			    <tbody class="business-list-result">
			    	
				    	@foreach($business_list as $business_item)
					     	<tr>
						     	<td>{{ $business_item->business_id }}</td>
						     	<td>{{ $business_item->business_name }}</td>
						     	<td>{{ $business_item->date_created }}</td>
						     	<td><a href="#">View</a></td>
						     	<td>
						     		@if($business_item->status == 1)
						     			{{ "Activated" }}
						     		@elseif($business_item->status == 2)
						     			{{ "Not Activated" }}
						     		@else
						     			{{ "Disabled" }}
						     		@endif
						     	</td>
					      	</tr>
				      	@endforeach
			      
			    </tbody>
	  		</table>
  		</div>
  		<div class="text-center pagination-container">
  			{!! $business_list->render() !!}
  		</div>
	</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/general_admin/general_admin.js"></script>
@endsection