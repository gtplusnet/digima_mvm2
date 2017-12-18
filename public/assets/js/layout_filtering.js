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
		// $('#click a').click(function(e) {
  //     		alert();
		// });
		
		// $(document).on("click","li",function()
		// {
		// 	alert();
		// });
		// $(document).on("click","#parent_filtered",function()
		// {
			
		// });
		// $(document).on('click', '.dl-menuwrapper li a:only-child', function () 
		// {
		// 	alert('james');
		// });


	}
	

	function action_restore()
	{
		
		
	}
}
