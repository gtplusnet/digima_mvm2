$(document).ready(function()
{
		
	$('body').on("click",".category-menu a.filter",function(e)
	{
		e.preventDefault();
		var parent_id = $(this).data("id");
		var category_name = $(this).data("name");
		$.ajax(
		{
			type:'GET',
			url:'/mob_category/get_sub_category',
			data: 
			{
				parent_id:parent_id,
				category_name:category_name,
			
			},
			dataType:'text',
			success : function(data)
			{
				$('.mob-category-filtered-list').html(data);
				$(".categories").append("<li class='list-group-item' style='background-color:#beecbe'> Active: "+category_name+"</li>");
				$("#newpost").hide();
			}
		});
	});
	
});