<table class="display table" style="width: 100%; cellspacing: 0;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category Name</th>
						<th>Category Information</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($category as $categories)
					<tr>
						<td>{{$categories->business_category_id}}</td>
						<td>{{$categories->business_category_name}}</td>
						<td>{{$categories->business_category_information}}</td>
						<td><a href="#"><button type="button" class="btn btn-warning" data-toggle="modal"  id="view_btn" data-target="#myModalEdit{{$categories->business_category_id}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
						<a href="/general_admin/delete_category/{{$categories->business_category_id}}"><button type="button" class="btn btn-danger" ><i class="fa fa-trash" aria-hidden="true"></i>Delete</button></td>
					</tr>
					<div class="modal fade" id="myModalEdit{{$categories->business_category_id}}" role="dialog">
						<div class="modal-dialog modal-md">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close reload" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
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
											<input value="{{$categories->business_category_name}}" type="text" class="form-control" name="cat_name" id="cat_name_edit"  style="width:100%;margin-bottom: 20px;"/>
										</div>
									</div>
									<div class="col-sm-12">
										<div class="form-group col-md-3">
											<label for="business_name" >Category Information</label>
										</div>
										<div class="form-group col-md-9">
											<input value="{{$categories->business_category_information}}" type="text" class="form-control" name="cat_info" id="cat_info_edit" style="width:100%"/>
											<input value="{{$categories->business_category_id}}" type="hidden" id="id_to_edit"/>
										</div>
									</div>
									<div class="col-sm-12">
										<center><button type="submit" class="update_category btn btn-primary" name="update_category" id="update_category">Update</button></center>
									</div>
									
									
								</div>
								<div class="modal-footer" style="border:0px;">
									
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</tbody>
			</table>