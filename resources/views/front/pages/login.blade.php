@extends('front.layout.layout')
@section('title', 'Login')
@section('content')
@if(Request::segment(1)=="login")
<div class="login-background">
	<div class="container">

		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
				<div class="col-md-5 login-container-background" style="background-image: url('/images/login_pic.jpg')">
					<div class="welcoming-container">	
						<div class="login-text-holder">
							<p class="welcome-text">DOBRODOŠLI</p>
						</div>
						<div class="login-text-holder">
							<p class="quote-text">Bog zatvara vrata, ali otvara 100 ...</p>
						</div>
					</div>
					<div class="learn-more-btn-container">
						<button class="learn-more-btn">Saznaj Više</button>
					</div>
				</div>
				<div class="col-md-7 login-container-rightpart">
					<div class="col-md-12 login-form">	
						<form role="form" method="post" action="/login">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">Korisničko Ime:</label>
								<input type="text" name="email" class="form-control login-textfield">

							</div>
							<div class="col-md-12 login-textfield-container">
								<label for="input-password" class="login-label">LOZINKA:</label>
								<input type="password" name="user_password" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">Prijavi Se</button>
								<a href="/forgot/password"><p class="forgot-password-label">Zaboravili ste lozinku?</p></a>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
		<!-- MOBILE LOGIN -->
		<div class="login-wrapper">
			<div class="mob-login">
				<div class="top-container">
					<img src="/images/mob-login-image.jpg">
				</div>
				<div class="bot-container">
					<div class="caption">DOBRODOŠLI!</div>
					<form role="form" method="post" action="/login">
						{{csrf_field()}}		
						<div class="login-textfield-container">
							<input type="text" name="email" class="form-control login-textfield" placeholder="Korisničko Ime">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="user_password" class="form-control login-textfield" placeholder="LOZINKA">
						</div>
						<button class="login-btn">Prijavite Se</button>
					</form>
					
				</div>
				<div class="bottom-link"><a href="/forgot/password"><span>Zaboravili ste lozinku?</span></a></div>
			</div>
		</div>
	</div>
</div>
@elseif(Request::segment(1)=="user")
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
				<div class="col-md-5 login-container-background" style="background-image: url('/images/login_pic.jpg')">
					<div class="welcoming-container">	
						<div class="login-text-holder">
							<p class="welcome-text">DOBRODOŠLI</p>
						</div>
						<div class="login-text-holder">
							<p class="quote-text">Bog zatvara vrata, ali otvara 100 ...</p>
						</div>
					</div>
					<div class="learn-more-btn-container">
						<button class="learn-more-btn">Saznaj Više</button>
					</div>
				</div>
				<div class="col-md-7 login-container-rightpart">
					<div class="col-md-12 login-form">	
						<form role="form" method="post" action="/user/login/submit">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="col-md-12 login-textfield-container">
								<label for="input-username" class="login-label">Korisničko Ime:</label>
								<input type="text" name="user_email" class="form-control login-textfield">

							</div>
							<div class="col-md-12 login-textfield-container">
								<label for="input-password" class="login-label">LOZINKA:</label>
								<input type="password" name="user_password" class="form-control login-textfield">
							</div>
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">Prijava Korisnika</button>
								<a href="/user/forgot/password"><p class="forgot-password-label">Zaboravili ste lozinku?</p></a>
							</div>
						</form>
					</div>
				</div>
			</div>	
		</div>
		<!-- MOBILE LOGIN -->
		<div class="login-wrapper">
			<div class="mob-login">
				<div class="top-container">
					<img src="/images/mob-login-image.jpg">
				</div>
				<div class="bot-container">
					<div class="caption">DOBRODOŠLI!</div>
					<form role="form" method="post" action="/user/login/submit">
						{{csrf_field()}}
						<div class="login-textfield-container">
							<input type="text" name="user_email" class="form-control login-textfield" placeholder="Korisničko Ime">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="user_password" class="form-control login-textfield" placeholder="LOZINKA">
						</div>
						<button class="login-btn">Prijava Korisnika</button>
					</form>
					
				</div>
				<div class="bottom-link"><a href="/user/forgot/password"><span>Zaboravili ste lozinku?</span></a></div>
			</div>
		</div>
	</div>
</div>
@endif
@endsection