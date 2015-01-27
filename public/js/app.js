$(document).ready(function(){
    $("#form_submit").click(function(){
        $("#target_form").submit();
    });

    $("#form_category_submit").click(function(){
        $("#target_category_form").submit();
    });
    $("#form_comment_submit").click(function(){
        $("#target_comment_form").submit();
    });

    $(".delete_group").click(function(event){

        $("#btn_delete_group").prop('href', '/forum/group/' + event.target.id + '/delete');
    });

    $(".delete_category").click(function(event){

        $("#btn_delete_category").prop('href', '/forum/category/' + event.target.id + '/delete');
    });

    $(".delete_comment").click(function(event){

        $("#btn_delete_comment").prop('href', '/forum/comment/' + event.target.id + '/delete');
    });
    $(".delete_thread").click(function(event){

        $("#btn_delete_thread").prop('href', '/forum/thread/' + event.target.id + '/delete');
    });

});
