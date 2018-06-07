@extends('layout.general_layout')
@section('title', 'manage user')
@section('description', 'manage user')
@section('content')
<style>
.website-title
{
	
	padding:10px 20px 10px 20px;
	border-radius: 2px;
	width:100%;
	font-size:20px;
}
.website-content
{
	
	/*margin: auto;*/
}
.form-text
{
	text-align: center;
	width:100%;
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
	
}
.center {
margin: auto;
padding: 10px;
}
.website-container
{
	margin:10px 10px 10px 10px;
	
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
<div id="main-wraper">
	<br><br>
	<div class="col-md-12">
		<ul class="nav nav-tabs">
			<li class="active col-md-3"><a data-toggle="pill" href="#membershipTab">Membership</a></li>
			<li class="col-md-3"><a data-toggle="pill" href="#paymentTab">Payment Method</a></li>
			<li class="col-md-3"><a data-toggle="pill" href="#countyTab">County</a></li>
			<li class="col-md-3"><a data-toggle="pill" href="#cityTab">City</a></li>
		</ul>
		<div class="tab-content" style="">
			<div id="membershipTab" class=" tab-pane fade in  active">
				<br>
				<div class="web-content" id="membership_alert">
				</div>
				<div class="row" style="background-color: #fff !important;">
					<div class="table-responsive website-content col-md-12">
						<table class="table table-bordered" style="margin-top:10px;">
							<thead>
								<tr>
									<th>ID</th>
									<th>Membership Name</th>
									<th>Membership Price</th>
									<th>Membership Info</th>
									<th>Action</th>
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
			<div id="paymentTab" class="tab-pane fade in">
				<br>
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
						<button type="button"  data-toggle="modal" data-target="#myModalUser"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
					</div>
				</div>
				<div class="row">
					<div id="payment_method_alert">
					</div>
					<div class="table-responsive col-md-12">
						
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
			<div id="countyTab" class="tab-pane fade in">
				<br>
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12 pull-right" >
						<button type="button"  data-toggle="modal" data-target="#myModalTeam"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add County</button>
					</div>
				</div>
				<div class="row">
					<div id="county_alert">
					</div>
					<div class="table-responsive col-md-12">
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
			<div id="cityTab" class="tab-pane fade in">
				<br>
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12 pull-right " >
						<button type="button"  data-toggle="modal" data-target="#myModalUser"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add City</button>
					</div>
				</div>
				<div class="row">
					<div id="city_alert">
					</div>
					<div class="table-responsive  col-md-12">
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
	</div>
</div>
{{-- modal --}}
<div class="modal fade" id="editMem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content ">
			<div class="modal-body row" >
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
			
			<div class="modal-body row" >
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
			
			<div class="modal-body row" >
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
			
			<div class="modal-body row">
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
<div  class="modal fade" id="deleteModal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-body row" id="show_user"  >
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
<script src="/assets/general_admin/general_admin_website.js"></script>
@endsection