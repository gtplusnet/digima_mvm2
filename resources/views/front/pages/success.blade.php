@extends('front.layout.layout')
@section('title', 'Success')
@section('content')
<div class="main-body">		
	<div class="banner-success" style="background-image: url('/images/banner_registration.jpg')">
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
				<p class="success-message">Your submission is received and we will contact you soon.</p>
				<a href="/"><button class="continue-btn">CONTINUE</button></a>
			</div>
		</div>
	</div>
</div>
@endsection