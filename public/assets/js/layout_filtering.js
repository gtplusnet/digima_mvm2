var filtering = new filtering();


function filtering()
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
			parent_filter();
			action_restore();
		});

	}
	function parent_filter()
	{
		
		$(document).on("click",".aGALIT",function()
		{
			
		});
		$(document).on("click","#parent_filtered",function()
		{
			
		});


	}
	

	function action_restore()
	{
		
		
	}
}
