$(document).ready(function(){
	$('#search_btn').click(function(){
		var business_name = $('#business_name').val();

		if($.trim(business_name) == '')
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

