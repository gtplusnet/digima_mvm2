@extends('front.layout.layout')
@section('title', 'Home')
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
<div class="intro" style="background-image: url('/images/background_home.jpg')">
	<div class="container">
		<div class="">
			<div class="col-md-12 searchbox-container">
				<p class="introduction">THE <font class="yellow">RIGHT</font> PLACE</p>
				<p class="second-line">FOR BUSINESS</p>
			</div>
			<div class="col-md-1">
			</div>
			
			<div class="col-md-1">
			</div>
		</div>
	</div>
</div>

<div class="business-list-container" id="show_list_filtered_category">
	<div class="container">
		<div class="col-md-3">
			<div class="col-md-12" >
				<div class="category-filter-holder" >
					
					<div class="category-title-holder" id="show_category">
						<p class="categorylist-title">Category Filter</p>
					</div>
					
					<div class="categorylist-container">
						<ul class="list-group" >
							@foreach($_categories as $categories)
							<li class="list-group-item categoryList"  style="cursor:pointer;" data-name="{{$categories->business_category_name}}" data-id="{{$categories->business_category_id}}">{{$categories->business_category_name}}</li>
							@endforeach
						</ul>
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
											<img src="/images/arabian_nights_pic01.png" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
										</div>
										<div class="detail-name-container">
											<p class="detail-name-title">CROATIA</p>
										</div>
									</div>
								</div>
								@foreach($_featured_list as $featured_list)
								<div class=" item">
									<div class="featured-details-container">
										<div class="detail-picture-container side-list-img-width">
											<img src="{{$featured_list->business_banner}}" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
										</div>
										<div class="detail-name-container">
											<div class="detail-name-container">
												@if(strlen($featured_list->business_name) <= 14)
												<p class="detail-name-title"><a href="/business/{{$featured_list->business_id}}">{{$featured_list->business_name}}</a></p>
												@else
												<p class="detail-name-title"><a href="/business/{{$featured_list->business_id}}">{{substr($featured_list->business_name,0, 13)}}...</a></p>
												@endif
											
											</div>
											
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
			</div>
			<div class="col-md-12">
				<div class="featuredlist-holder">
					<div class="featuredlist-title-holder">
						<p class="featuredlist-title">MOST VIEWED</p>
					</div>
					<div class="featuredlist-container side-list-padding">
						<div  class="featured-carousel" >
							<div class="carousel-inner vertical inner-vertical-carousel">
								@foreach($_most_viewed as $most_viewed)
								<div class="">
									<div class="featured-details-container">
										<div class="detail-picture-container side-list-img-width">
											<img src="{{$most_viewed->business_banner}}" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
										</div>
										<div class="detail-name-container">
											@if(strlen($most_viewed->business_name) <= 14)
											<p class="detail-name-title"><a href="/business/{{$most_viewed->business_id}}">{{$most_viewed->business_name}}</a><br><font size="1">views: {{$most_viewed->business_views}}</font></p>
											@else
											<p class="detail-name-title"><a href="/business/{{$most_viewed->business_id}}">{{substr($most_viewed->business_name,0, 13)}}...</a><br><font size="1">views: {{$most_viewed->business_views}}</font></p>
											@endif
											
										</div>
									</div>
								</div>
								@endforeach
								
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
		<div class="col-md-9" >
			<div class="col-md-12">
				<div class="business-list-holder">
					<p class="business-list-title">LOCAL FAVOURITES</p>
				</div>
				<div class="business-list-content">
					@foreach($_business_list as $business_list)
					<div class="col-md-4 per-business">
						<div class="business-img-holder">
							<img src="{{$business_list->business_banner}}">
						</div>
						<div class="business-info-holder">
							<div class="business-list-details">
								<div class="business-list-name" style="height:50px;">
									@if(strlen($business_list->business_name) <= 30)
									<a href="/business/{{$business_list->business_id}}">{{$business_list->business_name}}</a>
									@else
									<a href="/business/{{$business_list->business_id}}">{{substr($business_list->business_name,0, 40)}}...</a>
									@endif
								</div>
								<div class="business-list-phone">
									<p class="phone-text"><i class="fa fa-phone phone"></i>{{$business_list->business_phone}}</p>
								</div>
								<div class="business-list-map" style="height:70px;">
									<p  class="map-text"><i class="fa fa-map-marker map" ></i>{{$business_list->business_complete_address}}</p>
								</div>
							</div>
						</div>
						<div class="social-media-icon">
							@if($business_list->facebook_url=="")
							<iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href=http://www.facebook.com/digimawebsolutions&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    		@else
							<iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href={{$business_list->facebook_url}}&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    		@endif
                    		<iframe class="twitter" src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url={{$business_list->twitter_url}}/&via=mvm.digimahouse.com&related=twitterapi%2Ctwitter&text=Croatia%20Directory%20Share&hashtags=TheRightPlaceForBusiness%2CSignUpNow" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                    	</div>
					</div>
					@endforeach
					<div class="col-md-12 pagination">
						{!! $_business_list->render() !!}
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="payment-containers col-md-12 " style="margin-bottom:50px;">
						<div class="payment-title col-md-12">
							SUBMIT YOUR BUSINESS UNDER THE BEST OFFERS
							<br>
						</div>
						<div class="col-md-12 payment-content " style="margin-bottom:100px;">
							@foreach($_membership as $membership)
							<div class="col-md-5 package-container">
								<div class="membership-offer">
									{{$membership->membership_name}}
								</div>
								<hr>
								<div class="membership-price">
									<span >${{$membership->membership_price}}/</span><span >MONTH</span>
								</div>
								<hr>
								<div class="membership-details">
									<p class="membership-details-text">
										{{$membership->membership_info}}
									</p>
								</div>
								<div class="membership-btn">
									<a href="/registration">
										<button type="button" class="membership-button">GET STARTED NOW</button>
									</a>
								</div>
							</div>
							@endforeach
							
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

{{-- END OF JAVASCRIPTS --}}
@endsection