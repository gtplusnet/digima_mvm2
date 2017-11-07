 <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Business Name</th>
                                    <th>Contact Person</th>
                                    <th>Phone 1</th>
                                    <th>Phone 2</th>
                                    <th>Membership</th>
                                    <th>Date Register</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->business_id}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{$client->business_phone}}</td>
                                    <td>{{$client->business_alt_phone}}</td>
                                    <td>{{$client->membership_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->transaction_status}}</td>

                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                </tr>
                            
                                @endforeach
                            </tbody>
                        </table>