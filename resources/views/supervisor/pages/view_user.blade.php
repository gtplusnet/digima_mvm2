@extends('supervisor.layout.layout')
@section('content')
<div class="page-title clearfix">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <div class="row">
        <div class="panel panel-primary">
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
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="{{Session::has('warning_agent') || Session::has('error_agent') ? '' : 'active'}}"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">Team</a></li>
                         <li role="presentation" class="{{Session::has('warning_agent') || Session::has('error_agent') ? 'active' : ''}}"><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Agent</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade {{Session::has('warning_agent') || Session::has('error_agent') ? '' : 'active in'}} " id="tab9">
                            <form class="form-horizontal" method="POST" action="/supervisor/edit_team"> 
                                {{csrf_field()}}
                                @if(session()->has('warning_team'))
                                <div class="alert alert-success">
                                  <strong>Success!</strong> Team Added Successfully!.
                                </div>
                                @endif
                                @if(session()->has('error_team'))
                                <div class="alert alert-danger">
                                  <strong>Warning!</strong> {!! session('error_team') !!}
                                </div>
                            @endif
                                <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Information</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>                       
                                    <tbody> 
                                        @foreach ($viewteam as $newteam) 
                                            <tr>
                                                <td></td>
                                                <td>{{ $newteam-> team_name}}</td>
                                                <td>{{ $newteam-> team_information}}</td>
                                                <td><select name="forma" class='form-control' onchange="location = this.value;">
                                                        <option></option>
                                                        <option value = '/supervisor/edit_team?team_id={{$newteam->team_id}}'>Edit</option>
                                                        <option  value = '/supervisor/delete_team?team_id={{$newteam->team_id}}'>Delete</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                                </div>
                            </form>
                        </div>
                    <div role="tabpanel" class="tab-pane fade {{Session::has('warning_agent') || Session::has('error_agent')  ? 'active in' : ''}}" id="tab10">
                        <form class="form-horizontal" method="POST" action="/supervisor/edit_agent"> 
                            {{csrf_field()}}
                            @if(session()->has('warning_agent'))
                                <div class="alert alert-success">
                                  <strong>Success!</strong> Agent Updated Successfully!.
                                </div>
                            @endif
                            @if(session()->has('error_agent'))
                                <div class="alert alert-danger">
                                  <strong>Warning!</strong> {!! session('error_agent') !!}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                    <thead> 
                                        <tr>
                                            <th>Team</th>
                                            <th></th>
                                            <th>Full Name</th>
                                            <th></th>
                                            <th>Email</th>
                                            <th>Contact No</th>
                                            <th>Alternative No</th>
                                            <th>Other Information</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($viewagent as $newagent) 
                                        <tr>
                                            <td>{{ $newagent-> team_name}}</td>
                                            <td>{{ $newagent-> prefix}}</td>
                                            <td>{{ $newagent-> first_name}}</td>
                                            <td>{{ $newagent-> last_name}}</td>
                                            <td>{{ $newagent-> email}}</td>
                                            <td>{{ $newagent-> primary_phone}}</td>
                                            <td>{{ $newagent-> secondary_phone}}</td>
                                            <td>{{ $newagent-> other_info}}</td>
                                            <td><select name="forma" class='form-control' onchange="location = this.value;">
                                                <option></option>
                                                <option value = '/supervisor/edit_agent/{{$newagent->agent_id}}'>Edit</option>
                                                <option  value = '/supervisor/delete_agent?agent_id={{$newagent->agent_id}}'>Delete</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach    
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>   
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection