

	$('.action_modal').change(function(){
		if ($(this).val() == "volvo") {
        $('#myModalEdit').modal('show');
    }
		
		alert("123");
		// $.ajax({
		// 	type:'POST',
		// 	url:'/general_admin/add_category',
		// 	data:{cat_name: cat_name,cat_info: cat_info},
		// 	dataType:'text',
		// }).done(function(data){
		// 		$('#showHere1').html(data);
		// 	});
	});


