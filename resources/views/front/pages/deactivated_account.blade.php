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
			
			<p class="message-intro">Sorry! {{session('full_name')}},</p>
			<p class="success-message"><br>Your account has been deactivated.</p>
			<p class="success-message">If you think that this is a wrong action,<br>Please contact the <a href="/merchant/payment">Administrator</a>. </p>
			
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
	</div>
</div>
@endsection