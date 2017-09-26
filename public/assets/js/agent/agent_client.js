$(document).ready(function(){

	$('#end_date').change(function(){
		var start_date = $('#start_date').val();
		var end_date = $('#end_date').val();
		alert(start_date+end_date);
		$.ajax({
			type:'POST',
			url:'/agent/filter_clients',
			data:{start_date: start_date,end_date: end_date},
			dataType:'text',
			success:function(data){
			$(".show_here").html(data);
			}
		});
	});

});