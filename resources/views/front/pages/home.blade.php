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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="javascript">
	
	$(document).ready(function()
	{
		$('#newpost').hide();
		$("#show_category").click(function()
		{
			
			$("#newpost").toggle();
			
     
		});
		$("#hide_me").click(function()
		{
			$("#newpost").hide();
		});
	});


    function showhide()
     {
           var div = document.getElementById("newpost");
    if (div.style.display !== "none") {
        div.style.display = "none";
	    }
	    else {
	        div.style.display = "inline-block";
	        div.style.position= "absolute";
	    }
     }
</script>
<div class="intro" style="background-image: url('/images/background_home.jpg')">
	<!-- HEADER NAVBAR HERE -->
	{{-- wag mo galawin --}}
	
	{{-- galawin mo to!! --}}
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
<div class="business-list-container">
	<div class="container">
		<div class="col-md-3">
			<div class="col-md-12">
				<div class="category-filter-holder">
					<div class="category-title-holder">
						<p class="categorylist-title">Your Filter</p>
					</div>
					<div class="categorylist-container">
						<ul class="category navbar-nav list-group">
							<li class="dropdown  dropdown-submenu list-group-item">Grade 10</li>
							<li class="dropdown  dropdown-submenu list-group-item">Grade 11</li>
							
						</ul>
					</div>
			   </div>
		    </div>
		    <div class="col-md-12">
				<div class="category-filter-holder">
					<div class="category-title-holder">
						<p class="categorylist-title">Category Filter</p>
					</div>
					<div class="categorylist-container">
						<ul class="category navbar-nav list-group">
							<li class="dropdown  dropdown-submenu list-group-item" id="show_category" >Click me</li>
							<div class="" id="newpost" style="width:500px !important;position:absolute;display:inline-block;transition: width 2s;background-color:#fff;display:inline;width:200px;z-index:1;border:1px solid #CCCCCC;">
							    <div style="background-color:#3D516D;padding:5px;color:#fff;text-align:center;font-size:20px;">Select Categories</div>
							    <div style="padding:10px;">
								    <ul class="list-group" >
										<li class="list-group-item">Grade 10</li>
										<li class="list-group-item">Grade 11</li>
										<li class="list-group-item">Grade 12</li>
										<li class="list-group-item">Grade 13</li>
										<li class="list-group-item">Grade 15</li>
										<li class="list-group-item">Grade 16</li>
									</ul>
							    </div>
							    <div style="text-align:center;margin-bottom: 20px;">
							    	<button type="button" id="hide_me" class="btn btn-success" style="text-align:center;padding:5px;" >Done</button>
								</div>
							</div>
							
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
					<p class="business-list-title">LOCAL FAVOURITES</p>
				</div>
				<div class="business-list-content">
					@foreach($_business_list as $business_list)
					<div class="col-md-4 per-business">
						<div class="business-img-holder">
							<img src="/images/walmart_pic.jpg">
						</div>
						<div class="business-info-holder">
							<div class="business-list-details">
								<div class="business-list-name"><a href="/business/{{$business_list->business_id}}">{{$business_list->business_name}}</a></div>
								<div class="business-list-phone">
									<p class="phone-text"><i class="fa fa-phone phone"></i>{{$business_list->business_phone}}</p>
								</div>
								<div class="business-list-map" style="height:70px;">
									<p  class="map-text"><i class="fa fa-map-marker map" ></i>{{$business_list->business_complete_address}}</p>
								</div>
							</div>
						</div>
						<div class="social-media-icon">
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fdigimawebsolutions&width=88&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId=275633406278448" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
							<iframe src="https://platform.twitter.com/widgets/tweet_button.html?size=l&url=https%3A%2F%2Fmvm.digimahouse.com/&via=iAmJames_35836&related=twitterapi%2Ctwitter&text=Croatia%20Directory%20Share&hashtags=TheRightPlaceForBusiness%2CSignUpNow" width="88" height="40" title="Twitter Tweet Button" style="border: 0; overflow: hidden;" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div>
					@endforeach
					<div class="col-md-12 pagination">
						{!! $_business_list->render() !!}
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
	{{-- JAVASCRIPTS --}}
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="/assets/js/front/search-registered-business.js"></script>
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