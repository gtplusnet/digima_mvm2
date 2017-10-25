<table class="table table-bordered">
	<thead>
		<tr>
			<th>ID</th>
			<th>Sub Category Name</th>
			<th>Sub Category Info</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($_sub_category as $sub_category)
		<tr>
			<td>{{$sub_category->sub_sub_category_id}}</td>
			<td>{{$sub_category->sub_sub_category_name}}</td>
			<td>{{$sub_category->sub_sub_category_info}}</td>
			<td>
				<select class="form-select form-control sub_category_action" id="sub_category_action" >
					<option >Action</option>
					<option value="edit">Edit</option>
					<option value="delete">Delete</option>
				</select>
			</td>
		</tr>
		@endforeach
		
		
	</tbody>
</table>