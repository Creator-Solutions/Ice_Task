$(function(){
    $.ajax({
        method: 'GET',
        url: '/Ice_Task/src/server/Views/BookView.php',
        success:function(response){
            $('#container').html(response);
        },
        error:function(err){
            console.log(err);
        }
    });
});