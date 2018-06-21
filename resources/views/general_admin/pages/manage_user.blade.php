@extends('layout.general_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<style>
	.li_me
	{
		width:20%;
	}
	.li
	{
		width:25%;
	}
	@media only screen and (max-width: 500px)
	{
	.li_me
		{
			width:100%;
			text-align: center;
		}
		.li
		{
			width:50%;
			text-align: center;
		}
	}
</style>
<div class="page-title">
	<div class="page-breadcrumb">
		<h3>Manage User</h3>
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Manage Team/Agent</li>
		</ol>
	</div>
</div>
<div id="main-wrapper" style="min-height:600px;">
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
			<div class="row">
				<div class="panel-body">
					<form class="form-inline" method="post" action="/general_admin/search_payment_monitoring">
						{{csrf_field()}}
						<div class="col-md-4 col-sm-12 pull-right">
							<div class="form-group col-md-7 col-sm-5 col-xs-8" style="padding:0px;">
								<input type="text" class="form-control" name="search_merchant" id="search_merchant">
							</div>
							<div class="col-md-4 col-sm-5 col-xs-4">
								<button type="button" class="btn btn-success" name="search_btn_merchant" id="search_btn_merchant">Search</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row" style="background-color: #fff !important;">
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
								<div style="margin-top: 150px;" class="modal fade" id="confirmModal" role="dialog">
									<div class="modal-dialog modal-sm">
										<div class="modal-content" id="showSuccesss">
											<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
												<div class="col-sm-12">
													<h4 class="modal-title">Are You sure You want to deactivate this merchant?</h4>
												</div>
												<div class="col-sm-12">
													<center>
													<input type="hidden" class="deleteMerchant" value="{{$merchant->business_id}}"/>
													<button type="button" class=" btn btn-danger" id="deleteMerchants">Yes</button>
													<button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
													</center>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
							</tbody>
						</table>
						<div class="col-md-12">{!! $_merchant->render() !!}</div>
					</div>
				</div>
			</div>
		</div>
		<div id="agent" class="tab-pane fade in">
			
			<div class="row">
				<div class="panel-body">
					
						<div class="col-md-4 col-sm-12 col-xs-12 pull-left" style="padding:0px;">
							<form class="form-inline">
								{{csrf_field()}}
								<div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
									<input type="text" class="form-control" name="search_agent" id="search_agent">
								</div>
								<div class=" col-md-4 col-xs-4" style="padding:0px;">
									<button type="button" class="btn btn-success" name="search_btn_agent" id="search_btn_agent">Search</button>
								</div>
							</form>
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
							<button type="button"  data-toggle="modal" data-target="#myModalUser"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New User</button>
						</div>
					
				</div>
			</div>
			<div class="row">
				<div class="panel-body">
					<div class="table-responsive" id="showHere_agent">
						<div id="agent_success1">
						</div>
						<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone Number</th>
									<th>Merchant Calls/Added</th>
									<th>Assigned Team</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_data_agent as $data_agent)
								<tr>
									<td>{{$data_agent->user_id}}</td>
									<td>{{$data_agent->user_first_name}} {{$data_agent->user_last_name}}</td>
									<td>{{$data_agent->user_email}}</td>
									<td>{{$data_agent->user_phone_number}}</td>
									<td>{{count($agent_merchant->where('agent_id',$data_agent->agent_id))}}</td>
									<td>{{$data_agent->team_name}}</td>
									<td>
										<select style="height:30px;width:80px;" class="view_user_details" data-email="{{$data_agent->user_email}}"  data-name="{{$data_agent->user_first_name}} {{$data_agent->user_last_name}}" data-id="{{ $data_agent->user_id}}">
											<option value="">Action</option>
											<option value="view">View</option>
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
		<div id="team" class="tab-pane fade in">
			<div class="row">
				<div class="panel-body">
					
						<div class="col-md-4 col-sm-12 col-xs-12 pull-left" style="padding:0px;">
							<form class="form-inline">
								{{csrf_field()}}
								<div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
									<input type="text" class="form-control" name="search_team" id="search_team">
								</div>
								<div class=" col-md-4 col-xs-4" style="padding:0px;">
									<button type="button" class="btn btn-success" name="search_btn_team" id="search_btn_team">Search</button>
								</div>
							</form>
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
							<button type="button"  data-toggle="modal" data-target="#myModalTeam"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Team</button>
						</div>
					
				</div>
			</div>
			<div class="row">
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
									<th>Assigned Supervisor</th>
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
										@if($data_team->archived==0)
										{{ $data_team->user_first_name}} {{ $data_team->user_last_name}}
										@else
										<font color="red">{{ $data_team->user_first_name}} {{ $data_team->user_last_name}} - DELETED</font>
										@endif
									</td>
									<td>
										<select style="height:30px;width:80px;" class="team_actionbox" id="team_actionbox" data-name="{{ $data_team->team_name}}" data-info="{{ $data_team->team_information}}" data-id="{{ $data_team->team_id}}">
											<option value="">Action </option>
											<option value="edit">Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $_data_team->render() !!}
					</div>
					
				</div>
			</div>
		</div>
		<div id="supervisor" class="tab-pane fade in">
			<div class="row">
				<div class="panel-body">
					<div class="col-sm-12">
						<div class="col-md-4 col-sm-12 col-xs-12 pull-left" style="padding:0px;">
							<form class="form-inline">
								{{csrf_field()}}
								<div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
									<input type="text" class="form-control" name="search_supervisor" id="search_supervisor">
								</div>
								<div class=" col-md-4 col-xs-4" style="padding:0px;">
									<button type="button" class="btn btn-success" name="search_btn_supervisor" id="search_btn_supervisor">Search</button>
								</div>
							</form>
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
							<button type="button"  data-toggle="modal" data-target="#myModalUser"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New User</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<form method="post">
					{{csrf_field()}}
					<div class="panel-body">
						<div class="table-responsive" id="showHere_supervisor">
							<div id="supervisor_success">
							</div>
							<table class="display table table-bordered"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Email</th>
										<th> Phone</th>
										<th>Assigned Team</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									@foreach($_data_supervisor as  $data_supervisor)
									<tr>
										<td>{{$data_supervisor->user_id}}</td>
										<td>{{$data_supervisor->user_first_name}} {{$data_supervisor->user_last_name}}</td>
										<td>{{$data_supervisor->user_email}}</td>
										<td>{{$data_supervisor->user_phone_number}}</td>
										<td>
											@foreach($_teams->where('supervisor_id',$data_supervisor->user_id) as $team)
											{{$team->team_name}},
											@endforeach
										</td>
										<td>
											<select data-ref="supervisor" style="height:30px;width:80px;" class="view_user_details" data-email="{{$data_supervisor->user_email}}"  data-name="{{$data_supervisor->user_first_name}} {{$data_supervisor->user_last_name}}" data-id="{{ $data_supervisor->user_id}}">
												<option value="">Action</option>
												<option value="view">View</option>
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
		<div id="admin" class="tab-pane fade in">
			<div class="row">
				<div class="panel-body">
					<div class="col-sm-12">
						<div class="col-md-4 col-sm-12 col-xs-12 pull-left" style="padding:0px;">
							<form class="form-inline">
								{{csrf_field()}}
								<div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
									<input type="text" class="form-control" name="search_admin" id="search_admin">
								</div>
								<div class=" col-md-4 col-xs-4" style="padding:0px;">
									<button type="button" class="btn btn-success" name="search_btn_admin" id="search_btn_admin">Search</button>
								</div>
							</form>
						</div>
						<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
							<button type="button"  data-toggle="modal" data-target="#myModalUser"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New User</button>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="panel-body">
					<div class="table-responsive" id="showHere_admin">
						<div id="admin_success">
						</div>
						<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Full Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_data_admin as $data_admin)
								<tr>
									<td>{{$data_admin->user_id}}</td>
									<td>{{$data_admin->user_first_name}} {{$data_admin->user_last_name}}</td>
									<td>{{$data_admin->user_email}}</td>
									<td>{{$data_admin->user_phone_number}}</td>
									<td>
										<select style="height:30px;width:80px;" class="view_user_details" data-email="{{$data_admin->user_email}}"  data-name="{{$data_admin->user_first_name}} {{$data_admin->user_last_name}}" data-id="{{ $data_admin->user_id}}">
											<option value="">Action</option>
											<option value="view">View</option>
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
	<!-- modal -->
	<div class="modal fade" id="myModalViewMem" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close"  data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Team Members</h4>
				</div>
				<div class="table-responsive modal-body" id="viewMemHere">
					
					
				</div>
				<div class="modal-footer" style="border:0px;">
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModalUser" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">ADD USER</h4>
				</div>
				<div class="modal-body row">
					<div class="body-content">
						<div class="form-group col-md-2">
							<label for="business_name" >Team</label>
						</div>
						<div class="form-group col-md-4">
							<select name="team_id" class='form-control' id="team_id">
								<option value="0">SELECT TEAM</option>
								@foreach ($_team_select as $data_team)
								<option value = '{{$data_team->team_id}}'>{{$data_team->team_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group col-md-2">
							<label for="business_name" >Position</label>
						</div>
						<div class="form-group col-md-4">
							<select name="user_access_level" class='form-control' id="user_access_level">
								<option value="0">SELECT POSITION</option>
								<option value="AGENT">AGENT</option>
								<option value="SUPERVISOR">SUPERVISOR</option>
								<option value="ADMIN">ADMIN</option>
							</select>
						</div>
						
					</div>
					<div class="body-content">
						<div class="form-group col-md-2">
							<label for="business_name" >First Name</label>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="user_first_name" id="user_first_name" required/>
						</div>
						<div class="form-group col-md-2">
							<label for="business_name" >Last Name</label>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="user_last_name" id="user_last_name" required/>
						</div>
					</div>
					<div class="body-content">
						<div class="form-group col-md-2">
							<label for="business_name" >Gender</label>
						</div>
						<div class="form-group col-md-4">
							<select name="team_id" class='form-control' id="team_id">
								<option value="MALE">MALE</option>
								<option value="FEMALE">FEMALE</option>
							</select>
							<input type="text" class="form-control" name="user_gender" id="user_gender" required/>
						</div>
						<div class="form-group col-md-2">
							<label for="business_name" >Email</label>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="user_email" id="user_email" required/>
						</div>
					</div>
					<div class="body-content">
						<div class="form-group col-md-2">
							<label for="business_name" >Address</label>
						</div>
						<div class="form-group col-md-4">
							<textarea type="text" class="form-control" name="user_address" id="user_address" /></textarea>
						</div>
						<div class="form-group col-md-2">
							<label for="business_name" >Phone Number</label>
						</div>
						<div class="form-group col-md-4">
							<input type="text" class="form-control" name="user_phone_number" id="user_phone_number" required/>
						</div>
					</div>
					
					<div class="body-content">
						
					</div>
				</div>
				
				<div class="modal-footer" style="border:0px;">
					<center>
					<button type="button" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Processing Action" class="addUserBtn btn btn-primary" name="addUserBtn" id="addUserBtn">ADD USER</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
					</center>
				</div>
			</div>
		</div>
	</div>
	<div  class="modal fade" id="assignUser" role="dialog">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Assign User</h4>
				</div>
				<div class="modal-body row">
					<div id="assign_success">
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Name</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="name_assign" id="name_assign"  style="width:100%;margin-bottom: 20px;" readonly/>
							<input type="hidden" class="form-control" name="id_assign" id="id_assign"  />
							<input type="hidden" class="form-control" name="user_ref" id="user_ref"  />
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Team Name</label>
						</div>
						<div class="form-group col-md-9">
							<select id="teamAssigned" class="form-control" >
								@foreach($_team_select as $data_team)
								<option value="{{$data_team->team_id}}">{{$data_team->team_name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-sm-12">
						<center>
						<button type="submit" class=" btn btn-primary" name="userAssigned" id="userAssigned">Assign User</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
						</center>
					</div>
				</div>
				<div class="modal-footer" style="border:none;">
					
				</div>
			</div>
		</div>
	</div>
	<div style="margin-top: 150px;" class="modal fade" id="deleteUser" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
					<div class="col-sm-12">
						<h4 class="modal-title">Are You sure You want to delete this User?</h4>
					</div>
					<div class="col-sm-12">
						<center>
						<input type="hidden" id="delete_user_id" value=""/>
						<button type="button" class=" btn btn-danger" id="userDeleted">Delete</button>
						
						<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button></center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="manageUserModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content showContent">
			
			</div>
		</div>
	</div>
	<div class="modal fade" id="myModalTeam" role="dialog" >
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Team</h4>
				</div>
				<div class="modal-body row"  >
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
						<div class="form-group col-md-3">
							<label for="business_name" >Team Supervisor</label>
						</div>
						<div class="form-group col-md-9">
							<select name="" id="team_super" class="form-control">
								@foreach($_team_super as $team_super)
								<option value="{{$team_super->user_id}}">{{$team_super->user_first_name.' '.$team_super->user_last_name}}</option>
							    @endforeach
							</select>
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
	
	
	

	<div style="margin-top: 150px;" class="modal fade" id="deleteAdmin" role="dialog">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
					<div class="col-sm-12">
						<h4 class="modal-title">Are You sure You want to delete this Admin?</h4>
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
						<h4 class="modal-title">Are You sure You want to delete this supervisor?</h4>
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
<script src="/assets/general_admin/general_admin_user.js"></script>
@endsection