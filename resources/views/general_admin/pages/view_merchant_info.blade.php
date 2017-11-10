
<div class="tab-content" style="background-color: #fff !important;">
	<ul class="nav nav-tabs">
		<li class="active li"><a data-toggle="pill" href="#OI">Other Information</a></li>
		<li class="li"><a data-toggle="pill" href="#BH">Business Hours</a></li>
		<li class="li"><a data-toggle="pill" href="#BI">Business Image</a></li>
		<li class="li"><a data-toggle="pill" href="#PM"> Payment Method</a></li>
	</ul>
	
	<div role="tabpanel" class="tab-pane fade in active" id="OI" >
		<form class="form-horizontal" method="POST" action="/merchant/add_other_info">
			<div id="other_info_success" style="margin-top:50px;">
			</div>
			<div class="form-group" >
				<label for="business_name" class="col-sm-2 control-label">Company Information</label>
				<div class="col-sm-10">
					<textarea class="form-control" rows="5" name="company_information" id="company_information" >{{$other_info->company_information}}</textarea>
				</div>
			</div>
			<div class="form-group">
				<label for="input-Default" class="col-sm-2 control-label">Business Website</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" id="business_website" name="business_website" value="{{$other_info->business_website}}">
					<input type="hidden"  id="business_id"  value="{{$other_info->business_id}}">
				</div>
			</div>
			<div class="form-group">
				<label for="input-Default" class="col-sm-2 control-label">Year Establish</label>
				<div class="col-sm-2">
					<input type="text" class="form-control" id="year_established"  name="year_established" value="{{$other_info->year_established}}">
				</div>
			</div>
			<div class="col-md-15">
				<div class="text-right">
					<button type="button" class="btn btn-primary" id="updateInfo" style="padding: 5px 18px;">Update</button>
				</div>
			</div>
		</form>
	</div>
	<div role="tabpanel" class="tab-pane fade" method="POST" id="BH" >
		<form class="form-horizontal"  action="/merchant/profile/update_hours">
			<div class="form-group" style="margin-top:50px;">
				<label for="input-Default" class="col-sm-3 control-label">START</label>
				<label for="input-Default" class="col-sm-3 control-label">END</label>
			</div>
			@foreach($_business_hours as $business_hours)
			<div class="form-group">
				<label for="input-Default" class="col-sm-2 control-label">{{$business_hours->days}}</label>
				<div class="col-sm-3 searchfields-format">
					<input type="hidden" name="days[]" value="{{$business_hours->days}}">
					<input type="hidden" name="business_id[]" value="{{$business_hours->business_id}}">
					<input type="time" class="form-control" name="business_hours_from[]" id="business_hours_from" value="{{$business_hours->business_hours_from}}" required="true">
				</div>
				<div class="col-sm-3 searchfields-format">
					<input type="time" class="form-control" name="business_hours_to[]" id="business_hours_to" value="{{$business_hours->business_hours_to}}" required="true">
				</div>
			</div>
			@endforeach
			<div class="col-md-8">
				<div class="text-right">
					<button type="submit" data-dismiss="modal" style="padding: 5px 18px;" name="" class="update_hours btn btn-primary"  id="">Update</button>
				</div>
			</div>
		</form>
	</div>
	<div role="tabpanel" class="tab-pane fade" id="PM" >
		<form class="form-horizontal" method="POST" action="/merchant/add_payment_method" style="">
			<div id="adding_payment_method_success" style="margin-top:50px;">
			</div>
			<table class="table table-bordered" style="width: 100%; text-align: center;font-size:13px;" cellpadding="1" cellspacing="1"  border="2">
				<thead>
					<tr>
						<th >Payment Method ID</th>
						<th >Payment Method Name</th>
						<th >Action</th>
					</tr>
				</thead>
				@foreach($_payment_method as $data)
				<tr>
					<td>{{$data->payment_method_id}}</td>
					<td>{{$data->payment_method_name}}</td>
					<td>
						<button type="button" class="btn btn-danger deletePaymentss" data-id="{{$data->payment_method_id}}">
						<i class="fa fa-trash" aria-hidden="true"></i>Delete
						</button>
					</td>
				</tr>
				@endforeach
			</table>
			<div class="col-md-12">
				{!! $_payment_method->render()!!}
			</div>
			<div class="col-md-12" >
				<label class="control-label" style="text-align: left;margin-bottom:10px;">Payment Method</label>
				<div  class="col-md-12">
					<input type="text" class="form-control" id="paymentMethodName"  name="payment_method_name">
					<input type="hidden" id="businessId" value="{{$merchant_id}}">
				</div>
				<div class="text-right">
					<button type="button" style="padding: 5px;margin-top:10px;" name="save_payment" id="savePayment" class="save_payment btn btn-primary" id="save_payment">Add Payment</button>
				</div>
				
			</div>
		</form>
	</div>
</div>