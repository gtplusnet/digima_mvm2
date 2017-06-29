@extends('front.layout.layout')
@section('content')
<div class="container">
	<div class="col-md-4 div-home-featured">
		<div class="container">
			<table>
				<tbody>
					<tr>
						<td>
							<p class="title-featured-business">Featured Business</p>
						</td>
					</tr>
					<tr>
						<td>
							<div class="box-featured">
								<ul>
									<li><a href="">Restaurant fast Food</a></li>
									<li><a href="">Foods Carry Out & Delivery</a></li>
									<li><a href="">Restaurants</a></li>
								</ul>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<p class="title-mostviewed-business">Most Viewed Business</p>
						</td>
					</tr>
					<tr>
						<td>
							<div class="box-mostviewed">
								<select class="mostviewed-selectbox" multiple>
									<option value="mcdo-ak">McDonalds (AK)</option>
  									<option value="mcdo-al">McDonalds (AL)</option>
  									<option value="mcdo-atlanta-ca">McDonalds (Atlanta, CA)</option>
  									<option value="jollibee-ak">Jollibee (AK)</option>
  									<option value="jollibee-al">Jollibee (AL)</option>
  									<option value="jollibee-atlanta-ca">Jollibee (Atlanta, CA)</option>
  									<option value="mang-inasal-hk">Mang Inasal (HK)</option>
								</select>
							</div>
						</td>
					</tr>
				</tbody>
			</table>			
		</div>	
	</div>
	<div class="col-md-8">
		<div class="container-fluid">
			<div>
				<p class="title-local-favorites">Local Favorites</p>
			</div>
			<div class="local-favorites-holder">
				<div class="container-fluid local-favorites">	
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<a href="/business"><img class="business-logo-favorites" src="/images/mcdo_logo.jpg"></a>
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<img class="business-logo-favorites" src="/images/mcdo_logo.jpg">
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<img class="business-logo-favorites" src="/images/mcdo_logo.jpg">
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<img class="business-logo-favorites" src="/images/mcdo_logo.jpg">
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<img class="business-logo-favorites" src="/images/mcdo_logo.jpg">
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="favorites-holder col-md-6">
						<div class="favorites">							
							<div>
								<img class="business-logo-favorites" src="/images/mcdo_logo.jpg">
							</div>
							<div class="business-details">
								<p class="details-name">McDonald's Restaurant</p>
								<p class="details-address">6005 Central Avenue, Pheonix AZ, 85042</p>
								<ul class="call-or-send-section">
									<i class="glyphicon glyphicon-earphone"></i><li class="call-or-send"><a href="">Call Now</a></li>
									<i class="glyphicon glyphicon-phone"></i><li class="call-or-send"><a href="">Send To Email</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="container-fluid">
					<ul class="pagination">
						<li><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection