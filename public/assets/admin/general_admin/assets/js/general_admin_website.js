var manage_website = new manage_website();


function manage_website()
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
			add_membership();
			add_county();
			add_city();
			// add_category();
			// update_membership();
			action_submit_edit();
			action_box();
		});
	}

	function add_membership()
	{ 
		$('#addMembership').click(function(){
        var membershipName = $('#membershipName').val();
		var membershipPrice = $('#membershipPrice').val();
		$.ajax({
			type:'POST',
			url:'/general_admin/manage_website/add_membership',
			data:{
				membershipName: membershipName,
				membershipPrice: membershipPrice
				},
			dataType:'text',

		}).done(function(data){
			    $('#membership_alert').html(data);
			    setTimeout(location.reload.bind(location), 1000);
			});
	    });
	}
	function add_county()
	{ 
		$('#addCounty').click(function(){
        var countyName = $('#countyName').val();
		$.ajax({
			type:'POST',
			url:'/general_admin/manage_website/add_county',
			data:{
				countyName: countyName,
				},
			dataType:'text',

		}).done(function(data){
			    $('#county_alert').html(data);
			    setTimeout(location.reload.bind(location), 1000);
			});
	    });
	}
	
	function add_city()
	{ 
		$('#addCity').click(function(){
			alert();
        var countyID = $('#countyID').val();
        var cityName = $('#cityName').val();
        var cityZip = $('#cityZip').val();
        $.ajax({
			type:'POST',
			url:'/general_admin/manage_website/add_city',
			data:{
				countyID: countyID,
				cityName: cityName,
				cityZip: cityZip,
				},
			dataType:'text',

		}).done(function(data){
			    $('#city_alert').html(data);
			    setTimeout(location.reload.bind(location), 1000);
			});
	    });
	}

	function action_box()
	{ 
		//agent
		$('.mem_action').change(function(){
		if ($(this).val() == "edit") {
			
	    	var mem_id = $(this).data("id");
	        var mem_name = $(this).data("name");
	        var mem_price = $(this).data("price");
	        $("#mem_id_edit").val(mem_id);
	        $("#mem_name_edit").val(mem_name);
	        $("#mem_price_edit").val(mem_price);

	        $('#editMem').modal('show');
        }
		if ($(this).val() == "delete") {
	    	var mem_id = $(this).data("id");
	        $("#delete_id").val(mem_id);
	        $("#delete_link").val('delete_membership');
	        $('#deleteModal').modal('show');
        }
	    });

	    $('.count_action').change(function(){
	    if ($(this).val() == "edit") {
	    	var count_id_edit = $(this).data("id");
	    	var count_name_edit = $(this).data("name");
	        $("#count_id_edit").val(count_id_edit);
	        $("#count_name_edit").val(count_name_edit);
	        $('#editCounty').modal('show');
        }
        if ($(this).val() == "delete") {
	    	var count_id = $(this).data("id");
	        $("#delete_id").val(count_id);
	        $("#delete_link").val('delete_county');
	        $('#deleteModal').modal('show');
        }
	    });

	    $('.city_action').change(function(){
		if ($(this).val() == "edit") {
	    	var city_id = $(this).data("id");
	     	var count_name = $(this).data("county_name");
	     	var city_name = $(this).data("name");
	     	var city_zip = $(this).data("zip");
	     	$("#city_id_edit").val(city_id);
	     	$("#county_name_edit").val(count_name);
	     	$("#city_name_edit").val(city_name);
	     	$("#city_zip_edit").val(city_zip);
	     	$('#editCity').modal('show');
        }
        if ($(this).val() == "delete") {
	    	var city_id = $(this).data("id");
	        $("#delete_id").val(city_id);
	        $("#delete_link").val('delete_city');
	        $('#deleteModal').modal('show');
        }

        
	    });

	    $('#actionDelete').click(function(){
	    var delete_id = $('#delete_id').val();
	    var delete_link = $('#delete_link').val();
	    $.ajax({
	 		type:'POST',
	 		url:'/general_admin/manage_website/'+delete_link+'',
	 		data:{
	 			delete_id: delete_id
	 		     },
	 		dataType:'text',

	 	}).done(function(data){
	 		    $('#deleteModal').modal('hide');
	 		    $('#success_alert').html(data);
	 		    $('#successModal').modal('show');
	 			
	 		});
	    });
	}
	function action_submit_edit()
	{
         
         $('#editMemBtn').click(function(){
	        var mem_id = $("#mem_id_edit").val();
	        var mem_name = $("#mem_name_edit").val();
	        var mem_price = $("#mem_price_edit").val();
		    $.ajax({
		 		type:'POST',
		 		url:'/general_admin/manage_website/update_membership',
		 		data:{
		 			mem_id: mem_id,
		 			mem_name:mem_name,
		 			mem_price:mem_price,
		 		     },
		 		dataType:'text',

		 	}).done(function(data){
		 		    $('#editMem').modal('hide');
		 		    $('#success_alert').html(data);
		 		    $('#successModal').modal('show');
		 			
		 		});
	    });
         
         $('#editCountyBtn').click(function(){
         	var count_id = $("#count_id_edit").val();
	        var count_name = $("#count_name_edit").val();
	        $.ajax({
		 		type:'POST',
		 		url:'/general_admin/manage_website/update_county',
		 		data:{
		 			count_id: count_id,
		 			count_name:count_name,
		 			},
		 		dataType:'text',

		 	}).done(function(data){
		 		    $('#editCounty').modal('hide');
		 		    $('#success_alert').html(data);
		 		    $('#successModal').modal('show');
		 			
		 		});
	     });
	     
	     $('#editCityBtn').click(function(){
	     	
	     	var city_id = $("#city_id_edit").val();
	     	var count_name = $("#county_name_edit").val();
	     	var city_name = $("#city_name_edit").val();
	     	var city_zip = $("#city_zip_edit").val();
         	$.ajax({
		 		type:'POST',
		 		url:'/general_admin/manage_website/update_city',
		 		data:{
		 			city_id: city_id,
		 			city_name:city_name,
		 			city_zip:city_zip,
		 			},
		 		dataType:'text',

		 	}).done(function(data){
		 		    $('#editCounty').modal('hide');
		 		    $('#success_alert').html(data);
		 		    $('#successModal').modal('show');
		 			
		 		});
	     });
	}

	
}







