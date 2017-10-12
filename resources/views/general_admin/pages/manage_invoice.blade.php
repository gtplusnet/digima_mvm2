@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage_invoice')
@section('description', 'manage_invoice')
@section('content')
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
				<input type="text" class="form-control" name="search_me" id="search_me">
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
						<th>Invoice Name</th>
						<th>Membership</th>
						<th>Date Issued</th>
						<th>Action</th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($_invoice as $invoice)
					<tr>
						<td>{{ $invoice->invoice_id}}</td>
						<td>{{ $invoice->business_name }}</td>
						<td>{{ $invoice->contact_first_name }} {{ $invoice->contact_last_name }}</td>
						<td>{{ $invoice->invoice_number }}</td>
						<td><a target="blank" href="{{$invoice->invoice_path}}" >{{ $invoice->invoice_name }}</a></td>
						<td>{{ $invoice->payment_method_name }}</td>
						<td>{{ $invoice->date_created }}</td>
						<td>
							 <div class="form-group">
							      <select class="form-control" id="sel1" style="width:90px;">
							        <option>Action</option>
							        <option>View</option>
							        <option>Delete</option>
							      </select>
							  </div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>	
@endsection