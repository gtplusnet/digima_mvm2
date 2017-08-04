$(document).ready(function(){
	$(document).on('click', '#view_btn', function(e){
		e.preventDefault();

		var business_id = $(this).data('id'); 

		$('.business-info-result').html('');
		$('#modal-loader').show();;

		setTimeout(function(){
			$.ajax({
				url: '/general_admin/get_business_info',
				type: 'GET',
				dataType: 'html',
				data: {'business_id': business_id}
			}).done(function(data){
				$('.business-info-result').html('');
				$('.business-info-result').hide();
				$('.business-info-result').fadeIn(700);
				$('.business-info-result').html(data);
				$('#modal-loader').hide();
			});
		}, 700);
		
	});
});