$(document).ready(function(){

	$('#date_end').change(function(){
		var date_start = $('#date_start').val();
		var date_end = $('#date_end').val();
		alert("123");
		
		$.ajax({
			type:'POST',
			url:'/agent/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
			// success:function(data){
			// 	alert(data);
			// $('#showHere').html(data);
			// }
		}).done(function(data){
				$('#showHere').html(data);
			});
	});
});