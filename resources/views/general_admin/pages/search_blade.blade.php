			<table class="display table table-bordered"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
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
					<tr class="count">
						<td>{{$categories->business_category_id}}</td>
						<td>{{$categories->business_category_name}}</td>
						<td>{{$categories->business_category_information}}</td>
						<td>
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

		<!-- 	CATEGORY -->