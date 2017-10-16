@extends('front.layout.layout')
@section('title', 'Category')
@section('content')
<div class="banner-category" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		<div class="pull-left">
            <div class="category-logo-container">
                <img class="category-logo" src="/images/food_logo.png">
                <p class="category-name">FOOD</p>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div>
		<div class="col-md-8 category-table">
			<div class="category-sort-holder">
				<div class="pull-left">
					<select class="category-sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="category-sort-tabs">
						<div class="category-sort-icon-holder">
							<a class="category-sort-icon" href="/category"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="category-sort-icon-holder">
								<a class="category-sort-icon" href="/resultsortgrid"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 category-result-container">
				<?php $fb = "facebook.com/AngDiaryNgLoyal/"; $twit = "twitter.com/iAmJames_35836"; ?>
				@foreach($business as $business_list)
				<div class="category-result-holder">

					<div class="col-md-5">
						<div class=" category-business-profilepic-holder">
						<a href="/business">
							<img class="category-business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
						</a>
						</div>
						<div class="category-icon-container">
							
							<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2F{{$fb}}&width=74&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId" width="88" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>&nbsp;&nbsp;
						<a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Fwww.usdirectory.com%2Fypr.aspx%3Fafid%3D0%26wqhqn%3D%26fromform%3Dqsearch%26qhqn%3Dmcd%26qc%3D%26rg%3D%26qs%3Dal&ref_src=twsrc%5Etfw&text=El%20Comal%20in%20Mc%20Calla%2C%20AL%20-%20&tw_p=tweetbutton&url=http%3A%2F%2Fwww.usdirectory.com%2Fsl%2F67205065%2Findex.htm%3Fafid%3D2170" class="twitter-share-button" data-size="large" data-show-count="false">Tweet</a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
					</div>
					<div class="col-md-7">
						<a href="/business/details"><p class="category-business-title">{{$business_list->business_name}}</p></a>
						<div class="category-business-details-holder">
							<div class="category-business-details">
								<i class="fa fa-phone category-details"></i><p>{{$business_list->business_phone}}<br>{{$business_list->business_alt_phone}}</p>
							</div>
							<div class="category-business-details">
								<i class="material-icons category-details">location_on</i><p>{{$business_list->business_complete_address}}</p>
							</div>
						</div>
						<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...</p>
					</div>
				</div>
				@endforeach
				{{-- pagination --}}
				<div class="col-md-12 tabularsort-pagination-section">
					{!! $business->render() !!}
					{{-- <div class="pagination">
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">5</a>
						<a href="#">6</a>
						<a href="#" class="pagination-next-btn">NEXT</a>
					</div> --}}
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="category-search-listing-holder">
				<div class="category-search-listing-container">
					<p class="category-searchlisting-title">SEARCH LISTING</p>
				    <form>
				    	<div class="category-form-container">
						    <label class="category-form-label">Keyword</label>
						    <input class="category-box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="category-form-container">
						    <label class="category-form-label">Category</label>
						    <select class="category-box-format selectpicker" data-live-search="true">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>

						</div>
						<div class="category-form-container">
						    <label class="category-form-label">Counties</label>
						    <select class="category-box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="category-form-container">
						    <label class="category-form-label">ZIP Code</label>
						    <input class="category-box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="category-searchlisting-btn">
					    </div>
				    </form>
				</div>
			</div>
			<div class="featuredlist-holder">
				<div class="featuredlist-title-holder">
					<p class="featuredlist-title">FEATURED LIST</p>
				</div>
				<div class="featuredlist-container">
			        <div id="carousel-pager" class="carousel slide featured-carousel" data-ride="carousel" data-interval="3000">
			            <!-- Carousel items -->
			            <div class="carousel-inner vertical inner-vertical-carousel">
			            	@foreach($featured as $featuring)
			                <div class="active item">
			                	<div class="featured-details-container">
			                		<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="0">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                @endforeach
			                
			            </div>			                
			            <!-- Controls -->
			            <a style="margin-top:30px;" class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
			                <span class="glyphicon glyphicon-chevron-up" aria-hidden="true"></span>
			                <span class="sr-only">Previous</span>
			            </a>
			            <a style="margin-top:20px;" class="right carousel-control features-control" href="#carousel-pager" role="button" data-slide="next">
			                <span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
			                <span class="sr-only">Next</span>
			            </a>
			        </div>
				</div>
			</div>
			<script type="text/javascript">
				$('.carousel .vertical .item').each(function(){
				  var next = $(this).next();
				  if (!next.length) {
				    next = $(this).siblings(':first');
				  }
				  next.children(':first-child').clone().appendTo($(this));
				  
				  for (var i=0;i<1;i++) {
				    next=next.next();
				    if (!next.length) {
				    	next = $(this).siblings(':first');
				  	}
				    
				    next.children(':first-child').clone().appendTo($(this));
				  }
				});
			</script>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
		</script>
		</div>
	</div>
</div>
@endsection