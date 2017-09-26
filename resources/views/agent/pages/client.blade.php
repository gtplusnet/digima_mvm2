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
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#customer">Customer</a></li>
    <li><a data-toggle="tab" href="#pendingCustomer">Pending Customer</a></li>
    <li><a data-toggle="tab" href="#activatedCustomer">Activated Customer</a></li>
  </ul>

  <div class="tab-content">
    <div id="customer" class="tab-pane fade in active">
        <div class="row">
            <div class="pane panel-primary">
                <div class="panel-heading clearfix">
                   
                        <div class="col-md-4 ">
                            <div class="col-md-6">
                            <select class="form-control " name="start_date" id="start_date" style="width: 150px; border-radius: 20px;">
                                   @foreach($clients as $client_date)
                                   <option value="{{$client_date->date_created}}">{{date("F j, Y",strtotime($client_date->date_created))}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                            <select class="form-control " name="end_date" id="end_date" style="width: 150px; border-radius: 20px;">
                                   @foreach($clients as $client_date)
                                   <option value="{{$client_date->date_created}}">{{date("F j, Y",strtotime($client_date->date_created))}}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                </div>
                    <div class="panel-body">
                        <div class="table-responsive show_here">
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
                                        <td><button class="btn btn-default"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
            </div>
    </div><!-- Row -->
    </div>
    <div id="pendingCustomer" class="tab-pane fade">
      <div class="row">
            <div class="pane panel-primary">
                <div class="panel-heading clearfix">
                    <div class="col-md-6" style=" padding-top: 10px; padding-bottom: 5px;">
                        <h4 class="panel-title" style="font-size: 1.15em; color: white;">List</h4>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-filter"></i></span>
                            <input id="" type="text" class="form-control" name="" placeholder="Enter Keyword Here">
                        </div>
                    </div>
                </div>
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
            </div>
    </div><!-- Row -->
    </div>
    <div id="activatedCustomer" class="tab-pane fade">
      <div class="row">
            <div class="pane panel-primary">
                <div class="panel-heading clearfix">
                    <div class="col-md-6" style=" padding-top: 10px; padding-bottom: 5px;">
                        <h4 class="panel-title" style="font-size: 1.15em; color: white;">List</h4>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-filter"></i></span>
                            <input id="" type="text" class="form-control" name="" placeholder="Enter Keyword Here">
                        </div>
                    </div>
                </div>
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
            </div>
    </div><!-- Row -->
    </div>
  </div>
</div>
</div>
<style>
.call
{
    color:green;
    margin-right: 5px;
    font-size:20px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/agent/agent_client.js"></script>
@endsection
