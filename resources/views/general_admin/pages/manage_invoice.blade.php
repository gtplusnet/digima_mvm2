@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage_invoice')
@section('description', 'manage_invoice')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<div class="page-title">
    <h3>Manage Invoice</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">manage invoice</li>
        </ol>
    </div>
</div>
<div class="tab-content col-md-12">
	<div class="text-center pull-right" style="margin:20px 20px 20px 20px;">
		<form class="form-inline" >
			<div class="form-group">
				<input type="text" class="form-control" name="search_me" id="search_me" >
			</div>
			<button type="submit" class="btn btn-success" name="search_btn" id="search_btn">Search</button>
		</form>
	</div>
	<div  class="tab-pane fade in active col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Business Name</th>
						<th>Business Contact Person</th>
						<th>Invoice Number</th>
						<th>Membership</th>
						<th>Date Issued</th>
						<th>Status</th>
						<th></th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($_invoice as $invoice)
					<tr>
						<td>{{ $invoice->invoice_id}}</td>
						<td>{{ $invoice->business_name }}</td>
						<td>{{ $invoice->contact_first_name }} {{ $invoice->contact_last_name }}</td>
						<td><a target="blank" href="{{$invoice->invoice_path}}" >{{ $invoice->invoice_number }}</a></td>
						<td>{{ $invoice->membership_name }}</td>
						<td>{{date("F j, Y",strtotime($invoice->date_transact))}}</td>
						<td>{{ $invoice->invoice_status }}</td>
						<td>
							 <div class="form-group">
							      <select id="invoice_action" data-name="{{ $invoice->invoice_name }}" data-email="{{ $invoice->user_email }}" data-path="{{$invoice->invoice_path}}" class="form-control invoice_action" id="sel1" style="width:90px;">
							        <option>Action</option>
							        <option value="view">View</option>
							        <option value="resend">Resend</option>
							      </select>
							  </div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<div style="margin-top: 150px;" class="modal fade" id="resendModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Resend Invoice</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 190px;" id="resendSuccess">
                    {{-- <div id="resendSuccess">
                    </div> --}}
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Contact Person Email</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="resend_email" id="resend_email"  style="width:100%;margin-bottom: 20px;" readOnly/>
                            <input type="hidden" id="invoice_name_resend" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Additional Message</label>
                        </div>
                        <div class="form-group col-md-9">
                            <textarea class="form-control" id="remarks" placeholder="" rows="4=6" style="width:100%"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <center>
                        <button type="submit" class=" btn btn-primary" name="resendBtn" id="resendBtn">Resend</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </center>
                    </div>
                    
                    
                </div>
                <div class="modal-footer" style="border:0px;">
                    
                </div>
            </div>
        </div>
    </div>
</div>	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_invoice.js"></script>
@endsection