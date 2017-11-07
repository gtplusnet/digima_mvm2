@extends('front.layout.layout')
@section('title', 'Search Result')
@section('content')
<style>

.list-group
{
width:100%;
}
.list-group-item
{
width:100%;
}
#newpost
{

}
</style>
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.png')">
	<div class="container">
		
	</div>
</div>
<div class="container">
	<div class="business-list-container " id="show_list_filtered_category">
		<div class="container">
			<div class="col-md-3">
				<div class="col-md-12" >
			    	
					<div class="category-filter-holder" >
						
						<div class="category-title-holder" id="show_category">
							{{-- <p class="categorylist-title">Category Filter <i class="fa fa-arrow-right pull-right" aria-hidden="true"></i></p> --}}
							<p class="categorylist-title">Category Filter</p>
						</div>
						
						<div class="categorylist-container">
							<ul class="list-group" >
						    	@foreach($_categories as $categories)
						    	
								<li class="list-group-item categoryList" data-name="{{$categories->business_category_name}}" data-id="{{$categories->business_category_id}}">{{$categories->business_category_name}}</li>
								
								@endforeach
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
							<div  class="featured-carousel" >
								<div class="carousel-inner vertical inner-vertical-carousel">
									<div class="">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									<div class="">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									<div class="">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									{{-- @foreach($_business_list as $business_list) --}}
									<div class="">
										<div class="featured-details-container">
											<div class="detail-picture-container side-list-img-width">
												<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
											</div>
											<div class="detail-name-container">
												<p class="detail-name-title">Name of Business</p>
											</div>
										</div>
									</div>
									{{-- @endforeach --}}
								</div>
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
						
					  </div>
					<div class="col-md-12 pagination">
							{!! $_businessResult->render() !!}
						</div>
				</div>
				
			</div>
			
		</div>
	</div>
</div>
{{-- JAVASCRIPTS --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/assets/js/front/search-registered-business.js"></script>
	<script src="/assets/js/home_categories.js"></script>
	<script>
		$.ajaxSetup({
			headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>
	<script type="text/javascript">
			$('.carousel .vertical .item').each(function(){
			var next = $(this).next();
			if (!next.length) {
			next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
			
			for (var i=1;i<=1;i++) {
			next=next.next();
			if (!next.length) {
				next = $(this).siblings(':first');
				}
			
			next.children(':first-child').clone().appendTo($(this));
			}
			});
	</script>
	{{-- END OF JAVASCRIPTS --}}
@endsection