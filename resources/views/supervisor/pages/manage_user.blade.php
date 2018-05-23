@extends('layout.general_layout')
@section('content')
<style>
th
{
text-align: center;
}
td
{
text-align: center;
}
.li_style
{
width:50%;
}
</style>

<div class="page-title clearfix">
    <h3>{{ $page }}</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/supervisor/dashboard">Home</a></li>
            <li class="active">{{ $page }}</li>
        </ol>
    </div>
</div>
<div id="main-wrapper">
    <!---james modal-->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Team</h4>
                </div>
                <div class="modal-body row" >
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
    
    <div class="modal fade" id="teamEditModal" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" onClick="window.location.reload();" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Team</h4>
                </div>
                
                <div class="modal-body row"  >
                    <div id="team_update_success">
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team Name</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="teamNameEdit" name="teamNameEdit"  style="width:100%;margin-bottom: 20px;"/>
                            <input type="hidden"  id="teamIdEdit" name="teamIdEdit" />
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group col-md-3">
                            <label for="business_name" >Team Description</label>
                        </div>
                        <div class="form-group col-md-9">
                            <input type="text" class="form-control" id="teamInfoEdit" name="teamInfoEdit" id="team_des_update" style="width:100%"/>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <center>
                        <button type="submit" class="btn btn-primary" name="updateTeamBtn" id="updateTeamBtn">Update Team</button>
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
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-12 col-xs-12 pull-left" style="padding:0px;">
                        <form class="form-inline">
                            <input type="hidden" name="_token" value="j7ijkE1m3DC8pBCW3m9SQE3DiJeXXw8q07uxyUev">
                            <div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
                                <input type="text" class="form-control" name="search_key1" id="search_key1">
                            </div>
                            <div class=" col-md-4 col-xs-4" style="padding:0px;">
                                <button type="button" class="btn btn-success" name="search_button_team" id="search_button_team">Search</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2 col-sm-12 col-xs-12 pull-right ">
                        <button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Team</button>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive" id="showHere_team">
                        <div id="team_delete_success">
                        </div>
                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>Team ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Team Members</th>
                                    <th>Team Calls</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($viewteam as $newteam)
                                <tr>
                                    <td>{{ $newteam->team_id}}</td>
                                    <td>{{ $newteam->team_name}}</td>
                                    <td>{{ $newteam->team_information}}</td>
                                    <td><i data-id="{{ $newteam->team_id}}" class="viewMem" style="cursor: pointer;color:blue;">View All Members</i></td>
                                    <td>{{ $newteam->sum_of_calls}}</td>
                                    <td>
                                        <select class="teamAction" id="actionbox" data-info="{{ $newteam->team_information}}" data-name="{{ $newteam->team_name}}" data-id="{{ $newteam->team_id}}">
                                            <option value="">Action</option>
                                            <option value="edit">Edit</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div  class="tab-pane fade" id="agent">
            <div class="row">
                <div class="panel-body">
                    <div class="col-md-4 col-sm-12 col-xs-12 pull-right" style="padding:0px;">
                        <form class="form-inline">
                            <input type="hidden" name="_token" value="j7ijkE1m3DC8pBCW3m9SQE3DiJeXXw8q07uxyUev">
                            <div class="form-group col-md-7 col-xs-8 " style="padding:0px;padding-right:3px;">
                                <input type="text" class="form-control" name="search_key2" id="search_key2">
                            </div>
                            <div class=" col-md-4 col-xs-4" style="padding:0px;">
                                <button type="button" class="btn btn-success" name="search_button_agent" id="search_button_agent">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="panel-body">
                    <div class="table-responsive" id="agent_delete_success">
                        <table id="example" class="display table" style="text-align:center;width: 100%; cellspacing: 0;">
                            <thead >
                                <tr >
                                    <th>Agent ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Agent Calls</th>
                                    <th>Team </th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($viewteam as $viewteam)
                                @foreach ($viewteam->viewagent as $newagent)
                                <tr>
                                    <td>{{ $newagent->user_id}}</td>
                                    <td>{{ $newagent->user_first_name.' '.$newagent->user_last_name}}</td>
                                    <td>{{ $newagent->user_email}}</td>
                                    <td>{{ $newagent->user_phone_number}}</td>
                                    <td>{{ $newagent->user_calls}}</td>
                                    <td>{{ $newagent->team_name}}</td>
                                    <td>
                                        <select class="actionbox" id="actionbox" data-name="{{ $newagent->user_first_name}} {{ $newagent->user_last_name}}" data-id="{{ $newagent->user_id}}">
                                            <option value="">Action</option>
                                            <option value="assign">Assign</option>
                                            <option value="delete">Delete</option>
                                        </select>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        {{--  modal --}}
        <div class="modal fade" id="myModalViewMem" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close"  data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Team Members</h4>
                    </div>
                    <div class="modal-body" id="viewMemHere">
                        
                        
                    </div>
                    <div class="modal-footer" style="border:0px;">
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="assignAgent" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Assign Agent</h4>
                    </div>
                    <div class="modal-body row">
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
                                    @foreach($_agent_team as $agent_team)
                                    <option value="{{$agent_team->team_id}}">{{$agent_team->team_name}}</option>
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
                    <div class="modal-footer " style="border:none;">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteTeam" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body row" >
                        <div class="col-sm-12">
                            <h4 class="modal-title">Are You sure You want to delete this Team?</h4>
                        </div>
                        <div class="col-sm-12">
                            <center>
                            <input type="hidden" id="delete_team_id" value=""/>
                            <button type="button" class=" btn btn-danger" id="teamDeleted">Delete</button>
                            
                            <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteAgent" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body row">
                        <div class="col-sm-12">
                            <h4 class="modal-title">Are You sure You want to delete this Agent?</h4>
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

<script src="/assets/supervisor/supervisor_user.js"></script>
@endsection