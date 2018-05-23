@extends('layout.general_layout')
@section('content')
<div class="page-title clearfix">
	<h3>Add Merchant</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/agent">Home</a></li>
			<li class="active">{{ $page }}</li>
		</ol>
	</div>
</div>
<div id="main-wrapper">
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading clearfix">
				<h3 class="panel-title" style="color: white;">Add Merchant</h3>
			</div>
			@if (Session::has('add_merchant'))
			<div class="alert alert-success"><center>{{ Session::get('add_merchant') }}</center></div>
			@endif
			<div class="panel-body">
				<h4>PERSONAL INFORMATION</h4>
				<form class="form-horizontal" role="form" method="post" action="/add_client_submit">
					{{csrf_field()}}
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Prefix</label>
						<div class="col-sm-4">
							<select class="form-control " name="prefix" id="prefix" style="width: 150px; border-radius: 20px;">
								<option>Dr.</option>
								<option>Miss</option>
								<option>Mr.</option>
								<option>Mrs.</option>
								<option>Ms.</option>
							</select>
						</div>
						<label for="input-Default" class="col-sm-2 control-label">First Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="first_name" id="first_name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Email Address</label>
						<div class="col-sm-4">
							<input type="email" class="form-control input-rounded" name="email_address" id="email_address" required>
						</div>
						<label for="input-Default" class="col-sm-2 control-label">Last Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="last_name" id="last_name" required>
						</div>
					</div>
					<hr>
					<h4>BUSINESS INFORMATION</h4>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Business Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control input-rounded" name="business_name" id="business_name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Primary Number</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="primary_business_phone" id="primary_business_phone"  required>
						</div>
						<label for="input-Default" class="col-sm-2 control-label">Fax Number</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="fax_number" id="fax_number">
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Secondary Number</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="secondary_business_phone" id="secondary_business_phone">
						</div>
						<label for="input-Default" class="col-sm-2 control-label">Membership</label>
						<div class="col-sm-4">
							<select class="form-control" name="membership" id="membership" style="border-radius: 20px;" >
								@foreach($membership_list as $membership_lists)
								<option value="{{ $membership_lists->membership_id }}">{{ $membership_lists->membership_name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Facebook URL</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="facebook_url" id="facebook_url">
						</div>
						<label for="input-Default" class="col-sm-2 control-label">Twitter URL</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="twitter_username" id="twitter_username">
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Business Complete Address</label>
						<div class="col-sm-10">
							<textarea class="form-control input-rounded" name="business_address" id="business_address" placeholder="Address" rows="4" style="border-radius: 20px; resize: none;"  required></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="county" class="col-sm-2 control-label">County</label>
						<div class="col-sm-2">
							
							<select class="form-control" name="county_id" id="county_id" style="border-radius: 20px;">
								<option value="--Select County--">--Select County--</option>
								@foreach($county_list as $county_lists)
								<option value="{{ $county_lists->county_id }}">{{ $county_lists->county_name }}</option>
								@endforeach
							</select>
						</div>
						<label for="city" class="col-sm-2 control-label">City</label>
						<div class="col-sm-2">
							<select class="form-control" name="city_list" id="city_list" style="width: 190px; border-radius: 20px;">
								<option value="--No County Selected--">--No County Selected--</option>
							</select>
						</div>
						<label for="zip_code" class="col-sm-2 control-label">Postal Code</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" readonly="true" style="border-radius: 20px;">
						</div>
					</div>
					
					<div class="form-group">
						<div class="col-sm-9">
						</div>
						<div class="col-sm-3">
							<button  class="btn btn-primary btn-lg"  name="continueButton" id="continueButton" style="border-radius: 20px; float: right;">Add Merchant</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script src="/assets/js/agent/agent_add_merchant.js"></script>
@endsection