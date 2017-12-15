<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($clients)}} Result</p>
    </div>
</div>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Business Name</th>
            <th>Contact Person</th>
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
            <td>{{$client->membership_name}}</td>
            <td>{{date("F j, Y",strtotime($client->date_created))}}</td>
            <td>{{$client->transaction_status}}</td>
            <td>
                @if($client->transaction_status == 'call in progress' && $client->agent_id !=session('agent_id'))
                <button type="button" class="transaction btn btn-default "  data-status="{{$client->business_status}}" data-id="{{$client->business_id}}" disabled>
                <i class="fa fa-phone call" aria-hidden="true"></i>Busy
                </button>
                @else
                <button type="button" class="transaction btn btn-default "  data-id="{{$client->business_id}}" >
                <i class="fa fa-phone call" aria-hidden="true"></i>Call
                </button>
                @endif
                
            </td>
        </tr>
        
        @endforeach
    </tbody>
</table>
{!! $clients->render() !!}