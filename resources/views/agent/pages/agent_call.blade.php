<div class="modal-md modal-dialog">
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Personal Information</h4>
        </div>
        <div class="modal-body">
            <div>
                <div>
                    <center><a href=""><img src="http://www.animatedimages.org/data/media/325/animated-telephone-image-0151.gif" border="0" alt="animated-telephone-image-0151" width="100px" height="100px" /></a></center>
                </div>
                <div>
                    <p ><center>{{session('_Timer')}}</center></p>
                </div>
                <div >
                    <center><button type="button" id="" class="btn btn-danger end-call" data-status="{{$client->business_status}}" data-id="{{$client->business_id}}"  ><i class="fa fa-phone " aria-hidden="true"></i>End Call</button></center>
                </div>
            </div>
            
            <div class="panel panel-primary col-md-12">
                <div class="panel-body">
                    <form class="form-horizontal">
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                
                            </div>
                        </div>
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Name</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="Mr." readonly>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_first_name}}" readonly>
                                </div>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_last_name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Business NAme</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Primary Number</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_phone}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-2 control-label">Secondary Number</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_alt_phone}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-2 control-label">Complete Address</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$client->business_complete_address}}</textarea>
                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-1 control-label">County</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->county_name}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-1 control-label">City</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->city_name}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-1 control-label">Postal Code</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->postal_code}}" readonly>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal-footer" style="border:none;">
            <button type="button" data-id="{{$client->business_id}}" class="closed btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>