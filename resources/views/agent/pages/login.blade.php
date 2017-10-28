@extends('general_admin.layout.layout')
@section('title', 'agent_login')
@section('content')
<div class="login-background" style="background-image: url('/images/background_login.jpg')">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-holders">

			<div class="col-md-12">

			<div class="col-md-12 login-forms">

				<div class="col-md-5 login-forms-background" style="background-image: url('/images/login_pic.jpg')">
					<div class="welcome-container">	
						<div class="text-holder">
							<p class="text-welcome">WELCOME</p>
						</div>
						<div class="text-holder">
							<p class="quote-text">God closes one door, but opens 100...</p>
						</div>
					</div>
				</div>
				<div class="col-md-7 login-rightpart">
					<div class="col-md-12 form-login">	

						<form role="form" method="post" action="/agent_login">
							{{csrf_field()}}
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	

							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">USERNAME or EMAIL:</label>
								<input type="text" name="email" class="form-control login-textfield">

							</div>
							<div class="col-md-12 login-textfield-container">
								<label for="input-password" class="login-label">PASSWORD:</label>
								<input type="password" name="password" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-lastpart">
								<button class="login-btn">AGENT LOGIN</button>
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



{{-- <div class="login-background" style="background-image: url('/images/background_login.jpg')">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12">
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
				<div style="align-content: center;" class="col-md-7 login-container-rightpart">
					<div class="col-md-12 login-form">	
						<form role="form" action="/agent_login" method="post" >
						{{csrf_field()}}
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">USERNAME:</label>
								<input type="text" name="email" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-textfield-container">
								<label for="input-password" class="login-label">PASSWORD:</label>
								<input type="password" name="password" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">AGENT LOGIN</button>
								<a href=""><p class="forgot-password-label">Forgot Password?</p></a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-2"></div>	
	</div>
</div> --}}
@endsection