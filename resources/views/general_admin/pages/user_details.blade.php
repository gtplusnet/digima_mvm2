<div class="modal-header">
	<button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">Edit Agent Login</h4>
</div>
<div class="modal-body row ">
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >Team</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->team_name}}" name="team_id" id="team_id" required/>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Position</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_access_level}}"  name="user_access_level" id="user_access_level" required/>
		</div>
		
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >First Name</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_first_name}}"  name="user_first_name" id="user_first_name" required/>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Last Name</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_last_name}}"  name="user_last_name" id="user_last_name" required/>
		</div>
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >Gender</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_gender}}"  name="user_gender" id="user_gender" required/>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Email</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_email}}"  name="user_email" id="user_email" required/>
		</div>
	</div>
	<div class="body-content">
		<div class="form-group col-md-2">
			<label for="business_name" >Address</label>
		</div>
		<div class="form-group col-md-4">
			<textarea type="text" class="form-control"   name="user_address" id="user_address">{{$user_details->user_address}}</textarea>
		</div>
		<div class="form-group col-md-2">
			<label for="business_name" >Phone Number</label>
		</div>
		<div class="form-group col-md-4">
			<input type="text" class="form-control" value="{{$user_details->user_phone_number}}"  name="user_phone_number" id="user_phone_number" required/>
		</div>
	</div>
</div>
<div class="modal-footer" style="border:0px;">
	<center>
	<button type="submit" class="addUserBtn btn btn-primary" name="addUserBtn" id="addUserBtn">ADD USER</button>
	<button type="button" class="btn btn-danger" data-dismiss="modal">CANCEL</button>
	</center>
</div>