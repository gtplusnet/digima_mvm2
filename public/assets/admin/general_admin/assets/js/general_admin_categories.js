var manage_categories = new manage_categories();


function manage_categories()
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
			search_category();
			save_category();
			action_box();
			delete_category();
			update_category();
			sub_category_action();
			add_sub_category();
		});
	}
	function save_category()
	{
		$(document).on('click','.save_category',function(){
		var cat_name = $('#cat_name').val();
		var cat_info = $('#cat_info').val();
		
		
		$.ajax({
			type:'POST',
			url:'/general_admin/add_category',
			data:{cat_name: cat_name,cat_info: cat_info},
			dataType:'text',
		}).done(function(data){
				$('#showHere1').html(data);
				setTimeout(function(){
					   location.reload();
					}, 1000);
			});
	    });
	}
	function search_category()
	{
		$(document).on('click','#search_button',function(){
		var search_key = $('#search_key').val();
		$('#ajax-loader').show();
		$('#showHere3').hide();
		
		$.ajax({
			type:'POST',
			url:'/general_admin/search_category',
			data:{search_key: search_key},
			dataType:'text',
		}).done(function(data){
				$('#showHere3').html(data);
				$('#showHere3').show();
				$('#ajax-loader').hide();
				setTimeout(function(){
					   location.reload();
					}, 1000);
		    });
	    });
	}
	
	function action_box()
	{ 
		$(document).on('change','.category_action',function(){
			
			if ($(this).val() == "delete") 
			   {
		    	var cat_id = $(this).data("id");
		        $("#delete_id").val(cat_id);
		        $("#delete_link").val('delete_category');
		        $('#deleteModal').modal('show');
		       }
	        if ($(this).val() == "edit") 
	           {
		    	var cat_id = $(this).data("id");
		    	var cat_name = $(this).data("name");
		    	var cat_info = $(this).data("info");
		    	$("#id_to_edit").val(cat_id);
		        $("#cat_name_edit").val(cat_name);
		        $("#cat_info_edit").val(cat_info);
		        $('#categoryEdit').modal('show');
	           }
	        if ($(this).val() == "view") 
	           {
		    	var cat_id = $(this).data("id");
		    	var cat_name = $(this).data("name");
		    	$.ajax({
			 		type:'POST',
			 		url:'/general_admin/get_sub_category',
			 		data:{
			 			cat_id: cat_id,
			 		     },
			 		dataType:'text',

			 	}).done(function(data){
			 		    $("#cat_id_dis").val(cat_id);
				        $("#cat_name_head").text(cat_name);
				        $("#get_sub_category_result").html(data);
				        $('#subCategory').modal('show');
				        setTimeout(function(){
						   location.reload();
						}, 1000);
			 		});
		    	}
	    });
    }
	function delete_category()
	{
   		$(document).on('click','#actionDelete',function(){
		    var delete_id = $('#delete_id').val();
		    var delete_link = $('#delete_link').val();
		    $.ajax({
		 		type:'POST',
		 		url:'/general_admin/'+delete_link+'',
		 		data:{
		 			delete_id: delete_id
		 		     },
		 		dataType:'text',

		 	}).done(function(data){
		 		    $('#deleteModal').modal('hide');
		 		    $('#success_alert').html(data);
		 		    $('#successModal').modal('show');
		 		    setTimeout(function(){
					   location.reload();
					}, 1000);
		 			
		 		});
	    });
	}
    function update_category()
    {
        $('.update_category').click(function(){
			var cat_name = $('#cat_name_edit').val();
			var cat_info = $('#cat_info_edit').val();
			var cat_id = $('#id_to_edit').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/edit_category',
				data:{cat_name: cat_name,cat_info: cat_info,cat_id:cat_id},
				dataType:'text',
			}).done(function(data){
				    $('#categoryEdit').modal('hide');
					$('#success_alert').html(data);
		 		    $('#successModal').modal('show');
		 		    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
	    
	    $('.update_sub_categoryBtn').click(function(){
			var cat_name = $('#name_edit_sub').val();
			var cat_info = $('#info_edit_sub').val();
			var cat_id = $('#id_to_edit_sub').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/edit_sub_category',
				data:{
					cat_name: cat_name,
					cat_info: cat_info,
					cat_id:cat_id
				     },
				dataType:'text',
			}).done(function(data){
				    $('#success_alert').html(data);
				    $('#subCategoryEdit').modal('hide');
		 		    $('#successModal').modal('show');
		 		    setTimeout(function(){
					   location.reload();
					}, 1000);
				});
	    });
    }
	function sub_category_action()
	{
		$(document).on('change','.sub_category_action',function()
		{
			if ($(this).val() == "delete") 
			   {
		    	var cat_id = $(this).data("id");
		        $("#delete_id").val(cat_id);
		        $("#delete_link").val('delete_category');
		        $('#deleteModal').modal('show');
		       }
	        if ($(this).val() == "edit") 
	           {
	           	var cat_id = $(this).data("id");
		    	var cat_name = $(this).data("name");
		    	var cat_info = $(this).data("info");
		    	$("#id_to_edit_sub").val(cat_id);
		        $("#name_edit_sub").val(cat_name);
		        $("#info_edit_sub").val(cat_info);
	           	$('#subCategoryEdit').modal('show');
		    	}
			if ($(this).val() == "view") 
	           {
	           	var cat_id = $(this).data("id");
		    	var cat_name = $(this).data("name");
		    	$.ajax({
			 		type:'POST',
			 		url:'/general_admin/get_sub_category',
			 		data:{
			 			cat_id: cat_id,
			 		     },
			 		dataType:'text',

			 	}).done(function(data){
			 		    $("#cat_id_dis").val(cat_id);
				        $("#cat_name_head").text(cat_name);
				        $("#get_sub_category_result").html(data);
				        $('#subCategory').modal('show');
				        setTimeout(function(){
						   location.reload();
						}, 1000);
			 		});
		    	}	
		});
	}
	function add_sub_category()
	{
		$(document).on('click','#addSubCategoryBtn',function()
		{
	        
			$('#addSubCategory').modal('show');
		});
  
		$(document).on('click','#save_sub_categoryBtn',function()
		{
			var cat_id = $('#cat_id_dis').val();
			var cat_name = $('#cat_name_dis').val();
			var  cat_info = $('#cat_info_dis').val();
			$.ajax({
				type:'POST',
				url:'/general_admin/add_sub_category',
				data:{
					cat_name: cat_name,
					cat_info: cat_info,
					cat_id:cat_id
					},
				dataType:'text',
			}).done(function(data){
					$('#addSubCategory').modal('hide');
				    $('#get_sub_category_result').html(data);
				    setTimeout(function(){
					   location.reload();
					}, 1000);
		 		});
	    });
	}

}


	








