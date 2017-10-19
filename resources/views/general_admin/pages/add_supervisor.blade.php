@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<div class="page-title">
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
        </ol>
    </div>
    <ul class="nav nav-tabs">
		   <li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/general_admin">GENERAL ADMIN</a></li>
	       <li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/team">TEAM</a></li>
	       <li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/agent">AGENT</a></li>
	        <li class="active li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/supervisor">SUPERVISOR</a></li>
	</ul>

	 @if (Session::has('message'))
	<div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
	@endif
</div>

<div class="tab-content" style="">
	<div class="col-md=-12">
		
		<div class="pull-left" style="margin:20px 0px 20px 20px">
			<button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
		</div>
		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">SUPERVISOR</h4>
					</div>
					<div id="showHereSuccess1">
					</div>
					<div class="modal-body" style="margin-bottom: 220px;width: 110%" >
						<div id="showHere1">
						</div>

						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="first_name" >First name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="first_name" id="first_name"  style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="last_name" >Last name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="last_name" id="last_name"  style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>


						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="email" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="email" id="email" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="password" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="password" id="password" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<center><button type="submit" class="save_supervisor btn btn-primary" name="save_supervisor" id="save_supervisor">Save</button></center>
						</div>
						
					</div>
					<div class="modal-footer" style="border:0px;">
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="home" class=" col-md-12 tab-pane fade in active">
		<div class="table-responsive" id="showHere3">
			<table class="display table supervisor_container" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th></th>
					</tr>
				</thead>
				<tbody>	
					@foreach($_data as $data)
					<tr>
						<td>{{$data->supervisor_id}}</td>
						<td>{{$data->first_name}}</td>
						<td>{{$data->last_name}}</td>
						<td>{{$data->email}}</td>
						<td><a href="#"><button type="button" supervisor_id="{{$data->supervisor_id}}" class="btn btn-warning edit_supervisor_btn" data-toggle="modal"  id="view_btn" data-target="#myModalEdit{{$data->supervisor_id}}"><i class="fa fa-pencil" aria-hidden="true" ></i>Edit</button>

						<a href="/general_admin/manage_user/delete_supervisor_submit/{{$data->supervisor_id}}"><button type="button" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>Delete</button></td>
					</tr>
					<div class="modal fade" id="myModalEdit{{$data->supervisor_id}}" role="dialog">
						<div class="modal-dialog modal-md">
						<form method="POST" class="edit_supervisor_form">
							{{ csrf_field() }}
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close reload" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Category</h4>
								</div>
								<div id="showHere2">
									</div>
								<div class="modal-body" style="margin-bottom: 200px;" >
									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="first_name" >First Name</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->first_name}}" type="text" class="form-control" name="first_name" id="first_name{{$data->supervisor_id}}"  style="width:100%;margin-bottom: 20px;"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="last_name" >Last Name</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->last_name}}" type="text" class="form-control" name="last_name" id="last_name{{$data->supervisor_id}}"  style="width:100%;margin-bottom: 20px;"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="email" >Email</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->email}}" type="text" class="form-control" name="email" id="email{{$data->supervisor_id}}" style="width:100%"/>
											<input value="{{$data->supervisor_id}}" type="hidden" id="supervisor_id"/>
										</div>
										<input type="hidden" name="supervisor_id" value="{{$data->supervisor_id}}">
									</div>
									<div class="col-sm-12">
										<center><button type="submit" class="update_supervisor btn btn-primary" name="supervisor_id" id="supervisor_id_btn">Update</button></center>
									</div>							
								</div>

								<div class="modal-footer" style="border:0px;">		
								</div>
							</div>
						</form>
						</div>
					</div>
					@endforeach
				</tbody>	
			</table>
		</div>
	</div>
</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin.js"></script>
@endsection