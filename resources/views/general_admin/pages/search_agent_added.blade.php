                            <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>membership</th>
                                        <th>Transaction</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($agentAdded as $agentAdd)
                                    <tr>
                                        <td>{{$agentAdd->contact_first_name}}  {{$agentAdd->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($agentAdd->date_transact))}}</td>
                                        <td>{{$agentAdd->business_name}}</td>
                                        <td>{{$agentAdd->membership_name}}</td>
                                        <td>{{$agentAdd->transaction_status}} by: {{$agentAdd->first_name}} {{$agentAdd->last_name}}</td>
                                        <td><a target="_blank" href="/general_admin/send_invoice/{{$agentAdd->business_id}}"><button class="transaction btn btn-default "><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>