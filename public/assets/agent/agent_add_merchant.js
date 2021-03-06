var agent_add_merchant = new agent_add_merchant();

function agent_add_merchant()
{
	init();

	function init()
	{
		ready_document();
	}

	function ready_document()
	{
		$(document).ready(function()
		{
			
			get_county_city();
			add_merchant_submit();
		});
	}
	function get_county_city()
	{
		$('body').on('change','#county_id',function()
		{
			var county_id = $('#county_id').val();
			$('#postal_code').val("");
			if(county_id == '')
			{
				$('#city_list').html('<option value=""></option>');
			}

			$.ajax({
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type:'POST',
				url:'/agent/get_city',
				data:{county_id: county_id},
				dataType:'text',
				success:function(data){
				$('#city_list').html(data);
				}
			});
		});
		$('body').on('change','#city_list',function()
		{
			var city_id = $('#city_list').val();
			if(city_id == '')
			{
				$('#postal_code').val("");
			}
			$.ajax({
				headers: {
			      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				type:'POST',
				url:'/agent/get_postal_code',
				data:{city_id: city_id},
				dataType:'text',
				success:function(data){
				$('#postal_code').val(data);
			}
			});
			
		});
	}
	function add_merchant_submit()
	{
		$('body').on('click','#continue',function()
		{
			var prefix = $('#prefix').val();
			var first_name = $('#first_name').val();
			var last_name = $('#last_name').val();
			var email = $('#email_address').val();
			var atpos = email.indexOf("@");
	   	    var dotpos = email.lastIndexOf(".");
	   	    var password = $('#password').val();
	   	    var facebook_url = $('#facebook_url').val();
	   	    var twitter_username = $('#twitter_username').val();
	   	    var retype_password = $('#retype_password').val();
			var business_name = $('#business_name').val();
			var primary_business_phone = $('#primary_business_phone').val();
			var secondary_business_phone = $('#secondary_business_phone').val();
			var fax_number = $('#fax_number').val();
			var business_address = $('#business_address').val();
			var county_list = $('#county_list').val();
			var city_list = $('#city_list').val();
			var postal_code = $('#postal_code').val();
			var membership = $('#membership').val();
			var agree_checkbox = $('#agree_checkbox').prop('checked');

			if(prefix == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please select Prefix.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(first_name == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter First Name.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(last_name == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter Last Name.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if (atpos<1 || dotpos<atpos+2) 
			{
	        	iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter a valid Email Address.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
	    	}
			else if(business_name == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter Business Name.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(primary_business_phone == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter Primary Business Phone.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(secondary_business_phone == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter Secondary Business Phone.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(primary_business_phone == secondary_business_phone)
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Primary and Secondary Business phone must not be the same.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(business_address == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please enter Business Address.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(county_list == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please select County.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(city_list == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Please select City.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(postal_code == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Postal Code is required.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			else if(membership == '')
			{
				iziToast.warning({
				    title: 'Caution',
				    message: 'Membership is required.',
				    position: 'topRight',
				    transitionIn: 'fadeInDown',
				    transitionOut: 'fadeOutUp'
				});
			}
			
			else
			{
				$.ajax({
					headers: {
				      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					method: 'POST',
					url: '/add_client_submit',
					data: {business_name: business_name, city_list: city_list, business_address: business_address, primary_business_phone: primary_business_phone, secondary_business_phone: secondary_business_phone, fax_number: fax_number, facebook_url: facebook_url, twitter_username: twitter_username, prefix: prefix, first_name: first_name, last_name: last_name, email: email, password: password,membership: membership},
					success:function(data){
						if(data == 'Email has already been used.')
						{
							iziToast.warning({
							    title: 'Caution',
							    message: data,
							    position: 'topRight',
							    transitionIn: 'fadeInDown',
							    transitionOut: 'fadeOutUp'
							});
						}
						else
						{
							window.location = '/success';
							$('form').trigger('reset');
						}
					}		
				});
			}
		});
	}
}

