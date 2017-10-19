@extends('supervisor.layout.layout')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

<div class="page-title">
	<h3>{{$page}}</h3>
	<div class="page-breadcrumb">
		<ol class="breadcrumb">
			<li><a href="/admin">Home</a></li>
			<li class="active">{{$page}}</li>
		</ol>
	</div>
</div>
<div class="tab-content" style="">
	<div class="col-md-12">
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
           		<img src="/assets/img/loading.gif">
     </div> 
	<div id="home" class=" col-md-12 tab-pane fade in active">

	   <div class="table-responsive" id="showHere3">
			@if (Session::has('message'))
			   <div class="alert alert-danger"><center>{{ Session::get('message') }}</center></div>
			@endif
			 <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date/Added</th>
                                    <th>Business Name</th>
                                    <th>membership</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->membership_name}}</td>
                                    <td>active</td>
                                    <td><button class="transaction btn btn-default" data-toggle="modal" data-target="#myModal{{$client->business_id}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button></td>
                                </tr>

                               
					<div style="" class="modal fade" id="myModal{{$client->business_id}}" role="dialog">
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
											<input value="{{$client->business_id}}" type="text" class="form-control" name="cat_name" id="cat_name_edit"  style="width:100%;margin-bottom: 20px;"/>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="business_name" >Business Information</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$client->business_id}}" type="text" class="form-control" name="cat_info" id="cat_info_edit" style="width:100%"/>
											<input value="{{$client->business_id}}" type="hidden" id="id_to_edit"/>
										</div>
									</div>
									<div class="col-sm-12">

										<center><button type="submit" class="update_category btn btn-primary" name="update_category" id="update_category">Update</button>
										       <button type="button" class="btn btn-default" onClick="window.location.reload();" data-dismiss="modal">Close</button>
									    </center>
									</div>
									
									

								</div>
								<div class="modal-footer" style="border:0px;">
									
								</div>
							</div>
						</div>
					</div>
					{{-- <div style="margin-top: 150px;" class="modal fade" id="deleteModal{{$categories->business_category_id}}" role="dialog">
						<div class="modal-dialog modal-sm">
							<div class="modal-content">
								<div class="modal-body" style="margin-bottom: 80px;" >
									<div class="col-sm-12">
									<h4 class="modal-title">Are You sure You want to delete this item?</h4>
								    </div>
									<div class="col-sm-12">
										<center>
										<a href="/general_admin/delete_category/{{$categories->business_category_id}}">
											<button type="submit" class="save_category btn btn-danger" name="save_category" id="save_category">Delete</button>
										</a>
										<button type="button" class="btn btn-default"  data-dismiss="modal">Close</button></center>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach --}}
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin.js"></script>
@endsection