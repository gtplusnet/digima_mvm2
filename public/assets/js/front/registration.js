$(document).ready(function(){

	$('#county_list').change(function(){
		var county_id = $('#county_list').val();
		$('#postal_code').val("");

		if(county_id == "--Select County--")
		{
			$('#city_list').html('<option value="--No County Selected--">--No County Selected--</option>');
		}

		$.ajax({
			type:'POST',
			url:'/get_city',
			data:{county_id: county_id},
			dataType:'text',
			success:function(data){
			$('#city_list').html(data);
			}
		});
	});

	$('#city_list').change(function(){
		var city_id = $('#city_list').val();

		if(city_id == '--Select City--')
		{
			$('#postal_code').val("");
		}

		$.ajax({
			type:'POST',
			url:'get_zip_code',
			data:{city_id: city_id},
			dataType:'text',
			success:function(data){
			$('#postal_code').val(data);
		}
		});
		
	});

	$('#continue').click(function(){
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
		var agree_checkbox = $('#agree_checkbox').prop('checked');

		if(prefix == '--Select Prefix--')
		{
			$.growl.warning({ message: "Please select Prefix." });
		}
		else if(first_name == '')
		{
			$.growl.warning({ message: "Please enter First Name." });
		}
		else if(last_name == '')
		{
			$.notify('Please enter Last Name.', 'warn');
		}
		else if (atpos<1 || dotpos<atpos+2) 
		{
        	$.notify('Please enter a valid Email Address.', 'warn');
    	}
    	else if (password == '') 
		{
        	$.notify('Please enter password.', 'warn');
    	}
    	else if (retype_password == '') 
		{
        	$.notify('Please re-type password.', 'warn');
    	}	
    	else if(password != retype_password)
    	{
    		$.notify('Password and Re-type Password must be matched.', 'warn');
    	}
		else if(business_name == '')
		{
			$.notify('Please enter Business Name.', 'warn');
		}
		else if(primary_business_phone == '')
		{
			$.notify('Please enter Primary Business Phone.', 'warn');
		}
		else if(secondary_business_phone == '')
		{
			$.notify('Please enter Secondary Business Phone.', 'warn');
		}
		else if(business_address == '')
		{
			$.notify('Please enter Business Address.', 'warn');
		}
		else if(county_list == '--Select County--')
		{
			$.notify('Please select County.', 'warn');
		}
		else if(city_list == '--Select City--')
		{
			$.notify('Please select City.', 'warn');
		}
		else if(postal_code == '')
		{
			$.notify('Postal Code is required.', 'warn');
		}
		else if(agree_checkbox == false)
		{
			$.notify('Checkbox must be check if you want to receive offers from us.', 'warn');
		}
		else
		{
			$.ajax({
				type: 'POST',
				url: '/register_business',
				data: {business_name: business_name, city_list: city_list, business_address: business_address, primary_business_phone: primary_business_phone, secondary_business_phone: secondary_business_phone, fax_number: fax_number, facebook_url: facebook_url, twitter_username: twitter_username, prefix: prefix, first_name: first_name, last_name: last_name, email: email, password: password},
				success:function(data){
					if(data == 'Email has already been used.')
					{
						$.notify(data, 'warn');
					}
					else
					{
						$('form').trigger('reset');
						$.notify(data, 'success');
					}
				}		
			});
		}
	});

});