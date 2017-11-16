@extends('general_admin.pages.general_admin_layout')
@section('title', 'merchants')
@section('description', 'merchants')
@section('content')
<style>
    .li_me
    {
        width:25%;
    }
</style>
<div class="page-title" style="margin-bottom:20px;">
    <h3>Merchant</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">Merchant</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    
    <div class="col-md-12">
        <ul class="nav nav-tabs">
            <li class="active li_me"><a data-toggle="pill" href="#customer">Send Invoice</a></li>
            <li class="li_me"><a data-toggle="pill" href="#agentAdded">Agent Added</a></li>
            <li class="li_me"><a data-toggle="pill" href="#pending">Pending Merchant</a></li>
            <li class="li_me"><a data-toggle="pill" href="#registered">Registered Merchant</a></li>
        </ul>
        
        <div class="tab-content" style="">

            <div id="customer" class=" col-md-12 tab-pane fade in  active">
                @if (session('success'))
                <div class="alert alert-success">
                    Thank you!. Invoice Save and Send Successfully!
                </div>
                @elseif(session('error'))
                <div class="alert alert-danger">
                    Transaction Failed! The file was save but failed to send. Note: goto Invoice to Resend the invoice!
                </div>
                @endif
                <div class="row">
                    <div class="panel-body">
                        <div class="row col-md-6 date" style="margin-right:-20px">

                             <div class="pull-right" style="padding:0px">
                             <form class="form-inline" method="post" action="/general_admin/search_send_invoice">
                                 {{csrf_field()}}
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="search_send_invoice" id="search_send_invoice" >
                                 </div>
                                 <button type="button" class="btn btn-success" name="search_btn_invoice" id="search_btn_invoice">Search</button>
                             </form>
                            </div>  

                            <div class="col-md-6" style="padding:1px;">
                                <select class="form-control" name="date_start" id="date_start">
                                    @foreach($clients as $client_list)
                                    <option value="{{$client_list->date_transact}}">{{date("F j, Y",strtotime($client_list->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="padding:0px">
                                <select class="form-control" name="date_end" id="date_end">
                                    @foreach($clients as $client_list)
                                    <option value="{{$client_list->date_transact}}">{{date("F j, Y",strtotime($client_list->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive col-md-12"  id="showHere">
                            <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>membership</th>
                                        <th>Transaction</th>
                                        <th>Conversation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($clients as $client)
                                    <tr>
                                        <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($client->date_transact))}}</td>
                                        <td>{{$client->business_name}}</td>
                                        <td>{{$client->membership_name}}</td>
                                        <td>{{$client->transaction_status}} by: {{$client->first_name}} {{$client->last_name}}</td>
                                        <td>
                                            @if($client->file_path=="not available")
                                            <p>MP3 not available</p>
                                            @else
                                            <a target="blank" href="{{$client->file_path}}">View Conversation</a>
                                            @endif
                                        </td>
                                        <td><a target="_blank" href="/general_admin/send_invoice/{{$client->business_id}}"><button class="transaction btn btn-default "><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="agentAdded" class="tab-pane fade">
                <div class="row">
                    <div class="panel-body">
                        <div class="row col-md-6 date" style="margin-right:-20px;">

                            <div class="pull-right" style="padding:0px">
                             <form class="form-inline" method="post" action="/general_admin/search_agent_added">
                                 {{csrf_field()}}
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="search_agent" id="search_agent" >
                                 </div>
                                 <button type="button" class="btn btn-success" name="search_agent_btn" id="search_agent_btn">Search</button>
                             </form>
                            </div>  

                            <div class="col-md-6" style="padding:1px;">
                                <select class="form-control" name="date_start" id="date_start">
                                    @foreach($agentAdded as $agent_client)
                                    <option value="{{$agent_client->date_transact}}">{{date("F j, Y",strtotime($agent_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="padding:0px">
                                <select class="form-control" name="date_end" id="date_end">
                                    @foreach($agentAdded as $agent_client)
                                    <option value="{{$agent_client->date_transact}}">{{date("F j, Y",strtotime($agent_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive col-md-12"  id="showHere1">
                            <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
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
                                    @foreach($agentAdded as $agentAdd)
                                    <tr>
                                        <td>{{$agentAdd->contact_first_name}}  {{$agentAdd->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($agentAdd->date_transact))}}</td>
                                        <td>{{$agentAdd->business_name}}</td>
                                        <td>{{$agentAdd->membership_name}}</td>
                                        <td>{{$agentAdd->transaction_status}} by: {{$agentAdd->first_name}} {{$agentAdd->last_name}}</td>
                                        <td><a target="_blank" href="/general_admin/send_invoice/{{$agentAdd->business_id}}"><button class="transaction btn btn-default "><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="pending" class="tab-pane fade">
                <div class="row">
                    <div class="panel-body">
                        <div class="row col-md-6 date" style="margin-right:-20px">

                            <div class="pull-right" style="padding:0px">
                             <form class="form-inline" method="post" action="/general_admin/search_pending">
                                 {{csrf_field()}}
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="search_pending" id="search_pending" >
                                 </div>
                                 <button type="button" class="btn btn-success" name="search_pending_btn" id="search_pending_btn">Search</button>
                             </form>
                            </div>  

                            <div class="col-md-6" style="padding:1px;">
                                <select class="form-control" name="date_start" id="date_start">
                                    @foreach($pending_clients as $pending_client)
                                    <option value="{{$pending_client->date_transact}}">{{date("F j, Y",strtotime($pending_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="padding:0px">
                                <select class="form-control" name="date_end" id="date_end">
                                    @foreach($pending_clients as $pending_client)
                                    <option value="{{$pending_client->date_transact}}">{{date("F j, Y",strtotime($pending_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive col-md-12"  id="showHere2">
                            <div id="resendSuccess">
                            </div>
                            <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>membership</th>
                                        <th>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_clients as $pendingclient)
                                    <tr>
                                        <td>{{$pendingclient->contact_first_name}}  {{$pendingclient->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($pendingclient->date_transact))}}</td>
                                        <td>{{$pendingclient->business_name}}</td>
                                        <td>{{$pendingclient->membership_name}}</td>
                                        <td>{{$pendingclient->transaction_status}} by: {{$pendingclient->first_name}} {{$pendingclient->last_name}}</td>
                                        <td>
                                            <select id="resendAction" data-contact_name="{{ $pendingclient->contact_first_name}}" data-b_id="{{ $pendingclient->business_id}}" data-name="{{ $pendingclient->invoice_name }}" data-email="{{ $pendingclient->user_email }}" data-path="{{$pendingclient->invoice_path}}" class="form-control resendAction" id="sel1" style="width:90px;">
                                                
                                                
                                                <option >Action</option>
                                                <option value="resend">Resend</option>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- modal --}}
            <div style="margin-top: 150px;" class="modal fade" id="successModals" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body" style="margin-bottom: 120px;" >
                            <div class="col-sm-12" id="success_alert">
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- modal --}}
            </div>
            <div id="registered" class="tab-pane fade">
                <div class="row">
                    <div class="panel-body">
                        <div class="row col-md-6 date" style="margin-right:-20px">

                            <div class="pull-right" style="padding:0px">
                             <form class="form-inline" method="post" action="/general_admin/search_registered">
                                 {{csrf_field()}}
                                 <div class="form-group">
                                    <input type="text" class="form-control" name="search_registered" id="search_registered" >
                                 </div>
                                 <button type="button" class="btn btn-success" name="search_registered_btn" id="search_registered_btn">Search</button>
                             </form>
                            </div>  


                            <div class="col-md-6" style="padding:1px;">
                                <select class="form-control" name="date_start" id="date_start">
                                    @foreach($registered_clients as $registered_client)
                                    <option value="{{$registered_client->date_transact}}">{{date("F j, Y",strtotime($registered_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6" style="padding:0px">
                                <select class="form-control" name="date_end" id="date_end">
                                    @foreach($registered_clients as $registered_client)
                                    <option value="{{$registered_client->date_transact}}">{{date("F j, Y",strtotime($registered_client->date_transact))}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive col-md-12"  id="showHere3">
                           <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>membership</th>
                                        <th>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($registered_clients as $registeredclients)
                                    <tr>
                                        <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                                        <td>{{$registeredclients->business_name}}</td>
                                        <td>{{$registeredclients->membership_name}}</td>
                                        <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
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
</div>

<style>
.date {
    position: relative;
    left:500px;
}
.distance
{
margin:10px 0px 10px 0px;
}
.li_me{
padding:0px;
width:25%;
margin-right:0px;
margin-left:-1px;
}
.modal-header
{
background-color: #24292E;
color:#fff;
/*border-radius: 10px;*/
}
</style>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/admin/general_admin/assets/js/general_admin_merchant.js"></script>
@endsection