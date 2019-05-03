@extends('layout.general_layout')
@section('title', 'Merchants')
@section('description', 'merchants')
@section('content')

<style>
.date
{
position: relative;
left:500px;
}
.distance
{
margin:10px 0px 10px 0px;
}
.li_me
{
padding:0px;
width:25%;
margin-right:0px;
margin-left:-1px;
}
.modal-header
{
background-color: #24292E;
color:#fff;
}
.padding-close
{
padding:0px;
}
.table-design
{
background-color: #FFFFFF;
width: 100%;
cellspacing: 0;
}
</style>


<div class="page-title" style="margin-bottom:20px;">
    <h3>Merchant</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/general_admin/dashboard">Home</a></li>
            <li class="active">Merchant</li>
        </ol>
    </div>
</div>
<div id="main-wrapper" style="text-align: right">
    <a href="/general_admin/merchants/import" class="btn btn-success" >Import Existing Merchant</a>
</div>
<div id="main-wrapper">
    <ul class="nav nav-tabs">
        <li class="active li_me"><a data-toggle="pill" href="#customer">Send Invoice</a></li>
        <li class="li_me"><a data-toggle="pill" href="#agentAdded">Agent Added</a></li>
        <li class="li_me"><a data-toggle="pill" href="#pending">Pending Merchant</a></li>
        <li class="li_me"><a data-toggle="pill" href="#registered">Activated Merchant</a></li>
    </ul>
    <div class="tab-content" style="">
        <div id="customer" class="tab-pane fade in  active">
            @if (session('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
            
            @elseif(session('deact'))
            <div class="alert alert-success">
                {{ Session::get('deact') }}
            </div>
            @endif
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12">
                        <form class="form-inline" method="post" action="/general_admin/search_send_invoice">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left padding-close" >
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control" id="date_start" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control" id="date_end" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right padding-close">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_send_invoice" id="search_send_invoice" >
                                </div>
                                <button type="button" class="btn btn-success" name="search_btn_invoice" id="search_btn_invoice">Search</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive"  id="customerShow">
                        <table id="example" class="display table table-bordered table-design">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Membership</th>
                                    <th>Transaction</th>
                                    <th>Conversation</th>
                                    <th>Date Transact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->membership_name}}</td>
                                    <td>{{$client->transaction_status}} by: {{$client->user_first_name}} {{$client->user_last_name}}</td>
                                    <td>
                                        @if($client->file_path=="not available")
                                        <p>MP3 not available</p>
                                        @else
                                        <a target="blank" href="{{$client->file_path}}">View Conversation</a>
                                        @endif
                                    </td>
                                    <td>{{date("F j, Y",strtotime($client->date_transact))}}</td>
                                    <td>
                                        <select id="" onchange="location = this.value;" class="form-control" id="sel1" style="width:90px;">
                                            <option >Action</option>
                                            <option value="/general_admin/send_invoice/{{$client->business_id}}">Send Invoice</option>
                                            <option value="/general_admin/decline_user/{{$client->business_id}}">Decline</option>
                                        </select>
                                    </td>
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
                    <div class="col-md-12 col-sm-12">
                        <form class="form-inline" method="post" action="/general_admin/search_agent_added">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left padding-close">
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control " id="date_start1" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control " id="date_end1" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right padding-close">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_agent" id="search_agent" >
                                </div>
                                <button type="button" class="btn btn-success" name="search_agent_btn" id="search_agent_btn">Search</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive"  id="agentShow">
                        <table id="example" class="display table table-bordered table-design">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Membership</th>
                                    <th>Transaction</th>
                                    <th>Date Transact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($agentAdded as $agentAdd)
                                <tr>
                                    <td>{{$agentAdd->contact_first_name}}  {{$agentAdd->contact_last_name}}</td>
                                    <td>{{$agentAdd->business_name}}</td>
                                    <td>{{$agentAdd->membership_name}}</td>
                                    <td>{{$agentAdd->transaction_status}} by: {{$agentAdd->user_first_name.' '.$agentAdd->user_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($agentAdd->date_transact))}}</td>
                                    <td>
                                        <a target="_blank" href="/general_admin/send_invoice/{{$agentAdd->business_id}}">
                                            <button class="transaction btn btn-default ">
                                            <i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice
                                            </button>
                                        </a>
                                    </td>
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
                    <div class="col-md-12 col-sm-12" >
                        <form class="form-inline" method="post" action="/general_admin/search_pending">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left padding-close">
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control" id="date_start2" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control" id="date_end2" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right padding-close">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_pending" id="search_pending" >
                                </div>
                                <button type="button" class="btn btn-success" name="search_pending_btn" id="search_pending_btn">Search</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive"  id="pendingShow">
                        <div id="resendSuccess">
                        </div>
                        <table id="example" class="display table table-bordered table-design">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Membership</th>
                                    <th>Transaction</th>
                                    <th>Date Transact</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pending_clients as $pendingclient)
                                <tr>
                                    <td>{{$pendingclient->contact_first_name}}  {{$pendingclient->contact_last_name}}</td>
                                    <td>{{$pendingclient->business_name}}</td>
                                    <td>{{$pendingclient->membership_name}}</td>
                                    <td>{{$pendingclient->transaction_status}} by: {{$pendingclient->user_first_name.' '.$pendingclient->user_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($pendingclient->date_transact))}}</td>
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
        </div>
        <div id="registered" class="tab-pane fade">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12" >
                        <form class="form-inline" method="post" action="/general_admin/search_registered">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left padding-close">
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control " id="date_start3" placeholder="Date From" value="" >
                                </div>
                                <div class="col-md-6 padding-close">
                                    <input type="date" class="form-control " id="date_end3" placeholder="Date To" value="" >
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right padding-close" style="padding-left:68px;">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_registered" id="search_registered" >
                                </div>
                                <button type="button" class="btn btn-success" name="search_registered_btn" id="search_registered_btn">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row" id="registeredShow">
                <div class="panel-body">
                    <form class="form-inline" method="post" action="/general_admin/search_registered">
                        {{csrf_field()}}
                        <div class="col-md-3 col-sm-12 col-xs-12 pull-right padding-close">
                            <div class="form-group">
                                <select class="form-control" id="dueDate">
                                    <option value="">Filter Due Date</option>
                                    <option value="5">Due Before 5 days</option>
                                    <option value="4">Due Before 4 days</option>
                                    <option value="3">Due Before 3 days</option>
                                    <option value="2">Due Before 2 days</option>
                                    <option value="1">Due Before 1 day</option>
                                    <option value="0">Due this day</option>
                                </select>
                            </div>
                            <a href="/general_admin/export_report_excel/0/merchant"><button  id="exportExcel" type="button" class="btn btn-success" style="background-color:#7DC246;margin-left: 2px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button></a>
                        </div>
                    </form>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example" class="display table table-bordered table-design">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Business Name</th>
                                    <th>Membership</th>
                                    <th>Transaction</th>
                                    <th>Date Paid</th>
                                    <th>Due Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($registered_clients as $registeredclients)
                                <tr>
                                    <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                                    <td>{{$registeredclients->business_name}}</td>
                                    <td>{{$registeredclients->membership_name}}</td>
                                    <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->user_first_name}} {{$registeredclients->user_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                                    @if(date("F j, Y", strtotime("+5 days"))==$registeredclients->due_date)
                                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @elseif(date("F j, Y", strtotime("+4 days"))==$registeredclients->due_date)
                                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @elseif(date("F j, Y", strtotime("+3days"))==$registeredclients->due_date)
                                    <td style="color:#22baa0;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @elseif(date("F j, Y", strtotime("+2 days"))==$registeredclients->due_date)
                                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @elseif(date("F j, Y", strtotime("+1 days"))==$registeredclients->due_date)
                                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @elseif(date("F j, Y")==$registeredclients->due_date)
                                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                                    @else
                                    <td >{{$registeredclients->due_date}}</td>
                                    @endif
                                    <td>
                                        <select id="registerAction"  data-business_id="{{$registeredclients->business_id}}" class="form-control registerAction" style="width:90px;">
                                            <option >Action</option>
                                            <option value="newinvoice">New Invoice</option>
                                            <option value="deactivate">Deactivate</option>
                                        </select>
                                    </td>
                                </tr>
                                <div class="modal fade" id="confirmModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <div class="modal-content">
                                            <div class="modal-body row" id="show_user"  >
                                                <div class="col-sm-12">
                                                    <h4 class="modal-title">Are You sure You want to deactivate this merchant?</h4>
                                                </div>
                                                <div class="col-sm-12">
                                                    <center>
                                                    <input type="hidden" id="delete_team_id" value=""/>
                                                    <a href="/general_admin/deactivate_user/{{$registeredclients->business_id}}"><button type="button" class=" btn btn-danger">Yes</button></a>
                                                    <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                                                </div>
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
        {{-- modal --}}
        <div  class="modal fade" id="confirmModalInvoice" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body row" id="show_user"  >
                        <div class="col-sm-12">
                            <h4 class="modal-title">Are You sure?</h4>
                        </div>
                        <div class="col-sm-12">
                            <center>
                            <input type="hidden" id="business_id" value=""/>
                            <button type="button" class="newInvoiceSend btn btn-danger">Yes</button>
                            <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 150px;" class="modal fade" id="successModals" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body row" >
                        <div class="col-sm-12" id="success_alert">
                            <div id="ajax-loader" style="display: none; text-align: center;">
                                <img src="/assets/img/loading.gif"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/general_admin/general_admin_merchant.js"></script>
@endsection