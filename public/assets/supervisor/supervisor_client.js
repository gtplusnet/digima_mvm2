
$(document).ready(function()
{
	$(document).on('click','.playAudio',function()
	{
		var audioFile = $(this).data('path'); 
		$('#viewMp3Modal').modal('show');
        $('#audioFile').attr('src',audioFile);

    });
    $(document).on('click','.changeMP3',function()
	{
		var conversation_id = $(this).data('id');
		$('#conversation_id').val(conversation_id);
		$('#changeMp3Modal').modal('show');
    });

    $(document).on('click', '#editMp3Btn', function () 
    {
        var name = document.getElementById("newConvoFile").files[0].name;
        var conversation_id = $('#conversation_id').val();
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if (ext != 'mp3') 
        {
            toastr.warning('Please select an audio file.');
        } 
        else 
        {
            var f = document.getElementById("newConvoFile").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 1073741824) 
            {
                toastr.warning("Cannot upload audio, file size is very big.");
            } 
            else 
            {
                form_data.append("file", document.getElementById('newConvoFile').files[0]);
                form_data.append("conversation_id", conversation_id);
                $.ajax({
                    url: "/supervisor/changeAudioFile",
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function (data) {
                        $('#changeMp3Modal').modal('hide');
                        toastr.success("New audio file uploaded successfully!");
                        setTimeout(function(){location.reload();},3000);
                       
                    }
                });
            }
        }
    });
    
});
$(document).ready(function(){

		$(document).on('click','#search_button',function()
		{
			var search_key = $('#search_key1').val();
			$.ajax({
				type:'POST',
				url:'/supervisor/supervisor_search_client',
				data:{
					search_key: search_key,
				},
				dataType:'text',
			}).done(function(data)
				{		
					$('#showHere_pending').html(data);
				});
	    });

	    $(document).on('click','#search_button1',function(){
		var search_key_act = $('#search_key2').val();
		$.ajax({
			type:'POST',
			url:'/supervisor/supervisor_search_client_activated',
			data:{
				search_key_act: search_key_act,
			},
			dataType:'text',
		}).done(function(data)
			{		
				$('#showHere_activated').html(data);
			});
    	});

    	$(document).on('change','#date_end',function(){
		var date_start = $('#date_start').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		var date_end = $('#date_end').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client',
			data:{date_start: date_start,date_end: date_end},
			dataType:'text',
		}).done(function(data){
				$('#showHere_pending').html(data)
			});
		});

		$(document).on('change','#date_end1',function(){
		var date_start1 = $('#date_start1').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		var date_end1 = $('#date_end1').datepicker( "option", "dateFormat", 'yy/mm/dd' ).val();
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client1',
			data:{date_start1: date_start1,date_end1: date_end1},
			dataType:'text',
		}).done(function(data){
				$('#showHere_activated').html(data);
			});
		});
});


$(document).ready(function(){

	$('.transaction').click(function(){
		var transaction_id = $(this).data("id");
		
		$('.modal').hide();
		
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction',
			data:{transaction_id: transaction_id},
			dataType:'text',
		});
	});

	$('.closed').click(function(){
		var transaction_id = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	$('#closed').click(function(){
		var transaction_id = $(this).data("id");
		$.ajax({
			type:'POST',
			url:'/supervisor/get_client_transaction_reload',
			data:{transaction_id: transaction_id},
			dataType:'text',
		}).done(function(data){
				window.location.reload();
			});
	});

	
});

