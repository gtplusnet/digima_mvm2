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
		   <li class="active li_me"><a data-toggle="pill" href="#home">Invoice Approval</a></li>
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
                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></td>
                                </tr>
                                  <div class="modal fade" id="myModal{{$client->business_id}}" role="dialog" >
                                    <div class="modal-md modal-dialog">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <button type="button" class="close closed" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Send Invoice</h4>
                                            </div>
                                            <div class="modal-body">
                                              <div class="panel panel-white">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <h1 class="m-b-md"><b>CROATIA Directory</b></h1>
                                                                <address>
                                                                    Zagreb, Croatia<br>
                                                                    P: (123) 456-7890
                                                                </address>
                                                            </div>
                                                            <div class="col-md-8 text-right pull-right" >
                                                                <h3>INVOICE NUMBER:</h3>
                                                                <div class="col-md-10" style="margin-left:100px;">
                                                                <input type="text" class="form-control"  />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <hr>
                                                                <p>
                                                                    <strong>Invoice to</strong><br>
                                                                    John Doe<br>
                                                                    795 Folsom Ave, Suite 600<br>
                                                                    San Francisco, CA 94107
                                                                </p>
                                                            </div>
                                                            <div class="col-md-12">
                                                                
                                                            </div>
                                                            <div class="col-md-8">
                                                                <h3>Thank you !</h3>
                                                                <p>Nullam quis risus eget urna mollis ornare vel eu leo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam id dolor id nibh ultricies vehicula. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec ullamcorper nulla non metus auctor fringilla.</p>
                                                                <img src="/assets/admin/merchant/assets/images/signature.png" height="150" class="m-t-lg" alt="">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="text-right">
                                                                    <h4 class="no-m m-t-sm">Subtotal</h4>
                                                                    <h2 class="no-m">$7282</h2>
                                                                    <hr>
                                                                    <h4 class="no-m m-t-sm">Shipping</h4>
                                                                    <h2 class="no-m">$240</h2>
                                                                    <hr>
                                                                    <h4 class="no-m m-t-md text-success">Total</h4>
                                                                    <h1 class="no-m text-success">$7522</h1>
                                                                    <hr>
                                                                    <button class="btn btn-primary">Send Invoice</button>
                                                                </div>
                                                            </div>
                                                        </div><!--row-->
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