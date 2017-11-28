@extends('front.layout.layout')
@section('title', 'Success')
@section('content')
<div class="banner-success" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/verification_icon.png" class="verification-bg">
		</div>
	</div>
</div>
<div class="container">
	<div>
		@if($index=='register')
		<div class="banner-holder">
			<i class="fa fa-check-circle-o check-icon"></i>
			<p class="message-intro">@if(isset($thank_you->header)==null)@else {{$thank_you->header}}@endif</p>
			<p class="success-message" style="text-align:center;">INSTRUCTION</p>
			<p class="success-message" style="text-align:center;">@if(isset($thank_you->information_thank_you)==null)@else {{$thank_you->information_thank_you}}@endif</p>

			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
		@elseif($index == 'redirect_exist')
		<div class="banner-holder" >
			<p class="message-intro" >Thank You! {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;"><br>Please wait the email to confirm your payment.</p>
			<p class="success-message" style="text-align:center;">If you think that you submit a wrong information for your payment,<br>Please click <a href="{{Session::get('sucess_payment')}}">here</a>. </p>
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
		@elseif($index == 'unpaid')
		<div class="banner-holder" >
			<p class="message-intro">Hello {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;">You are redirected to this page due to unpaid transaction.<br>Please wait for the agent to call you.</p>
			<p class="success-message" style="text-align:center;">If you have now the invoice and already paid.<br>Please click <a href="/merchant/payment">here</a>. </p>
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
		@elseif($index == 'deactivated')
		<div class="banner-holder" >
			<p class="message-intro" style="text-align:center;">Sorry! {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;"><br>Your account has been deactivated.</p>
			<p class="success-message" style="text-align:center;">If you think that this is a wrong action,<br>Please contact the <a href="/contact">Administrator</a>. </p>
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
		@endif
	</div>
</div>
@endsection