@extends('front.layout.layout')
@section('title', 'Contact Us')
@section('content')


<div class="banner-contact" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		<div class="title-holder-page" style="">
			KONTAKTIRAJTE NAS
		</div>
	</div>
</div>
<div class="container">
	<div class="col-md-6 contact-container-left">
		 @if (session('success'))
           <div class="alert alert-success">
                Hvala vam! Poruka je uspješno poslana.
            </div>
            @elseif(session('error'))
            <div class="alert alert-danger">
                Sorry!. Network error, Transaction Fail!
            </div>
           @endif
		<div class="contact-title-container">
			<p class="contact-title">Potpora i Kontakt Upit</p>
		</div>
		<div>
			<form role="form" action="/contact_send" method="post">
				{{csrf_field()}}
			<div class=" col-md-12 contact-form-container">
				<div class="col-md-12 contact-textfield-holder">
					<div class="col-md-6 contact-textfield-left-holder">
						<label for="input-name" class="contact-labels">Ime:</label>
						<input type="text" name="name" class="contact-textfield" required/>
					</div>
					<div class="col-md-6 contact-textfield-right-holder">
						<label for="input-email" class="contact-labels">Email:</label>
						<input type="email" name="email_add" class="contact-textfield" required/>
					</div>
				</div>
				<div class="col-md-12 contact-textfield-holder">
					<label for="input-subject" class="contact-labels">Predmet:</label>
					<input type="text" name="subject" class="contact-textfield" required/>
				</div>
				<div class="col-md-12 contact-textfield-holder">
					<label for="input-help" class="contact-labels">Kako Vam Možemo Pomoći:</label>
					<textarea rows="11" name="help_message" id="we_can_help" class="contact-textfield message-textarea" required/></textarea>
				</div>
				<div class="col-md-12 contact-btn-holder">
					<button class="contact-send-btn transform-capitalize">Pošalji Poruku</button>
				</div>
			</div>
			</form>
		</div>
	</div>
	<div class="col-md-6 contact-container-right">
		<div class="contact-title-container">
			<p class="contact-title">Adresa i Kontakt Informacije</p>
		</div>
		<div class="contact-details">
			<div class="details-info-holder">
				<div class="details-icon-holder">
					<i class="material-icons details-icon">location_on</i>
				</div>
				<div class="details-info-container">
					<p class="details-info">@if(isset($contact_us->complete_address)==null)@else {{$contact_us->complete_address}}@endif</p>
				</div>
			</div>
			<div class="details-info-holder">
				<div class="details-icon-holder">
					<i class="material-icons details-icon">phone_iphone</i>
				</div>
				<div class="details-info-container">
					<p class="details-info">@if(isset($contact_us->phone_number)==null)@else {{$contact_us->phone_number}}@endif</p>
				</div>
			</div>
			<div class="details-info-holder">
				<div class="details-icon-holder">
					<i class="material-icons details-icon">mail_outline</i>
				</div>
				<div class="details-info-container">
					<p class="details-info">@if(isset($contact_us->email)==null)@else {{$contact_us->email}}@endif</p>
				</div>
			</div>
			<div class="map-container">
			<!-- <img src="/images/example_googlemap.jpg" class="google-map"> -->
				<div id="map"></div>
			    <script>
			      function initMap() {
			      	var uluru = {lat: 45.1000, lng: 15.2000};
			        // var uluru = {lat: -25.363, lng: 131.044};
			        var map = new google.maps.Map(document.getElementById('map'), {
			          zoom: 4,
			          center: uluru
			        });
			        var marker = new google.maps.Marker({
			          position: uluru,
			          map: map
			        });
			      }
			    </script>
		    </div>
		</div>
		
		
		
	</div>
</div>
@endsection