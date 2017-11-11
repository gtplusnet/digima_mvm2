@extends('supervisor.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
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
                    <h3 class="text-center">{{$profile->prefix}} {{$profile->first_name}} {{$profile->last_name}}</h3>
                      <p class="text-center">{{$profile->email}}</p>
                    <p class="text-center">{{$profile->position}}</p>
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li><p><i class="fa fa-map-marker m-r-xs"></i>{{$profile->address}}</p></li>
                        <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">{{$profile->email}}</a></p></li>
                        <li><p><i class="fa fa-link m-r-xs"></i><a href="#">www.CroatiaDirectory.com</a></p></li>
                    </ul>
                    <hr>
                </div>


                <div class="col-md-9 m-t-lg">

                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title">Profile</h3>
                            </div>

                            <div class="panel-body">
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
                                    <h4>Personal Information</h4>
                                    
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
                                        <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$profile->address}}</textarea>
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
@endsection