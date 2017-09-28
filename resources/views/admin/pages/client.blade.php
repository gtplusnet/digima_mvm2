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
    <div class="tab-content ">
        <div class=" panel-primary">
            <div class="panel-heading row clearfix">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active li_style"><a data-toggle="tab" href="#needApproval">Need Approval</a></li>
                            <li class="li_style marg"><a data-toggle="tab" href="#approvedCustomer">Approved customer</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 ">
                    <div class="col-md-6">
                        <select class="form-control " name="date_start" id="date_start" style="width: 150px; border-radius: 20px;">
                            @foreach($clients as $client_list)
                            <option value="{{$client_list->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-control " name="date_end" id="date_end" style="width: 150px; border-radius: 20px;">
                            @foreach($clients as $client_list)
                            <option value="{{$client_list->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="needApproval" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive"  id="showHere">
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
                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-info call" aria-hidden="true"></i>View Transaction</button></td>
                                </tr>

                                <div class="modal fade" id="myModal{{$client->business_id}}" role="dialog" >
                                    <div class="modal-lg modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close closed" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Business Contact Information</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div class="panel panel-primary col-md-12">

                                                  <div class="panel-body">
                                                        <form class="form-horizontal">
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group">
                                                                <label for="input-Default" class="col-sm-2 control-label">Agent contact Name:</label>
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
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group center">
                                                                <button type="button" data-id="{{$client->business_id}}" class="btn btn-default lg">Play</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 distance">
                                                            <div class="form-group center">
                                                                <button type="button" data-id="{{$client->business_id}}" class="btn btn-success lg">Send Invoice</button>
                                                                <button type="button" data-id="{{$client->business_id}}" class="btn btn-danger lg">Declined</button>
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
                        
                        
                    </div>
                </div>
            </div>
            
            
            </div><!-- Row -->
            
            <div id="approvedCustomer" class="tab-pane fade">
                <div class="row">
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>Business Address</th>
                                        <th>membership</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                        <td>{{date("F j, Y, g:i a",strtotime($client->date_created))}}</td>
                                        <td>{{$client->business_name}}</td>
                                        <td>{{$client->business_complete_address}}</td>
                                        <td>{{$client->payment_method_name}}</td>
                                        <td><button class="btn btn-default"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div><!-- Row -->
                </div>
              </div>
            </div>
            
            <style>
            
            .distance
             {
                margin:10px 0px 10px 0px;
             }
            .li_style{
            padding:0px;
            width:50%;
            margin-right:0px;
            margin-left:-1px;
            }
            .modal-header
            {
                background-color: #24292E;
                color:#fff;
                /*border-radius: 10px;*/
            }
            .call
            {
            color:gray;
            margin-right: 5px;
            font-size:20px;
            }
            </style>
            <link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="/assets/js/agent/admin_client.js"></script>
            @endsection