@extends('general_admin.pages.general_admin_layout')
@section('title', 'archived')
@section('description', 'archived')
@section('content')

<div class="page-title">
	<div class="page-breadcrumb">
		<h3>Archived</h3>
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Archived</li>
		</ol>
	</div>
</div>
<div id="main-wrapper">
	<ul class="nav nav-tabs">
		<li class="active li_me"><a data-toggle="pill" href="#generaladmin">General Admin</a></li>
		<li class="li_me"><a data-toggle="pill" href="#supervisor">Supervisor</a></li>
		<li class="li_me"><a data-toggle="pill" href="#agent">Agent</a></li>
		<li class="li_me"><a data-toggle="pill" href="#team">Team</a></li>
		<li class="li_me"><a data-toggle="pill" href="#membership">Membership</a></li>
	</ul>
	
	
	<div class="tab-content" style="">

		<div id="generaladmin" class=" tab-pane fade in  active">
			<div class="row col-md-15" style="background-color: #fff !important;">
				<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Archived</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_admin as $data)
					<tr>
						<td>{{ $data->admin_id}}</td>
						<td>{{ $data->full_name}}</td>
						<td>{{ $data->email }}</td>
						<td>{{ $data->archived }}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div id="supervisor" class=" col-md-12 tab-pane fade in">
			<div class="row col-md-15" style="background-color: #fff !important;">
				<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Position</th>
						<th>Email</th>
						<th>Archived</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_supervisor as $data)
					<tr>
						<td>{{ $data->supervisor_id}}</td>
						<td>{{$data->first_name}} {{$data->last_name}}</td>
						<td>{{ $data->position }}</td>
						<td>{{ $data->email }}</td>
						<td>{{ $data->archived }}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div id="agent" class=" col-md-12 tab-pane fade in">
			<div class="row col-md-15" style="background-color: #fff !important;">
				<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Full Name</th>
						<th>Position</th>
						<th>Email</th>
						<th>Archived</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_agent as $data)
					<tr>
						<td>{{ $data->agent_id}}</td>
						<td>{{$data->first_name}} {{$data->last_name}}</td>
						<td>{{ $data->position }}</td>
						<td>{{ $data->email }}</td>
						<td>{{ $data->archived }}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
 			</div>
		</div>

		<div id="team" class=" col-md-12 tab-pane fade in">
			<div class="row col-md-15" style="background-color: #fff !important;">
				<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Team Name</th>
						<th>Team Information</th>
						<th>Archived</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_team as $data)
					<tr>
						<td>{{ $data->team_id}}</td>
						<td>{{$data->team_name}}</td>
						<td>{{ $data->team_information }}</td>
						<td>{{ $data->archived }}</td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div id="membership" class=" col-md-12 tab-pane fade in">
			<div class="row col-md-15" style="background-color: #fff !important;">
				membership
			</div>
		</div>

	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_archived.js"></script>

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

@endsection