<div class="col-md-12">
	<div >
		<p style="color:20px;font-weight: bold;color:#34425A;">{{count($_data_agent)}} Result</p>
	</div>
</div>
<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Primary Phone</th>
			<th>Secondary Phone</th>
			<th>Other Information</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($_data_agent as $data_agent)
		<tr>
			<td>{{$data_agent->agent_id}}</td>
			<td>{{$data_agent->first_name}}</td>
			<td>{{$data_agent->last_name}}</td>
			<td>{{$data_agent->email}}</td>
			<td>{{$data_agent->primary_phone}}</td>
			<td>{{$data_agent->secondary_phone}}</td>
			<td>{{$data_agent->other_info}}</td>
			<td>
				<select style="height:30px;width:80px;" class="agent_actionbox" id="agent_actionbox"  data-name="{{$data_agent->first_name}} {{$data_agent->last_name}}" data-id="{{ $data_agent->agent_id}}">
					<option value="">Action</option>
					<option value="edit">Edit</option>
					<option value="assign">Assign</option>
					<option value="delete">Delete</option>
				</select>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>