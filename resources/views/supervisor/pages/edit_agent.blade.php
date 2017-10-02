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
    <div class="row">
        <div class="panel panel-primary">
            <div class="panel-body">
                <div role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills" role="tablist">
                        <li role="presentation" class="{{Session::has('warning_agent') || Session::has('error_agent')? '' : 'active'}}"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">Agent</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade {{Session::has('warning_agent') || Session::has('error_agent')? '' : 'active in'}} " id="tab9">
                            <form class="form-horizontal" method="post" action="/supervisor/update_agent?agent_id={{$_edit->agent_id}}">
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
                        <h4>Personal Information</h4>
                        <!-- <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Prefix</label>
                            <div class="col-sm-2">
                               <select class="form-control " name="prefix" id="prefix" style="width: 150px; border-radius: 20px;">
                               <option {{$_edit->prefix == 'Dr.' ? 'selected' : ''}}>Dr.</option>
                               <option {{$_edit->prefix == 'Ms.' ? 'selected' : ''}}>Ms</option>
                               <option {{$_edit->prefix == 'Mr.' ? 'selected' : ''}}>Mr.</option>
                               <option {{$_edit->prefix == 'Mrs.' ? 'selected' : ''}}>Mrs.</option>
                            </select>
                            </div>
                        </div> -->
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="first_name" value=" {{$_edit->first_name}} " id="input-rounded">
                            </div> 
                            <label for="input-Default" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="last_name" value=" {{$_edit->last_name}} " id="input-rounded">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="email" value=" {{$_edit->email}} "id="input-rounded">
                            </div>
                            <label for="input-Default" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="password" value="" id="input-rounded">
                            </div>
                        </div>
                        <hr>
                        <h4>Agent Basic Information</h4>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Team</label>
                            <div class="col-sm-2">
                               <select class="form-control " name="team_id" id="prefix" style="width: 150px; border-radius: 20px;">
                               @foreach($agent_list as $agent)
                               <option value="{{$agent->team_id}}">{{$agent->team_name}}</option>
                               @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Agent Primary Phone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="primary_phone" value=" {{$_edit->primary_phone}} " id="input-rounded">
                            </div>
                             <label for="input-Default" class="col-sm-2 control-label">Agent Alternate Phone</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control input-rounded" name="secondary_phone" value=" {{$_edit->secondary_phone}} " id="input-rounded">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="input-Default" class="col-sm-2 control-label">Agent Other Information</label>
                            <div class="col-sm-10">
                                <textarea class="form-control input-rounded" name="other_info" placeholder="Agent other information" rows="4" style="border-radius: 20px; resize: none;">{{$_edit->other_info}}</textarea>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-9">
                            </div>
                            <div class="col-sm-3">
<!--                                 <a href='view/user'><button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Cancel</button></a> -->
                                <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Update Agent</button>
                            </div>
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