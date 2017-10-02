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
                        <li role="presentation" class="{{Session::has('warning_agent') ? '' : 'active'}}"><a href="#tab9" role="tab" data-toggle="tab" aria-expanded="true">Team</a></li>
<!--                          <li role="presentation" class="{{Session::has('warning_agent') ? 'active' : ''}}"><a href="#tab10" role="tab" data-toggle="tab" aria-expanded="false">Agent</a></li> -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade {{Session::has('warning_agent') ? '' : 'active in'}} " id="tab9">
                            <form class="form-horizontal" method="post" action="/supervisor/update_team?team_id={{$_edit->team_id}}">
                                {{csrf_field()}}
                                @if(session()->has('warning_team'))
                                <div class="alert alert-success">
                                  <strong>Success!</strong> Team Updated Successfully!.
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
                                        <input type="text" class="form-control input-rounded" name="team_name"  id="team_name" value=" {{$_edit->team_name}} " required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input-Default" class="col-sm-2 control-label">Team Information</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control input-rounded" name="team_information" id="team_information" placeholder="Description" rows="4" style="border-radius: 20px; resize: none;" required>{{$_edit->team_information}}</textarea>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-9">
                                    </div>
                                    <div class="col-sm-3">
                                        <button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Update Team</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/front/registration.js"></script>
@endsection