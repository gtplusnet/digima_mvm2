@extends('admin.layout.layout')
@section('content')
<div class="page-title clearfix">
	<h3>{{ $page }}</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/admin">Home</a></li>
			<li class="active">{{ $page }}</li>
		</ol>
	</div>
</div>
<div id="main-wrapper">

<!-- 	<div id="main-wrapper">
	    <div class="row">
	        <div class="panel panel-primary">
	            <div class="panel-heading clearfix">
	                <h3 class="panel-title" style="color: white;">Profile</h3>
	            </div>

	            <div class="panel-body">
	                <h4>Personal Information</h4>
	                <form class="form-horizontal" method="post">
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
	                        <div class="col-sm-2">
	                           <select class="form-control " name="prefix" id="prefix" style="width: 150px; border-radius: 20px;">
							   <option>Dr.</option>
							   <option>Miss</option>
							   <option>Mr.</option>
							   <option>Mrs.</option>
							   <option>Ms.</option>
	  						</select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">First Name</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" id="input-rounded">
	                        </div>
	                        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" id="input-rounded">
	                        </div>
	                    </div>
	                    <hr>
	                    <h4>Business Information</h4>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Business Name</label>
	                        <div class="col-sm-10">
	                            <input type="text" class="form-control input-rounded" id="input-rounded">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Business Primary Phone</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" id="input-rounded">
	                        </div>

	                         <label for="input-Default" class="col-sm-2 control-label">Business Alternate Phone</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" id="input-rounded">
	                        </div>
	                    </div>

	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
	                        <div class="col-sm-10">
	                            <textarea class="form-control input-rounded" placeholder="Address" rows="4" style="border-radius: 20px; resize: none;"></textarea>
	                        </div>
	                    </div>

	                    
	                    <div class="form-group">
	                        <label for="county" class="col-sm-2 control-label">County</label>
	                        <div class="col-sm-2">
	                        	<select class="form-control" name="county_list" id="county_list" style="border-radius: 20px;">
						   			<option value="--Select County--">--Select County--</option>
									   @foreach($county_list as $county_list)
									   	 <option value="{{ $county_list->county_id }}">{{ $county_list->county_name }}</option>
									   @endforeach
  								</select>
	                        </div>
	                        <label for="city" class="col-sm-2 control-label">City</label>
	                        <div class="col-sm-2">
	                            <select class="form-control" name="city_list" id="city_list" style="width: 190px; border-radius: 20px;">
						   			<option value="--No County Selected--">--No County Selected--</option>
  								</select>
	                        </div>
	                        <label for="zip_code" class="col-sm-2 control-label">Postal</label>
	                        <div class="col-sm-2">
				   	 			<input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Postal Code" readonly="true" style="border-radius: 20px;">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                    	<div class="col-sm-9">
	                    	</div>
	                        <div class="col-sm-3">
	                            <button type="button" class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Continue</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div> -->
	
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading clearfix">
				<h3 class="panel-title" style="color: white;">Profile</h3>
			</div>
			<div class="panel-body">
				<h4>Team Information</h4>
				@if(session()->has('warning'))
				    <div class="alert alert-success">
					  <strong>Success!</strong> Team Added Successfully!.
					</div>
				@endif
				<form class="form-horizontal" method="post" action="/admin/add_team_submit">
					{{csrf_field()}}
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Team Name</label>
						<div class="col-sm-4">
							<input type="text" class="form-control input-rounded" name="team_name"  id="team_name" required>
						</div>
					</div>
					<div class="form-group">
						<label for="input-Default" class="col-sm-2 control-label">Team Information</label>
						<div class="col-sm-10">
							<textarea class="form-control input-rounded" name="team_description" id="team_description" placeholder="Description" rows="4" style="border-radius: 20px; resize: none;" required></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-9">
						</div>
						<div class="col-sm-3">
							<button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Add Team</button>
						</div>
					</div>
				</form>
				<hr>
				<h4>Team List</h4>
				
				<div class="form-group">
					<label for="input-Default" class="col-sm-2 control-label">Business Address</label>
					<div class="col-sm-10">
						<textarea class="form-control input-rounded" placeholder="Address" rows="4" style="border-radius: 20px; resize: none;"></textarea>
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection