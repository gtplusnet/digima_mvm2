                <div class="table-responsive" id="agent_delete_success">
                    <div class="col-md-12">

                        <div class="pull-left" style="margin:20px 0px 20px 20px">
                            <button type="button"  data-toggle="modal" data-target="#myModalAgent"  class="btn btn-success" ><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;Add New Agent</button>
                        </div>

                        <div class="pull-right" style="margin:20px 20px 20px 0px">
                            <form class="form-inline" method="post"  action="/supervisor/supervisor_search_agent" method="post">
                            {{csrf_field()}}
                            <div class="form-inline">
                                <input type="text" class="form-control" name="search_key2" id="search_key2">
                                <button type="button" class="btn btn-success" name="search_button_agent" id="search_button_agent">Search</button>
                            </div>
                             
                            </form>
                        </div>
                    </div>
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
                            @foreach ($viewagent as $newagent)
                            <tr>
                                <td>{{ $newagent->agent_id}}</td>
                                <td>{{ $newagent->prefix}} {{ $newagent->first_name}} {{ $newagent->last_name}}</td>
                                <td>{{ $newagent->email}}</td>
                                <td>{{ $newagent->primary_phone}}</td>
                                <td>{{ $newagent->agent_call}}</td>
                                <td>{{ $newagent->team_name}}</td>
                                <td>
                                    <select class="actionbox" id="actionbox" data-name="{{ $newagent->prefix}} {{ $newagent->first_name}} {{ $newagent->last_name}}" data-id="{{ $newagent->agent_id}}">
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