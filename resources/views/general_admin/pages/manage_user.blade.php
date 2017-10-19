@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<div class="page-title">
	<h3>Manage Team/Agent</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/admin">Home</a></li>
			<li class="active">Manage Team/Agent</li>
		</ol>
	</div>
</div>
<div id="main-wrapper">
	
	<ul class="nav nav-tabs">
		<li class="active li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/general_admin">GENERAL ADMIN</a></li>
		<li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/team">TEAM</a></li>
		<li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/agent">AGENT</a></li>
		<li class="li_me"><a  style="font-size: 15px;" href="/general_admin/manage_user/add/supervisor">SUPERVISOR</a></li>
	</ul>
	<ul class="nav nav-tabs">
		<li class="active li_me"><a data-toggle="pill" href="#agent">Agent</a></li>
		<li class="li_me"><a data-toggle="pill" href="#team">Team</a></li>
		<li class="li_me"><a data-toggle="pill" href="#supervisor"> Supervisor</a></li>
		<li class="li_me"><a data-toggle="pill" href="#admin">General Admin</a></li>
	</ul>
	
	<div id="showHereSuccess">
	</div>
	@if (Session::has('message'))
	<div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
	@endif
	<div class="tab-content" style="">
		
		<div>
			<div class="pull-left" style="margin:20px 0px 20px 20px">
				<button type="button"  data-toggle="modal" data-target="#myModalAgent"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
			</div>
		</div>
		<div id="agent" class=" col-md-12 tab-pane fade in  active">
			<div class="row">
				<div class="panel-body">
					
					<div class="table-responsive" id="showHere3">
						<table class="display table admin_container" style="width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Full Name</th>
									<th>Email</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_data as $data)
								<tr>
									<td>{{$data->admin_id}}</td>
									<td>{{$data->full_name}}</td>
									<td>{{$data->email}}</td>
									<td><select class="actionbox" id="actionbox" data-name="" data-id="">
                                    <option value="">Action</option>
                                    <option value="assign">Assign</option>
                                    <option value="delete">Delete</option>
                                </select></td>
								</tr>
								
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div id="team" class=" col-md-12 tab-pane fade in">
			<div class="table-responsive" id="showHere3">
				<table class="display table admin_container" style="width: 100%; cellspacing: 0;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Full Name</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($_data as $data)
						<tr>
							<td>{{$data->admin_id}}</td>
							<td>{{$data->full_name}}</td>
							<td>{{$data->email}}</td>
							<td>22</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="supervisor" class=" col-md-12 tab-pane fade in">
			<div class="table-responsive" id="showHere3">
				<table class="display table admin_container" style="width: 100%; cellspacing: 0;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Full Name</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($_data as $data)
						<tr>
							<td>{{$data->admin_id}}</td>
							<td>{{$data->full_name}}</td>
							<td>{{$data->email}}</td>
							<td>22</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div id="admin" class=" col-md-12 tab-pane fade in">
			<div class="table-responsive" id="showHere3">
				<table class="display table admin_container" style="width: 100%; cellspacing: 0;">
					<thead>
						<tr>
							<th>ID</th>
							<th>Full Name</th>
							<th>Email</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($_data as $data)
						<tr>
							<td>{{$data->admin_id}}</td>
							<td>{{$data->full_name}}</td>
							<td>{{$data->email}}</td>
							<td>22</td>
						</tr>
						
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	
	{{-- modal start --}}
	<div class="modal fade" id="myModalAgent" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ADMIN</h4>
				</div>
				<div class="modal-body" style="margin-bottom: 200px;width: 110%">
					<div id="showHere1">
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-2">
							<label for="full_name" >Full name</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="full_name" id="full_name"  style="width:100%;margin-bottom: 5px;"/>
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
						<center><button type="submit" class="save_admin btn btn-primary" name="save_admin" id="save_admin">Save</button></center>
					</div>
					
				</div>
				<div class="modal-footer" style="border:0px;">
					
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ADMIN</h4>
				</div>
				<div class="modal-body" style="margin-bottom: 200px;width: 110%">
					<div id="showHere1">
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-2">
							<label for="full_name" >Full name</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="full_name" id="full_name"  style="width:100%;margin-bottom: 5px;"/>
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
						<center><button type="submit" class="save_admin btn btn-primary" name="save_admin" id="save_admin">Save</button></center>
					</div>
					
				</div>
				<div class="modal-footer" style="border:0px;">
					
				</div>
			</div>
		</div>
	</div>
	{{-- modal end --}}
	<style>
	.li_me
	{
		width:25%;
	}
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/assets/js/front/registration.js"></script>
	<script src="/assets/admin/general_admin/assets/js/general_admin.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/assets/admin/general_admin/assets/js/manage_user.js"></script>
	@endsection