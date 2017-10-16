@extends('supervisor.layout.layout')
@section('content')
<div class="page-title clearfix">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor">Home</a></li>
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
                            <li class="active li_style"><a data-toggle="tab" href="#team">Team</a></li>
                            <li class="li_style"><a data-toggle="tab" href="#agent">Agent</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div  class="tab-pane fade in active" id="team">
            <div class="row">
                <div class="panel-body">
                    
                    <form class="form-horizontal" method="post" action="/supervisor/add_team_submit">
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
                        <h4>Team Information</h4>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Team Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="team_name"  id="team_name" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Team Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control input-rounded" name="team_information" id="team_information" placeholder="Description" rows="4" style="border-radius: 20px; resize: none;" required></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9">
                            </div>
                            <div class="col-sm-3">
                                <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Add Team</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div  class="tab-pane fade" id="agent">
            <form class="form-horizontal" method="post" action="/supervisor/add_agent_submit">
                {{csrf_field()}}
               {{--  @if(session()->has('warning_agent'))
                <div class="alert alert-success">
                    <strong>Success!</strong> Agent Updated Successfully!.
                </div>
                @endif
                @if(session()->has('error_agent'))
                <div class="alert alert-danger">
                    <strong>Warning!</strong> {!! session('error_agent') !!}
                </div>
                @endif --}}
                <h4>Personal Information</h4>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
                    <div class="col-sm-2">
                        <select class="form-control " name="prefix" id="prefix" style="width: 150px; border-radius: 20px;">
                            <option></option>
                            <option>Dr.</option>
                            <option>Ms.</option>
                            <option>Mr.</option>
                            <option>Mrs.</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="first_name" id="input-rounded">
                    </div>
                    <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="last_name" id="input-rounded">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="email" id="input-rounded">
                    </div>
                    <label for="input-Default" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="password" id="input-rounded">
                    </div>
                </div>
                <hr>
                <h4>Agent Basic Information</h4>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Team</label>
                    <div class="col-sm-2">
                        <select class="form-control " name="team" id="team" style="width: 150px; border-radius: 20px;">
                            <option value=""></option>
                            @foreach($team_list as $teams)
                            <option value="{{$teams->team_id}}">{{$teams->team_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Agent Primary Phone</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="primary_phone" id="input-rounded">
                    </div>
                    <label for="input-Default" class="col-sm-2 control-label">Agent Alternate Phone</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control input-rounded" name="secondary_phone" id="input-rounded">
                    </div>
                </div>
                <div class="form-group">
                    <label for="input-Default" class="col-sm-2 control-label">Agent Other Information</label>
                    <div class="col-sm-10">
                        <textarea class="form-control input-rounded" name="other_info" placeholder="Agent other information" rows="4" style="border-radius: 20px; resize: none;"></textarea>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-sm-9">
                    </div>
                    <div class="col-sm-3">
                        <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Add Agent</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
</div>
<style>
.li_style{
padding-bottom: 0px;
width:50%;
margin-right:0px;
margin-left:-1px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection