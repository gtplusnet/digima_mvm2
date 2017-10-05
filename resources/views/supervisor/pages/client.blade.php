@extends('supervisor.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor">Home</a></li>
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
                            <li class="li_style"><a data-toggle="tab" href="#pendingCustomer">Pending Upload</a></li>
                            <li class="li_style marg"><a data-toggle="tab" href="#activatedCustomer">upload Completed</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div id="customer" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 pull-right">
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
                    <div class="table-responsive col-md-12"  id="showHere">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date/Added</th>
                                    <th>Business Name</th>
                                    <th>membership</th>
                                    <th>Transaction</th>
                                    <th>Upload Conversation</th>
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
                                    <td><button  class="btn btn-primary btn-sm"  data-toggle="modal"  data-target="#myModal{{$client->business_id}}">Upload Mp3</button></td>
                                </tr>
                                <div class="modal fade" id="myModal{{$client->business_id}}" role="dialog" >
                                    <div class="modal-lg modal-dialog">
                                        <div class="modal-content">
                                            
                                            <div class="modal-header">
                                                <button type="button" class="close" data-id="{{$client->business_id}}" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title"><font size="5px"><i class="fa fa-file-audio-o" aria-hidden="true"></i></font> Upload MP3</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal" id="uploadForm" action="/agent/upload-convo" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                 <div class="container" >
                                                   <div class=" col-lg-8" style="margin: 10px 10px 10px 20px">
                                                            <h4> Select MP3 to Upload</h4>
                                                            <span class="help-block">
                                                               Only MP3 is Allowed
                                                            </span>
                                                            <div class="input-group">
                                                                <input type="file" name="convoFile" id="convoFile">
                                                            </div>

                                                    </div>
                                                </div>
                                                <div class="panel panel-primary col-md-12">
                                                    <div class="panel-body">
                                                        
                                                            <div class="col-md-12 distance">
                                                                
                                                            </div>
                                                            <div class="col-md-12 distance">
                                                                <div class="form-group">
                                                                    <label for="input-Default" class="col-sm-2 control-label">Contact Person Name</label>
                                                                    <div class="col-sm-4">
                                                                        <input type="text" class="form-control input-rounded" id="input-rounded" value="{{$client->contact_first_name}}" readonly>
                                                                        <input type="hidden" class="form-control input-rounded" id="businessId" value="{{ $client->business_id }}" name="businessId">
                                                                        <input type="hidden" class="form-control input-rounded" id="contactId" value="{{ $client->business_contact_person_id }}" name="contactId">
                                                                    </div>
                                                                    <label for="input-Default" class="col-sm-2 control-label">Agent Name</label>
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
                                                                    <label for="input-Default" class="col-sm-2 control-label">Business Address</label>
                                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control input-rounded" placeholder="" rows="4=6" readonly>{{$client->business_complete_address}}</textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                      
                                                    </div>
                                                </div>
                                               
                                                {{-- <div class="form-control">
                                                                <button type="button" class="btn btn-success">Submit</button>
                                                </div> --}}
                                                
                                                </form>
                                            </div>
                                            
                                            <div class="modal-footer" style="border:none;">
                                                <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                                                <button type="submit" data-id="{{$client->business_id}}" class="closed btn btn-danger" data-dismiss="modal">Close</button>
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
<style>

.distance
{
margin:10px 0px 10px 0px;
}
.li_style{
padding:0px;
width:50%;
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
<script language="javascript">
  document.getElementById("uploadBtn").onchange = function () {
    document.getElementById("uploadFile").value = this.value;
};

</script>
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/agent/agent_client.js"></script>
<script src="/assets/js/agent/upload-conversation.js"></script>
@endsection