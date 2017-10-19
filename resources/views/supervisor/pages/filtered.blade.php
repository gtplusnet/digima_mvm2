<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">Name</th>
                                    <th style="text-align: center;">Date Added</th>
                                    <th style="text-align: center;">Business Name</th>
                                    <th style="text-align: center;">Membership</th>
                                    <th style="text-align: center;">Upload Conversation</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($clients as $client)
                                <tr>
                                    <td style="text-align: center;">{{$client->contact_first_name}} {{$client->contact_last_name}}</td>
                                    <td style="text-align: center;">{{date("F j, Y",strtotime($client->date_created))}}</td>
                                    <td style="text-align: center;">{{$client->business_name}}</td>
                                    <td style="text-align: center;">{{$client->payment_method_name}}</td>
                                    <td style="text-align: center;">
                                        <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#uploadModal" data-bid="{{ $client->business_id }}" data-cid="{{ $client->business_contact_person_id }}" id="selAudioBtn">
                                            Select Audio File
                                        </button>
                                    </td>
                                </tr>

                                @endforeach
                            </tbody>
                        </table>