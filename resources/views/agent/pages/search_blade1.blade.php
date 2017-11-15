                        <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                <th>ID</th>
                                <th>Business Name</th>
                                <th>Contact Person</th>
                                <th>Phone 1</th>
                                <th>Phone 2</th>
                                <th>Membership</th>
                                <th>Date Pending</th>
                                <th>Status</th>
                                  <!--   <th>Action</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients_pending as $clients_pendingss)
                                <tr>
                                <td>{{$clients_pendingss->business_id}}</td>
                                <td>{{$clients_pendingss->business_name}}</td>
                                <td>{{$clients_pendingss->contact_first_name}}  {{$clients_pendingss->contact_last_name}}</td>
                                <td>{{$clients_pendingss->business_phone}}</td>
                                <td>{{$clients_pendingss->business_alt_phone}}</td>
                                <td>{{$clients_pendingss->membership_name}}</td>
                                <td>{{date("F j, Y",strtotime($clients_pendingss->date_transact))}}</td>
                                <td>{{$clients_pendingss->transaction_status}}</td>
                                </tr>
                 
                                @endforeach
                            </tbody>
                        </table>
                        
                        {!! $clients_pending->render() !!}   