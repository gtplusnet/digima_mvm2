@extends('admin.layout.layout')
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
    <div class="row">
        <div class="col-md-12">        
            <div class="panel">
                <div class="panel-body">
                    <div role="tabpanel">
                                   
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="active"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">Team</a></li>
                            <li role="presentation" class=""><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Agent</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab9">
                                <form class="form-horizontal" method="POST" action="/supervisor/view/user"> 
                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <table class="table table-bordered">
                                            <thead> 
                                                <tr>
                                                    <th>Team Name</th>
                                                    <th>Team Information</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($viewteam as $newteam) 
                                                <tr>
                                                    <td>{{ $newteam-> team_name}}</td>
                                                    <td>{{ $newteam-> team_information}}</td>
                                                    <td><select name="forma" onchange="location = this.value;">
                                                        <option></option>
                                                        <option value = '/admin/edit_team/{{$newteam->team_id}}'>Edit</option>
                                                        <option  value = '/admin/delete_team/{{$newteam->team_id}}'>Delete</option>
                                                    </select></td>
                                                </tr>
                                            @endforeach    
                                            </tbody>
                                        </table>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab10">
                                <form class="form-horizontal" method="POST" action="/admin/edit_agent">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <table class="table table-bordered">
                                            <thead> 
                                                <tr>
                                                    <th>Team Name</th>
                                                    <th>First Name</th>
                                                    <th>Last Name</th>
                                                    <th>User Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($viewagent as $newagent) 
                                                <tr>
                                                    <td>{{ $newteam-> team_name}}</td>
                                                    <td>{{ $newagent-> agent_fname}}</td>
                                                    <td>{{ $newagent-> agent_lname}}</td>
                                                    <td>{{ $newagent-> agent_username}}</td>
                                                    <td><select name="forma" onchange="location = this.value;">
                                                        <option></option>
                                                        <option value = ''>Edit</option>
                                                        <option  value = /admin/delete_agent/{{$newagent->agent_id}}>Delete</option>
                                                    </select></td>
                                                </tr>
                                            @endforeach    
                                            </tbody>
                                        </table>
                                </form> 
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab11">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Monday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="08:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="05:00 PM" readonly>
                                        </div>                                 
                                    </div> 

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Tuesday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Wednesday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Thursday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Friday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Saturday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <label for="input-Default" class="col-sm-2 control-label">Sunday</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 AM" readonly>
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="input-default" value="00:00 PM" readonly>
                                        </div>                                 
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <button class="btn btn-primary">Edit</button>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <button class="btn btn-primary">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Row -->
    <!-- Row -->                        
</div>
@endsection

