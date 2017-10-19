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
<div class="container">

   
	<div class="col-md-12">

		<ul class="nav nav-tabs">
		   <li class="active li_me"><a data-toggle="pill" href="#customer">Send Invoice</a></li>
	       <li class="li_me"><a data-toggle="pill" href="#pending">Pending</a></li>
	       <li class="li_me"><a data-toggle="pill" href="#activated">Activated</a></li>
		</ul>
	

	<div class="tab-content" style="">
	      <div id="customer" class="tab-pane fade in active">
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

                       <div class="col-md-6" style="padding:1px;">
                            <select class="form-control" name="date_start" id="date_start">
                                @foreach($clients as $client_list)
                                <option value="{{$client_list->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                       </div>
                       <div class="col-md-6" style="padding:0px">
                            <select class="form-control" name="date_end" id="date_end">
                                @foreach($clients as $client_list)
                                <option value="{{$client_list->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
               		<div class="table-responsive col-md-12"  id="showHere">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
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
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->membership_name}}</td>
                                    <td>{{$client->transaction_status}} by: {{$client->first_name}} {{$client->last_name}}</td>
                                    <td><a target="blank" href="{{$client->file_path}}">{{$client->file_name}}</a></td>
                                    <td><a target="_blank" href="/general_admin/send_invoice/{{$client->business_id}}"><button class="transaction btn btn-default "><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></a></td>
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

                       <div class="col-md-6" style="padding:1px;">
                            <select class="form-control" name="date_start" id="date_start">
                                @foreach($pending_clients as $pending_client)
                                <option value="{{$pending_client->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                       </div>
                       <div class="col-md-6" style="padding:0px">
                            <select class="form-control" name="date_end" id="date_end">
                                @foreach($clients as $client_list)
                                <option value="{{$client_list->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12"  id="showHere">
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
                                @foreach($pending_clients as $pendingclient)
                                <tr>
                                    <td>{{$pendingclient->contact_first_name}}  {{$pendingclient->contact_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($pendingclient->date_created))}}</td>
                                    <td>{{$pendingclient->business_name}}</td>
                                    <td>{{$pendingclient->membership_name}}</td>
                                    <td>{{$pendingclient->transaction_status}} by: {{$pendingclient->first_name}} {{$client->last_name}}</td>
                                    <td><a target="_blank" href="/general_admin/send_invoice/{{$pendingclient->business_id}}"><button class="transaction btn btn-default ">Resend Invoice</button></a></td>
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

</style>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
{{-- <script src="/assets/js/agent/agent_client.js"></script> --}}
@endsection