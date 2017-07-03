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
            
        {{-- <div class="profile-cover">
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
         --}}
        <div id="main-wrapper">
            <div class="row">
                
                    <div class="tabs-left" role="tabpanel">
                        <!-- Nav tabs -->
                        <div class="col-md-3  m-t-lg">
                        <ul class="nav nav-pills nav-stacked nav-pills-stacked-example" role="tablist">
                            <li role="presentation" class="active"><a href="#tab5" role="tab" data-toggle="tab" aria-expanded="true">Contact Details</a></li>
                            <li role="presentation" class=""><a href="#tab6" role="tab" data-toggle="tab" aria-expanded="false">Daily Business Hours</a></li>
                            <li role="presentation" class=""><a href="#tab7" role="tab" data-toggle="tab" aria-expanded="false">Payment Methods</a></li>
                            <li role="presentation" class=""><a href="#tab8" role="tab" data-toggle="tab" aria-expanded="false">Other Infomation</a></li>
                        </ul>
                        </div>
                        <!-- Tab panes -->
                        <div class="col-md-9 m-t-lg">
                            <div class="tab-content">
                                <form class="form-horizontal">  
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab5">
                                        
                                        <h4>Personal Information</h4>                               
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
                                        
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab6">
                                        
                                        <h4>Business Information</h4>
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


                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab7">
                                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.</p>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab8">
                                        <p>Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus.</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                     
                </div>


                <div class="col-md-9 m-t-lg">

                    <div class="row">
                        <div class="panel panel-primary">
                            {{-- <div class="panel-heading clearfix">
                                <h3 class="panel-title">Profile</h3>
                            </div> --}}

                            <div class="panel-body">

                                 <div class="col-md-4">
                                    <h3>Large Modal</h3>
                                    <p>Modals have large optional size, available by adding <code>.modal-lg</code> class on a <code>.modal-dialog</code>.</p>
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
                                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myLargeModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.<br><br>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>    



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
                                    <h4>Business Information</h4>
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
                </div>
            </div>
        </div> 



    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection

