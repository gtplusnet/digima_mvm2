<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($clients)}} Result</p>
    </div>
</div>
<table id="example" class="display table table-bordered" style="background-color: #FFFFFF;width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>Name</th>
            <th>Date/Added</th>
            <th>Business Name</th>
            <th>membership</th>
            <th>Transaction</th>
            <th>Conversation</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{$client->contact_first_name}}  {{$client->contact_last_name}}</td>
            <td>{{date("F j, Y",strtotime($client->date_transact))}}</td>
            <td>{{$client->business_name}}</td>
            <td>{{$client->membership_name}}</td>
            <td>{{$client->transaction_status}} by: {{$client->first_name}} {{$client->last_name}}</td>
            <td>
                @if($client->file_path=="not available")
                <p>MP3 not available</p>
                @else
                <a target="blank" href="{{$client->file_path}}">View Conversation</a>
                @endif
            </td>
            <td><a target="_blank" href="/general_admin/send_invoice/{{$client->business_id}}"><button class="transaction btn btn-default "><i class="fa fa-pencil-o" aria-hidden="true"></i>Send Invoice</button></a></td>
        </tr>
        @endforeach
    </tbody>
</table>