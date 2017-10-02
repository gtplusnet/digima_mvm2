@extends('front.layout.layout')
@section('title', 'Login')
@section('content')
<div class="login-background" style="background-image: url('/images/background_login.jpg')">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
<<<<<<< HEAD
			<div class="col-md-12">
=======
			<div class="col-md-12 login-form-holder">
>>>>>>> 245b49384bf4ece8de00379e433ee9a14258e333
				<div class="col-md-5 login-container-background" style="background-image: url('/images/login_pic.jpg')">
					<div class="welcoming-container">	
						<div class="login-text-holder">
							<p class="welcome-text">WELCOME</p>
						</div>
						<div class="login-text-holder">
							<p class="quote-text">God closes one door, but opens 100...</p>
						</div>
					</div>
					<div class="learn-more-btn-container">
						<button class="learn-more-btn">LEARN MORE</button>
					</div>
				</div>
				<div class="col-md-7 login-container-rightpart">
					<div class="col-md-12 login-form">	
<<<<<<< HEAD
						<form role="form" method="post" action="/login">
							{{csrf_field()}}	
							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">USERNAME or EMAIL:</label>
								<input type="text" name="email" class="form-control login-textfield">
=======
						<form role="form">	
							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">USERNAME or EMAIL:</label>
								<input type="text" name="username" class="form-control login-textfield">
>>>>>>> 245b49384bf4ece8de00379e433ee9a14258e333
							</div>
							<div class="col-md-12 login-textfield-container">
								<label for="input-password" class="login-label">PASSWORD:</label>
								<input type="password" name="password" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">LOGIN</button>
								<a href=""><p class="forgot-password-label">Forgot Password?</p></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>	
	</div>
</div>
@endsection