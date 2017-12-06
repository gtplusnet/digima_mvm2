@extends('front.layout.layout')
@section('title', 'About')
@section('content')

<div class="banner-about" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="title-holder-page" style="">
			O NAMA
		</div>
	</div>
</div>
<div class="container">
	
	<div class="about-container col-md-6">
		<div class="about-holder">
			<div class="about-title-container">
				<p class="about-title">@if(isset($_about_us->information_header)==null)
			    @else
			    {{$_about_us->information_header}}
				@endif</p>
			</div>
			<div class="about-content-container">
				@if(isset($_about_us->information)==null)
			    @else
			    {{$_about_us->information}}
				@endif
				
			</div>
			<div class="about-title-container">
				<button class="about-btn "><a href="/registration">Dodajte Moju Tvrtku</button>
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
