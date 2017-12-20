@extends('general_admin.pages.general_admin_layout')
@section('title', 'Payment Monitoring')
@section('description', 'Payment Monitoring')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<div class="page-title">
	<h3>Payment Monitoring</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Payment Monitoring</li>
		</ol>
	</div>
</div>
<div class="tab-content">
	<div class="row">
        <div class="panel-body">
			<form class="form-inline" method="post" action="/general_admin/search_payment_monitoring">
				{{csrf_field()}}
				<div class="col-md-4 col-sm-12 pull-right">
					<div class="form-group col-md-7 col-sm-5 col-xs-8" style="padding:0px;">
						<input type="text" class="form-control" name="search_payment_admin" id="search_payment_admin" style="width:100%;">
					</div>
					<div class="col-md-5 col-sm-5 col-xs-4">
						<button type="button" class="btn btn-success" name="search_btn_admin" id="search_btn_admin">Search</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
        <div class="panel-body">
			<form method="post">
				<div  class="tab-pane fade in active">
					<div class="table-responsive" id="success_activation">
						<table class="table table-bordered" style="background-color: #FFFFFF;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Business Name</th>
									<th>Business Address</th>
									<th>Membership</th>
									<th>Reference Number</th>
									<th>Payment Amount</th>
									<th>Date Submit</th>
									<th>Action</th>
									
								</tr>
							</thead>
							<tbody>
								@foreach($business_list as $business_item)
								<tr>
									<td>{{ $business_item->payment_id}}</td>
									<td>{{ $business_item->business_name }}</td>
									<td>{{ $business_item->business_complete_address }}</td>
									<td>{{ $business_item->membership_name }}</td>
									<td>{{ $business_item->payment_reference_number }}</td>
									<td>₱ {{ $business_item->payment_amount }}</td>
									<td>{{ $business_item->date_created }}</td>
									<td>
										<button type="button"  class="btn btn-info viewPayment"  data-id="{{ $business_item->payment_id}}" ><i class="fa fa-eye" aria-hidden="true"></i> View</button>
									</td>
								</tr>
								
								@endforeach
							</tbody>
						</table>
						{!! $business_list->render() !!}
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- MODALS -->
<div class="modal fade" id="paymentDetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="window.location.reload();"  data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Payment Information</h4>
			</div>
			<div class="modal-body" id="insertPaymentBlade" style="margin-bottom: 450px;" >
				
			</div>
			<div class="modal-footer">
				<button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="acceptUser" role="dialog">
	<div class="modal-dialog modal-sm">
		<form method="post" action="/general_admin/accept_and_activate">
			<div class="modal-content">
				<div class="modal-body" style="margin-bottom: 150px;" >
					<div class="col-sm-12">
						<h4 class="modal-title">Are You sure You want to accept this payment and activate this user's account?</h4>
					</div>
					<div id="ajax-loader" style="display: none; text-align: center; margin-top: 70px;">
						<img src="/assets/img/loading.gif"/>
					</div>
					<div class="col-sm-12 hideMe" style="margin-top:30px;">
						<center>
						<input type="hidden" id="acceptBusinessId"/>
						<button type="button" class=" btn btn-success" id="acceptUserBtn">Yes</button>
						
						<button type="button" class="btn btn-danger"  data-dismiss="modal">No</button></center>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="declinedUser" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body" style="margin-bottom: 150px;" >
				<div class="col-sm-12">
					<h4 class="modal-title">Are You sure You want to DECLINED this payment and DEACTIVATE this user's account?</h4>
				</div>
				<div class="col-sm-12" style="margin-top:30px;">
					<center>
					<input type="hidden" id="decline_business_id"/>
					<button type="button" class=" btn btn-danger" id="agentDeleted">Delete</button>
					
					<button type="button" class="btn btn-warning"  data-dismiss="modal">Close</button></center>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="success" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body" style="margin-bottom: 150px;" >
				<div class="col-sm-12" id="success_message">
					
				</div>
				<div class="col-sm-12" style="margin-top:30px;">
					<center>
					<input type="hidden" id="decline_business_id"/>
					<button type="button" class="btn btn-default"  data-dismiss="modal">OKAY</button></center>
				</div>
			</div>
		</div>
	</div>
</div>
{{-- Modal --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_payment_monitoring.js"></script>
<script src="/assets/js/global.ajax.js"></script>
@endsection