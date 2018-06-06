<div class="category-history category-menu">
	<a href="/mob/category">Back to Top</a><br><br>
	@foreach($_filtered as $key=>$filtered)
	&nbsp;&nbsp;BACK >>&nbsp;<a class="filter" style="cursor: pointer;margin: 10px;color: #555555;font-weight: bold;" data-name="{{$filtered}}" data-id="{{$value[$key]}}">{{$filtered}}</a><br><br>
	@endforeach
</div>
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