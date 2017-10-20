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
}
.form-text
{
	text-align: center;
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
					<div class="web-content">
					    <input type="text" class="form-text " placeholder="Membership Name" />
				    </div>
				    <div class="web-content">
					    <input type="text" class="form-text" placeholder="Membership Name" />
				    </div>
				    <div class="web-content">
					    <button type="button" class="form-button btn btn-success" >Add Membership</button>
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
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@foreach($_membership as $membership)
							<tr>
								<td>{{$membership->membership_id}}</td>
								<td>{{$membership->membership_name}}</td>
								<td>{{$membership->membership_price}}15000</td>
								<td>
									<select class="form-select">
										<option >Edit</option>
										<option>Delete</option>
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
					Add Country
				</div>
				<div class="website-content col-md-12">
					<input type="text" class="form-text" placeholder="Country Name" />
				</div>
			</div>
			<div class="col-md-6" style="margin:10px 10px 10px 10px;background-color: #F1F4F9;">
				<div class="website-title">
					Country List
				</div>
				<div class="website-content col-md-12">
					<table class="table table-bordered" style="margin-top:10px;">
						<thead>
							<tr>
								<th>ID</th>
								<th>Membership Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Platinum</td>
								<td>500</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Premium</td>
								<td>600</td>
							</tr>
							
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
					<input type="text" class="form-text" placeholder="Country Name" />
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
								<th>Membership Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Platinum</td>
								<td>500</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Premium</td>
								<td>600</td>
							</tr>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</div>
</div>
@endsection