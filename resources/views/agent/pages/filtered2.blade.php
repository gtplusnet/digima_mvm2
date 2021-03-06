<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($clients_activated)}} Result</p>
    </div>
</div>
<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Business Name</th>
            <th>Contact Person</th>
            <th>Primary Phone</th>
            <th>Secondary Phone</th>
            <th>Membership</th>
            <th>Date Activated</th>
        </tr>
    </thead>
    <tbody>
        @foreach($clients_activated as $clients_activate)
        <tr>
            <td>{{$clients_activate->business_id}}</td>
            <td>{{$clients_activate->business_name}}</td>
            <td>{{$clients_activate->contact_first_name}}  {{$clients_activate->contact_last_name}}</td>
            <td>{{$clients_activate->business_phone}}</td>
            <td>{{$clients_activate->business_alt_phone}}</td>
            <td>{{$clients_activate->membership_name}}</td>
            <td>{{date("F j, Y",strtotime($clients_activate->date_transact))}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
{!! $clients_activated->render() !!}