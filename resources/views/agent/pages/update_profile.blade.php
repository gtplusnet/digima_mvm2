@if($transaction=='profile')
<h4>Update Profile Information</h4>

<form class="form-horizontal" method="POST" action="/agent/saving_profile">
    {{csrf_field()}}
    <div class="form-group">
        <div class="col-sm-2">
        </div>
        <div class="col-sm-4">
            <img src="{{$agent_info->user_profile}}" width="150" height="100" class="img-thumbnail" alt="">
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Profile picture</label>
        <div class="col-sm-4">
            <input type="file" class="form-control input-rounded" id="image" accept="image/x-png,image/jpeg">
            <input type="hidden" id="imageText" value="{{$agent_info->user_profile}}">
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->user_first_name}}" readonly>
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->user_last_name}}" readonly>
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="user_phone_number" value="{{$agent_info->user_phone_number}}" >
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="user_email" value="{{$agent_info->user_email}}" >
        </div>
    </div>
    
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <textarea class="form-control input-rounded" placeholder="" id="user_address" rows="4=6" >{{$agent_info->user_address}}</textarea>
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="saveProfile"><i class="fa fa-pencil m-r-xs"></i>Save</button>
    </div>
</form>
@else
<h4>Update Password</h4>
<form class="form-horizontal" method="POST" action="/agent/checking_password">
    {{csrf_field()}}
    <div class="form-group col-md-12">
        <label for="input-Default" class="col-md-3 control-label">Current Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="currentPassword" >
        </div>
    </div>
    <div class="form-group col-md-12">
        <label for="input-Default" class="col-md-3 control-label">New Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="newPassword">
        </div>
        
    </div>
    <div class="form-group col-md-12">
        
        <label for="input-Default" class="col-sm-3 control-label">Confirm New Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="confirmPassword" >
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="savePassword"><i class="fa fa-pencil m-r-xs"></i>Save</button>
    </div>
</form>
@endif