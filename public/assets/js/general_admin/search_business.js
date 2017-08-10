$('#search-business-form').on('submit', function(e){
	e.preventDefault();
	var url = $(this).attr('action');
	var type = $(this).attr('method');
	var data = $(this).serializeArray();

	if($('#business_name').val() == '')
	{
		iziToast.warning({
			title: 'Caution',
			message: 'Please input Business Name.',
			position: 'topRight',
			transitionIn: 'fadeInDown',
			transitionOut: 'fadeOutUp'
		});
	}
	else
	{
		$('#ajax-loader').show();
		$('.business-result').hide();

		setTimeout(function(){
			$.ajax({
			type: type,
			url: url,
			dataType: 'json',
			data: data
			}).done(function(data){
				$('.business-result').fadeIn(700);
				$('.business-result').html(data);
				$('#ajax-loader').hide();
			});
		}, 700);
	}
});

$(document).on('click', '.pagination a', function(e){
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	GetBusiness(page, $('#business_name').val());
});

function GetBusiness(page,business_name)
{
	var url = '/general_admin/get_business_list_info';

	$('#ajax-loader').show();
	$('.business-result').hide();

	setTimeout(function(){
		$.ajax({
		type: 'get',
		url: url+'?page='+page,
		dataType: 'json',
		data: {'business_name': business_name}
		}).done(function(data){
			$('.business-result').fadeIn(700);
			$('.business-result').html(data);
			$('#ajax-loader').hide();
		});	
	}, 700);
}

