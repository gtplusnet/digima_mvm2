@extends('front.layout.layout')
@section('title', 'Success')
@section('content')
<div class="banner-success" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/verification_icon.png" class="verification-bg">
		</div>
	</div>
</div>
<div class="container">
	<div style="margin-bottom: 50px;">
		<div class="banner-holder" >
			<i class="fa fa-check-circle-o check-icon"></i>
			<p class="message-intro">Hello {{session('full_name')}},</p>
			<p class="success-message">You are redirected to this page due to unpaid transaction.<br>Please wait for the agent to call you.</p>
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
	</div>
</div>
@endsection