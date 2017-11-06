@extends('front.layout.layout')
@section('title', 'About')
@section('content')

<div class="banner-about" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="pull-left">
			<img src="/images/aboutus_logo.png" class="about-logo">
		</div>
	</div>
</div>
<div class="container">
	<div class="about-container col-md-6">
		<div class="about-holder">
			<div class="about-title-container">
				<p class="about-title">Hi! Welcome to Croatia Directory</p>
			</div>
			<div class="about-content-container">
				<p class="about-content" >Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolofugiat </p>
				<p class="about-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolofugiat </p>
				<p class="about-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolofugiat </p>
			</div>
			<div class="about-title-container">
				<button class="about-btn" >Add My Business</button>
			</div>
			
		</div>
	</div>
	<div class="about-container col-md-6">
		<div class="about-holder">
			<div class="about-content-container">
				<div class="bottom-image-container">
					<img src="/images/aboutpic.png" class="bottom-image">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
