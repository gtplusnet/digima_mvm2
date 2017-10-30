@extends('front.layout.layout')
@section('title', 'Search Result')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		
	</div>
</div>
<div class="container">
	<div class="business-list-container">
		<div class="container">
			<div class="col-md-3">
				<div class="col-md-12">
					<div class="category-filter-holder">
						<div class="category-title-holder">
							<p class="categorylist-title">Category Filter</p>
						</div>
						<div class="categorylist-container">
							<ul class="list-group">
								<li class="list-group-item">First item</li>
								<li class="list-group-item">Second item</li>
								<li class="list-group-item">Third item</li>
								<li class="list-group-item">First item</li>
								<li class="list-group-item">Second item</li>
								<li class="list-group-item">Third item</li>
								<li class="list-group-item">First item</li>
								<li class="list-group-item">Second item</li>
								<li class="list-group-item">Third item</li>
								<li class="list-group-item">First item</li>
								<li class="list-group-item">Second item</li>
								<li class="list-group-item">Third item</li>
								
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="featuredlist-holder">
						<div class="featuredlist-title-holder">
							<p class="featuredlist-title">MOST VIEWED</p>
						</div>
						<div class="featuredlist-container side-list-padding">
							<div id="carousel-pager" class="carousel slide featured-carousel" data-ride="carousel" data-interval="3000">
								<!-- Carousel items -->
								<div class="carousel-inner vertical inner-vertical-carousel">
									<div class="active item">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									@foreach($_business_list as $business_list)
									<div class="item">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									<div class="item">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
								<!-- Controls -->
								<a  class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a  class="right carousel-control features-control" href="#carousel-pager" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="featuredlist-holder">
						<div class="featuredlist-title-holder">
							<p class="featuredlist-title">FEATURED LIST</p>
						</div>
						<div class="featuredlist-container side-list-padding">
							<div id="carousel-pager" class="carousel slide featured-carousel" data-ride="carousel" data-interval="3000">
								<!-- Carousel items -->
								<div class="carousel-inner vertical inner-vertical-carousel">
									<div class="active item">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									@foreach($_business_list as $business_list)
									<div class="item">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
								<!-- Controls -->
								<a  class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
									<span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a  class="right carousel-control features-control" href="#carousel-pager" role="button" data-slide="next">
									<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				
				<div class="col-md-12">
					<div class="business-list-holder">
						<p class="business-list-title">SEARCH RESULT FOR: <a class="search-link" href="">{{ $businessKeyword }}</a></p>
					</div>
					<div class="business-list-content">
						@foreach($_businessResult as $businessResult)
						<div class="">
						<div class="col-md-3 per-business" >
							<div class="business-img-holder" style="margin-bottom: 10px;">
								<img src="/images/walmart_pic.jpg">
							</div>
							<div class="social-media-icon">
								<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fdigimawebsolution&width=63&layout=button&action=like&size=large&show_faces=false&share=false&height=65&appId=275633406278448" width="82" height="40" title="Twitter Tweet Button" style="padding-right:10px;border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
								<iframe src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https%3A%2F%2Fmvm.digimahouse.com/&via=iAmJames_35836&related=twitterapi%2Ctwitter&text=Croatia%20Directory%20Share&hashtags=TheRightPlaceForBusiness%2CSignUpNow" width="80" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
								{{-- <button class="btn btn-default">Facebook</button><button class="btn btn-default">Twitter</button> --}}
							</div>
							
						</div>
						<div class="col-md-3 per-business">
							
							<div class="business-info-holder">
								<div class="business-list-details">
									<div class="business-list-name"><a href="/business/{{$businessResult->business_id}}" style=""> {{$businessResult->business_name}}</a></div>
									<div class="business-list-phone">
										<p class="phone-text"><i class="fa fa-phone phone"></i>{{$businessResult->business_phone}}</p>
									</div>
									<div class="business-list-map">
										<p class="map-text"><i class="fa fa-map-marker map" ></i>{{$businessResult->business_complete_address}}</p>
									</div>
								</div>
							</div>
							
						</div>
					    </div>
						@endforeach
						{{-- <div class="col-md-4">
						</div> --}}
						
						{{-- <div class="pagination">
							<a class="active" href="#">1</a>
							<a href="#">2</a>
							<a href="#">3</a>
							<a href="#">4</a>
							<a href="#">5</a>
							<a href="#">6</a>
							<a href="#" class="pagination-next-btn">NEXT</a>
						</div> --}}
						<div class="col-md-12 pagination">
							{!! $_businessResult->render() !!}
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="payment-containers">
						<div class="payment-title">
							SUBMIT YOUR BUSINESS UNDER THE BEST OFFERS
							<br>
						</div>
						<div class="col-md-12 payment-content">
							<div class="col-md-5 package-container">
								<div class="membership-offer">
									PREMIUM PACKAGE
								</div>
								<hr>
								<div class="membership-price">
									<span >$52,500 / </span><span >month</span>
								</div>
								<hr>
								<div class="membership-details">
									<p class="membership-details-text">
										Sadly, none of them were ok, and I can't seem to find out any other option.
										The first and second button are displayed
										on same line, but the third is displayed lower... Can you help me?
									</p>
								</div>
								<div class="membership-btn">
									<a href="/registration">
									  <button type="button" class="membership-button">GET STARTED NOW</button>
									</a>
								</div>
								
							</div>
							<div class="col-md-5 package-container">
								<div class="membership-offer">
									PLATINUM PACKAGE
								</div>
								<hr>
								<div class="membership-price">
									<span >$5,500 / </span><span >month</span>
								</div>
								<hr>
								<div class="membership-details">
									<p class="membership-details-text">
										Sadly, none of them were ok, and I can't seem to find out any other option.
										The first and second button are displayed
										on same line, but the third is displayed lower... Can you help me?
									</p>
								</div>
								<div class="membership-btn">
									<a href="/registration">
									  <button type="button" class="membership-button">GET STARTED NOW</button>
									</a>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection