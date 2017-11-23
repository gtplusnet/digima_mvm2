<div class="col-md-12">
	<div >
		<p style="color:20px;font-weight: bold;color:#34425A;">{{count($_data_admin)}} Result</p>
	</div>
</div>
<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>Position</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($_data_admin as $data_admin)
		<tr>
			<td>{{$data_admin->admin_id}}</td>
			<td>{{$data_admin->full_name}}</td>
			<td>{{$data_admin->email}}</td>
			<td>{{$data_admin->position}}</td>
			<td><select style="height:30px;width:80px;" class="admin_actionbox" id="admin_actionbox" data-name="{{$data_admin->first_name}} {{$data_admin->last_name}}" data-id="{{ $data_admin->agent_id}}">
				<option value="">Action</option>
				<option value="edit">Edit</option>
				<option value="delete">Delete</option>
			</select>
		</td>
	</tr>
	@endforeach
</tbody>
</table>