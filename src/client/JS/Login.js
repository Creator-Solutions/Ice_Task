const Check_Input = (email, password) => {
    return !(!email || !password);
};


const Login = () => {
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
                let data = JSON.parse(response);

                switch(data[0].Message){
                    case 'Authenticated':
                        window.location.href = `../Pages/Dashboard.php?auth-type=true?token=${data[0].Token}`
                        break;
                    case 'Invalid Password':
                        alert('Incorrect Password');
                        break;
                    case 'Account Not Found':
                        alert('Account Not Found')
                        break;
                }
            },
            error:function(err){
                console.log(err);
            }
        });
    }else {
        alert('Please fill in all fields');
    }
}

