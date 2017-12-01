@extends('supervisor.layout.layout') 
@section('content')
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/supervisor/supervisor_client.js"></script>
<script src="/assets/js/supervisor/upload-conversation.js"></script>
<script src="/assets/js/supervisor/get-client-info.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<style>
.li_style
{
width:50%;
}
</style>
<script language="javascript">
document.getElementById("uploadBtn").onchange = function () {
document.getElementById("uploadFile").value = this.value;
};

</script>
<script>
    $(document).ready(function() {
$( ".datepicker" ).datepicker();
$( ".datepicker1" ).datepicker();

});
</script>

<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li>
                <a href="/supervisor/dashboard">Home</a>
            </li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="tab-content">
        <div class=" panel-primary">
            <div class="panel-heading row clearfix">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="li_style active"><a data-toggle="tab" href="#pendingCustomer">Pending Upload</a></li>
                            <li class="li_style marg"><a data-toggle="tab" href="#activatedCustomer">Upload Completed</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="pendingCustomer" class="tab-pane fade in active">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12" >
                        <form class="form-inline" method="post" action="/supervisor/supervisor_search_client">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left">
                                <div class="col-md-6" style="padding:0px;">
                                    <input type="text" class="form-control datepicker" id="date_start" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <input type="text" class="form-control datepicker1" id="date_end" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_key1" id="search_key1">
                                </div>
                                <button type="button" class="btn btn-success" name="search_button" id="search_button">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body" >
                    <div class="table-responsive col-md-12" id="showHere_pending" style="margin-top: 10px;">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Date Added</th>
                                    <th style="text-align: center;">Business Name</th>
                                    <th style="text-align: center;">Membership</th>
                                    <th style="text-align: center;">Upload Conversation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td style="text-align: center;">{{$client->contact_first_name}} {{$client->contact_last_name}}</td>
                                    <td style="text-align: center;">{{date("F j, Y",strtotime($client->date_transact))}}</td>
                                    <td style="text-align: center;">{{$client->business_name}}</td>
                                    <td style="text-align: center;">{{$client->membership_name}}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#uploadModal" data-bid="{{ $client->business_id }}" data-cid="{{ $client->business_contact_person_id }}" id="selAudioBtn">
                                        Select Audio File
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                        <div class="modal fade" id="uploadModal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #34425A;" >
                                        <button type="button" class="close closeBtn" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title" style="color: #FFFFFF;">
                                        <span class="glyphicon glyphicon-file"></span> Select Audio File
                                        </h3>
                                    </div>
                                    <div class="modal-body" style="padding-top: 30px; padding-bottom: 30px;" id="forceSuccess">
                                        <center><input type="file" name="convoFile" id="convoFile" style="font-size: 15px;"></center>
                                        <input type="hidden" name="businessId" id="businessId">
                                        <input type="hidden" name="contactId" id="contactId">
                                    </div>
                                    <div class="modal-footer" style="background-color: #34425A; padding-top: 20px;">
                                        <button type="button" class="btn btn-warning btn-rounded" name="forceBtn" id="forceBtn" data-dismiss="">Proceed without MP3</button>
                                        <button type="button" class="btn btn-info btn-rounded" name="uploadBtn" id="uploadBtn" data-dismiss="">Upload</button>
                                        <button type="button" class="btn btn-danger btn-rounded closeBtn" name="closeBtn" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="activatedCustomer" class="tab-pane fade">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-12 col-sm-12" >
                        <form class="form-inline" method="post" action="/supervisor/supervisor_search_client_activated">
                            {{csrf_field()}}
                            <div class="col-md-5 col-sm-12 col-xs-12 pull-left">
                                <div class="col-md-6" style="padding:0px;">
                                    <input type="text" class="form-control datepicker" id="date_start1" placeholder="Date From" value="">
                                </div>
                                <div class="col-md-6" style="padding:0px;">
                                    <input type="text" class="form-control datepicker1" id="date_end1" placeholder="Date To" value="">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 pull-right">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_key2" id="search_key2">
                                </div>
                                <button type="button" class="btn btn-success" name="search_button1" id="search_button1">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel-body" >
                    <div class="table-responsive col-md-12" id="showHere_activated" style="margin-top: 10px;">
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Date Added</th>
                                    <th style="text-align: center;">Business Name</th>
                                    <th style="text-align: center;">Membership</th>
                                    <th style="text-align: center;">Play Conversation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients_activated as $clients_activate)
                                <tr>
                                    <td style="text-align: center;">{{$clients_activate->contact_first_name}} {{$clients_activate->contact_last_name}}</td>
                                    <td style="text-align: center;">{{date("F j, Y",strtotime($clients_activate->date_transact))}}</td>
                                    <td style="text-align: center;">{{$clients_activate->business_name}}</td>
                                    <td style="text-align: center;">{{$clients_activate->membership_name}}</td>
                                    <td style="text-align: center;">
                                        @if($clients_activate->file_path == 'not available')
                                        <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#viewModal{{$clients_activate->business_id}}" data-bid="{{ $clients_activate->business_id }}" data-cid="{{ $clients_activate->business_contact_person_id }}" id="playAudioBtn" disabled>
                                        Not Available
                                        </button>
                                        @else
                                        <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#viewModal{{$clients_activate->business_id}}" data-path="{{$clients_activate->file_path}}" data-bid="{{ $clients_activate->business_id }}" data-cid="{{ $clients_activate->business_contact_person_id }}" id="playAudioBtn">
                                        Play Audio
                                        </button>
                                        @endif
                                    </td>
                                </tr>
                                <div style="margin-top:160px;" class="modal fade in" id="viewModal{{$clients_activate->business_id}}" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header" style="background-color: #34425A;">
                                                <button type="button" class="close closeBtn" data-dismiss="modal">&times;</button>
                                                <h3 class="modal-title" style="color: #FFFFFF;">
                                                <span class="glyphicon glyphicon-file"></span> Play Audio File
                                                </h3>
                                            </div>
                                            <div class="modal-body" style="padding-top: 30px; padding-bottom: 30px;">
                                                <div class="row col-md-12 ">
                                                    <audio controls style="width:500px">
                                                        <source src="{{$clients_activate->file_path}}" type="audio/mpeg" width="100%" />
                                                    </audio>
                                                </div>
                                            </div>
                                            <div class="modal-footer" style="background-color: #34425A; padding-top: 20px;">
                                                <button type="button" class="btn btn-danger btn-rounded closeBtn" name="closeBtn" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Modal -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection