$(document).ready(function(){
	$('#search_business').keyup(function(){
		var search_business_txt = $(this).val();

		if(search_business_txt != '')
		{
			$.ajax({
				url:'/search_business_general_admin',
				type:'POST',
				data:{search_business_txt: search_business_txt},
				dataType:'json',
				success:function(data)
				{
					$('.business-list-result').html(data.html);
				}
			});
		}
		else
		{
			$.ajax({
				url:'/search_business_general_admin',
				type:'POST',
				data:{search_business_txt: search_business_txt},
				dataType:'json',
				success:function(data)
				{
					$('.business-list-result').html(data.html);
				}
			});
		}
	});
});
