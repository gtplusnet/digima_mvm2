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