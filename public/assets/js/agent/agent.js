$(document).ready(function(){
    $('#search_btn').click(function(){
        var search = $('#search').val();

        if(search == '')
        {
            iziToast.warning({
                title: 'Caution',
                message: 'Please enter Keyword.',
                position: 'topRight',
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp'
            });
        }
        else
        {
        	$('#result').html('');
        	$.ajax({
        		url:'/agent/get_client',
        		method:"post",
        		data: {search: search},
        		dataType:"text",
        		success:function(data)
        		{
        			$('#result').html(data);
        		}
        	});
        }
    });
});