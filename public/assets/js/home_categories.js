$(document).ready(function()
	{
		$('#newpost').hide();
		$(document).on("click","#show_category",function()
		{
			
			$("#newpost").toggle();
		});
		$(document).on("click","#hide_me",function()
		{
			$("#newpost").hide();
		});
		$(document).on("click",".categoryList",function()
		{
			var parent_id = $(this).data("id");
			var category_name = $(this).data("name");
			$.ajax(
			{
				type:'GET',
				url:'/home/get_sub_category',
				data: 
				{
					parent_id:parent_id,
				
				},
				dataType:'text',
			}).done(function(data)
				{
					$('#show_list_filtered_category').html(data);
					$(".categories").append("<li class='list-group-item' style='background-color:#beecbe'> Active: "+category_name+"</li>");
					$("#newpost").hide();
				});
		});
		$(document).on("click",".go_back",function()
		{

			var parent_id = $(this).data("id");
			var category_name = $(this).data("name");
			$.ajax(
			{
				type:'GET',
				url:'/home/get_sub_category',
				data: 
				{
					parent_id:parent_id,
				
				},
				dataType:'text',
			}).done(function(data)
				{
					$('#show_list_filtered_category').html(data);
					$('#newpost').hide();
					$(".categories").append("<li class='list-group-item' style='background-color:#beecbe'>Active: "+category_name+"</li>");
					
				});
		});
	});