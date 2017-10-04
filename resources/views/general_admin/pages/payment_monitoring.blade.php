@extends('general_admin.pages.general_admin_layout')
@section('title', 'Payment Monitoring')
@section('description', 'Payment Monitoring')
@section('content')
<div class="page-title">
    <h3>categories</h3>
    <div class="page-breadcrumb">
        <ol class="breadcrumb">
            <li><a href="/admin">Home</a></li>
            <li class="active">categories</li>
        </ol>
    </div>
</div>

<ul class="nav nav-tabs">
	   <li class="active"><a data-toggle="pill" href="#home">Merchants</a></li>
       <li><a data-toggle="pill" href="#menu1">Agents</a></li>
</ul>
	<div class="tab-content" style="">
	    <div id="home" class="tab-pane fade in active">
	    	<div class="text-center">
			     <form class="form-inline" >
					<div class="form-group">
					  <label for="business_name">Business Name:</label>
					  <input type="text" class="form-control" name="business_name" id="business_name">
					</div>
					<button type="submit" class="btn btn-success" name="search_business_btn" id="search_business_btn">Search</button>
				</form>
			</div>

			
			
				<div class="table-responsive">          
					  <table class="table table-bordered" style="background-color: #FFFFFF;">
					    <thead>
					      <tr>
					        <th>ID</th>
					        <th>Business Name</th>
					        <th>Date of Membership</th>
					        <th>Details</th>
					       
					      </tr>
					    </thead>
					    <tbody>
					    @foreach($business_list as $business_item)
					      <tr>
					        <td>{{ $business_item->business_id }}</td>
					        <td>{{ $business_item->business_name }}</td>
					        <td>{{ $business_item->business_complete_address }}</td>
					        <td><a href="#"><button type="button" class="btn btn-info" data-toggle="modal" data-id={{ $business_item->business_id}} id="view_btn" data-target="#businessInfoModal"><i class="fa fa-eye" aria-hidden="true"></i> View</button></td>
					        
					      </tr>
					     @endforeach
					    </tbody>
					  </table>
				  </div>
								
			
	    </div>

	   
  </div>

@endsection