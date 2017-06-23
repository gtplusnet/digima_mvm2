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
			url:'/agent/get_city',
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
			url:'/agent/get_zip_code',
			data:{city_id: city_id},
			dataType:'text',
			success:function(data){
			$('#postal_code').val(data);
		}
		});
		
	});
});