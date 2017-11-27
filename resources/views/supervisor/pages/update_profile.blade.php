@if($transaction=='profile')
<h4>Personal Information</h4>
<form class="form-horizontal" method="POST" action="/supervisor/saving_profile">
    {{csrf_field()}}
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Profile Picture</label>
        <div class="col-sm-4">
            <input type="file" class="form-control input-rounded" id="image" accept="image/x-png,image/jpeg">
            <input type="hidden" id="imageText" value="{{$profile->profile}}">
        </div>
        <div class="col-sm-6">
            <img src="/company_profile/user_pictures.png" >
        </div>
    </div>
    <hr>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
        <div class="col-sm-2">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$profile->prefix}}" readonly>
        </div>
    </div>
    
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$profile->first_name}}" readonly>
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$profile->last_name}}" readonly>
        </div>
    </div>
    <hr>
    <h4>Update Other Information</h4>
    
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Primary Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="primaryPhone" value="{{$profile->primary_phone}}" >
        </div>
        <label for="input-Default" class="col-sm-2 control-label">Alternate Phone</label>
        <div class="col-sm-4">
            <input type="text" class="form-control input-rounded" id="secondaryPhone" value="{{$profile->secondary_phone}}" >
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <textarea class="form-control input-rounded" placeholder="" id="address" rows="4=6" >{{$profile->address}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <label for="input-Default" class="col-sm-2 control-label">About Me</label>
        <div class="col-sm-10">
            <textarea class="form-control input-rounded" placeholder="" id="otherInfo" rows="4=6" >{{$profile->other_info}}</textarea>
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="saveProfile"><i class="fa fa-pencil m-r-xs"></i>Save</button>
    </div>
    
</form>
@else
<h4>Update Password</h4>
<form class="form-horizontal" method="POST" action="/supervisor/checking_password">
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
            <input type="password" class="form-control input-rounded" id="newPassword"  >
        </div>
       
    </div>
    <div class="form-group col-md-12">
        
        <label for="input-Default" class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-md-9">
            <input type="password" class="form-control input-rounded" id="confirmPassword" >
        </div>
    </div>
    <div class="col-md-3 pull-right">
        <button type="button" class="btn btn-primary btn-block" id="savePassword"><i class="fa fa-pencil m-r-xs"></i>Save</button>
    </div>
</form>
@endif