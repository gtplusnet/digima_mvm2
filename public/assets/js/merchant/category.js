var category = new category()

function category()
{
    init();

    function init()
    {
        $(document).ready(function()
        {
            document_ready();
        })
    }
    function document_ready()
    {
        event_on_check();
    }

    function event_on_check()
    {
        $(document).on('click','.viewSubs',function()
        {
            var parent_id = $(this).data("id");
             alert(parent_id);
           $.ajax({
            type:'GET',
            url:'/merchant/tag_category',
            data:{parent_id: parent_id},
            dataType:'text',
            }).done(function(data)
            {
              $("#showk").html(data);
            });
        });

    }

    
}
