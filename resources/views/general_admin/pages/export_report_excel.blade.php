<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Export Data</title>
    </head>
    <body>
            <h2>MERCHANT LIST</h2>
            <table>
                <tr>
                    <td>Due Before 5-4 Days</td>
                    <td style="background-color: #a200ff;"></td>
                </tr>
                <tr>
                    <td>Due Before 3 Days</td>
                    <td style="background-color: #22baa0;"></td>
                </tr>
                <tr>
                    <td>Due Before 2-1-0 Days</td>
                    <td style="background-color: #ff0000;"></td>
                </tr>
            </table>

            <table>
                <thead>
                    <tr>
                        <th style="width:25px;">Name</th>
                        <th style="width:25px;">Business Name</th>
                        <th style="width:25px;">Membership</th>
                        <th style="width:25px;">Transaction</th>
                        <th style="width:25px;">Date Paid</th>
                        <th style="width:25px;">Due Date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @if($param=='due')
                        @foreach($registered_clients->where('due_date',$dueDate) as $key=> $registeredclients)
                        <tr>
                            <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                            <td>{{$registeredclients->business_name}}</td>
                            <td>{{$registeredclients->membership_name}}</td>
                            <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
                            <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                            @if(date("F j, Y", strtotime("+5 days"))==$registeredclients->due_date)
                            <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+4 days"))==$registeredclients->due_date)
                            <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+3days"))==$registeredclients->due_date)
                            <td style="color:#22baa0;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+2 days"))==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+1 days"))==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y")==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @else
                            <td >{{$registeredclients->due_date}}</td>
                            @endif
                        </tr>
                        @endforeach
                    @else
                        @foreach($registered_clients as $registeredclients)
                        <tr>
                            <td>{{$registeredclients->contact_first_name}}  {{$registeredclients->contact_last_name}}</td>
                            <td>{{$registeredclients->business_name}}</td>
                            <td>{{$registeredclients->membership_name}}</td>
                            <td>{{$registeredclients->transaction_status}} by: {{$registeredclients->first_name}} {{$registeredclients->last_name}}</td>
                            <td>{{date("F j, Y",strtotime($registeredclients->date_transact))}}</td>
                            @if(date("F j, Y", strtotime("+5 days"))==$registeredclients->due_date)
                            <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+4 days"))==$registeredclients->due_date)
                            <td style="color: #a200ff;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+3days"))==$registeredclients->due_date)
                            <td style="color:#22baa0;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+2 days"))==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y", strtotime("+1 days"))==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @elseif(date("F j, Y")==$registeredclients->due_date)
                            <td style="color: #ff0000;text-decoration: underline;">{{$registeredclients->due_date}}</td>
                            @else
                            <td >{{$registeredclients->due_date}}</td>
                            @endif
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        
    </body>
</html>
