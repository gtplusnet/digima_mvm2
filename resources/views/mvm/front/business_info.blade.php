@extends('mvm.front.front_layout')

@section('content')
	<div class="business-info-form">
	 	@foreach($business_info as $business_info)
	 		<div class="business-info-content">
	 			<div class="business-info-name" style="background-color: black; padding-left: 12px; padding-top: 10px; padding-bottom: 5px;">
	 				<p style="font-size: 30px; color: #FFFFFF;">{{ $business_info->business_name }}</p>
	 				<p style="font-size: 14px; color: #FF4500; font-style: italic;">Complete Address : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->business_complete_address }}</span></p>
	 				<p style="font-size: 14px; color: #00FF00; font-style: italic;">Business Phone : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->business_phone }}</span></p>
	 				<p style="font-size: 14px; color: #00FF00; font-style: italic;">Business Alt. Phone : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->business_alt_phone }}</span></p>
	 				<p style="font-size: 14px; color: #00FF00; font-style: italic;">Fax Number : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->business_fax }}</span></p>
	 				<p style="font-size: 14px; color: #4169E1; font-style: italic;">Facebook URL : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->facebook_url }}</span></p>
	 				<p style="font-size: 14px; color: #00BFFF; font-style: italic;">Twitter Username : <span style="color: #FFFFFF; font-style: normal;">{{ $business_info->twitter_url }}</span></p>
	 			</div>
	 			<div style="background-color: #800000; margin-top: 10px; padding: 10px 10px;">
	 				<p style="color: #FFFFFF; font-size: 14px; text-align: justify;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales odio quis porta laoreet. Ut iaculis sollicitudin venenatis. Nulla ac sapien et leo lobortis porttitor. Etiam rhoncus, nibh finibus mollis laoreet, leo lorem blandit ipsum, venenatis rutrum erat ipsum et sem. Quisque consequat mauris sit amet nulla interdum, ac interdum mauris venenatis. Nulla luctus facilisis est nec condimentum. Quisque nec ante quam. Ut vel tincidunt elit, sit amet tincidunt sem. Donec in condimentum dolor. Nunc pharetra mauris lectus, eu tincidunt lectus consectetur nec. Nullam lectus neque, viverra sit amet justo at, sollicitudin lobortis est. Mauris et viverra metus, quis facilisis mi.

					Nulla pellentesque, nunc eget lobortis tempor, leo sapien posuere mi, ut aliquet quam nunc laoreet augue. Etiam eros felis, fringilla in dignissim pellentesque, pulvinar in mauris. Donec a quam sed mi mattis gravida. Nulla id aliquet tellus. Donec vitae lacinia elit, mollis faucibus urna. Nam lobortis pulvinar odio, vitae gravida mauris convallis eu. Aenean bibendum molestie sapien id ullamcorper. Morbi porta ultrices lectus nec convallis.

					Nulla dolor turpis, condimentum sit amet ipsum nec, auctor vestibulum libero. Nam ut elit ultricies, aliquet erat vel, mollis ipsum. Sed eget sodales sapien. In vel faucibus enim. Sed accumsan ut leo vitae condimentum. Donec luctus tellus ex. Pellentesque et erat aliquam, porttitor neque ac, ultricies metus. Vivamus eget aliquet nisl, quis tristique est. Vestibulum vitae tristique dui. Etiam tristique, elit at tristique aliquam, dui tellus faucibus nulla, feugiat congue augue ipsum in urna. Maecenas sit amet felis finibus, dapibus ex a, tincidunt purus. Duis a accumsan libero. Sed quis felis ullamcorper eros ullamcorper ullamcorper. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque fringilla luctus sem, at ultrices nisl. Sed at dolor vitae nulla blandit venenatis ut ac elit.

					Etiam in urna eu nunc hendrerit maximus. Vestibulum lectus massa, ullamcorper in neque ut, ornare molestie nisi. Sed sed cursus justo. In orci turpis, mattis in vestibulum vel, ultrices sed nulla. Sed at leo quis dui fringilla faucibus. Praesent erat massa, fringilla sed ante at, scelerisque mattis diam. Curabitur efficitur viverra viverra.

					Maecenas dictum hendrerit dui, at efficitur leo dignissim et. Mauris consequat, risus gravida ornare blandit, ligula sapien convallis erat, eu aliquam turpis nisi sed velit. Aliquam in tempor lacus. Morbi scelerisque non nisl in sodales. Ut ornare tempus tellus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Proin tristique convallis eros, ac semper lectus luctus nec. Vivamus eget faucibus metus. Vivamus facilisis lectus diam. Maecenas a aliquam neque. Nunc scelerisque neque id elementum ultricies.</p>
	 			</div>
	 		</div>
	 	@endforeach
 	</div>
@endsection