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
			<p class="message-intro">@if(isset($thank_you->header)==null)@else {{$thank_you->header}}@endif</p>
			<p class="success-message">INSTRUCTION</p>
			<p class="success-message">@if(isset($thank_you->information_thank_you)==null)@else {{$thank_you->information_thank_you}}@endif</p>
			
			<a href="/"><button class="continue-btn">CONTINUE</button></a>
		</div>
	</div>
</div>
@endsection