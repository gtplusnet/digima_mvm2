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
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modal Headergfdg</h4>
                </div>
                <div class="modal-body">
                    <p>This is a large modal.fdsfdsf</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="tab-content">
        <div class="pane panel-primary">
            <div class="panel-heading clearfix">
                <div class="col-md-8">
                    <div class="col-md-12">
                    <ul class="nav nav-tabs">
                        <li ><a data-toggle="tab" href="#customer">Customer</a></li>
                        <li ><a data-toggle="tab" href="#pendingCustomer">Pending Customer</a></li>
                        <li ><a data-toggle="tab" href="#activatedCustomer">Activated Customer</a></li>
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
        <div id="customer" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive"  id="showHere">
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
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->business_complete_address}}</td>
                                    <td>{{$client->payment_method_name}}</td>
                                    <td><button class="btn btn-default" data-toggle="modal" data-target="#myModal"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            
            </div><!-- Row -->
            
            <div id="pendingCustomer" class="tab-pane fade">
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
                <div id="activatedCustomer" class="tab-pane fade">
                    <div class="row">
                        <div class="panel-body" id="showHere">
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
            li{
                padding:0px;
                width:33.5%;
                margin-right:0px;
                margin-left:-1px;
            }
            .call
            {
            color:green;
            margin-right: 5px;
            font-size:20px;
            }
            </style>
            <link rel="stylesheet" href="/assets/css/mvm.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
            <script src="/assets/js/agent/agent_client.js"></script>
            @endsection