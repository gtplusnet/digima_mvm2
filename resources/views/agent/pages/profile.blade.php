@extends('layout.general_layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/agent">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="profile-cover">
            <div class="row">
                <div class="col-md-3 profile-image">
                    <div class="profile-image-container">
                         <img src="{{$agent_info->user_profile}}" alt="" style="min-width: 200px;min-height: 200px;max-height: 200px;max-width: 200px;">
                    </div>
                </div>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 user-profile">
                    <br>
                    <hr>
                    <hr>
                    <button id="updateProfile" class="btn btn-primary btn-block"><i class="fa fa-pencil m-r-xs"></i>Update Profile</button>
                    <button id="updatePassword" class="btn btn-primary btn-block"><i class="fa fa-pencil m-r-xs"></i>Update Password</button>
                </div>
                <div class="col-md-9 m-t-lg">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title">Agent Profile</h3>
                            </div>
                            <div class="panel-body" id="showProfile">
                                <h4>Personal Information</h4>
                                <form class="form-horizontal">
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
                                        <label for="input-Default" class="col-sm-2 control-label">Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->user_phone_number}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->user_email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Team Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$team->team_name}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Gender</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->user_gender}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Other Info</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$agent_info->user_address}}</textarea>
                                        </div>
                                    </div>
                                    
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/agent/agent_profile.js" ></script>
@endsection