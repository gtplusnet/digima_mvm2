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
		<input value="{{ $business_item->business_id }}" type="text" class="form-control" style="width:100%" readonly/>
	</div>
</div>
<div class="col-sm-12">
	<div class="form-group col-md-5">
		<label for="business_name" >Proof of Payment</label>
	</div>
	<div class="form-group col-md-7">
		@if($business_item->payment_file_name=='Image Not Available')
		<center>
		Image Not Available
		</center>
		@else
		<a href="{{ $business_item->payment_file_name }}"  target="_blank">
			click here to view image!
		</a>
		@endif
	</div>
</div>
<div class="col-sm-12">
	<center>
	<button type="button" class="btn btn-primary" data-id="{{ $business_item->business_id }}" id="acceptBtn">Accept Payment</button>
	<button type="button" class="btn btn-danger"  data-id="{{ $business_item->business_id }}" id="declinedBtn">Declined Payment</button>
	</center>
</div>