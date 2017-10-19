@extends('admin.layout.layout')
@section('content')
<div class="page-title clearfix">
    <h3>USER</h3>
    <br>
		<nav>
			<a style="font-size: 15px;" href="/admin/add/team">ADD TEAM</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a style="font-size: 15px;" href="/admin/add/agent">ADD AGENT</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a style="font-size: 15px;" href="/admin/add/supervisor">ADD SUPERVISOR</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a style="font-size: 15px;" href="/admin/add/admin">ADD ADMIN</a>
		</nav>
	</br>
</div>
	<div id="main-wrapper">
	    <div class="row">
	        <div class="panel panel-primary">
	            <div class="panel-heading clearfix">
	                <h3 class="panel-title" style="color: white;">SUPERVISOR</h3>
	            </div>

	            <div class="panel-body">
	                <h4>Personal Information</h4>
	                @if(session()->has('warning'))
				    <div class="alert alert-success">
					  <strong>Success!</strong> Supervisor Successfully Added!.
					</div>
				@endif
	                <form class="form-horizontal" method="post" action="/admin/add_supervisor_submit">
	                	{{csrf_field()}}
	                    <div class="form-group">
	                        <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
	                        <div class="col-sm-2">
	                           <select class="form-control " name="prefix" id="prefix" style="width: 150px; border-radius: 20px;">  
							   <option>Mr.</option>
							   <option>Miss</option>
							   <option>Dr.</option>
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
	                    <div class="form-group">
	                    	<div class="col-sm-9">
	                    	</div>
	                        <div class="col-sm-3">
	                            <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">ADD SUPERVISOR</button>
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