@extends('admin.layout.layout')
@section('content')
<div class="page-title">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/merchant">Home</a></li>
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
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade active in" id="tab9">
                                <form class="form-horizontal" method="POST" action="/admin/update_team/{{$_edit->team_id}}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">    
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Team Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" name="team_name" value=" {{$_edit->team_name}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="business_name" class="col-sm-2 control-label">Team Information</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="business_name" name="team_information" value=" {{$_edit->team_information}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="text-right">
                                            <a href="/admin/update_team/{{$_edit->team_id}}"><button class="btn btn-primary">Save</button></a>
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

