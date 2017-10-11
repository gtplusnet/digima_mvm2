@extends('supervisor.layout.layout') @section('content')
<style>
.li_style
{
    width:50%;
}
</style>
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li>
                <a href="/supervisor">Home</a>
            </li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
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
    <div class="tab-content ">
        
            
                <div id="pendingCustomer" class="tab-pane fade in active">
                <div class="panel-body" >
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
                    <div class="table-responsive col-md-12" id="showHere" style="margin-top: 10px;">
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
                                    <td style="text-align: center;">{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td style="text-align: center;">{{$client->business_name}}</td>
                                    <td style="text-align: center;">{{$client->payment_method_name}}</td>
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
                                    <div class="modal-header" style="background-color: #34425A;">
                                        <button type="button" class="close closeBtn" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title" style="color: #FFFFFF;">
                                            <span class="glyphicon glyphicon-file"></span> Select Audio File
                                        </h3>
                                    </div>
                                    <div class="modal-body" style="padding-top: 30px; padding-bottom: 30px;">
                                        <center><input type="file" name="convoFile" id="convoFile" style="font-size: 15px;"></center>
                                        <input type="hidden" name="businessId" id="businessId">
                                        <input type="hidden" name="contactId" id="contactId">
                                    </div>
                                    <div class="modal-footer" style="background-color: #34425A; padding-top: 20px;">
                                        <button type="button" class="btn btn-info btn-rounded" name="uploadBtn" id="uploadBtn" data-dismiss="">Upload</button>
                                        <button type="button" class="btn btn-danger btn-rounded closeBtn" name="closeBtn" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                </div>


                 <div id="activatedCustomer" class="tab-pane fade">
                   <div class="panel-body" >
                    <div class="col-md-4 pull-right">
                        <div class="col-md-6">
                            <select class="form-control " name="date_start" id="date_start1" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_activated as $clients_activates)
                                <option value="{{$clients_activates->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select class="form-control " name="date_end" id="date_end1" style="width: 150px; border-radius: 20px;">
                                @foreach($clients_activated as $clients_activates)
                                <option value="{{$clients_activates->date_created}}">{{date("F j, Y",strtotime($client_list->date_created))}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive col-md-12" id="showHere" style="margin-top: 10px;">
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
                                    <td style="text-align: center;">{{date("F j, Y",strtotime($clients_activate->date_created))}}</td>
                                    <td style="text-align: center;">{{$clients_activate->business_name}}</td>
                                    <td style="text-align: center;">{{$clients_activate->payment_method_name}}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#viewModal" data-bid="{{ $client->business_id }}" data-cid="{{ $client->business_contact_person_id }}" id="selAudioBtn">
                                            Play Audio
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div class="modal fade" id="viewModal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #34425A;">
                                        <button type="button" class="close closeBtn" data-dismiss="modal">&times;</button>
                                        <h3 class="modal-title" style="color: #FFFFFF;">
                                            <span class="glyphicon glyphicon-file"></span> Select Audio File
                                        </h3>
                                    </div>
                                    <div class="modal-body" style="padding-top: 30px; padding-bottom: 30px;">
                                        <center><input type="file" name="convoFile" id="convoFile" style="font-size: 15px;"></center>
                                        <input type="hidden" name="businessId" id="businessId">
                                        <input type="hidden" name="contactId" id="contactId">
                                    </div>
                                    <div class="modal-footer" style="background-color: #34425A; padding-top: 20px;">
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
</div>

<script language="javascript">
    document.getElementById("uploadBtn").onchange = function () {
        document.getElementById("uploadFile").value = this.value;
    };
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/supervisor/supervisor_client.js"></script>
<script src="/assets/js/supervisor/upload-conversation.js"></script>
<script src="/assets/js/supervisor/get-client-info.js"></script>

@endsection