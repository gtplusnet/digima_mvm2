@extends('agent.layout.layout')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script type="text/javascript" src="/assets/js/global.ajax.js"></script>
<script src="/assets/js/agent/agent_client.js"></script>
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
    <script>
    $( function() {
    $( ".datepicker" ).datepicker();
    $( ".datepicker1" ).datepicker();
    });
</script>
<div class="page-title">
    <h3>Merchant</h3>
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
                            <li class="active li_style"><a data-toggle="tab" href="#customer">Registered Merchant</a></li>
                            <li class="li_style"><a data-toggle="tab" href="#pendingCustomer">Pending Merchant</a></li>
                            <li class="li_style marg"><a data-toggle="tab" href="#activatedCustomer">Activated Merchant</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        
        <div id="customer" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12" style="margin:20px 20px 20px 0px">
                        <form class="form-inline" method="post" action="/agent/search_client">
                            {{csrf_field()}}
                            <div class="col-md-5 pull-left">
                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker" id="date_start" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker1" id="date_end" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 pull-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_key1" id="search_key1">
                                </div>
                                <button type="button" class="btn btn-success" name="search_button1" id="search_button1">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive col-md-12"  id="showHere_signup">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Contact Person</th>
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
                                    <td>{{$client->membership_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->transaction_status}}</td>
                                    <td>
                                        @if($client->transaction_status == 'call in progress' && $client->agent_id !=session('agent_id'))
                                        <button type="button" class="transaction btn btn-default "  data-id="{{$client->business_id}}" disabled>
                                        <i class="fa fa-phone call" aria-hidden="true"></i>Busy
                                        </button>
                                        @else
                                        <button type="button" class="transaction btn btn-default "  data-id="{{$client->business_id}}" >
                                        <i class="fa fa-phone call" aria-hidden="true"></i>call
                                        </button>
                                        @endif
                                        
                                    </td>
                                </tr>
                               
                                @endforeach
                            </tbody>
                        </table>
                        
                        {!! $clients->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <!-- modal !important-->
        <div class="modal fade" id="agentCallModal" role="dialog" style="overflow-y:inherit;">
            
        </div>
        <!-- pending -->
        <div id="pendingCustomer" class="tab-pane fade">
            <div class="col-md-12" style="margin:20px 20px 20px 0px">
                <form class="form-inline" method="post" action="/agent/search_client_pending">
                    {{csrf_field()}}
                    <div class="col-md-5 pull-left">
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker" id="date_start1" placeholder="Date From" value="">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker1" id="date_end1" placeholder="Date To" value="">
                        </div>
                    </div>
                    <div class="col-md-4 pull-right">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search_key12" id="search_key12">
                        </div>
                        <button type="button" class="btn btn-success" name="search_button12" id="search_button12">Search</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive col-md-12"  id="showHere_pending">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>

                                <th>ID</th>
                                <th>Business Name</th>
                                <th>Contact Person</th>
                                <th>Membership</th>
                                <th>Date Pending</th>
                                <th>Status</th>
                                <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients_pending as $clients_pendingss)
                                <tr>
                                    <td>{{$clients_pendingss->business_id}}</td>
                                    <td>{{$clients_pendingss->business_name}}</td>
                                    <td>{{$clients_pendingss->contact_first_name}}  {{$clients_pendingss->contact_last_name}}</td>
                                    <td>{{$clients_pendingss->membership_name}}</td>
                                    <td>{{date("F j, Y",strtotime($clients_pendingss->date_transact))}}</td>
                                    <td>{{$clients_pendingss->transaction_status}}</td>
                                    <td>
                                        <button type="button" class="transaction btn btn-default "  data-id="{{$clients_pendingss->business_id}}" >
                                            <i class="fa fa-phone call" aria-hidden="true"></i>call
                                        </button>
                                    </td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        
                        {!! $clients_pending->render() !!}
                    </div>
                </div>
            </div>
        </div>
        <div id="activatedCustomer" class="tab-pane fade">
            <div class="col-md-12" style="margin:20px 20px 20px 0px">
                <form class="form-inline" method="post" action="/agent/search_client_pending">
                    {{csrf_field()}}
                    <div class="col-md-5 pull-left">
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker" id="date_start2" placeholder="Date From" value="">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control datepicker1" id="date_end2" placeholder="Date To" value="">
                        </div>
                    </div>
                    <div class="col-md-4 pull-right">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search_key3" id="search_key3">
                        </div>
                        <button type="button" class="btn btn-success" name="search_button123" id="search_button123">Search</button>
                    </div>
                </form>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive col-md-12"  id="showHere_activated">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone 1</th>
                                    <th>Phone 2</th>
                                    <th>Membership</th>
                                    <th>Date Activated</th>
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
                                    <td>{{date("F j, Y",strtotime($clients_activate->date_transact))}}</td>
                                </tr>
                                
                                @endforeach
                            </tbody>
                        </table>
                        {!! $clients_activated->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection