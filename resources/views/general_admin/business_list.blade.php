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
	        <td><a href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-id={{ $business_item->business_id}} id="view_btn" data-target="#businessInfoModal"><i class="fa fa-eye" aria-hidden="true"></i> View</button></td>
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

<div class="modal fade" id="businessInfoModal" role="dialog" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
	     <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title"><center>Merchant Information</center></h4>
		 </div>
		<div class="modal-body">

		   <div id="modal-loader" style="display: none; text-align: center; margin-top: 5px;">
           		<img src="/assets/img/loading.gif">
           </div>  

           <div class="business-info-result">

           </div>

		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		</div>
      </div>
      
    </div>
</div>

@else
	<div class="text-center" id="no-result-notice">
		No result for <b>{{ $business_name }}</b> was found.
	</div>
@endif
