
<div class="class panel-body">
    <form class="form-inline" method="post" action="/general_admin/search_registered">
        {{csrf_field()}}
        <div class="col-md-9 col-xs-12 pull-left padding-close">
            @if(Request::segment(2)!="filter_due_date")
            <div >
                <p style="color:20px;font-weight: bold;color:#34425A;">{{count($registered_clients)}} Result</p>
            </div>
            @else
            <div >
                <p style="color:20px;font-weight: bold;color:#34425A;">{{count($registered_clients->where('due_date',$dueDate))}} Result</p>
            </div>
            @endif
        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 pull-right padding-close">
            <div class="form-group">
                <select class="form-control" id="dueDate">
                    <option value="">Filter Due Date</option>
                    <option value="5">Due Before 5 days</option>
                    <option value="4">Due Before 4 days</option>
                    <option value="3">Due Before 3 days</option>
                    <option value="2">Due Before 2 days</option>
                    <option value="1">Due Before 1 day</option>
                    <option value="0">Due this day</option>
                </select>
            </div>
            @if(Request::segment(2)=="filter_due_date")
            <a href="/general_admin/export_report_excel/{{$first}}/due"><button  id="exportExcel" type="button" class="btn btn-success" style="background-color:#7DC246;margin-left: 2px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button></a>
            @elseif(Request::segment(2)=="merchants")
            <a href="/general_admin/export_report_excel/0/merchant"><button  id="exportExcel" type="button" class="btn btn-success" style="background-color:#7DC246;margin-left: 2px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button></a>
            @elseif(Request::segment(2)=="get_client3")
            <a href="/general_admin/export_report_excel/{{$first}}/{{$second}}"><button  id="exportExcel" type="button" class="btn btn-success" style="background-color:#7DC246;margin-left: 2px;"><i class="fa fa-file-excel-o" aria-hidden="true"></i> Export</button></a>
            @endif
        </div>
    </form>
</div>
<div class="panel-body">
    <div class="table-responsive">
        
        <table id="example" class="display table table-bordered table-design">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Business Name</th>
                    <th>Membership</th>
                    <th>Transaction</th>
                    <th>Date Paid</th>
                    <th>Due Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @if(Request::segment(2)!="filter_due_date")
            @foreach($registered_clients as $registeredclients)
                <tr>
                    <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                    <td>{{$registeredclients->business_name}}</td>
                    <td>{{$registeredclients->membership_name}}</td>
                    <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
                    <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                    @if(date("F j, Y", strtotime("+5 days"))==$registeredclients->due_date)
                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+4 days"))==$registeredclients->due_date)
                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+3days"))==$registeredclients->due_date)
                    <td style="color:#22baa0;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+2 days"))==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+1 days"))==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y")==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @else
                    <td >{{$registeredclients->due_date}}</td>
                    @endif
                    <td>
                        <select id="registerAction"  class="form-control registerAction" style="width:90px;">
                            <option >Action</option>
                            <option value="newinvoice">New Invoice</option>
                            <option value="deactivate">Deactivate</option>
                        </select>
                    </td>
                </tr>
                <div style="margin-top: 150px;" class="modal fade" id="confirmModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
                                <div class="col-sm-12">
                                    <h4 class="modal-title">Are You sure You want to deactivate this merchant?</h4>
                                </div>
                                <div class="col-sm-12">
                                    <center>
                                    <input type="hidden" id="delete_team_id" value=""/>
                                    <a href="/general_admin/deactivate_user/{{$registeredclients->business_id}}"><button type="button" class=" btn btn-danger">Yes</button></a>
                                    <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 150px;" class="modal fade" id="confirmModalInvoice" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
                                <div class="col-sm-12">
                                    <h4 class="modal-title">Are You sure?</h4>
                                </div>
                                <div class="col-sm-12">
                                    <center>
                                    <input type="hidden" id="delete_team_id" value=""/>
                                    <a href="/general_admin/send_new_invoice/{{$registeredclients->business_id}}/5"><button type="button" class=" btn btn-danger">Yes</button></a>
                                    <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            @foreach($registered_clients->where('due_date',$dueDate) as $key=> $registeredclients)
                <tr>
                    <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                    <td>{{$registeredclients->business_name}}</td>
                    <td>{{$registeredclients->membership_name}}</td>
                    <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
                    <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                    @if(date("F j, Y", strtotime("+5 days"))==$registeredclients->due_date)
                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+4 days"))==$registeredclients->due_date)
                    <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+3days"))==$registeredclients->due_date)
                    <td style="color:#22baa0;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+2 days"))==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y", strtotime("+1 days"))==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @elseif(date("F j, Y")==$registeredclients->due_date)
                    <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                    @else
                    <td >{{$registeredclients->due_date}}</td>
                    @endif
                    <td>
                        <select id="registerAction"  class="form-control registerAction" style="width:90px;">
                            <option >Action</option>
                            <option value="newinvoice">New Invoice</option>
                            <option value="deactivate">Deactivate</option>
                        </select>
                    </td>
                </tr>
                <div style="margin-top: 150px;" class="modal fade" id="confirmModal" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
                                <div class="col-sm-12">
                                    <h4 class="modal-title">Are You sure You want to deactivate this merchant?</h4>
                                </div>
                                <div class="col-sm-12">
                                    <center>
                                    <input type="hidden" id="delete_team_id" value=""/>
                                    <a href="/general_admin/deactivate_user/{{$registeredclients->business_id}}"><button type="button" class=" btn btn-danger">Yes</button></a>
                                    <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div style="margin-top: 150px;" class="modal fade" id="confirmModalInvoice" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-body" id="show_user" style="margin-bottom: 80px;" >
                                <div class="col-sm-12">
                                    <h4 class="modal-title">Are You sure?</h4>
                                </div>
                                <div class="col-sm-12">
                                    <center>
                                    <input type="hidden" id="delete_team_id" value=""/>
                                    <a href="/general_admin/send_new_invoice/{{$registeredclients->business_id}}/5"><button type="button" class=" btn btn-danger">Yes</button></a>
                                    <button type="button" class="btn btn-default"  data-dismiss="modal">No</button></center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
                
            </tbody>
        </table>
    </div>
</div>
