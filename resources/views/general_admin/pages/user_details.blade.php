<div class="modal-header">
	<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Edit User</h4>
</div>
<div class="modal-body row ">
	
	<div id="userUpdateAlert">
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >First Name</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_first_name}}"  name="old_first_name" id="old_first_name" required/>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Last Name</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_last_name}}"  name="old_last_name" id="old_last_name" required/>
		</div>
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >Gender</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_gender}}"  name="old_gender" id="old_gender" required/>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Email</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_email}}"  name="old_email" id="old_email" required/>
		</div>
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >Address</label>
		</div>
		<div class="form-group col-md-4">
			<textarea type="text" class="form-control"   name="old_address" id="old_address">{{$user_details->user_address}}</textarea>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Phone Number</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_phone_number}}"  name="old_phone_number" id="old_phone_number" required/>
		</div>
	</div>
</div>
<div class="modal-footer" style="border:0px;">
	<center>
	<button type="submit" class="updateUser btn btn-primary" data-user_info_id="{{$user_details->user_info_id}}"" name="updateUser" id="updateUser">UPDATE USER</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
	</center>
</div>