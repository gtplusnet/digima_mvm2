$(document).ready(function(){
	$('#search_btn').click(function(){
		var search_business = $('#search_business').val();

		if($.trim(search_business) == '')
		{
			iziToast.warning({
			    title: 'Caution',
			    message: 'Please enter Business Name or Keyword.',
			    position: 'topRight',
			    transitionIn: 'fadeInDown',
			    transitionOut: 'fadeOutUp'
			});
		}
		else
		{
			$.ajax({
				method: 'POST',
				url: '/search_business',
				data: {search_business: search_business},
				dataType: 'text',
				success:function(data){
					$('#search_business').val('');
				}
			});
		}
	});
});

