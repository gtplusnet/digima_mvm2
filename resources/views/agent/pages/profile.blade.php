@extends('agent.layout.layout')
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
                        <img src="/assets/admin/merchant/assets/images/avatar4.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 user-profile">
                    
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li><h3 class="text-center">{{session('full_name')}}</h3></li>
                        <li><p><i class="fa fa-map-marker m-r-xs"></i>{{$agent_info->address}}</p></li>
                        <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">{{$agent_info->email}}</a></p></li>
                    </ul>
                    <hr>
                    <button id="updateProfile" class="btn btn-primary btn-block"><i class="fa fa-pencil m-r-xs"></i>Update Profile</button>
                    <button id="updatePassword" class="btn btn-primary btn-block"><i class="fa fa-pencil m-r-xs"></i>Update Password</button>
                </div>
                <div class="col-md-9 m-t-lg">
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title">Profile</h3>
                            </div>
                            <div class="panel-body" id="showProfile">
                                <h4>Personal Information</h4>
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->prefix}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->first_name}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->last_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-rounded-Default" class="col-sm-2 control-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->email}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->primary_phone}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Secondary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->secondary_phone}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Team Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$agent_info->team_name}}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Information</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$agent_info->other_info}}</textarea>
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
<script src="/assets/js/global.ajax.js" ></script>
<script src="/assets/js/agent/agent_profile.js" ></script>
@endsection