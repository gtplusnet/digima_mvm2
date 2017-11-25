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
		<li class="li_me"><a data-toggle="pill" href="#data">Data</a></li>
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

		<div id="data" class="tab-pane fade in">
			<div class="row col-sm-15" style="background-color: #fcfcfc !important;"><br>

				<div id="main-wrapper" class="tab-content">
					 <ul class="nav nav-tabs">
				         <li class="active li_me_to"><a data-toggle="pill" href="#Paymentmethod">Payment Method</a></li>
				         <li class="li_me_to"><a data-toggle="pill" href="#membership">Membership</a></li>
				         <li class="li_me_to"><a data-toggle="pill" href="#team">Team</a></li>
				         <li class="li_me_to"><a data-toggle="pill" href="#categories">Categories</a></li>
				      </ul>
				</div>
			
				<div class="tab-content" style="background-color: #fcfcfc !important;">
					<div id="Paymentmethod" class=" tab-pane fade in active">
						<div class="row">
							<div id="">
							</div>
							<table class="table table-bordered" style="background-color: #fff !important;width:100%; font-style: 50px" >
							<thead>
								<tr>
									<th>Payment ID</th>
									<th>Payment Name</th>
									<th>Archived</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_payment_archived as $payment)
								<tr>
									<td>{{ $payment->payment_method_id}}</td>
									<td>{{$payment->payment_method_name}}</td>
									<td>{{ $payment->archived }}</td>
									<td><button type="button" data-id="" class="btn btn-primary agent-restore">RESTORE</button></td>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>

					<div id="membership" class=" tab-pane fade in">
						<div class="row">
							<div id="">
							</div>
							<table class="table table-bordered" style="background-color: #fff !important;width:100%">
							<thead>
								<tr>
									<th>Membership ID</th>
									<th>Membership Name</th>
									<th>Price</th>
									<th>Information</th>
									<th>Archived</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_membership_archived as $membership)
								<tr>
									<td>{{ $membership->membership_id }}</td>
									<td>{{ $membership->membership_name}}</td>
									<td>{{ $membership->membership_price}}</td>
									<td>{{ $membership->membership_info}}</td>
									<td>{{ $membership->archived }}</td>
										<td>
										<button type="button" data-id="" class="btn btn-primary agent-restore">RESTORE</button></td>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>

					<div id="team" class=" tab-pane fade in">
						<div class="row">
							<div id="">
							</div>
							<table class="table table-bordered" style="background-color: #fff !important;width:100%">
							<thead>
								<tr>
									<th>Team ID</th>
									<th>Team Name</th>
									<th>Information</th>
									<th>Archived</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_team_archived as $team)
								<tr>
									<td>{{ $team->team_id }}</td>
									<td>{{ $team->team_name}}</td>
									<td>{{ $team->team_information}}</td>
									<td>{{ $team->archived }}</td>
										<td>
										<button type="button" data-id="" class="btn btn-primary agent-restore">RESTORE</button></td>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>

					<div id="categories" class=" tab-pane fade in">
						<div class="row">
							<div id="">
							</div>
							<table class="table table-bordered" style="background-color: #fff !important;width:100%">
							<thead>
								<tr>
									<th>Category ID</th>
									<th>Category Name</th>
									<th>Information</th>
									<th>Archived</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								@foreach($_category_archived as $category)
								<tr>
									<td>{{ $category->business_category_id }}</td>
									<td>{{ $category->business_category_name}}</td>
									<td>{{ $category->business_category_information }}</td>
									<td>{{ $category->archived }}</td>
										<td>
										<button type="button" data-id="" class="btn btn-primary agent-restore">RESTORE</button></td>
									</td>
								</tr>
								@endforeach
							</tbody>
							</table>
						</div>
					</div>
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

<style>
	.li_me
	{
		width:20%;
	}

	.li
	{
		width:25%;
	}

	.li_me_to
	{
		width:25%;
		padding:0px;
		width:25%;
	
	}
</style>

<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="/assets/js/global.ajax.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_archived.js"></script>

@endsection