			<table class="table table-bordered" style="background-color: #FFFFFF;">
				<thead>
					<tr>
						<th>ID</th>
						<th>Business Name</th>
						<th>Business Contact Person</th>
						<th>Invoice Number</th>
						<th>Membership</th>
						<th>Date Issued</th>
						<th>Status</th>
						<th></th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($_invoice as $invoice)
					<tr>
						<td>{{ $invoice->invoice_id}}</td>
						<td>{{ $invoice->business_name }}</td>
						<td>{{ $invoice->contact_first_name }} {{ $invoice->contact_last_name }}</td>
						<td><a target="blank" href="{{$invoice->invoice_path}}" >{{ $invoice->invoice_number }}</a></td>
						<td>{{ $invoice->membership_name }}</td>
						<td>{{date("F j, Y",strtotime($invoice->date_transact))}}</td>
						<td>{{ $invoice->invoice_status }}</td>
						<td>
							 <div class="form-group">
							      <select id="invoice_action" data-contact_name="{{ $invoice->contact_first_name}}" data-b_id="{{ $invoice->business_id}}" data-name="{{ $invoice->invoice_name }}" data-email="{{ $invoice->user_email }}" data-path="{{$invoice->invoice_path}}" class="form-control invoice_action" id="sel1" style="width:90px;">
							        
							        <option>Action</option>
							        @if($invoice->invoice_status=='Paid')
							        <option value="view">View</option>
							        @else
							        <option value="view">View</option>
							        <option value="resend">Resend</option>
							        @endif
							     </select>
							  </div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			