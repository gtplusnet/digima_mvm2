<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($clients_pending)}} Result</p>
    </div>
</div>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Business Name</th>
            <th>Contact Person</th>
            <th>Membership</th>
            <th>Date Pending</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients_pending as $clients_pendingss)
        <tr>
            <td>{{$clients_pendingss->business_id}}</td>
            <td>{{$clients_pendingss->business_name}}</td>
            <td>{{$clients_pendingss->contact_first_name}}  {{$clients_pendingss->contact_last_name}}</td>
            <td>{{$clients_pendingss->membership_name}}</td>
            <td>{{date("F j, Y",strtotime($clients_pendingss->date_transact))}}</td>
            <td>{{$clients_pendingss->transaction_status}}</td>
            <td>
                <button type="button" class="transaction btn btn-default "  data-id="{{$clients_pendingss->business_id}}" >
                <i class="fa fa-phone call" aria-hidden="true"></i>Call
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $clients_pending->render() !!}