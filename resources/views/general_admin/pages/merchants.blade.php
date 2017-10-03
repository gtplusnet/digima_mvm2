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
<div class="container">
	<div class="col-md-12">

		<ul class="nav nav-tabs">
		   <li class="active li_me"><a data-toggle="pill" href="#home">Merchants</a></li>
	       <li class="li_me"><a data-toggle="pill" href="#menu1">Invoice Approval</a></li>
	       <li class="li_me"><a data-toggle="pill" href="#menu1">Pending </a></li>
	       <li class="li_me"><a data-toggle="pill" href="#menu1">Activated</a></li>
		</ul>
	

	<div class="tab-content" style="">
	      <div id="customer" class="tab-pane fade in active">
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
                                                    <div >
                                                        <div>
                                                            <center><a href="http://www.animatedimages.org/cat-telephones-325.htm"><img src="http://www.animatedimages.org/data/media/325/animated-telephone-image-0151.gif" border="0" alt="animated-telephone-image-0151" width="100px" height="100px" /></a></center>
                                                        </div>
                                                    </div>
                                                    
                                                        <div>
                                                           <p ><center>1:23:08 Call Duration</center></p>
                                                           <center><button type="button" class="btn btn-default" data-dismiss="modal" ><i class="fa fa-play call" aria-hidden="true"></i>Play</button></center>
                                                        </div>
                                                    
                                                    <div style="margin-top:20px;">
                                                        <div>
                                                            <center><button type="button" class="btn btn-success closed" data-dismiss="modal" ><i class="fa fa-phone callme"aria-hidden="true"></i>APPROVED</button>
                                                            <button type="button" class="btn btn-danger closed" data-dismiss="modal" ><i class="fa fa-phone callme"aria-hidden="true"></i>DECLINED</button></center>
                                                        </div>
                                                    </div>
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
{{-- <script src="/assets/js/agent/agent_client.js"></script> --}}
@endsection