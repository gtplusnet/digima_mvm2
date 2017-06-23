@extends('admin.merchant.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant">Home</a></li>
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
                <div class="col-md-12 profile-info">
                    <div class=" profile-info-value">
                        <h3>1020</h3>
                        <p>Followers</p>
                    </div>
                    <div class=" profile-info-value">
                        <h3>1780</h3>
                        <p>Friends</p>
                    </div>
                    <div class=" profile-info-value">
                        <h3>260</h3>
                        <p>Photos</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-3 user-profile">
                    <h3 class="text-center">Amily Lee</h3>
                    <p class="text-center">UI/UX Designer</p>
                    <hr>
                    <ul class="list-unstyled text-center">
                        <li><p><i class="fa fa-map-marker m-r-xs"></i>Melbourne, Australia</p></li>
                        <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">example@mail.com</a></p></li>
                        <li><p><i class="fa fa-link m-r-xs"></i><a href="#">www.themeforest.net</a></p></li>
                    </ul>
                    <hr>
                    <button class="btn btn-primary btn-block"><i class="fa fa-plus m-r-xs"></i>Follow</button>
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
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Mr." readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">First Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Juan" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Dela Cruz" readonly>
                                        </div>
                                    </div>
                                    <hr>
                                    <h4>Personal Information</h4>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Jolibee" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Primary Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="095678923" readonly>
                                        </div>
                                         <label for="input-Default" class="col-sm-2 control-label">Business Alternate Phone</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="095678923" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>Marcos St. Pandi, Bulacan</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">County</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Bulacan" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">City</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="Pandi" readonly>
                                        </div>
                                        <label for="input-Default" class="col-sm-2 control-label">Postal</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control input-rounded" id="input-rounded" value="1432" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="panel panel-white">
                            <div class="panel-heading clearfix">
                                <h3 class="panel-title"></h3>
                            </div>
                            <div class="panel-body">

                                <div role="tabpanel">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab" aria-expanded="true">Contact Details</a></li>
                                        <li role="presentation" class=""><a href="#tab6" role="tab" data-toggle="tab" aria-expanded="false">Daily Business Hours</a></li>
                                        <li role="presentation" class=""><a href="#tab7" role="tab" data-toggle="tab" aria-expanded="false">Payment Methods</a></li>
                                        <li role="presentation" class=""><a href="#tab8" role="tab" data-toggle="tab" aria-expanded="false">Other Infomation</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane fade active in" id="tab5">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat.</p>
                                               
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab6">
                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab7">
                                            <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                                        </div>
                                        <div role="tabpanel" class="tab-pane fade" id="tab8">
                                            <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                        </div>
                                    </div>
                                </div>
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