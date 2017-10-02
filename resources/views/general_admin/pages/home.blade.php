@extends('general_admin.general_admin_layout')
@section('title', 'Dashboard')
@section('description', 'Dashboard')
@section('content')
	<div class="dasboard-button-cointaner">
		<div class="form-group text-center" id="dasboard-buttons">
			<button type="button" class="btn btn-lg btn-primary" id="merchant-button"><i class="fa fa-users" aria-hidden="true"></i> Merchants</button>
			<button type="button" class="btn btn-lg btn-primary" id="agent-button"><i class="fa fa-phone-square" aria-hidden="true"></i> Agents</button>
		</div>
	</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="/assets/js/general_admin/general_admin.js"></script>
@endsection