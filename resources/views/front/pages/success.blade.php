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
		<div class="banner-holder">
			<i class="fa fa-check-circle-o check-icon"></i>
			<p class="message-intro">Thank you!</p>
			<p class="success-message">INSTRUCTION</p>
			<p class="success-message">Please wait the call for confirmation within 48 hours.</p>
			<p class="success-message">After confirming the membership, wait the email for more instruction.</p>
			<p class="success-message">Once payment is settled,wait for approval of the admin. </p>
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
	</div>
</div>
@endsection