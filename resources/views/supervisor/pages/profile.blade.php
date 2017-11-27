@extends('supervisor.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor/dashboard">Home</a></li>
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
                        <img src="{{$profile->profile}}" alt="" style="min-width: 200px;min-height: 200px;max-height: 200px;max-width: 200px;">
                    </div>
                </div>
            </div>
        </div>
        
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 user-profile">
                    <br>
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li><h3 class="text-center">{{$profile->prefix}} {{$profile->first_name}} {{$profile->last_name}}</h3></li>
                        <li><p><i class="fa fa-map-marker m-r-xs"></i>{{$profile->address}}</p></li>
                        <li><p><i class="fa fa-envelope m-r-xs"></i><a href="mailto::">{{$profile->email}}</a></p></li>
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
                                    <h4>Other Information</h4>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$profile->primary_phone}}" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Alternate Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$profile->secondary_phone}}" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">About Me</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$profile->other_info}}</textarea>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div><!-- Row -->
        <!-- Row -->
    </div>
    <script src="/assets/js/global.ajax.js"></script>
    <script src="/assets/js/supervisor/supervisor_profile.js"></script>
    @endsection