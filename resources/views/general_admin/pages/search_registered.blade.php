<div class="col-md-12">
    <div >
        <p style="color:20px;font-weight: bold;color:#34425A;">{{count($registered_clients)}} Result</p>
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
        </tr>
    </thead>
    <tbody>
        @foreach($registered_clients as $registeredclients)
        <tr>
            <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
            <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
            <td>{{$registeredclients->business_name}}</td>
            <td>{{$registeredclients->membership_name}}</td>
            <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>