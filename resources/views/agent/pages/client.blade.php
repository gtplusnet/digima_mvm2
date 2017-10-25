@extends('agent.layout.layout')
@section('content')
<div class="page-title">
    <h3>Merchant</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/agent">Home</a></li>
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
                            <li class="active li_style"><a data-toggle="tab" href="#customer">Sign-Up Merchant</a></li>
                            <li class="li_style"><a data-toggle="tab" href="#pendingCustomer">Pending Merchant</a></li>
                            <li class="li_style marg"><a data-toggle="tab" href="#activatedCustomer">Registered Merchant</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="customer" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 pull-right">
                        <div class="col-md-6">
                            <select class="form-control " name="date_start" id="date_start" style="width: 150px; border-radius: 20px;">
                                @foreach($clients as $client_list)
                                <option value="{{$client_list->date_transact}}">{{date("F j, Y",strtotime($client_list->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control " name="date_end" id="date_end" style="width: 150px; border-radius: 20px;">
                                @foreach($clients as $client_list)
                                <option value="{{$client_list->date_transact}}">{{date("F j, Y",strtotime($client_list->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12"  id="showHere">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone 1</th>
                                    <th>Phone 2</th>
                                    <th>Membership</th>
                                    <th>Date Register</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->business_id}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{$client->business_phone}}</td>
                                    <td>{{$client->business_alt_phone}}</td>
                                    <td>{{$client->membership_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_transact))}}</td>
                                    <td>{{$client->transaction_status}}</td>
                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                </tr>
                                <div class="modal fade" id="myModal{{$client->business_id}}" role="dialog" >
                                    <div class="modal-lg modal-dialog">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <button type="button" class="close" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Personal Information</h4>
                                            </div>
                                            <div class="modal-body">
                                                <div>
                                                    <div>
                                                        <center><a href="http://www.animatedimages.org/cat-telephones-325.htm"><img src="http://www.animatedimages.org/data/media/325/animated-telephone-image-0151.gif" border="0" alt="animated-telephone-image-0151" width="100px" height="100px" /></a></center>
                                                    </div>
                                                    <div>
                                                        <p ><center>{{session('_Timer')}}</center></p>
                                                    </div>
                                                    <div >
                                                        <center><button type="button" class="closed btn btn-danger " data-id="{{$client->business_id}}"  data-dismiss="modal" ><i class="fa fa-phone callme" aria-hidden="true"></i>End Call</button></center>
                                                    </div>
                                                </div>
                                                 
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
                                                                        <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->postal_id}}" readonly>
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
                        
                        
                    </div>
                </div>
            </div>
        </div>


        <div id="pendingCustomer" class="tab-pane fade">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 pull-right">
                        <div class="col-md-6">
                            <select class="form-control " name="date_start" id="date_start1" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_pending as $clients_pendings)
                                <option value="{{$clients_pendings->date_transact}}">{{date("F j, Y",strtotime($clients_pendings->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control " name="date_end" id="date_end1" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_pending as $clients_pendings)
                                <option value="{{$clients_pendings->date_transact}}">{{date("F j, Y",strtotime($clients_pendings->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12"  id="showHere1">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Business Name</th>
                                <th>Contact Person</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Membership</th>
                                <th>Date Pending</th>
                                <th>Status</th>
                                  <!--   <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients_pending as $clients_pendingss)
                                <tr>
                                <td>{{$clients_pendingss->business_id}}</td>
                                <td>{{$clients_pendingss->business_name}}</td>
                                <td>{{$clients_pendingss->contact_first_name}}  {{$clients_pendingss->contact_last_name}}</td>
                                <td>{{$clients_pendingss->business_phone}}</td>
                                <td>{{$clients_pendingss->business_alt_phone}}</td>
                                <td>{{$clients_pendingss->membership_name}}</td>
                                <td>{{date("F j, Y",strtotime($clients_pendingss->date_transact))}}</td>
                                <td>{{$clients_pendingss->transaction_status}}</td>
                                </tr>
                 
                                @endforeach
                            </tbody>
                        </table>
                        
                        
                    </div>
                </div>
            </div>
        </div>

        <div id="activatedCustomer" class="tab-pane fade">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 pull-right">
                        <div class="col-md-6">
                            <select class="form-control " name="date_start" id="date_start2" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_activated as $clients_activates)
                                <option value="{{$clients_activates->date_transact}}">{{date("F j, Y",strtotime($clients_activates->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control " name="date_end" id="date_end2" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_activated as $clients_activates)
                                <option value="{{$clients_activates->date_transact}}">{{date("F j, Y",strtotime($clients_activates->date_transact))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12"  id="showHere2">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Business Name</th>
                                <th>Contact Person</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Membership</th>
                                <th>Date Register</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients_activated as $clients_activate)
                                <tr>
                                <td>{{$clients_activate->business_id}}</td>
                                <td>{{$clients_activate->business_name}}</td>
                                <td>{{$clients_activate->contact_first_name}}  {{$clients_activate->contact_last_name}}</td>
                                <td>{{$clients_activate->business_phone}}</td>
                                <td>{{$clients_activate->business_alt_phone}}</td>
                                <td>{{$clients_activate->membership_name}}</td>

                                <!--     <td>{{$clients_activate->transaction_status}}</td> -->
                                    <td>{{date("F j, Y",strtotime($clients_activate->date_transact))}}</td>
                              </tr>
                               
                                @endforeach
                            </tbody>
                        </table>
                                    
                    </div>
                </div>
            </div>

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
width:33.31%;
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
color:green;
margin-right: 5px;
font-size:20px;
}
.callme
{
color:white;
margin-right: 0px;
width:35px;
font-size:20px;
}
</style>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/agent/agent_client.js"></script>
@endsection

