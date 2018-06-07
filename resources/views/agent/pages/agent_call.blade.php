<div class="modal-lg modal-dialog">
    <div class="modal-content">
        
        <div class="modal-header">
            <button type="button" class="close" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Personal Information</h4>
        </div>
        <div class="row modal-body">
            <div>
                <div>
                    <center><img src="http://www.animatedimages.org/data/media/325/animated-telephone-image-0151.gif" border="0" alt="animated-telephone-image-0151" width="100px" height="100px" /></center>
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
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">Contact Name</label>
                                <div class="col-md-2">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_prefix}}" readonly>
                                </div>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_first_name." ".$client->contact_last_name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">Business Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">Phone Number 1</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_phone}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">Phone Number 2</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_alt_phone}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">Complete Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$client->business_complete_address}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">County</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->county_name}}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="distance">
                            <div class="form-group">
                                <label for="input-Default" class="col-sm-3 control-label">City</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->city_name}}" readonly>
                                </div>
                                <label for="input-Default" class="col-sm-3 control-label">Postal Code</label>
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