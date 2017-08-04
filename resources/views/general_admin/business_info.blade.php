<div class="table-responsive">
  
	 <table class="table table-striped table-bordered" id="business-info-table">
		 <tr>
			 <th style="text-align: center;">Business Name</th>
			 <td style="text-align: center;">{{ $business_info->business_name }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Contact Person</th>
			 <td style="text-align: center;">{{ $business_info->contact_first_name }} {{ $business_info->contact_last_name }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Complete Address</th>
			 <td style="text-align: center;">{{ $business_info->business_complete_address }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Primary Phone No.</th>
			 <td style="text-align: center;">{{ $business_info->business_phone }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Secondary Phone No.</th>
			 <td style="text-align: center;">{{ $business_info->business_alt_phone }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Business Fax</th>
			 <td style="text-align: center;">{{ $business_info->business_fax }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Facebook URL</th>
			 <td style="text-align: center;">{{ $business_info->facebook_url }}</td>
		 </tr>
		 <tr>
			 <th style="text-align: center;">Twitter URL</th>
			 <td style="text-align: center;">{{ $business_info->twitter_url }}</td>
		 </tr>
		  <tr>
			 <th style="text-align: center;">Date Created</th>
			 <td style="text-align: center;">{{ $business_info->date_created }}</td>
		 </tr>
	 </table>
   
 </div>