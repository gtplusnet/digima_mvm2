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
	                <h4>Personal Information</h4>
	                @if(session()->has('warning'))
				    <div class="alert alert-success">
					  <strong>Success!</strong> Agent Added to the Team Successfully!.
					</div>
				@endif
	                <form class="form-horizontal" method="post" action="/admin/add_agent_submit">
	                	{{csrf_field()}}
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
	                            <input type="text" class="form-control input-rounded" name="first_name" id="input-rounded">
	                        </div>
	                        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" name="last_name" id="input-rounded">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Email</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" name="email" id="input-rounded">
	                        </div>
	                        <label for="input-Default" class="col-sm-2 control-label">Password</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" name="password" id="input-rounded">
	                        </div>
	                    </div>
	                    <hr>
	                    <h4>Agent Basic Information</h4>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Team</label>
	                        <div class="col-sm-2">
	                           <select class="form-control " name="team" id="prefix" style="width: 150px; border-radius: 20px;">
							   @foreach($team_list as $teams)
							   <option value="{{$teams->team_id}}">{{$teams->team_name}}</option>
							   @endforeach
	  						</select>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Agent Primary Phone</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" name="primary_phone" id="input-rounded">
	                        </div>
	                         <label for="input-Default" class="col-sm-2 control-label">Agent Alternate Phone</label>
	                        <div class="col-sm-4">
	                            <input type="text" class="form-control input-rounded" name="secondary_phone" id="input-rounded">
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Agent Other Information</label>
	                        <div class="col-sm-10">
	                            <textarea class="form-control input-rounded" name="other_info" placeholder="Agent other information" rows="4" style="border-radius: 20px; resize: none;"></textarea>
	                        </div>
	                    </div>
	                  
	                    <div class="form-group">
	                    	<div class="col-sm-9">
	                    	</div>
	                        <div class="col-sm-3">
	                            <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Add Agent</button>
	                        </div>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection