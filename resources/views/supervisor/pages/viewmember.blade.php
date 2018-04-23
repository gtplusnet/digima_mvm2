
@foreach($_supervisor as $supervisor)
<div style="text-align:center,font-size:20px;font-weight: bold;margin:20px;">
	Supervisor : {{$supervisor->user_first_name}} {{$supervisor->user_last_name}}
</div>
@endforeach

<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Email</th>
			<th>Primary Phone</th>
			
		</tr>
	</thead>
	<tbody>
		@foreach($_data_agent as $data_agent)
		<tr>
			<td>{{$data_agent->user_id}}</td>
			<td>{{$data_agent->user_first_name}}</td>
			<td>{{$data_agent->user_last_name}}</td>
			<td>{{$data_agent->user_email}}</td>
			<td>{{$data_agent->user_phone_number}}</td>
		</tr>
		@endforeach
	</tbody>
</table>