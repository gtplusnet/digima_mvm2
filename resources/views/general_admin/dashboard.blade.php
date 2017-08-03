@extends('general_admin.general_admin_layout')
@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('content')
	<ul class="nav nav-tabs">
	   <li class="active"><a data-toggle="pill" href="#home">Merchants</a></li>
       <li><a data-toggle="pill" href="#menu1">Agents</a></li>
	</ul>
	<div class="tab-content" style="">
	    <div id="home" class="tab-pane fade in active">
	    	<div class="text-center">
			     <form class="form-inline" action="{{ url('general_admin/get_business_list') }}" method="GET" id="search-business-form">
					<div class="form-group">
					  <label for="business_name">Business Name:</label>
					  <input type="text" class="form-control" name="business_name" id="business_name">
					</div>
					<button type="submit" class="btn btn-success" name="search_business_btn" id="search_business_btn">Search</button>
				</form>
			</div>

			<div class="business-result">
				
			</div>
	    </div>

	    <div id="menu1" class="tab-pane fade">
	     	<div class="text-center">
			     <form class="form-inline">
					<div class="form-group">
					  <label for="agent_name">Agent Name:</label>
					  <input type="text" class="form-control" name="agent_name" id="agent_name">
					</div>
					<button type="submit" class="btn btn-success" name="search_agent_btn" id="search_agent_btn">Search</button>
				</form>
			</div>
	    </div>
  </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/general_admin/search_business.js"></script>
@endsection