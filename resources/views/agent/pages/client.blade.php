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
                                        <td>{{$client->contact_first_name}}{{$client->contact_last_name}}</td>
                                        <td>{{date("F j, Y, g:i a",strtotime($client->date_created))}}</td>
                                        <td>{{$client->business_name}}</td>
                                        <td>{{$client->business_complete_address}}</td>
                                        <td>{{$client->membership}}</td>
                                        <td><button >call</button></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection