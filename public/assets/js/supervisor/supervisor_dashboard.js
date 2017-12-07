var supervisor_dashboard = new supervisor_dashboard();


function supervisor_dashboard()
{
	init();

	function init()
	{
		ready_document();
	}

	function ready_document()
	{
		$(document).ready(function()
		{
			show_agent_calls();
			show_team_calls();
		});
	}
	function show_agent_calls()
	{
		$(document).on('change','#agent_calls',function(){
		var agent_id = $(this).val();
		$.ajax({
			type:'POST',
			url:'/supervisor/show_agent_calls',
			data:{
				agent_id: agent_id,
				},
			dataType:'text',
		}).done(function(data){
				$('#showAgentCalls').html(data);
			});
	    });
	}
	function show_team_calls()
	{
		$(document).on('change','#team_calls',function(){
		var team_id = $(this).val();
		$.ajax({
			type:'POST',
			url:'/supervisor/show_team_calls',
			data:{
				team_id: team_id,
				},
			dataType:'text',
		}).done(function(data){
				$('#showTeamCalls').html(data);
			});
	    });
	}
	


}


	








