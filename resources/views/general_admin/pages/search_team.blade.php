<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($_data_team)}} Result</p>
    </div>
</div>
<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Team Name</th>
			<th>Team Description</th>
			<th>Team Members</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($_data_team as $data_team)
		<tr>
			<td>{{ $data_team->team_id}}</td>
			<td>{{ $data_team->team_name}}</td>
			<td>{{ $data_team->team_information}}</td>
			<td>View All Members</td>
			<td>
				<select style="height:30px;width:80px;" class="team_actionbox" id="team_actionbox"  data-id="{{ $data_team->team_id}}">
					<option value="">Action</option>
					<option value="edit">Edit</option>
					<option value="assign">Assignee</option>
					<option value="delete">Delete</option>
				</select>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>