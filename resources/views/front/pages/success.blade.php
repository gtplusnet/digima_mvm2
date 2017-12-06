@extends('front.layout.layout')
@section('title', 'Success')
@section('content')
<div class="banner-success" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="title-holder-page" style="">
			USPJEH
		</div>
	</div>
</div>
<div class="container">
	<div>
		@if($index=='register')
		<div class="banner-holder">
			<i class="fa fa-check-circle-o check-icon"></i>
			<p class="message-intro">@if(isset($thank_you->header)==null)@else {{$thank_you->header}}@endif</p>
			<p class="success-message" style="text-align:center;">INSTRUKCIJE</p>
			<p class="success-message" style="text-align: center;">@if(isset($thank_you->information_thank_you)==null)@else {{$thank_you->information_thank_you}}@endif</p>
			<a href="/"><button class="continue-btn">NASTAVITI</button></a>
		</div>
		@elseif($index == 'redirect_exist')
		<div class="banner-holder" >
			<p class="message-intro" >Hvala Vam! {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;"><br>Please wait the email to confirm your payment.</p>
			<p class="success-message" style="text-align:center;">If you think that you submit a wrong information for your payment,<br>Molimo kliknite <a href="{{Session::get('sucess_payment')}}">ovdje</a>. </p>
			<a href="/"><button class="continue-btn">NASTAVITI</button></a>
		</div>
		@elseif($index == 'unpaid')
		<div class="banner-holder" >
			<p class="message-intro">Zdravo, {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;">Preusmjereni ste na ovu stranicu zbog neplaćene transakcije.<br>Pričekajte da vas agent nazove.</p>
			<p class="success-message" style="text-align:center;">Ako već primite fakturu i već ste platili<br>Molimo kliknite <a href="/merchant/payment">ovdje</a>. </p>
			<a href="/"><button class="continue-btn">NASTAVITI</button></a>
		</div>
		@elseif($index == 'deactivated')
		<div class="banner-holder" >
			<p class="message-intro" style="text-align:center;">Oprosti! {{session('full_name')}},</p>
			<p class="success-message" style="text-align:center;"><br>Vaš račun je deaktiviran.</p>
			<p class="success-message" style="text-align:center;">Ako mislite da je ovo pogreška,<br>Molimo kliknite <a href="/contact">ovdje</a>. </p>
			<a href="/"><button class="continue-btn">NASTAVITI</button></a>
		</div>
		@endif
	</div>
</div>
@endsection