@extends('front.layout.layout')
@section('title', 'Registration')
@section('content')
<div class="login-background">
	<div class="container">
		<div class="col-md-2"></div>
		@if(Request::segment(1)=="forgot")
			<div class="col-md-8 login-form-container">
				<div class="col-md-12 login-form-holder">
					<div class="col-md-12 login-container-middle">
						<div class="col-md-12 password-form" style="padding: 100px;">	
							@if(Session::has('sent'))
							<div class='alert alert-success'><strong>Uspjeh!</strong> Provjerite svoju e-poštu kako biste poništili lozinku</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">CONTINUE</button></a>
							</div>
							@elseif(Session::has('notmatch'))
							<div class='alert alert-danger'><strong>Oprosti!</strong> E-mail i lozinka nisu se podudarali s bilo kojim računom</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">Nastaviti</button></a>
							</div>
							@else
							<form role="form" method="post" action="/reset/password">
								{{csrf_field()}}	
								@if($errors->any())
								<p><font color="red"><center>{{$errors->first()}}</center></font></p>
								@endif	
								<div class="col-md-12 password-textfield-container">
									<label for="input-username" class="password-labels">Unesite svoju e-mail (merchant)</label>
									<input type="text" name="email" class="form-control password-textfields">
								</div>
								<div class="col-md-12 password-textfield-container">
									<label for="input-username" class="password-labels">Unesite svoj primarni telefonski broj</label>
									<input type="text" name="phone" class="form-control password-textfields">
								</div>
								<div class="col-md-12 password-textfield-container-lastpart">
									<button type="submit" class="password-btn">SUBMIT</button>
								</div>
							</form>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="forgot-password-wrapper">
				<div class="mob-forgot-password">
					<div class="password-form">	
						@if(Session::has('sent'))
							<div class='alert alert-success'><strong>Uspjeh!</strong> Provjerite svoju e-poštu kako biste poništili lozinku</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">CONTINUE</button></a>
							</div>
							@elseif(Session::has('notmatch'))
							<div class='alert alert-danger'><strong>Oprosti!</strong> E-mail i lozinka nisu se podudarali s bilo kojim računom</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">Nastaviti</button></a>
							</div>
							@else
						<form role="form" method="post" action="/reset/password">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="password-textfield-container">
								<label for="input-username" class="password-labels">Unesite svoju e-mail (merchant)</label>
								<input type="text" name="email" class="form-control password-textfields">
							</div>
							<div class="password-textfield-container">
								<label for="input-username" class="password-labels">Unesite svoj primarni telefonski broj</label>
								<input type="text" name="phone" class="form-control password-textfields">
							</div>
							<div class="password-textfield-container-lastpart">
								<button type="submit" class="password-btn">Podnijeti</button>
							</div>
						</form>
						@endif
					</div>
				</div>
			</div>
		@else
			<div class="col-md-8 login-form-container">
				<div class="col-md-12 login-form-holder">
					<div class="col-md-12 login-container-middle">
						<div class="col-md-12 password-form" style="padding: 100px;">	
							@if(Session::has('sent'))
							<div class='alert alert-success'><strong>Uspjeh!</strong> Provjerite svoju e-poštu kako biste poništili lozinku</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">Nastaviti</button></a>
							</div>
							@elseif(Session::has('notmatch'))
							<div class='alert alert-danger'><strong>Oprosti!</strong> E-mail i lozinka nisu se podudarali s bilo kojim računom</div>
							<div class="col-md-12 password-textfield-container-lastpart">
								<a href="/"><button  class="password-btn">Nastaviti</button></a>
							</div>
							@else
							<form role="form" method="post" action="/forgot_password_user/reset_password">
								{{csrf_field()}}	
								@if($errors->any())
								<p><font color="red"><center>{{$errors->first()}}</center></font></p>
								@endif	
								<div class="col-md-12 password-textfield-container">
									<label for="input-username" class="password-labels">Please Input Your Email</label>
									<input type="text" name="email" class="form-control password-textfields">
								</div>
								<div class="col-md-12 password-textfield-container">
									<label for="input-username" class="password-labels">Please Input Your Phone Number</label>
									<input type="text" name="phone" class="form-control password-textfields">
								</div>
								<div class="col-md-12 password-textfield-container-lastpart">
									<button type="submit" class="password-btn">SUBMIT</button>
								</div>
							</form>
							@endif
						</div>
					</div>
				</div>
			</div>
			<div class="forgot-password-wrapper">
				<div class="mob-forgot-password">
					<div class="password-form">	
						@if(Session::has('sent'))
						<div class='alert alert-success'><strong>Uspjeh!</strong> Provjerite svoju e-poštu kako biste poništili lozinku</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/"><button  class="password-btn">Nastaviti</button></a>
						</div>
						@elseif(Session::has('notmatch'))
						<div class='alert alert-danger'><strong>Oprosti!</strong> E-mail i lozinka nisu se podudarali s bilo kojim računom</div>
						<div class="col-md-12 password-textfield-container-lastpart">
							<a href="/"><button  class="password-btn">Nastaviti</button></a>
						</div>
						@else
						<form role="form" method="post" action="/forgot_password_user/reset_password">
							{{csrf_field()}}	
							@if($errors->any())
							<p><font color="red"><center>{{$errors->first()}}</center></font></p>
							@endif	
							<div class="password-textfield-container">
								<label for="input-username" class="password-labels">Unesite svoju e-mail</label>
								<input type="text" name="email" class="form-control password-textfields">
							</div>
							<div class="password-textfield-container">
								<label for="input-username" class="password-labels">Unesite svoj primarni telefonski broj</label>
								<input type="text" name="phone" class="form-control password-textfields">
							</div>
							<div class="password-textfield-container-lastpart">
								<button type="submit" class="password-btn">Podnijeti</button>
							</div>
						</form>
						@endif
					</div>
				</div>
			</div>
		@endif
	</div>
</div>
@endsection