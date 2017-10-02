<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- WAG TANGGALIN -->
        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <link rel="stylesheet" href=" https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="/initializr/css/bootstrap.min.css">
        <link rel="stylesheet" href="/initializr/css/bootstrap-theme.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,700" rel="stylesheet">
       
        <script src="/initializr/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <!-- HANGGANG DITO -->

        <!-- CSS KO -->
        <link rel="stylesheet" type="text/css" href="/css/global.css">
        <link rel="stylesheet" type="text/css" href="/css/home.css">
        <!-- HANGGANG DITO -->
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
<!-- <div class="intro" style="background-image: url('/images/background_home.jpg')"> -->
    <div class="header-nav">
		<div class="container">
			<table>
				<tbody>
					<tr>
						<td class="td-left">
							<div class="header-left">
								<div class="header-logo">
									<img src="/images/yellow-finger-logo.jpg">
								</div>
								<div class="header-title">
									<div class="title">
										<p>Croatia Directory</p>
									</div>
								</div>
							</div>
						</td>
						<td class="td-right">
							<div class="header-right">
								<div class="header-nav-bar">
									<ul>
										<li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/">Home</a></li>
										<li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/">About</a></li>
										<li class="{{ Request::segment(1) == '' ? 'active' : '' }}"><a href="/">Contact Us</a></li>
										<button class="btn btn-login"><i class="fa fa-power-off"> Log in</i></button>
										<button class="btn btn-register"><i class="fa fa-plus-square"> Register</i></button>
									</ul>
								</div>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="intro" style="background-image: url('/images/background_home.jpg')">	
		<div class="container">
			<table class="container-searchbox">
				<tbody>
					<tr>
						<td>
							<p class="introduction">THE <font class="yellow">RIGHT</font> PLACE</p>
							<p class="second-line">FOR BUSINESS</p>
						</td>
					</tr>
					<tr>
						<td>
							<form class="form-search">
								<div class="spacer">
									<div class="form-spacer">
										<input class="business-name-textbox" type="text" name="business_name" placeholder="Business, Category or Keyword...">
										<select class="counties-zipcode-selectbox">
											<option value="" disabled selected>Counties or ZIP Code...</option>
											<optgroup label="Counties">
												<option>Zagreb County</option>
												<option>Dubrovnik–Neretva County</option>
												<option>Split-Dalmatia County</option>
												<option>---------------------</option>
											</optgroup>
											<optgroup label="ZIP Codes">
												<option>10000</option>
												<option>20000</option>
												<option>21000</option>
												<option>-----</option>
											</optgroup>
										</select>
										<button class="btn btn-search"><i class="fa fa-search"> Search</i></button>
									</div>
								</div>
							</form>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	@yield('content')
	<div class="footer-layer">
		<div class="container">
			<table>
				<tbody>
					<tr>
						<td>
							<div class="container">
								<p class="footer-firstline">COPYRIGHT 2017 © CROATIA DIRECTORY. ALL RIGHTS RESERVED</p>
								<p class="footer-secondline">POWERED BY DIGIMA WEB SOLUTIONS</p>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="container">
			<table class="links">
				<tbody>
					<tr>
						<td>
							<div class="holder">
								<i class="fa fa-facebook"></i>
							</div>
						</td>
						<td>
							<div class="holder">
								<i class="fa fa-twitter"></i>
							</div>
						</td>
						<td>
							<div class="holder">
								<i class="fa fa-instagram"></i>
							</div>
						</td>
						<td>
							<div class="holder">
								<i class="fa fa-pinterest-p"></i>
							</div>
						</td>
						<td>
							<div class="holder">
								<i class="fa fa-google-plus"></i>
							</div>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
<!-- </div> -->

		<!-- DITO ANG SCRIPT -->
    	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="/initializr/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
        <script src="/initializr/js/vendor/bootstrap.min.js"></script>
        <!-- HANGGANG DITO -->
    </body>
</html>
