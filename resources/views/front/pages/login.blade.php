@extends('front.layout.layout')
@section('title', 'Registration')
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
						<form role="form" method="post" action="/login">
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
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">LOGIN</button>
								<a href="/forgot/password"><p class="forgot-password-label">Forgot Password?</p></a>
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
					<div class="caption">Welcome!</div>
					<form action="">
						<div class="login-textfield-container">
							<input type="text" name="email" class="form-control login-textfield" placeholder="Username or Email">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="password" class="form-control login-textfield" placeholder="Password">
						</div>
					</form>
					<button class="login-btn">LOGIN</button>
				</div>
				<a href=""><span></span></a>
			</div>
		</div>
	</div>
</div>
@elseif(Request::segment(1)=="agent")
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
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
						<form role="form" method="post" action="/login">
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
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">LOGIN</button>
								<a href="/forgot/password"><p class="forgot-password-label">Forgot Password?</p></a>
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
					<div class="caption">Welcome!</div>
					<form action="">
						<div class="login-textfield-container">
							<input type="text" name="email" class="form-control login-textfield" placeholder="Username or Email">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="password" class="form-control login-textfield" placeholder="Password">
						</div>
					</form>
					<button class="login-btn">LOGIN</button>
				</div>
				<a href=""><span></span></a>
			</div>
		</div>
	</div>
</div>
@elseif(Request::segment(1)=="supervisor")
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
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
						<form role="form" method="post" action="/login">
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
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">LOGIN</button>
								<a href="/forgot/password"><p class="forgot-password-label">Forgot Password?</p></a>
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
					<div class="caption">Welcome!</div>
					<form action="">
						<div class="login-textfield-container">
							<input type="text" name="email" class="form-control login-textfield" placeholder="Username or Email">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="password" class="form-control login-textfield" placeholder="Password">
						</div>
					</form>
					<button class="login-btn">LOGIN</button>
				</div>
				<a href=""><span></span></a>
			</div>
		</div>
	</div>
</div>
@elseif(Request::segment(1)=="general_admin")
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		<div class="col-md-8 login-form-container">
			<div class="col-md-12 login-form-holder">
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
						<form role="form" method="post" action="/login">
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
							<div class="col-md-12 login-textfield-container-lastpart">
								<button class="login-btn">LOGIN</button>
								<a href="/forgot/password"><p class="forgot-password-label">Forgot Password?</p></a>
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
					<div class="caption">Welcome!</div>
					<form action="">
						<div class="login-textfield-container">
							<input type="text" name="email" class="form-control login-textfield" placeholder="Username or Email">
						</div>
						<div class="login-textfield-container">
							<input type="password" name="password" class="form-control login-textfield" placeholder="Password">
						</div>
					</form>
					<button class="login-btn">LOGIN</button>
				</div>
				<a href=""><span></span></a>
			</div>
		</div>
	</div>
</div>
@endif

@endsection