<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                        <thead>
                            <tr>
                                <th style="text-align: center;">Name</th>
                                <th style="text-align: center;">Date Added</th>
                                <th style="text-align: center;">Business Name</th>
                                <th style="text-align: center;">Membership</th>
                                <th style="text-align: center;">Play Conversation</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients_activated as $clients_activate)
                            <tr>
                                <td style="text-align: center;">{{$clients_activate->contact_first_name}} {{$clients_activate->contact_last_name}}</td>
                                <td style="text-align: center;">{{date("F j, Y",strtotime($clients_activate->date_transact))}}</td>
                                <td style="text-align: center;">{{$clients_activate->business_name}}</td>
                                <td style="text-align: center;">{{$clients_activate->membership_name}}</td>
                                <td style="text-align: center;">
                                    @if($clients_activate->file_path == 'not available')
                                    <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#viewModal{{$clients_activate->business_id}}" data-bid="{{ $clients_activate->business_id }}" data-cid="{{ $clients_activate->business_contact_person_id }}" id="playAudioBtn" disabled>
                                    Not Available
                                    </button>
                                    @else
                                    <button class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#viewModal{{$clients_activate->business_id}}" data-bid="{{ $clients_activate->business_id }}" data-cid="{{ $clients_activate->business_contact_person_id }}" id="playAudioBtn">
                                    Play Audio
                                    </button>
                                    @endif
                                </td>
                            </tr>
                            {{-- <div style="margin-top:160px;" class="modal fade in" id="viewModal{{$clients_activate->business_id}}" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header" style="background-color: #34425A;">
                                            <button type="button" class="close closeBtn" data-dismiss="modal">&times;</button>
                                            <h3 class="modal-title" style="color: #FFFFFF;">
                                            <span class="glyphicon glyphicon-file"></span> Play Audio File
                                            </h3>
                                        </div>
                                        <div class="modal-body" style="padding-top: 30px; padding-bottom: 30px;">
                                            <div class="row col-md-12 ">
                                                <audio controls style="width:500px">
                                                    <source src="{{$clients_activate->file_path}}" type="audio/mpeg" width="100%" />
                                                </audio>
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="background-color: #34425A; padding-top: 20px;">
                                            <button type="button" class="btn btn-danger btn-rounded closeBtn" name="closeBtn" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @endforeach
                        </tbody>
                    </table>