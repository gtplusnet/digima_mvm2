@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style>
	.li_me
	{
		width:20%;
	}
	.li
	{
		width:25%;
	}
</style>
<div class="page-title">
	<div class="page-breadcrumb">
		<h3>Manage Team/Agent</h3>
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Manage Team/Agent</li>
		</ol>
	</div>
</div>
<div id="main-wrapper">
	<ul class="nav nav-tabs">
		<li class="active li_me"><a data-toggle="pill" href="#merchant">Merchant</a></li>
		<li class="li_me"><a data-toggle="pill" href="#agent">Agent</a></li>
		<li class="li_me"><a data-toggle="pill" href="#team">Team</a></li>
		<li class="li_me"><a data-toggle="pill" href="#supervisor"> Supervisor</a></li>
		<li class="li_me"><a data-toggle="pill" href="#admin">General Admin</a></li>
	</ul>
	
	<div id="showHereSuccess">
	</div>
	@if (Session::has('message'))
	<div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
	@endif
	@if (Session::has('success'))
	<div class="alert alert-success"><center>{{ Session::get('success') }}</center></div>
	@endif
	
	<div class="tab-content" style="">
		<div id="merchant" class=" tab-pane fade in  active">
			<div class="row col-md-12">

				<div class="pull-right" style="margin:20px 20px 20px 0px">
					<form class="form-inline">
						 {{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="search_merchant" id="search_merchant">
						</div>
						<button type="button" class="btn btn-success" name="search_btn_merchant" id="search_btn_merchant">Search</button>
					</form>
				</div>

			</div>
			<div class="row col-md-12" style="background-color: #fff !important;">
				<div class="panel-body" id="show_merchant_info">
					<div class="table-responsive" id="showHere_merchant">
						<div id="agent_success">
						</div>
						<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Business Name</th>
									<th>Contact Person</th>
									<th>Email</th>
									<th>Membership</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_merchant as $merchant)
								<tr>
									<td>{{$merchant->business_id}}</td>
									<td>{{$merchant->business_name}}</td>
									<td>{{$merchant->contact_first_name}} {{$merchant->contact_last_name}}</td>
									<td>{{$merchant->user_email}}</td>
									<td>{{$merchant->membership_name}}</td>
									<td>{{$merchant->status}}</td>
									<td>
										<select style="height:30px;width:80px;" data-id="{{$merchant->business_id}}" class="merchant_actionbox" id="merchant_actionbox"  >
											<option value="">Action</option>
											<option value="edit">Edit</option>
											<option value="delete">Deactivate</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
							{!! $_merchant->render() !!}
					</div>
				</div>
			</div>
		</div>
		<div id="agent" class=" col-md-12 tab-pane fade in">
			<div class="row col-md-12">
				<div class="pull-left" style="margin:20px 0px 20px 20px">
					<button type="button"  data-toggle="modal" data-target="#myModalAgent"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Agent</button>
				</div>

				<div class="pull-right" style="margin:20px 20px 20px 0px">
					<form class="form-inline" >
						 {{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="search_agent" id="search_agent">
						</div>
						<button type="button" class="btn btn-success" name="search_btn_agent" id="search_btn_agent">Search</button>
					</form>
				</div>

			</div>
			<div class="row col-md-12">
				<div class="panel-body">
					<div class="table-responsive" id="showHere_agent">
						<div id="agent_success1">
						</div>
						<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
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
								@foreach($_data_agent as $data_agent)
								<tr>
									<td>{{$data_agent->agent_id}}</td>
									<td>{{$data_agent->first_name}}</td>
									<td>{{$data_agent->last_name}}</td>
									<td>{{$data_agent->email}}</td>
									<td>{{$data_agent->primary_phone}}</td>
									<td>{{$data_agent->secondary_phone}}</td>
									<td>{{$data_agent->other_info}}</td>
									<td>
										<select style="height:30px;width:80px;" class="agent_actionbox" id="agent_actionbox" data-email="{{$data_agent->email}}"  data-name="{{$data_agent->first_name}} {{$data_agent->last_name}}" data-id="{{ $data_agent->agent_id}}">
											<option value="">Action</option>
											<option value="edit">Edit</option>
											<option value="assign">Assign</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div id="team" class=" col-md-12 tab-pane fade in">
			<div class="">
				<div class="pull-left" style="margin:20px 0px 20px 20px">
					<button type="button"  data-toggle="modal" data-target="#myModalTeam"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Team</button>
				</div>

				<div class="pull-right" style="margin:20px 20px 20px 0px">
					<form class="form-inline" >
						 {{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="search_team" id="search_team">
						</div>
						<button type="button" class="btn btn-success" name="search_btn_team" id="search_btn_team">Search</button>
					</form>
				</div>

 			</div>
			<div class="row col-md-12">
				<div class="panel-body">
					<div class="table-responsive" id="showHere_team">
						<div id="team_success">
						</div>
						<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Team Name</th>
									<th>Team Description</th>
									<th>Team Members</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_data_team as $data_team)
								<tr>
									<td>{{ $data_team->team_id}}</td>
									<td>{{ $data_team->team_name}}</td>
									<td>{{ $data_team->team_information}}</td>
									<td><i data-id="{{ $data_team->team_id}}" class="viewMem" style="cursor: pointer;color:blue;">View All Members</i></td>
									<td>
										<select style="height:30px;width:80px;" class="team_actionbox" id="team_actionbox" data-name="{{ $data_team->team_name}}" data-info="{{ $data_team->team_information}}" data-id="{{ $data_team->team_id}}">
											<option value="">Action</option>
											<option value="edit">Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div id="supervisor" class=" col-md-12 tab-pane fade in">
			<div class="">
				<div class="pull-left" style="margin:20px 0px 20px 20px">
					<button type="button"  data-toggle="modal" data-target="#myModalSupervisor"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Supervisor</button>
				</div>

				<div class="pull-right" style="margin:20px 20px 20px 0px">
					<form class="form-inline" >
						 {{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="search_supervisor" id="search_supervisor">
						</div>
						<button type="button" class="btn btn-success" name="search_btn_supervisor" id="search_btn_supervisor">Search</button>
					</form>
				</div>

			</div>
			<div class="row col-md-12">
				<form method="post">
					{{csrf_field()}}
				<div class="panel-body">
					<div class="table-responsive" id="showHere_supervisor">
						<table class="display table table-bordered"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
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
								@foreach($_data_supervisor as $data_supervisor)
								<tr>
									<td>{{$data_supervisor->supervisor_id}}</td>
									<td>{{$data_supervisor->first_name}}</td>
									<td>{{$data_supervisor->last_name}}</td>
									<td>{{$data_supervisor->email}}</td>
									<td>{{$data_supervisor->primary_phone}}</td>
									<td>{{$data_supervisor->secondary_phone}}</td>
									<td>{{$data_supervisor->other_info}}</td>
									<td>
										<select style="height:30px;width:80px;" class="supervisor_actionbox" id="supervisor_actionbox" data-name="{{$data_supervisor->first_name}} {{$data_supervisor->last_name}}" data-email="{{$data_supervisor->email}}"  data-id="{{ $data_supervisor->supervisor_id}}">
											<option value="">Action</option>
											<option value="edit">Edit</option>
											<option value="assign">Assign</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
				</form>
			</div>
		</div>
		<div id="admin" class=" col-md-12 tab-pane fade in">
			<div class="">
				<div class="pull-left" style="margin:20px 0px 20px 20px">
					<button type="button"  data-toggle="modal" data-target="#myModalAdmin"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Admin</button>
				</div>

				<div class="pull-right" style="margin:20px 20px 20px 0px">
					<form class="form-inline" >
						 {{csrf_field()}}
						<div class="form-group">
							<input type="text" class="form-control" name="search_admin" id="search_admin">
						</div>
						<button type="button" class="btn btn-success" name="search_btn_admin" id="search_btn_admin">Search</button>
					</form>
				</div>

			</div>
			<div class="row col-md-12">
				<div class="panel-body">
					<div class="table-responsive" id="showHere_admin">
						<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Position</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_data_admin as $data_admin)
								<tr>
									<td>{{$data_admin->admin_id}}</td>
									<td>{{$data_admin->full_name}}</td>
									<td>{{$data_admin->email}}</td>
									<td>{{$data_admin->position}}</td>
									<td><select style="height:30px;width:80px;" class="admin_actionbox" data-email="{{$data_admin->email}}" data-name="{{$data_admin->full_name}}" id="admin_actionbox" data-name="{{$data_admin->first_name}} {{$data_admin->last_name}}" data-id="{{ $data_admin->agent_id}}">
										<option value="">Action</option>
										<option value="edit">Edit</option>
										<option value="delete">Delete</option>
									</select>
								</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		{{-- modal start --}}
		<div class="modal fade" id="myModalViewMem" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close"  data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Team Members</h4>
					</div>
					<div class="modal-body" id="viewMemHere">
						
						
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalAgent" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Agent</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 530px;" >
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team</label>
							</div>
							<div class="form-group col-md-9">
								<select name="team_id" class='form-control' id="team_id">
									@foreach ($_data_team as $data_team)
									<option value = '{{$data_team->team_id}}'>{{$data_team->team_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Prefix</label>
							</div>
							<div class="form-group col-md-9">
								<select name="prefix" class='form-control' id="prefix">
									<option value = 'Mr'>Mr</option>
									<option  value = 'Ms'>Ms</option>
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >First Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="first_name" id="first_name"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="agent_success">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Last Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="last_name" id="last_name"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="email" id="email"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="agent_alert">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="password" id="password"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Primary Phone</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="primary" id="primary"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<center>
							<button type="submit" class="add_agent btn btn-primary" name="add_agent" id="add_agent">Add Agent</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		{{-- editAgent --}}
		<div class="modal fade" id="myModalAgentEdit" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Agent Login</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 300px;" >
						<div class="col-sm-12" id="agent_alerts">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Full Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="first_name" id="agFullname"  style="width:100%;margin-bottom: 20px;" readOnly/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="last_name" id="agEmail"  style="width:100%;margin-bottom: 20px;" required/>
								<input type="hidden"  id="agAgentId" />
								<input type="hidden"  id="agOldEmail" />
								
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="password" class="form-control" name="email" id="agPassword"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="agent_alert">
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="updateAgent btn btn-primary" name="updateAgent" id="updateAgent">Add Agent</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalTeam" role="dialog" style="margin-top:85px;">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Team</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="team_alert">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="team_name" id="team_name"  style="width:100%;margin-bottom: 20px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Description</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="team_info" id="team_info" style="width:100%"/>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="btn btn-primary" name="add_team" id="add_team">Add Team</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalTeamEdit" role="dialog" style="margin-top:85px;">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Team</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="team_alerts">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="team_name" id="tTeam_name"  style="width:100%;margin-bottom: 20px;"/>
								<input type="hidden" id="tTeam_id" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Description</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="team_info" id="tTeam_info" style="width:100%"/>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="btn btn-primary" name="add_team" id="updateTeam">Update Team</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalSupervisor" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Supervisor</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 450px;" >
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Prefix</label>
							</div>
							<div class="form-group col-md-9">
								<select name="sprefix" class='form-control' id="sprefix">
									<option value = 'Mr'>Mr</option>
									<option  value = 'Ms'>Ms</option>
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >First Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="sfirst_name" id="sfirst_name"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Last Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="slast_name" id="slast_name"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="semail" id="semail"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="supervisor_alert">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="spassword" id="spassword"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Primary Phone</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="sprimary" id="sprimary"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<center>
							<button type="submit" class="btn btn-primary" name="add_supervisor" id="add_supervisor">Add Supervisor</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalSupervisorEdit" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Supervisor Login</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 300px;" >
						<div class="col-sm-12" id="supervisor_alerts">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Full Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="first_name" id="supFullname"  style="width:100%;margin-bottom: 20px;" readOnly/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="last_name" id="supEmail"  style="width:100%;margin-bottom: 20px;" required/>
								<input type="hidden"  id="supId" />
								<input type="hidden"  id="supOldEmail" />
								
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="password" class="form-control" name="email" id="supPassword"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="agent_alert">
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="updateAgent btn btn-primary" name="updateSupervisor" id="updateSupervisor">Update Supervisor</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalAdmin" role="dialog" style="margin-top:85px;">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Team</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 180px;" >
						<div class="col-sm-12" id="admin_alert">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="full_name" >Full name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="afull_name" id="afull_name"  style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="email" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="aemail" id="aemail" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-2">
								<label for="password" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="apassword" id="apassword" style="width:100%;margin-bottom: 5px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="btn btn-primary" name="add_admin" id="add_admin">Add Team</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
						
						
					</div>
					<div class="modal-footer" style="border:0px;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="modal fade" id="myModalAdminEdit" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Edit Admin Login</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 300px;" >
						<div class="col-sm-12" id="admin_alerts">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Full Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="first_name" id="adFullname"  style="width:100%;margin-bottom: 20px;" readOnly/>
							</div>
						</div>
						
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Email</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="last_name" id="adEmail"  style="width:100%;margin-bottom: 20px;" required/>
								<input type="hidden"  id="adId" />
								<input type="hidden"  id="adOldEmail" />
								
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Password</label>
							</div>
							<div class="form-group col-md-9">
								<input type="password" class="form-control" name="email" id="adPassword"  style="width:100%;margin-bottom: 20px;" required/>
							</div>
						</div>
						<div class="col-sm-12" id="agent_alert">
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="updateAgent btn btn-primary" name="updateAdmin" id="updateAdmin">Update Supervisor</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
					</div>
					<div class="modal-footer" style="border:0px;">
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="assignAgent" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Assign Agent</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="assign_success">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Agent Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="agent_name" id="agent_name_assign"  style="width:100%;margin-bottom: 20px;" readonly/>
								<input type="hidden" class="form-control" name="agent_id" id="agent_id_assign"  />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Name</label>
							</div>
							<div class="form-group col-md-9">
								<select id="teamAssigned" class="form-control" >
									@foreach($_data_team as $data_team)
									<option value="{{$data_team->team_id}}">{{$data_team->team_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="save_category btn btn-primary" name="agentAssigned" id="agentAssigned">Assign Agent</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
						
						
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="assignSupervisor" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Assign Supervisor</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="assignSuccess">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Supervisor Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="super_name" id="super_name_assign"  style="width:100%;margin-bottom: 20px;" readonly/>
								<input type="hidden" class="form-control" name="super_id" id="super_id_assign"  />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Team Name</label>
							</div>
							<div class="form-group col-md-9">
								<select id="teamAssign" class="form-control" >
									@foreach($_data_team as $data_team)
									<option value="{{$data_team->team_id}}">{{$data_team->team_name}}</option>
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="save_category btn btn-primary" name="superAssigned" id="superAssigned">Assign Supervisor</button>
							<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
							</center>
						</div>
						
						
					</div>
					<div class="modal-footer">
						
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="deleteAgent" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
						<div class="col-sm-12">
							<h4 class="modal-title">Are You sure You want to delete this Agent?</h4>
						</div>
						<div class="col-sm-12">
							<center>
							<input type="hidden" id="delete_agent_id" value=""/>
							<button type="button" class=" btn btn-danger" id="agentDeleted">Delete</button>
							
							<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button></center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="deleteTeam" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
						<div class="col-sm-12">
							<h4 class="modal-title">Are You sure You want to delete this team?</h4>
						</div>
						<div class="col-sm-12">
							<center>
							<input type="hidden" id="delete_team_id" value=""/>
							<button type="button" class=" btn btn-danger" id="teamDeleted">Delete</button>
							
							<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button></center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="deleteSupervisor" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
						<div class="col-sm-12">
							<h4 class="modal-title">Are You sure You want to delete this Agent?</h4>
						</div>
						<div class="col-sm-12">
							<center>
							<input type="hidden" id="delete_supervisor_id" value=""/>
							<button type="button" class=" btn btn-danger" id="supervisorDeleted">Delete</button>
							
							<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button></center>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="deleteAdmin" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
						<div class="col-sm-12">
							<h4 class="modal-title">Are You sure You want to delete this General Admin?</h4>
						</div>
						<div class="col-sm-12">
							<center>
							<input type="hidden" id="delete_admin_id" value=""/>
							<button type="button" class=" btn btn-danger" id="adminDeleted">Delete</button>
							
							<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button></center>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- modal end --}}

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_user.js"></script>
@endsection