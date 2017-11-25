@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<style>
.website-title
{
	background-color: #dbdee2;
	padding:10px 20px 10px 20px;
	border-radius: 2px;
	width:100%;
	font-size:20px;
}
.website-content
{
	background-color: #E9EDF2;
	/*margin: auto;*/
}
.form-text
{
	text-align: center;
	width:350px;
	padding:10px 10px 10px 10px;
}
.form-select
{
	width:90px;
	height:25px;
	border-radius: 5px;
}
.web-content
{
	margin:20px 20px 20px 20px;
	/*margin: auto;*/
}
.form-button
{
	padding:10px 10px 10px 10px;
	width:200px;
	background-color: #cbd1d2;
}
.center {
margin: auto;
padding: 10px;
}
.website-container
{
	margin:10px 10px 10px 10px;
	background-color: #F1F4F9;
}
</style>
<div class="page-title">
	<div class="page-breadcrumb">
		<h3>Manage Website</h3>
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Manage Website</li>
		</ol>
	</div>
</div>
{{-- modal --}}
{{-- modal end --}}
<div id="main-wraper">
	<form method="POST">
		<div class="container">
			<div class="row">
				<div class="col-md-5 website-container">
					<div class="website-title">
						Add Membership
					</div>
					<div class="website-content col-md-12">
						<div class="web-content" id="membership_alert">
						</div>
						<div class="web-content">
							<input type="text" class="form-text center" id="membershipName" placeholder="Membership Name" required/>
						</div>
						<div class="web-content">
							<input type="text" class="form-text center" id="membershipPrice" placeholder="Membership Price" required/>
						</div>
						<div class="web-content">
							<textarea class="form-text center" id="membershipInfo" rows="5">Membership Information</textarea>
						</div>
						<div class="web-content">
							<button type="button" id="addMembership" class="form-button  center" >Add Membership</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 website-container">
					<div class="website-title">
						Membership List
					</div>
					<div class="website-content col-md-12">
						
						<table class="table table-bordered" style="margin-top:10px;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Membership Name</th>
									<th>Price</th>
									<th>Info</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_membership as $membership)
								<tr>
									<td>{{$membership->membership_id}}</td>
									<td>{{$membership->membership_name}}</td>
									<td>{{$membership->membership_price}}</td>
									<td>{{$membership->membership_info}}</td>
									<td>
										<select class="form-select mem_action" data-info="{{$membership->membership_info}}" data-price="{{$membership->membership_price}}" data-name="{{$membership->membership_name}}" data-id="{{$membership->membership_id}}" id="mem_action">
											<option >Action</option>
											<option value="edit" >Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $_membership->render() !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 website-container">
					<div class="website-title">
						Add Payment Method
					</div>
					<div class="website-content col-md-12">
						<div class="web-content" id="payment_method_alert">
						</div>
						<div class="web-content">
							<input type="text" class="form-text center" id="paymentMethodName" placeholder="Payment Method Name" required/>
						</div>
						<div class="web-content">
							<button type="button" id="addPaymentMethod" class="form-button  center" >Add Payment Method</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 website-container">
					<div class="website-title">
						Payment Method List
					</div>
					<div class="website-content col-md-12">
						
						<table class="table table-bordered" style="margin-top:10px;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Payment Method Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_payment_method as $payment_method)
								<tr>
									<td>{{$payment_method->payment_method_id}}</td>
									<td>{{$payment_method->payment_method_name}}</td>
									<td>
										<select class="form-select pay_action" data-name="{{$payment_method->payment_method_name}}" data-id="{{$payment_method->payment_method_id}}" id="pay_action">
											<option >Action</option>
											<option value="edit" >Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $_payment_method->render() !!}
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-5 website-container">
					<div class="website-title">
						Add County
					</div>
					<div class="website-content col-md-12">
						<div class="web-content" id="county_alert">
						</div>
						<div class="web-content">
							<input type="text" id="countyName" class="form-text center" placeholder="County Name" required/>
						</div>
						<div class="web-content">
							<button type="button" id="addCounty" class="form-button center" >Add County</button>
						</div>
					</div>
				</div>
				<div class="col-md-6 website-container">
					<div class="website-title">
						County List
					</div>
					<div class="website-content col-md-12">
						<table class="table table-bordered" style="margin-top:10px;">
							<thead>
								<tr>
									<th>ID</th>
									<th>County Name</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_county as $county)
								<tr>
									<td>{{$county->county_id}}</td>
									<td>{{$county->county_name}}</td>
									<td>
										<select class="form-select count_action" data-name="{{$county->county_name}}" data-id="{{$county->county_id}}" id="count_action">
											<option >Action</option>
											<option value="edit">Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $_county->render() !!}
					</div>
				</div>
				
			</div>
			<div class="row">
				<div class="col-md-5 website-container">
					<div class="website-title">
						Add City
					</div>
					<div class="website-content col-md-12">
						<div class="web-content" id="city_alert">
						</div>
						<div class="web-content">
							<select class="form-text center" id="countyID">
								<option>County Name</option>
								@foreach($_county_city as $county_city)
								<option value="{{$county_city->county_id}}">{{$county_city->county_name}}</option>
								@endforeach
							</select>
						</div>
						<div class="web-content">
							<input type="text" id="cityName" class="form-text center" placeholder="City Name" required/>
						</div>
						<div class="web-content">
							<input type="text" id="cityZip" class="form-text center" placeholder="Zip Code" required/>
						</div>
						<div class="web-content">
							<button type="button" id="addCity" class="form-button  center" >Add City</button>
						</div>
					</div>
				</div>
				
				<div class="col-md-6 website-container">
					<div class="website-title">
						City List
					</div>
					<div class="website-content col-md-12">
						<table class="table table-bordered" style="margin-top:10px;">
							<thead>
								<tr>
									<th>ID</th>
									<th>County Name</th>
									<th>City Name</th>
									<th>Zip Code</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								@foreach($_city as $city)
								<tr>
									<td>{{$city->city_id}}</td>
									<td>{{$city->county_name}}</td>
									<td>{{$city->city_name}}</td>
									<td>{{$city->postal_code}}</td>
									<td>
										<select class="form-select city_action" data-county_name="{{$city->county_name}}" id="city_action" data-zip="{{$city->postal_code}}" data-name="{{$city->city_name}}" data-id="{{$city->city_id}}">
											<option >Action</option>
											<option value="edit">Edit</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
						{!! $_city->render() !!}
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
{{-- modal --}}
<div class="modal fade" id="editMem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content row">
			<div class="modal-body" style="margin-bottom: 350px;">
				<div class="website-title">
					Edit Membership
				</div>
				<div class="website-content col-md-12">
					
					<div class="web-content">
						<input type="text" class="form-text center" id="mem_name_edit" placeholder="Membership Name" required/>
						<input type="hidden" id="mem_id_edit"/>
					</div>
					<div class="web-content">
						<input type="text" class="form-text center" id="mem_price_edit" placeholder="Membership Price" required/>
					</div>
					<div class="web-content">
						<textarea class="form-text center" id="mem_info_edit" rows="5"></textarea>
					</div>
					<div class="web-content">
						<button type="button" id="editMemBtn" class="form-button  center" >Save Membership</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel4" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			
			<div class="modal-body" style="margin-bottom: 140px;">
				<div class="website-title">
					Edit Payment Method
				</div>
				<div class="website-content col-md-12">
					
					<div class="web-content">
						<input type="text" id="pay_name_edit" class="form-text center pay_name_edit" placeholder="Payment Method Name" required/>
						<input type="hidden" id="pay_id_edit" />
					</div>
					<div class="web-content">
						<button type="button" id="editPaymentBtn" class="form-button center" >Save Payment Method</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editCounty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			
			<div class="modal-body" style="margin-bottom: 140px;">
				<div class="website-title">
					Edit County
				</div>
				<div class="website-content col-md-12">
					
					<div class="web-content">
						<input type="text" id="count_name_edit" class="form-text center count_name_edit" placeholder="County Name" required/>
						<input type="hidden" id="count_id_edit" />
					</div>
					<div class="web-content">
						<button type="button" id="editCountyBtn" class="form-button center" >Save County</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="editCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			
			<div class="modal-body" style="margin-bottom: 250px;">
				<div class="website-title">
					Edit City
				</div>
				<div class="website-content col-md-12">
					<div class="web-content">
						<input type="text" id="county_name_edit" class="form-text center" placeholder="County Name" readOnly/>
					</div>
					<div class="web-content">
						<input type="text" id="city_name_edit" class="form-text center" placeholder="City Name" required/>
						<input type="hidden" id="city_id_edit" />
					</div>
					<div class="web-content">
						<input type="text" id="city_zip_edit" class="form-text center" placeholder="Zip Code" required/>
					</div>
					<div class="web-content">
						<button type="button" id="editCityBtn" class="form-button  center" >Save City</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="deleteModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
				<div class="col-sm-12">
					<h4 class="modal-title">Are You sure You want to delete this Item?</h4>
				</div>
				<div class="col-sm-12">
					<center>
					<input type="hidden" id="delete_id" value=""/>
					<input type="hidden" id="delete_link" value=""/>
					<button type="button" class=" btn btn-danger" id="actionDelete">Delete</button>
					<button type="button" class="btn btn-default"  data-dismiss="modal">Cancel</button>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="successModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body" id="show_user" style="margin-bottom: 120px;" >
				<div class="col-sm-12" id="success_alert">
					
				</div>
				<div class="col-sm-12">
					<center>
					<button type="button" class="btn btn-success" onClick="window.location.reload();"  data-dismiss="modal">OKAY</button>
					</center>
				</div>
			</div>
		</div>
	</div>
</div>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_website.js"></script>
@endsection