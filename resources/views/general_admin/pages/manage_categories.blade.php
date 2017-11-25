@extends('general_admin.pages.general_admin_layout')
@section('title', 'manage categories')
@section('description', 'manage categories')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style type="text/css">
.form-select
{
	width:130px;
}
</style>
<div class="page-title">
	<h3>Manage Categories</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/general_admin/dashboard">Home</a></li>
			<li class="active">Categories</li>
		</ol>
	</div>
</div>
<div class="tab-content" >
	<div class="col-md-12">
		<div class="pull-left" style="margin:20px 0px 20px 20px">
			<button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
		</div>
		<div style="margin-top: 150px;" class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Add Category</h4>
					</div>
					<div class="modal-body" style="margin-bottom: 150px;" >
						<div id="showHere1">
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Category Name</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="cat_name" id="cat_name"  style="width:100%;margin-bottom: 20px;"/>
							</div>
						</div>
						<div class="col-sm-12">
							<div class="form-group col-md-3">
								<label for="business_name" >Category Information</label>
							</div>
							<div class="form-group col-md-9">
								<input type="text" class="form-control" name="cat_info" id="cat_info" style="width:100%"/>
							</div>
						</div>
						<div class="col-sm-12">
							<center>
							<button type="submit" class="save_category btn btn-primary" name="save_category" id="save_category">Save</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</center>
						</div>
						
						
					</div>
					<div class="modal-footer" style="border:0px;">
						
					</div>
				</div>
			</div>
		</div>
		<div class="pull-right" style="margin:20px 20px 20px 0px">
			<form class="form-inline">
				<div class="form-group">
					<input type="text" class="form-control" name="search_key" id="search_key">
				</div>
				<button type="button" class="btn btn-success" name="search_button" id="search_button">Search</button>
			</form>
		</div>
	</div>
	<div id="ajax-loader" style="display: none; text-align: center; margin-top: 70px;">
		<img src="/assets/img/loading.gif"/>
	</div>

	<div id="home" class=" col-md-12 tab-pane fade in active">
		<div class="table-responsive" id="showHere3">
			@if (Session::has('message'))
			<div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
			@endif
			
			<table class="display table table-bordered"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category Name</th>
						<th>Category Information</th>
						<th style="text-align: : center;"></th>
					</tr>
				</thead>
				<tbody>
					@foreach($category as $categories)
					<tr class="count">
						<td>{{$categories->business_category_id}}</td>
						<td>{{$categories->business_category_name}}</td>
						<td>{{$categories->business_category_information}}</td>
						<td >
							<select class="form-select form-control category_action" id="category_action" data-info="{{$categories->business_category_information}}" data-name="{{$categories->business_category_name}}" data-id="{{$categories->business_category_id}}">
								<option >Action</option>
								<option value="edit">Edit</option>
								<option value="delete">Delete</option>
								<option value="view">Sub-Category</option>
								
							</select>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			{!! $category->render() !!}
		</div>
	</div>
</div>
{{-- MOdal --}}
<div style="margin-top: 150px;" class="modal fade" id="categoryEdit" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Edit Category</h4>
			</div>
			<div class="modal-body" style="margin-bottom: 150px;" >
				<div id="showHere2">
				</div>
				<div class="col-sm-12">
					<div class="form-group col-md-3">
						<label for="business_name" >Category Name</label>
					</div>
					<div class="form-group col-md-9">
						<input  type="text" class="form-control" name="cat_name" id="cat_name_edit"  style="width:100%;margin-bottom: 20px;"/>
					</div>
				</div>
				<div class="col-sm-12">
					<div class="form-group col-md-3">
						<label for="business_name" >Category Information</label>
					</div>
					<div class="form-group col-md-9">
						<input  type="text" class="form-control" name="cat_info" id="cat_info_edit" style="width:100%"/>
						<input  type="hidden" id="id_to_edit"/>
					</div>
				</div>
				<div class="col-sm-12">
					<center><button type="submit" class="update_category btn btn-primary" name="update_category" id="update_category">Update</button>
					<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
					</center>
				</div>
			</div>
			<div class="modal-footer" style="border:0px;">
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="subCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<p class="modal-title" id="cat_name_head" style="font-size:25px;font-weight:  bold;"></p>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="pull-left" style="margin:20px 0px 20px 20px">
					<button type="button"  id="addSubCategoryBtn"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New</button>
				</div>
				<div id="get_sub_category_result">
					
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div style="margin-top:80px;" class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body" style="margin-bottom:30%;">
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
<div style="margin-top:80px;" class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm" role="document">
		<div class="modal-content">
			<div class="modal-body" id="show_user" style="margin-bottom: 160px;" >
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
<div style="margin-top: 150px;" class="modal fade" id="addSubCategory" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Sub-Category</h4>
			</div>
			<div id="addSubCategory_alert">
				<div class="modal-body" style="margin-bottom: 150px;" >
					
					
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Category Name</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="cat_name_dis" id="cat_name_dis"  style="width:100%;margin-bottom: 20px;"/>
							<input type="hidden"  name="cat_id_dis" id="cat_id_dis"/>
							<input type="hidden"  name="cat_link_dis" id="cat_link_dis"/>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Category Information</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="cat_info_dis" id="cat_info_dis" style="width:100%"/>
						</div>
					</div>
					<div class="col-sm-12">
						<center>
						<button type="submit" class="save_sub_categoryBtn btn btn-primary" name="save_sub_categoryBtn" id="save_sub_categoryBtn">Add Sub-Category</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</center>
					</div>
				</div>
				
			</div>
			<div class="modal-footer" style="border:0px;">
				
			</div>
		</div>
	</div>
</div>
<div style="margin-top: 150px;" class="modal fade" id="subCategoryEdit" role="dialog">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit Sub-Category22</h4>
			</div>
			<div id="addSubCategory_alert">
				<div class="modal-body" style="margin-bottom: 150px;" >
					
					
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Category Name</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="name_edit_sub" id="name_edit_sub"  style="width:100%;margin-bottom: 20px;"/>
							<input type="hidden"  name="id_to_edit_sub" id="id_to_edit_sub"/>
						</div>
					</div>
					<div class="col-sm-12">
						<div class="form-group col-md-3">
							<label for="business_name" >Category Information</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control" name="info_edit_sub" id="info_edit_sub" style="width:100%"/>
						</div>
					</div>
					<div class="col-sm-12">
						<center>
						<button type="submit" class="update_sub_categoryBtn btn btn-primary" name="update_sub_categoryBtn" id="update_sub_categoryBtn">Update Sub-Category</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</center>
					</div>
				</div>
				
			</div>
			<div class="modal-footer" style="border:0px;">
				
			</div>
		</div>
	</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_categories.js"></script>
{{-- <script src="/assets/js/global.ajax.js"></script> --}}
@endsection