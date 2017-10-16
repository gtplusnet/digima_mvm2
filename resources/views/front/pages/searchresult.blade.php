@extends('front.layout.layout')
@section('title', 'Search Result')
@section('content')
<div class="banner-searchresult" style="background-image: url('/images/banner_registration.jpg')">
	<div class="container">
		
	</div>
</div>
<div class="container">
	<div>
	    <p class="searched-business">SEARCH RESULT FOR: <a class="search-link" href="">{{ $businessKeyword }}</a></p>
	</div>
	<div>
		<div class="col-md-8 search-table">
			<div class="sort-holder">
				<div class="pull-left">
					<select class="sort-select">
						<option value="" disabled selected>Sort By</option>
						<option></option>
						<option>Most Like</option>
						<option>Most Popular</option>
						<option>Newest</option>
						<option>---------------------</option>
					</select>
				</div>
				<div class="pull-right">
					<div class="sort-tabs">
						<div class="sort-icon-holder">
							<a class="sort-icon" href="/searchresult"><i class="glyphicon glyphicon-th-list"></i></a>
						</div>
						<div class="pull-right">
							<div class="sort-icon-holder">
								<a class="sort-icon" href="/searchtabular"><i class="glyphicon glyphicon-th"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-12 search-result-container">
				@if(count($businessResult) > 0)
					@foreach($businessResult as $businessResultItem)
						<div class="search-result-holder">
							<div class="col-md-5 business-profilepic-holder">
								<a href="/business">
									<img class="business-profilepic" src="/images/mcdo_pic.jpg" alt="Image">
								</a>
								<div class="icon-container">

									<iframe src="https://www.facebook.com/plugins/like.php?href=https%3A%2F%2Fmvm.dev&width=74&layout=button_count&action=like&size=large&show_faces=false&share=false&height=21&appId" width="74" height="28" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>&nbsp;&nbsp;
									
									<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://mvm.dev" data-size="large">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								</div>
							</div>
							<div class="col-md-7">
								<a href="/business_info?business_id={{ $businessResultItem->business_id }}"><p class="business-title">{{ $businessResultItem->business_name }}</p></a>
								<div class="business-details-holder">
									<div class="business-details">
										<i class="fa fa-phone details"></i><p>{{ $businessResultItem->business_phone }}</p>
									</div>
									<div class="business-details">
										<i class="material-icons details">location_on</i><p>{{ $businessResultItem->business_complete_address }}</p>
									</div>
								</div>
								<p>Description of the store Lorem ipsum dolor sit amet,  consectetur adipiscing elit. Nulla urna nunc,  ultrices venenatis acilisis ut,...<a target="blank" href="/business/details">Read More</a></p>
							</div>
						</div>
					@endforeach
					
				@else
					<h1><center>No Results Found.</center></h1>
				@endif
				<div class="col-md-12 tabularsort-pagination-section">
					<div class="pagination">
						<a class="active" href="#">1</a>
						<a href="#">2</a>
						<a href="#">3</a>
						<a href="#">4</a>
						<a href="#">5</a>
						<a href="#">6</a>
						<a href="#" class="pagination-next-btn">NEXT</a>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="search-listing-holder">
				<div class="search-listing-container">
					<p class="searchlisting-title">SEARCH LISTING</p>
				    <form>
				    	<div class="form-container">
						    <label class="form-label">Keyword</label>
						    <input class="box-format" type="text" name="keyword" placeholder="Search">
						</div>
						<div class="form-container">
						    <label class="form-label">Category</label>
						    <select class="box-format">
								<option value="" disabled selected>Select Category</option>
								<option></option>
								<option>Most Like</option>
								<option>Most Popular</option>
								<option>Newest</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="form-container">
						    <label class="form-label">Counties</label>
						    <select class="box-format">
								<option value="" disabled selected>Select County</option>
								<option></option>
								<option>Bjelovar-Bilogora</option>
								<option>Brod-Posavina</option>
								<option>Dubrovnik-Neretva</option>
								<option>---------------------</option>
							</select>
						</div>
						<div class="form-container">
						    <label class="form-label">ZIP Code</label>
						    <input class="box-format" type="text" name="zip_code" placeholder="Search">
						</div>
						<div>
					    	<input type="submit" value="Search" class="searchlisting-btn">
					    </div>
				    </form>
				</div>
			</div>
			<!-- <div class="featuredlist-holder">
				<div class="featuredlist-title-holder">
					<div>
						<p class="featuredlist-title">FEATURED LIST</p>
					</div>
				</div>
				<div class="featuredlist-container">
					<div class="featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
					<div class="featured-details-container">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
					<div class="featured-details-container-last">
					  	<img src="/images/jollibee_pic.jpg">
					  	<p class="business-name-title">Name of Business</p>
					</div>
				</div>
			</div> -->
			<div class="featuredlist-holder">
				<div class="featuredlist-title-holder">
					<p class="featuredlist-title">FEATURED LIST</p>
				</div>
				<div class="featuredlist-container">
			        <div id="carousel-pager" class="carousel slide featured-carousel" data-ride="carousel" data-interval="3000">
			            <!-- Carousel items -->
			            <div class="carousel-inner vertical inner-vertical-carousel">
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
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="1">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			                <div class="item">
			                    <div class="featured-details-container">
			                    	<div class="detail-picture-container">
			                    		<img src="/images/jollibee_pic.jpg" class="img-responsive detail-picture" data-target="#carousel-main" data-slide-to="2">
			                    	</div>
			                    	<div class="detail-name-container">	
			                    		<p class="detail-name-title">Name of Business</p>
			                    	</div>
			                    </div>
			                </div>
			            </div>			                
			            <!-- Controls -->
			            <a style="margin-top:40px;" class="left carousel-control features-control" href="#carousel-pager" role="button" data-slide="prev">
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
				  
				  for (var i=1;i<8;i++) {
				    next=next.next();
				    if (!next.length) {
				    	next = $(this).siblings(':first');
				  	}
				    
				    next.children(':first-child').clone().appendTo($(this));
				  }
				});
			</script>
		</div>
	</div>
</div>
@endsection