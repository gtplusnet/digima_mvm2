    <div class="table-responsive">
                                    <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date/Added</th>
                                                <th>Business Name</th>
                                                <th>Business Address</th>
                                                <th>membership</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clients as $client)
                                            <tr>
                                                <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
                                                <td>{{date("F j, Y, g:i a",strtotime($client->date_created))}}</td>
                                                <td>{{$client->business_name}}</td>
                                                <td>{{$client->business_complete_address}}</td>
                                                <td>{{$client->payment_method_name}}</td>
                                                <td><button class="btn btn-default"><i class="fa fa-phone call" aria-hidden="true"></i>call</button></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>