<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($business_list)}} Result</p>
    </div>
</div>
<table class="table table-bordered" style="background-color: #FFFFFF;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Business Name</th>
			<th>Business Address</th>
			<th>Membership</th>
			<th>Payment reference</th>
			<th>Payment Ammount</th>
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
			<td><a href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalLong{{ $business_item->business_id}}" data-id="{{ $business_item->business_id}}" ><i class="fa fa-eye" aria-hidden="true"></i> View</button></td>
		</tr>
		<div class="modal fade" id="exampleModalLong{{ $business_item->business_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Payment Information</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 450px;" >
						<div id="showHere1">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Business Name</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->business_name }}" type="text" class="form-control" name="cat_name" id="cat_name"  style="width:100%;margin-bottom: 20px;" readonly/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Business Address</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->business_complete_address }}" type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%" readonly/>
								<input value="{{ $business_item->business_id }}" type="hidden" name="action_business_id" id="action_business_id" />
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Business Membership</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->membership_name }}" type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%" readonly/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Payment Reference number</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->payment_reference_number }}" type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%" readonly/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Payment Amount</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->payment_amount }}" type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%" readonly/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Invoice Number</label>
							</div>
							<div class="form-group col-md-9">
								<input value="{{ $business_item->business_id }}" type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%" readonly/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-5">
								<label for="business_name" >Proof of Payment</label>
							</div>
							<div class="form-group col-md-7">
								<a href="{{ $business_item->payment_file_name }}"  target="_blank">
									click here to view image!
								</a>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="btn btn-primary" id="acceptBtn">Accept Payment</button>
							<button type="submit" class="btn btn-danger"  id="declinedBtn">Declined Payment</button>
							</center>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</tbody>
</table>