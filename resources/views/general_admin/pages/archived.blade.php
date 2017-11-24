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
		<li class="active li_me"><a data-toggle="pill" href="#merchant">Merchant</a></li>
		<li class="li_me"><a data-toggle="pill" href="#generaladmin">General Admin</a></li>
		<li class="li_me"><a data-toggle="pill" href="#supervisor">Supervisor</a></li>
		<li class="li_me"><a data-toggle="pill" href="#agent">Agent</a></li>
		<li class="li_me"><a data-toggle="pill" href="#membership">Data</a></li>
	</ul>
	
	
	<div class="tab-content" style="">
		<div id="merchant" class="  tab-pane fade in active">
			<div class="row">
				<div id="merchantSuccess">
				</div>
				<table class="table table-bordered" style="background-color: #fff !important;width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>Business Name</th>
						<th>Contact Person</th>
						<th>Phone</th>
						<th>Membership</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_merchant as $merchant)
					<tr>
						<td>{{ $merchant->business_id}}</td>
						<td>{{$merchant->business_name}}</td>
						<td>{{ $merchant->contact_first_name }} {{ $merchant->contact_last_name }}</td>
						<td>{{ $merchant->business_phone}}</td>
						<td>{{ $merchant->membership_name}}</td>
						<td>
							<button type="button" data-status="{{ $merchant->business_status}}" data-id="{{ $merchant->business_id}}" class="btn btn-primary merchant-restore">RESTORE</button></td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>
		<div id="generaladmin" class=" tab-pane fade in  ">
			<div class="row">
				<table class="table table-bordered" style="background-color: #fff !important;width:100%">
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
						<td><button type="button" data-id="{{ $data->admin_id}}" class="btn btn-primary admin-restore">RESTORE</button></td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div id="supervisor" class="tab-pane fade in">
			<div class="row">
				<table class="table table-bordered" style="background-color: #fff !important;width:100%">
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
						<td><button type="button" data-id="{{ $data->supervisor_id}}" class="btn btn-primary supervisor-restore">RESTORE</button></td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
			</div>
		</div>

		<div id="agent" class="tab-pane fade in">
			<div class="row">
				<table class="table table-bordered" style="background-color: #fff !important;width:100%">
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
						<td><button type="button" data-id="{{ $data->agent_id}}" class="btn btn-primary agent-restore">RESTORE</button></td>
						</td>
					</tr>
					@endforeach
				</tbody>
				</table>
 			</div>
		</div>

		

		<div id="membership" class="tab-pane fade in">
			<div class="row">
				<table class="table table-bordered" style="background-color: #fff !important;width:100%">
				<thead>
					<tr>
						<th>ID</th>	
						<th>Membership Name</th>
						<th>Membership Price</th>
						<th>Membership Information</th>
						<th>Archived</th>
					</tr>
				</thead>
				<tbody>
					@foreach($_membership as $data)
					<tr>
						<td>{{ $data->membership_id}}</td>
						<td>{{ $data->membership_name}}</td>
						<td>{{ $data->membership_price }}</td>
						<td>{{ $data->membership_info }}</td>
						<td><button type="button" class="btn btn-primary">RESTORE</button></td>
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
<div style="margin-top: 150px;" class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="showSuccesss">
            <div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
                <div class="col-sm-12">
                    <h4 class="modal-title">Are You sure?</h4>
                </div>
                <div class="col-sm-12">
                    <center>
                        <input type="hidden" class="restore_id" id="restore_id"/>
                        <input type="hidden" class="restore_link" id="restore_link"/>
                        <input type="hidden" class="restore_status" id="restore_status"/>
                        <button type="button" class=" btn btn-danger" id="restoreBtn">Yes</button></a>
                        <button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
                	</center>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="restoreSuccessModal" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" id="showSuccesss">
            <div class="modal-body" id="show_user" style="margin-bottom: 150px;" >
                <div class="col-sm-12" id="restoreSuccess">
                    
                </div>
                <div class="col-sm-12">
                    <center>
                        <button type="button" class="btn btn-default"  data-dismiss="modal">OK</button>
                	</center>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/global.ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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