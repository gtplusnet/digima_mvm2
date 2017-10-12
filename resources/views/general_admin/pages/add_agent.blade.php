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
	       <li class="active li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/agent">AGENT</a></li>
	        <li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/supervisor">SUPERVISOR</a></li>
	</ul>

	<div id="showHereSuccess">
	</div>

	 @if (Session::has('message'))
	 <div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
	@endif
</div>

<div class="tab-content" style="">
	<div class="col-md=-12">
		<div>
		<div class="pull-left" style="margin:20px 0px 20px 20px">
			<button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
		</div>

		<div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">AGENT</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 390px;width: 110%" >
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
							<div class="form-group col-md-2">
								<label for="primary_phone" >Primary Phone</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="primary_phone" id="primary_phone" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="secondary_phone" >Secondary Phone</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="secondary_phone" id="secondary_phone" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>

						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="other_info" >Other Information</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="other_info" id="other_info" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>

						<div class="col-sm-12">
							<center><button type="submit" class="save_agent btn btn-primary" name="save_agent" id="save_agent">Save</button></center>
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
			<table class="display table agent_container" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>ID</th>
						<th>First Name</th>
						<th>Last Name</th>
						<th>Email</th>
						<th>Primary Phone</th>
						<th>Secondary Phone</th>
						<th>Other Information</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($_data as $data)
					<tr>
						<td>{{$data->agent_id}}</td>
						<td>{{$data->first_name}}</td>
						<td>{{$data->last_name}}</td>
						<td>{{$data->email}}</td>
						<td>{{$data->primary_phone}}</td>
						<td>{{$data->secondary_phone}}</td>
						<td>{{$data->other_info}}</td>
						<td><a href="#"><button type="button" agent_id="{{$data->agent_id}}" class="btn btn-warning edit_agent_btn" data-toggle="modal"  id="view_btn" data-target="#myModalEdit{{$data->agent_id}}"><i class="fa fa-pencil" aria-hidden="true" ></i>Edit</button>

						<a href="/general_admin/manage_user/delete_agent_submit/{{$data->agent_id}}"><button type="button" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>Delete</button></td>
					</tr>
					<div class="modal fade" id="myModalEdit{{$data->agent_id}}" role="dialog">
						<div class="modal-dialog modal-md">
						<form method="POST" class="edit_agent_form">
							{{ csrf_field() }}
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close reload" data-dismiss="modal">&times;</button>
									<h4 class="modal-title">Edit Category</h4>
								</div>
								<div class="modal-body" style="margin-bottom: 350px;" >
									<div id="showHere2">
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
										<label for="first_name" >First Name</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->first_name}}" type="text" class="form-control" name="first_name" id="first_name{{$data->agent_id}}"  style="width:100%;"/>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group col-md-3">
										<label for="last_name" >Last Name</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->last_name}}" type="text" class="form-control" name="last_name" id="last_name{{$data->agent_id}}"  style="width:100%;"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="email" >Email</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->email}}" type="text" class="form-control" name="email" id="email{{$data->agent_id}}" style="width:100%"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="primary_phone" >Primary Phone</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->primary_phone}}" type="text" class="form-control" name="primary_phone" id="primary_phone{{$data->agent_id}}" style="width:100%"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="secondary_phone" >Secondary Phone</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->secondary_phone}}" type="text" class="form-control" name="secondary_phone" id="secondary_phone{{$data->agent_id}}" style="width:100%"/>
										</div>
									</div>

									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="other_info" >Other Infomation</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$data->other_info}}" type="text" class="form-control" name="other_info" id="other_info{{$data->agent_id}}" style="width:100%"/>
										</div>
									</div>

										<input value="{{$data->agent_id}}" type="hidden" id="agent_id"/>

										<input type="hidden" name="agent_id" value="{{$data->agent_id}}"> 
										<div class="col-sm-12">

										<center><button type="submit" class="update_agent btn btn-primary" name="agent_id" id="agent_id_btn">Update</button></center>
									    </div>	
									</div>						
								</div>

								<div class="modal-footer" style="border:50px;">	
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


