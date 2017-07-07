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
			$('#search-form').submit();
		}
	});
});

