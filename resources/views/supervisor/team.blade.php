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
    <div class="row">
        <div class="col-md-12">        
            <div class="panel">
                <div class="panel-body">
                    <div role="tabpanel">
                                   
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills" role="tablist">
                            <li role="presentation" class="{{Session::has('agent') ? '' : 'active'}}"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">Team</a></li>
                            <li role="presentation" class="{{Session::has('agent') ? 'active' : ''}}"><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Agent</a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade {{Session::has('agent') ? '' : 'active in'}} " id="tab9">

                                <form class="form-horizontal" method="POST" action="/admin/add_team">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Team Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" name="team_name" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Team Information</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" name="team_information" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-right">
                                            <button class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                            <div role="tabpanel" class="tab-pane fade {{Session::has('agent') ? 'active in' : ''}}" id="tab10">
                                
                                <form class="form-horizontal" method="POST" action="/supervisor/add_agent">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <div class="form-group">
                                            @if(Session::has('error'))
                                            <div class="alert alert-danger">{{Session::get('error')}}</div>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Choose Team</label>
                                                <div class="col-sm-2">
                                                    <select class="form-control " name="team_id" id="prefix">
                                                        @foreach ($_team as $team)
                                                        <option value='{{$team->team_id}}'>{{$team->team_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="form-group">
                                            <label for="business_name" class="col-sm-2 control-label">First Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-default" name="agent_fname" value="{{ old('agent_fname') }}"> 
                                                </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-default" name="agent_lname" value="">
                                            </div>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">User Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="input-default" name="agent_username" value="">
                                            </div>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                                <input type="Password" class="form-control" id="input-default" name="agent_password" value="">
                                            </div>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="input-Default" class="col-sm-2 control-label">Confirm Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="input-default" name="agent_confirm_password" value="">
                                            </div>                                        
                                        </div>                                                                        
                                        <div class="col-md-4">
                                            <div class="text-right">
                                                <button class="btn btn-primary" type="submit">Add</button>
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

