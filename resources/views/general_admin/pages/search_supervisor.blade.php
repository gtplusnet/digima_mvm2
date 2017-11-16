						<table class="display table table-bordered agent_container"  style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
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
								@foreach($_data_supervisor as $data_supervisor)
								<tr>
									<td>{{$data_supervisor->supervisor_id}}</td>
									<td>{{$data_supervisor->first_name}}</td>
									<td>{{$data_supervisor->last_name}}</td>
									<td>{{$data_supervisor->email}}</td>
									<td>{{$data_supervisor->primary_phone}}</td>
									<td>{{$data_supervisor->secondary_phone}}</td>
									<td>{{$data_supervisor->other_info}}</td>
									<td>
										<select style="height:30px;width:80px;" class="supervisor_actionbox" id="supervisor_actionbox"  data-id="{{ $data_supervisor->supervisor_id}}">
											<option value="">Action</option>
											<option value="assign">Edit</option>
											<option value="assign">Assign</option>
											<option value="delete">Delete</option>
										</select>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>