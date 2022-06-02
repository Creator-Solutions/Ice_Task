const Check_Input = (email, password) => {
    return !(!email || !password);
};


$(function(){
    $('#btnLogin').on('click', function(){
        let email = $('#txtEmail').val();
        let pass = $('#txtPassword').val();

        let valid = Check_Input(email, pass);
        if (valid){
            $.ajax({
                method: 'POST',
                url: '/Ice_Task/src/server/Views/UserView.php',
                data: JSON.stringify({
                    Email: email,
                    Password: pass,
                    Type:'Login'
                }),
                success:function(response){
                    console.log(JSON.parse(response));
                },
                error:function(err){
                    console.log(err);
                }
            })
        }
    });
});

