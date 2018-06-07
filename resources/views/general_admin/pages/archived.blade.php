@extends('layout.general_layout')
@section('title', 'archived')
@section('description', 'archived')
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
	.li_me_to
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
      .li_me_to
	{
		width:50%;
	}
      
   }
</style>

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
				<div class="table-responsive">
					<table class="table table-bordered " style="background-color: #fff !important;width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Business Name</th>
								<th>Contact Person</th>
								<th>Phone</th>
								<th>Membership</th>
								<th>Action</th>
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
									<button type="button" data-status="{{ $merchant->business_status}}" data-id="{{ $merchant->business_id}}" class="btn btn-primary merchant-restore">RESTORE</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="generaladmin" class=" tab-pane fade in  ">
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered" style="background-color: #fff !important;width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($_admin as $data)
							<tr>
								<td>{{ $data->user_id}}</td>
								<td>{{ $data->user_first_name.' '.$data->user_last_name}}</td>
								<td>{{ $data->user_email }}</td>
								<td>
									<button type="button" data-id="{{ $data->user_id}}" class="btn btn-primary user-restore">RESTORE</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="supervisor" class="tab-pane fade in">
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered" style="background-color: #fff !important;width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($_supervisor as $data)
							<tr>
								<td>{{ $data->user_id}}</td>
								<td>{{ $data->user_first_name.' '.$data->user_last_name}}</td>
								<td>{{ $data->user_email }}</td>
								<td>
									<button type="button" data-id="{{ $data->user_id}}" class="btn btn-primary user-restore">RESTORE</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="agent" class="tab-pane fade in">
			<div class="row">
				<div class="table-responsive">
					<table class="table table-bordered" style="background-color: #fff !important;width:100%">
						<thead>
							<tr>
								<th>ID</th>
								<th>Full Name</th>
								<th>Email</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($_agent as $data)
							<tr>
								<td>{{ $data->user_id}}</td>
								<td>{{ $data->user_first_name.' '.$data->user_last_name}}</td>
								<td>{{ $data->user_email }}</td>
								<td>
									<button type="button" data-id="{{ $data->user_id}}" class="btn btn-primary user-restore">RESTORE</button>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div id="data" class="tab-pane fade in">
			<div class="row col-sm-15" style="background-color: #fcfcfc !important;">
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
							<div class="table-responsive">
								<table class="table table-bordered" style="background-color: #fff !important;width:100%; font-style: 50px" >
									<thead>
										<tr>
											<th>Payment ID</th>
											<th>Payment Name</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($_payment_archived as $payment)
										<tr>
											<td>{{ $payment->payment_method_id}}</td>
											<td>{{$payment->payment_method_name}}</td>
											<td>
												<button type="button" data-id="{{ $payment->payment_method_id}}" class="btn btn-primary payment-restore">RESTORE</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="membership" class=" tab-pane fade in">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered" style="background-color: #fff !important;width:100%">
									<thead>
										<tr>
											<th>Membership ID</th>
											<th>Membership Name</th>
											<th>Price</th>
											<th>Information</th>
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
											<td>
												<button type="button" data-id="{{ $membership->membership_id }}" class="btn btn-primary membership-restore">RESTORE</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="team" class=" tab-pane fade in">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered" style="background-color: #fff !important;width:100%">
									<thead>
										<tr>
											<th>Team ID</th>
											<th>Team Name</th>
											<th>Information</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($_team_archived as $team)
										<tr>
											<td>{{ $team->team_id }}</td>
											<td>{{ $team->team_name}}</td>
											<td>{{ $team->team_information}}</td>
											<td>
												<button type="button" data-id="{{ $team->team_id }}" class="btn btn-primary team-restore">RESTORE</button>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div id="categories" class=" tab-pane fade in">
						<div class="row">
							<div class="table-responsive">
								<table class="table table-bordered" style="background-color: #fff !important;width:100%">
									<thead>
										<tr>
											<th>Category ID</th>
											<th>Category Name</th>
											<th>Information</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach($_category_archived as $category)
										<tr>
											<td>{{ $category->business_category_id }}</td>
											<td>{{ $category->business_category_name}}</td>
											<td>{{ $category->business_category_information }}</td>
											<td>
												<button type="button" data-id="{{ $category->business_category_id }}" class="btn btn-primary category-restore">RESTORE</button>
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
	</div>
</div>

<!-- modal -->
<div class="modal fade" id="confirmModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" id="showSuccesss">
			<div class="modal-body row" id="show_user">
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
<div class="modal fade" id="restoreSuccessModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content" id="showSuccesss">
			<div class="modal-body row" id="show_user" >
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
<script src="/assets/general_admin/general_admin_archived.js"></script>
@endsection