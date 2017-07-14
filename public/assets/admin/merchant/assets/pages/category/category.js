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
        $("body").on("change", ".checkbox-parent", function(e)
        {
            getBusinessCategory();
        });



        $("body").on("change", ".checkbox-child", function(e)
        {
            getBusinessCategory();   
        });


    }

    function getBusinessCategory()
    {
        console.log($('#checkbox:checked').map(function() {
            return this.value;
        }).get().join(', '));
    }
}