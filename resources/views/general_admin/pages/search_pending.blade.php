                            <table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date/Added</th>
                                        <th>Business Name</th>
                                        <th>membership</th>
                                        <th>Transaction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pending_clients as $pendingclient)
                                    <tr>
                                        <td>{{$pendingclient->contact_first_name}}  {{$pendingclient->contact_last_name}}</td>
                                        <td>{{date("F j, Y",strtotime($pendingclient->date_transact))}}</td>
                                        <td>{{$pendingclient->business_name}}</td>
                                        <td>{{$pendingclient->membership_name}}</td>
                                        <td>{{$pendingclient->transaction_status}} by: {{$pendingclient->first_name}} {{$pendingclient->last_name}}</td>
                                        <td>
                                            <select id="resendAction" data-contact_name="{{ $pendingclient->contact_first_name}}" data-b_id="{{ $pendingclient->business_id}}" data-name="{{ $pendingclient->invoice_name }}" data-email="{{ $pendingclient->user_email }}" data-path="{{$pendingclient->invoice_path}}" class="form-control resendAction" id="sel1" style="width:90px;">
                                                
                                                
                                                <option >Action</option>
                                                <option value="resend">Resend</option>
                                                
                                            </select>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>