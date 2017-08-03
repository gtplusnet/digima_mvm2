@if(count($business_list) > 0)
<div class="result-count">
	About <b>{{ $business_list->total() }}</b> results for <b>{{ $business_name }}</b>
</div>
<div class="business-list">
	<div class="table-responsive">          
	  <table class="table table-bordered" style="background-color: #FFFFFF;">
	    <thead>
	      <tr>
	        <th>ID</th>
	        <th>Business Name</th>
	        <th>Date of Membership</th>
	        <th>Details</th>
	        <th>Status</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($business_list as $business_item)
	      <tr>
	        <td>{{ $business_item->business_id }}</td>
	        <td>{{ $business_item->business_name }}</td>
	        <td>{{ $business_item->date_created }}</td>
	        <td><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
	        <td>
	        	@if($business_item->status == 1)
	        		{{ "Activated" }}
	        	@elseif($business_item->status == 1)
	        		{{ "Not Activated" }}
	        	@else
	        		{{ "Disabled" }}
	        	@endif
	        </td>
	      </tr>
	     @endforeach
	    </tbody>
	  </table>
  </div>
  <div class="pagination-container text-center">
  	{!! $business_list->render() !!}
  </div>
</div>
@else
	<div class="text-center" id="no-result-notice">
		No result for <b>{{ $business_name }}</b> was found.
	</div>
@endif
