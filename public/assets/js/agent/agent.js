$(document).ready(function(){
    $('#search').keyup(function){
        var txt = $(this).val();
        if(txt != '')
        {

        }
        else
        {
        	$('#result').html('');
        	$.ajax({
        		url:'/agent/get_client',
        		method:"post",
        		data: {search:search},
        		dataType:"text",
        		success:function(data)
        		{
        			$('#result').html(data);
        		}
        	});
        }
    });
});