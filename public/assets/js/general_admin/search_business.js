$('#search-business-form').on('submit', function(e){
	e.preventDefault();
	var url = $(this).attr('action');
	var type = $(this).attr('method');
	var data = $(this).serializeArray();

	$.ajax({
		type: type,
		url: url,
		data: data
	}).done(function(data){
		$('.business-result').hide();
		$('.business-result').fadeIn(1000);
		$('.business-result').html(data);
	});
});

$(document).on('click', '.pagination a', function(e){
	e.preventDefault();
	var page = $(this).attr('href').split('page=')[1];
	GetBusiness(page, $('#business_name').val());
});

function GetBusiness(page,business_name)
{
	var url = '/general_admin/get_business_list_info';
	$.ajax({
		type: 'get',
		url: url+'?page='+page,
		data: {'business_name': business_name}
	}).done(function(data){
		$('.business-result').hide();
		$('.business-result').fadeIn(1000);
		$('.business-result').html(data);
	});	
}

