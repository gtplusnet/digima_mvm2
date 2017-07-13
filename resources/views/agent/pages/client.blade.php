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
                    <div class="col-md-6">
                    <h4 class="panel-title" style="font-size: 25px;color: white;">List</h4>
                    </div>
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-3">
                    <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-filter"></i></span>
                            <input id="client_search" type="text" class="form-control" name="client_search" placeholder="...Enter Keyword">
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
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>                       
                                <tbody>
                                @if(count($_clients) != 0)
                                    @foreach($_clients as $key => $client)
                                    <tr>
                                        <td>{{$client->contact_prefix}} {{$client->contact_first_name}} {{$client->contact_last_name}} {{$client->last_name}} {{$client->suffix_name}}</td>
                                        <td>{{$client->date_created}}</td>
                                        <td>{{$client->business_name}}</td>
                                        <td>{{$client->status == 0 ? "Disabled" : $client->status == 1 ? "Active" : "Pending"}}</td>
                                         <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="border-radius: 20px;">View</button></td>
                                            <div class="modal fade" id="myModal" role="dialog" style="border-radius: 20px;">
                                            <div class="modal-dialog">

                                             <!-- Modal content-->
                                            <div class="modal-content">
                                            <div class="modal-header">
                                         <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">View</h4>
                                            </div>
                                            <div class="modal-body">
                                              <p>{{$client->contact_prefix}} {{$client->contact_first_name}} {{$client->contact_last_name}} {{$client->last_name}} {{$client->suffix_name}}</p>
                                            </div>
                                            <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                           </div>
                                         </div>
                                    
                                       </div>
                                      </div>                                       
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="40"><center>---No Record Found---</center></td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div><!-- Row -->
    <!-- Row -->    
</div>
@endsection
@section('modal')
    <!-- Modal -->
    
@endsection