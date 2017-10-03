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
            <div class="pane panel-primary">
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
                        <div class="table-responsive">
                            <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>Description</th>
                                        <th>Reference</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>                       
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><button  class="btn btn-primary btn-lg" style="border-radius: 20px; float: right;">Upload Mp3</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
            </div>
    </div><!-- Row -->
    <!-- Row -->                    
</div>
@endsection