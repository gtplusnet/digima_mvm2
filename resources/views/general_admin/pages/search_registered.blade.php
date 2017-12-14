<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($registered_clients)}} Result</p>
    </div>
</div>
<table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Business Name</th>
            <th>Membership</th>
            <th>Transaction</th>
            <th>Date Paid</th>
            <th>Date to be Paid</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($registered_clients as $registeredclients)
        <tr>
            <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
            <td>{{$registeredclients->business_name}}</td>
            <td>{{$registeredclients->membership_name}}</td>
            <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
            <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
            @if(date("F j, Y", strtotime("+5 days"))==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="color: #a200ff;text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @elseif(date("F j, Y", strtotime("+4 days"))==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="color: #a200ff;text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @elseif(date("F j, Y", strtotime("+3days"))==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="color:#22baa0,text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @elseif(date("F j, Y", strtotime("+2 days"))==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="background-color: #ffffff;color: #ff0000;text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @elseif(date("F j, Y", strtotime("+1 days"))==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="background-color: #ffffff;color: #ff0000;text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @elseif(date("F j, Y")==date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact))))
            <td style="background-color: #ffffff;color: #ff0000;text-decoration: underline;">{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
            @else
            <td >{{ date("F j, Y", strtotime('+1 month', strtotime($registeredclients->date_transact)))}}</td>
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
    </tbody>
</table>