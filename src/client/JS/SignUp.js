const Validate_Inputs = (email, pass, fullname, confirm_pass) => {
    return !(!email || !pass || !fullname || !confirm_pass);
}

const Validate_Email = (email) => {
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return email.match(regexEmail);
}

const Validate_Pass = (pass) => {
    let pattern = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$");
    return pass.match(pattern);
}

const SignUp = () => {
    let fullname = $('#txtFullName').val();
    let email = $('#txtEmail').val();
    let pass = $('#txtEmail').val();
    let confirm_pass = $('#txtConfirmPass').val();

    let valid_input = Validate_Inputs(email, pass, fullname, confirm_pass);
    let valid_email = Validate_Email(email);
    let valid_pass = Validate_Pass(pass);

    if (valid_input){
        if (valid_email && valid_pass){

            let data = {
                FullName: fullname,
                Email: email,
                Password: pass,
                Verified: 0,
                Type:'Register'
            };

            $.ajax({
                method: 'POST',
                url: '/Ice_Task/src/server/Views/UserView.php',
                data: JSON.stringify(data),
                success:function(response){
                    let data = JSON.parse(response);

                    switch(data[0].Message){
                        case 'User Registered':
                            window.location.href = `../Pages/Dashboard.php?auth-type=true?${data[0].Token}`
                            break;
                        case 'Could Not Register':
                            alert('Could not register user');
                            break;
                    }
                },
                error:function(err){
                    console.log(err);
                }
            });

        }else {
            alert('Multiple fields are invalid');
        }
    }else {
        alert('Please fill in all fields');
    }
}

const Navigate = () => {
    window.location.href = "../Pages/Login.php";
}