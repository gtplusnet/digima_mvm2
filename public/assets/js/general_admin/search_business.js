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
		$('.business-result').html(data);
	});
});