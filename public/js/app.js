$(document).ready(function(){

    //Deleting Category
    $(".btn-category-delete,.btn-item-delete").click(function(){
        var title = $(this).attr('data-title');
        var action = $(this).attr('data-action');
        bootbox.confirm("Are you sure, you want to delete " + title + "?", function(result){
            if(result){
                window.location.href = action;
            }
        });
    });
    $("input[type=file]").on('change',function(){
        var id = $(this).attr('id');
        var fileName = $(this).val();
        $(this).next('.custom-file-label').html(fileName);
    });
});