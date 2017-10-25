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
	background-color: #10e0bd;
}
.center {
    margin: auto;
    padding: 10px;
}
</style>
<div class="page-title">
	<div class="page-breadcrumb">
		<h3>Manage Website</h3>
		<ol class="breadcrumb">
			<li><a href="/admin">Home</a></li>
			<li class="active">Manage Website</li>
		</ol>
	</div>
</div>
<div id="main-wraper">
	<div class="container">
		<div class="row">
			<div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
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
					    <button type="button" id="addMembership" class="form-button  center" >Add Membership</button>
				    </div>
				</div>
			</div>
			<div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
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
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($_membership as $membership)
							<tr>
								<td>{{$membership->membership_id}}</td>
								<td>{{$membership->membership_name}}</td>
								<td>{{$membership->membership_price}}</td>
								<td>
									<select class="form-select mem_action" data-id="{{$membership->membership_id}}" id="mem_action">
										<option >Action</option>
										<option value="edit" >Edit</option>
										<option value="delete">Delete</option>
									</select>
								</td>
							</tr>
							@endforeach
							
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
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
			<div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
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
									<select class="form-select count_action" data-id="{{$county->county_id}}" id="count_action">
										<option >Action</option>
										<option value="edit">Edit</option>
										<option value="delete">Delete</option>
									</select>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
				<div class="website-title">
					Add City
				</div>
				<div class="website-content col-md-12">
					<div class="web-content" id="city_alert">
					</div>
					<div class="web-content">
					    <select class="form-text center" id="countyID">
					    	            <option>County Name</option>
					    	            @foreach($_county as $county)
										<option value="{{$county->county_id}}">{{$county->county_name}}</option>
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
			<div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
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
									<select class="form-select city_action" id="city_action" data-id="{{$city->city_id}}">
										<option >Action</option>
										<option value="edit">Edit</option>
										<option value="delete">Delete</option>
									</select>
								</td>
							</tr>
							@endforeach
							

							
						</tbody>
					</table>
				</div>
			</div>
		</div>
				<div class="row">
			<div class="col-md-5 " style="margin:10px 0px 10px 10px;background-color: #F1F4F9;">
				<div class="website-title">
					Add Category
				</div>
				<div class="website-content col-md-12">
					<div class="web-content" id="city_alert">
					</div>
					<div class="web-content">
					    <input type="text" id="cityName" class="form-text center" placeholder="City Name" required/>
				    </div>
				    <div class="web-content">
					    <input type="text" id="cityZip" class="form-text center" placeholder="Zip Code" required/>
				    </div>
				    <div class="web-content">
					    <button type="button" id="addCity" class="form-button  center" >Add Category</button>
				    </div>
				</div>
			</div>
			<div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
				<div class="website-title">
					City List
				</div>
				<div class="website-content col-md-12">
					<table class="table table-bordered" style="margin-top:10px;">
						<thead>
							<tr>
								<th>ID</th>
								<th>Category Name</th>
								<th>Category Information</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							@foreach($_city as $city)
							<tr>
								<td>{{$city->city_id}}</td>
								<td>{{$city->county_name}}</td>
								<td>{{$city->city_name}}</td>
								
								<td>
									<select class="form-select city_action" id="city_action" data-id="{{$city->city_id}}">
										<option >Action</option>
										<option value="edit">Edit</option>
										<option value="delete">Delete</option>
									</select>
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
{{-- modal --}}
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
                       <button type="button" class="btn btn-success"  data-dismiss="modal">OKAY</button>
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