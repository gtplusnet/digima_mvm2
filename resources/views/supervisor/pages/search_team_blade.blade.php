                    <div class="table-responsive" id="showHere_team">
                    <div class="col-md-12">
                        <div class="pull-left" style="margin:20px 0px 20px 20px">
                            <button type="button"  data-toggle="modal" data-target="#myModal"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Team</button>
                        </div>

                        <div class="pull-right" style="margin:20px 20px 20px 0px">
                            <form class="form-inline" method="post"  action="/supervisor/supervisor_search_team" method="post">
                            {{csrf_field()}}
                            <div class="form-inline">
                                <input type="text" class="form-control" name="search_key1" id="search_key1">
                                 <button type="button" class="btn btn-success" name="search_button_team" id="search_button_team">Search</button>
                            </div>
                            
                            </form>
                        </div>

                    </div>
                    <div id="team_delete_success">
                    </div>

                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th></th>
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
                                <td></td>
                                <td>{{ $newteam->team_name}}</td>
                                <td>{{ $newteam->team_information}}</td>
                                <td>View All Members</td>
                                <td>{{ $newteam->sum}}</td>
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