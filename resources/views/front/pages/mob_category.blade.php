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

<div class="business-list-container">
	<div class="container">
		<div class="mob-view" id="mob_list_filtered_category">
			
			<div class="business-list-holder">
				<p class="business-list-title transform-capitalize" >Filter Kategorije</p>
			</div>
			<div class="mob-category-filtered-list notranslate">
				<div class="category-menu">
					@foreach($_categories as $categories)
					&nbsp;&nbsp;>>&nbsp;<a class="filter" style="cursor: pointer;margin: 10px;color: #555555;font-weight: bold;" data-name="{{$categories->business_category_name}}" data-id="{{$categories->business_category_id}}">{{$categories->business_category_name}}</a>
					@endforeach
				</div>
				<div class="business-list-content row clearfix">
					@foreach($_business_list as $business_list)
					<div class="col-md-4 col-sm-4 col-xs-6 per-business">
						<div class="business-img-holder">
							<img class="home-image" src="{{$business_list->business_banner}}">
						</div>
						<div class="business-info-holder">
							<div class="business-list-details">
								<div class="business-list-name" style="height:50px;">
									@if(strlen($business_list->business_name) <= 30)
									<a class="notranslate" href="/business/{{$business_list->business_id}}">{{$business_list->business_name}}</a>
									@else
									<a  class="notranslate" href="/business/{{$business_list->business_id}}">{{substr($business_list->business_name,0, 40)}}...</a>
									@endif
								</div>
								<div class="business-list-phone">
									<p class="phone-text notranslate"><i class="fa fa-phone phone"></i>{{$business_list->business_phone}}</p>
								</div>
								<div class="business-list-map" style="height:70px;">
									<p  class="map-text notranslate"><i class="fa fa-map-marker map" ></i>{{$business_list->business_complete_address}}</p>
								</div>
							</div>
						</div>
						<div class="social-media-icon">
							@if($business_list->facebook_url=="")
							<iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href=http://www.facebook.com/digimawebsolutions&width=88&layout=button&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="65" height="40" title="Facebook Like Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							@else
							<iframe class="facebook" src="https://www.facebook.com/plugins/like.php?href={{$business_list->facebook_url}}&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="80" height="40" title="Facebook Like Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							@endif
							<iframe class="twitter" src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url={{$business_list->twitter_url}}/&via=mvm.digimahouse.com&related=twitterapi%2Ctwitter&text=Croatia%20Directory%20Share&hashtags=TheRightPlaceForBusiness%2CSignUpNow" width="80" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div>
					@endforeach
					<div class="col-md-12 pagination">
						{!! $_business_list->render() !!}
					</div>
				</div>
			</div>
		</div>
		<div class="row clearfix">
			<div class="col-md-3">
				<div class="category-filter-holder" >
					<div class="category-title-holder" id="show_category">
						<p class="categorylist-title transform-capitalize">Filter Kategorije</p>
					</div>
					<div class="categorylist-container">
						<ul class="list-group" >
							@foreach($_categories as $categories)
							<li class="list-group-item categoryList"  style="cursor:pointer;" data-name="{{$categories->business_category_name}}" data-id="{{$categories->business_category_id}}">{{$categories->business_category_name}}</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="featuredlist-holder">
					<div class="featuredlist-title-holder">
						<p class="featuredlist-title transform-capitalize">Istaknuti Popis</p>
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
												<p class="detail-name-title notranslate"><a href="/business/{{$featured_list->business_id}}">{{$featured_list->business_name}}</a></p>
												@else
												<p class="detail-name-title notranslate"><a href="/business/{{$featured_list->business_id}}">{{substr($featured_list->business_name,0, 13)}}...</a></p>
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
				<div class="featuredlist-holder">
					<div class="featuredlist-title-holder">
						<p class="featuredlist-title transform-capitalize">Najgledanije</p>
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
											<p class="detail-name-title notranslate"><a href="/business/{{$most_viewed->business_id}}">{{$most_viewed->business_name}}</a><br><font size="1">Pregledi: {{$most_viewed->business_views}}</font></p>
											@else
											<p class="detail-name-title notranslate"><a href="/business/{{$most_viewed->business_id}}">{{substr($most_viewed->business_name,0, 13)}}...</a><br><font size="1">Pregledi: {{$most_viewed->business_views}}</font></p>
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
	</div>
</div>
<!-- JAVASCRIPTS -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="/assets/js/mob_categories.js"></script>

<!-- MATCH HEIGHT -->
<script src="/assets/js/front/match-height.js"></script>
<script>
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
</script>
<script type="text/javascript">
		$('.match-height').matchHeight();
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