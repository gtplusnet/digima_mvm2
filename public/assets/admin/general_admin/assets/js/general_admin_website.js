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
			add_category();
			add_membership();
			add_county();
			add_city();
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
		if ($(this).val() == "delete") {
    	var mem_id = $(this).data("id");
        $("#delete_id").val(mem_id);
        $("#delete_link").val('delete_membership');
        $('#deleteModal').modal('show');
        }
	    });
	    $('.count_action').change(function(){
	    	alert("james");
		if ($(this).val() == "delete") {
    	var count_id = $(this).data("id");
        $("#delete_id").val(count_id);
        $("#delete_link").val('delete_county');
        $('#deleteModal').modal('show');
        }
	    });
	    $('.city_action').change(function(){
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

	function add_category()
	{ 
		$('#addcategory').click(function(){
		var business_category_id = $('#business_category_id').val();
        var business_category_name = $('#business_category_name').val();
		$.ajax({
			type:'POST',
			url:'/merchant/category/add_category',
			data:{
				business_category_id: business_category_id, business_category_name: business_category_name,
				},
			dataType:'text',

		}).done(function(data){
			    $('#category_alert').html(data);
			    setTimeout(location.reload.bind(location), 1000);
			});
	    });
	}

	function add_keywords()
	{ 
		$('#addKeywords').click(function(){
		var business_tag_keywords_id = $('#business_tag_keywords_id').val();
        var keywords_name = $('#keywords_name').val();
		$.ajax({
			type:'POST',
			url:'/merchant/category/add_keywords',
			data:{
				business_tag_keywords_id: business_tag_keywords_id, keywords_name: keywords_name,
				},
			dataType:'text',

		}).done(function(data){
			    $('#category_alert').html(data);
			    setTimeout(location.reload.bind(location), 1000);
			});
	    });
	}

	
}







