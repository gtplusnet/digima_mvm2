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
			<td>{{$merchant->membership_name}}</td>
			<td>{{$merchant->status}}</td>
			<td>
				<select style="height:30px;width:80px;" data-id="{{$merchant->business_id}}" class="merchant_actionbox" id="merchant_actionbox"  >
					<option value="">Action</option>
					<option value="edit">Edit</option>
					<option value="delete">Deactivate</option>
				</select>
			</td>
		</tr>
		<div style="margin-top: 150px;" class="modal fade" id="confirmModal" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content" id="showSuccesss">
					<div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
						<div class="col-sm-12">
							<h4 class="modal-title">Are You sure You want to deactivate this merchant?</h4>
						</div>
						<div class="col-sm-12">
							<center>
							<input type="hidden" class="deleteMerchant" value="{{$merchant->business_id}}"/>
							<button type="button" class=" btn btn-danger" id="deleteMerchants">Yes</button>
							<button type="button" class="btn btn-default"  data-dismiss="modal">No</button>
							</center>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</tbody>
</table>