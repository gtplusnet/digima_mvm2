@extends('front.layout.layout')
@section('content')
<div class="banner-sendemail" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
            <div class="sendemail-logo-container">
                <img class="sendemail-logo" src="/images/sendemail_logo.png">
                <p class="sendemail-title">Send Email</p>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div class="sendemail-container">
		<div class="sendemail-title-container">
			<p class="sendemail-title">MESSAGE US</p>
		</div>
		<div>
			<form role="form">
			<div class=" col-md-12 sendemail-form-container">
				<div class="col-md-12 sendemail-textfield-holder">
					<label for="input-email" class="sendemail-labels">Email:</label>
					<input type="text" name="email_add" class="sendemail-textfield">
				</div>
				<div class="col-md-12 sendemail-textfield-holder">
					<label for="input-subject" class="sendemail-labels">Subject:</label>
					<input type="text" name="subject" class="sendemail-textfield">
				</div>
				<div class="col-md-12 sendemail-textfield-holder">
					<label for="input-help" class="sendemail-labels">How Can We Help:</label>
					<textarea rows="11" name="help_message" id="we_can_help" class="sendemail-textfield message-textarea"></textarea>
				</div>
				<div class="col-md-12 sendemail-btn-holder">
					<button class="sendemail-send-btn">SEND MESSAGE</button>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
@endsection