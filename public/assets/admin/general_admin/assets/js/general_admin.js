$(document).ready(function(){

	$('.save_category').click(function(){
		var cat_name = $('#cat_name').val();
		var cat_info = $('#cat_info').val();
		
		
		$.ajax({
			type:'POST',
			url:'/general_admin/add_category',
			data:{cat_name: cat_name,cat_info: cat_info},
			dataType:'text',
		}).done(function(data){
				$('#showHere1').html(data);
			});
	});
});

$(document).ready(function(){

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
				$('#showHere2').html(data);
			});
	});
});

$(document).ready(function(){

	$('#search_button').click(function(){
		var search_key = $('#search_key').val();
		$.ajax({
			type:'POST',
			url:'/general_admin/search_category',
			data:{search_key: search_key},
			dataType:'text',
		}).done(function(data){
				$('#showHere3').html(data);
			});
	});
});



