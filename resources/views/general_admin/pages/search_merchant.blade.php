<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($_merchant)}} Result</p>
    </div>
</div>
<table class="display table agent_container table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
	<thead>
		<tr>
			<th>ID</th>
			<th>Business Name</th>
			<th>Contact Person</th>
			<th>Email</th>
			<th>Membership</th>
			<th>Status</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($_merchant as $merchant)
		<tr>
			<td>{{$merchant->business_id}}</td>
			<td>{{$merchant->business_name}}</td>
			<td>{{$merchant->contact_first_name}} {{$merchant->contact_last_name}}</td>
			<td>{{$merchant->user_email}}</td>
			<td>{{$merchant->membership}}</td>
			<td>{{$merchant->status}}</td>
			<td>
				<select style="height:30px;width:80px;" data-id="{{$merchant->business_id}}" class="merchant_actionbox" id="merchant_actionbox"  >
					<option value="">Action</option>
					<option value="edit">Edit</option>
					<option value="delete">Deactivate</option>
				</select>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>