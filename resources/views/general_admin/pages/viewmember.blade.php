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
									<td>{{$data_agent->agent_id}}</td>
									<td>{{$data_agent->first_name}}</td>
									<td>{{$data_agent->last_name}}</td>
									<td>{{$data_agent->email}}</td>
									<td>{{$data_agent->primary_phone}}</td>
									
								</tr>
								@endforeach
							</tbody>
						</table>