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
		var business_name = $('#business_name').val();
		var business_phone = $('#business_phone').val();
		var business_address = $('#business_address').val();
		var county_list = $('#county_list').val();
		var city_list = $('#city_list').val();
		var postal_code = $('#postal').val();
		var agree_checkbox = $('#agree_checkbox').prop('checked');

		if(prefix == '--Select Prefix--')
		{
			$.notify('Please select Prefix.', 'warn');
		}
		else if(first_name == '')
		{
			$.notify('Please enter First name.', 'warn');
		}
		else if(last_name == '')
		{
			$.notify('Please enter Last Name.', 'warn');
		}
		else if (atpos<1 || dotpos<atpos+2) 
		{
        	$.notify('Please enter a valid Email Address.', 'warn');
    	}	
		else if(business_name == '')
		{
			$.notify('Please enter Business Name.', 'warn');
		}
		else if(business_phone == '')
		{
			$.notify('Please enter Business Phone.', 'warn');
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
			$.notify('Checkbox must be checked to proceed in the next step.', 'warn');
		}
		else
		{
			
		}
	});

});