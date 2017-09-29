 <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date/Added</th>
                                    <th>Business Name</th>
                                    <th>membership</th>
                                    <th>Transaction</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->payment_method_name}}</td>
                                    <td>{{$client->transaction_status}}</td>
                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                </tr>
                                <div class="modal fade" id="myModal{{$client->business_id}}" role="dialog" >
                                    <div class="modal-lg modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close closed" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Personal Information</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="panel panel-primary col-md-12">

                                                  <div class="panel-body">
                                                        <form class="form-horizontal">
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
                                                                <div class="col-md-2">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="Mr." readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">First Name</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_first_name}}" readonly>
                                                                </div>
                                                                <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_last_name}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">Business Name</label>
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_name}}" readonly>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">Business Primary Phone</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_phone}}" readonly>
                                                                </div>
                                                                 <label for="input-Default" class="col-sm-2 control-label">Business Alternate Phone</label>
                                                                <div class="col-sm-4">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->business_alt_phone}}" readonly>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                                                <div class="col-sm-10">
                                                                    <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$client->business_complete_address}}</textarea>
                                                                </div>
                                                            </div>
                                                         </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">County</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->county_name}}" readonly>
                                                                </div>
                                                                <label for="input-Default" class="col-sm-2 control-label">City</label>
                                                                <div class="col-sm-2">
                                                                    <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->city_name}}" readonly>
                                                                </div>
                                                                <label for="input-Default" class="col-sm-2 control-label">Postal</label>
                                                                <div class="col-sm-2">
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
                                </div>
                             
                                @endforeach
                            </tbody>
                        </table>