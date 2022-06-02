const Validate_Inputs = ($email, $pass) => {
    return !(!$email || !$pass);
}

const Validate_Email = ($email) => {
    let regexEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return $email.matches(regexEmail);
}

const Validate_Pass = () => {

}

