 <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
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
                                @foreach($clients as $client)
                                <tr>
                                    <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                    <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td>{{$client->business_name}}</td>
                                    <td>{{$client->payment_method_name}}</td>
                                    <td>{{$client->transaction_status}}</td>
                                    <td><button class="transaction btn btn-default "  data-id="{{$client->business_id}}" data-toggle="modal"  data-target="#myModal{{$client->business_id}}"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                </tr>

                             
                                @endforeach
                            </tbody>
                        </table>