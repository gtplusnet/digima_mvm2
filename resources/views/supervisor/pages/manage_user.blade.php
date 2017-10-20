@extends('supervisor.layout.layout')
@section('content')
<link href="/assets/admin/merchant/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
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
    <!---james modal-->
    <div style="margin-top: 150px;" class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Team</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 150px;" >
                    <div id="team_success">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="team_name" id="team_name"  style="width:100%;margin-bottom: 20px;"/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team Description</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="team_des" id="team_des" style="width:100%"/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <center>
                        <button type="submit" class="save_category btn btn-primary" name="save_team" id="save_team">Save Team</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </center>
                    </div>
                    
                    
                </div>
                <div class="modal-footer" style="border:0px;">
                    
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 40px;" class="modal fade" id="myModalAgent" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Agent</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 600px;" >
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team</label>
                        </div>
                        <div class="form-group col-md-9">
                            <select name="team_id" class='form-control' id="team_id">
                                @foreach ($viewteam as $select_team)
                                <option value = '{{$select_team->team_id}}'>{{$select_team->team_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Prefix</label>
                        </div>
                        <div class="form-group col-md-9">
                            <select name="prefix" class='form-control' id="prefix">
                                <option value = 'Mr'>Mr</option>
                                <option  value = 'Ms'>Ms</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >First Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="first_name" id="first_name"  style="width:100%;margin-bottom: 20px;" required/>
                        </div>
                    </div>
                    <div class="col-sm-12" id="agent_success">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Last Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="last_name" id="last_name"  style="width:100%;margin-bottom: 20px;" required/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Email</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="email" id="email"  style="width:100%;margin-bottom: 20px;" required/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Password</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="password" id="password"  style="width:100%;margin-bottom: 20px;" required/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Primary Phone</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="primary" id="primary"  style="width:100%;margin-bottom: 20px;" required/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Secondary Phone</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="secondary" id="secondary"  style="width:100%;margin-bottom: 20px;"/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Other Information</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="other_info" id="other_info"  style="width:100%;margin-bottom: 20px;"/>
                        </div>
                    </div>
                    
                    <div class="col-sm-12">
                        <center>
                        <button type="submit" class="save_category btn btn-primary" name="save_agent" id="save_agent">Save Agent</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </center>
                    </div>
                </div>
                <div class="modal-footer" style="border:0px;">
                    
                </div>
            </div>
        </div>
    </div>
    <!---end james modal-->
    <div class="tab-content">
        <div class=" panel-primary">
            <div class="panel-heading row clearfix">
                <div class="col-md-8">
                    <div class="col-md-12">
                        <ul class="nav nav-tabs">
                            <li class="active li_style"><a data-toggle="tab" href="#team">Manage Team</a></li>
                            <li class="li_style"><a data-toggle="tab" href="#agent">Manage Agent</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
        <div  class="tab-pane fade in active " id="team">
            <form class="form-horizontal">
                {{csrf_field()}}
                
                <div class="table-responsive">
                    <div class="col-md-12">
                        <div class="pull-left" style="margin:20px 0px 20px 20px">
                            <button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Team</button>
                        </div>
                        <div class="pull-right" style="margin:20px 20px 20px 0px">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_key" id="search_key">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Team Members</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewteam as $newteam)
                            <tr>
                                <td></td>
                                <td>{{ $newteam->team_name}}</td>
                                <td>{{ $newteam->team_information}}</td>
                                <td>View All Members</td>
                                <td><a href="#"><button type="button" class="btn btn-warning" data-toggle="modal"  id="view_btn" data-target="#myModalEdit{{$newteam->team_id}}"><i class="fa fa-pencil" aria-hidden="true"></i>Edit</button>
                                <button type="button" class="btn btn-danger"  data-toggle="modal"  id="deleteModal" data-target="#deleteModal{{$newteam->team_id}}"><i class="fa fa-trash" aria-hidden="true"></i>Delete</button></td>
                            </tr>
                            <div style="margin-top: 150px;" class="modal fade" id="deleteModal{{$newteam->team_id}}" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body" style="margin-bottom: 80px;" >
                                            <div class="col-sm-12">
                                                <h4 class="modal-title">Are You sure You want to delete this item?</h4>
                                            </div>
                                            <div class="col-sm-12">
                                                <center>
                                                <a href="/supervisor/delete_team/{{$newteam->team_id}}">
                                                    <button type="button" class="save_category btn btn-danger">Delete</button>
                                                </a>
                                                <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="margin-top: 150px;" class="modal fade" id="myModalEdit{{$newteam->team_id}}" role="dialog">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Edit Team</h4>
                                        </div>
                                        <div class="modal-body" style="margin-bottom: 150px;" >
                                            <div id="team_success">
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-md-3">
                                                    <label for="business_name" >Team Name</label>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <input type="text" class="form-control" value="{{$newteam->team_name}}" name="team_name_update" id="team_name_update"  style="width:100%;margin-bottom: 20px;"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group col-md-3">
                                                    <label for="business_name" >Team Description</label>
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <input type="text" class="form-control" value="{{$newteam->team_information}}" name="team_des_update" id="team_des_update" style="width:100%"/>
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <center>
                                                <button type="submit" class="btn btn-primary" name="edit_team" id="edit_team">Update Team</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </center>
                                            </div>
                                            
                                            
                                        </div>
                                        <div class="modal-footer" style="border:0px;">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
        <div  class="tab-pane fade" id="agent">
            <form class="form-horizontal">
                {{csrf_field()}}
                
                <div class="table-responsive" id="agent_delete_success">
                    <div class="col-md-12">
                        <div class="pull-left" style="margin:20px 0px 20px 20px">
                            <button type="button"  data-toggle="modal" data-target="#myModalAgent"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Agent</button>
                        </div>
                        <div class="pull-right" style="margin:20px 20px 20px 0px">
                            <form class="form-inline">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search_key" id="search_key">
                                    
                                </div>
                            </form>
                        </div>
                    </div>
                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th>Agent ID</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Team </th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewagent as $newagent)
                            <tr>
                                <td>{{ $newagent->agent_id}}</td>
                                <td>{{ $newagent->prefix}} {{ $newagent->first_name}} {{ $newagent->last_name}}</td>
                                <td>{{ $newagent->email}}</td>
                                <td>{{ $newagent->primary_phone}}</td>
                                <td>{{ $newagent->secondary_phone}}</td>
                                <td>{{ $newagent->team_name}}</td>
                                <td><select class="actionbox" id="actionbox" data-name="{{ $newagent->prefix}} {{ $newagent->first_name}} {{ $newagent->last_name}}" data-id="{{ $newagent->agent_id}}">
                                    <option value="">Action</option>
                                    <option value="assign">Assign</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </form>
    </div>
    {{--  modal --}}
    <div style="margin-top: 150px;" class="modal fade" id="assignAgent" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Assign Agent</h4>
                </div>
                <div class="modal-body" style="margin-bottom: 150px;" >
                    <div id="assign_success">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Agent Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" name="agent_name" id="agent_name_assign"  style="width:100%;margin-bottom: 20px;" readonly/>
                            <input type="hidden" class="form-control" name="agent_id" id="agent_id_assign"  />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team Description</label>
                        </div>
                        <div class="form-group col-md-9">
                            <select id="teamAssigned" class="form-control" >
                                @foreach($viewteam as $assign_team)
                                <option value="{{$assign_team->team_id}}">{{$assign_team->team_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <center>
                        <button type="submit" class="save_category btn btn-primary" name="agentAssigned" id="agentAssigned">Assign Agent</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </center>
                    </div>
                    
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-top: 150px;" class="modal fade" id="deleteAgent" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body" style="margin-bottom: 80px;" >
                    <div class="col-sm-12">
                        <h4 class="modal-title">Are You sure You want to delete this item?</h4>
                    </div>
                    <div class="col-sm-12">
                        <center>
                        <input type="hidden" id="delete_agent_id" value=""/>
                        <button type="button" class=" btn btn-danger" id="agentDeleted">Delete</button>
                        
                        <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--  end modal --}}
    
</div>
</div>
</div>
<style>
.li_style
{
width:50%;
}
</style>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
<script src="/assets/js/global.ajax.js"></script>
<script src="/assets/supervisor/supervisor_user.js"></script>
@endsection