let formatter = new Intl.NumberFormat('en-US', {
    style: 'currency',
    currency: 'ZAR',
});

let order_id = randomString(10, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ');
let delivery_method = '';
let sub = 0;

$(function(){
    $.ajax({
        method:'POST',
        url: '/Ice_Task/src/server/Views/CartView.php',
        data: JSON.stringify({Type: 'Sub'}),
        success:async function (response) {
            sub = formatter.format(response);
            let userEmail = $('#email').val();
            let total = parseFloat(response);
            let name = $('#name').val();

            Delivery_Method(total);

            $('#sub').text(sub);
            $('#txtEmail').text(userEmail);
            $('#order_id').text(order_id);

            $('#txtUserEmail').val(userEmail);
            $('#txtName').val(name);

        },
        error:function(err){
            console.log(err);
        }
    });

    $.ajax({
        method:'POST',
        url: '/Ice_Task/src/server/Views/CartView.php',
        data: JSON.stringify({Type: 'Load'}),
        success:function(response){
            $('#block').html(response);
        },
        error:function(err){
            console.log(err);
        }
    });
});

function randomString(length, chars) {
    let result = '';
    for (let i = length; i > 0; --i) result += chars[Math.floor(Math.random() * chars.length)];
    return result;
}

const Remove_Item = id => {
    if (id){
        let data = {
            Token: id,
            Type:'Remove'
        };

        $.ajax({
            method: 'POST',
            url: '/Ice_Task/src/server/Views/CartView.php',
            data: JSON.stringify(data),
            success:function(response){
                window.location.reload();
            },
            error: function(err){
                console.log(err);
            }
        });
    }
}

const Delivery_Method = total => {
    let self_cost = document.getElementById('self');
    let d_cost = document.getElementById('del');
    let cost = total + 45;
    document.getElementById('order_total').innerHTML = formatter.format(cost).toString();
    delivery_method = 'Delivery';

    $('#del').on('click', function(){
        self_cost.checked = false;
        cost = total + 45;
        delivery_method = 'Delivery';
        document.getElementById('order_total').innerHTML = formatter.format(cost).toString();
    });

    $('#self').on('click', function(){
        d_cost.checked = false;
        cost = total + 0;
        delivery_method = 'Collect';
        document.getElementById('order_total').innerHTML = formatter.format(cost).toString();
    });
}

let cardNumber = document.getElementById('txtCardNumber');
cardNumber.onkeydown = function () {
    if (cardNumber.value.length > 0) {
        if (cardNumber.value.length % 4 == 0) {
            cardNumber.value += "    ";
        }
    }
}

let expDate = document.getElementById('txtExpirationDate');
expDate.onkeydown = function(){
    if (expDate.value.length > 0){

        if (cardNumber.value.length === 2){
            expDate.value += "/";
        }
    }
}

const Get_Date = () => {
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();

    return  yyyy + '/' + mm + '/' + dd;
}


$('#btnOrder').on('click', function(){
    let cardNumber = $('#txtCardNumber').val();
    let expDate = $('#txtExpirationDate').val();
    let cvv = $('#txtCVV').val();

    let date = new Date().getFullYear().toString().slice(-2);
    let exp_date = expDate.substring(expDate.indexOf("/") + 1);

    //Validate empty inputs
    if (!cardNumber){
        Set_Class('#txtCardNumber');
    }else {
        Remove_Class('#txtCardNumber');
    }

    if (!expDate){
        Set_Class('#txtExpirationDate');
    }else {
        Remove_Class('#txtExpirationDate');
    }

    if (!cvv){
        Set_Class('#txtCVV');
    }else {
        Remove_Class('#txtCVV');
    }

    //Validate the expiration date & CVV
    let years = exp_date - date;

    if (years !== 3){
        Set_Class('#txtExpirationDate');
        alert('Please enter a valid expiration date');
    }

    if ($('#txtCVV').val().length < 3 || $('#txtCVV').val().length > 3){
        Set_Class('#txtCVV');
        alert('Please enter a  valid CVV Code');
    }

    if (cardNumber && expDate && cvv){
        let id = $('#uuid').val();

        let obj = {
            Type: 'Order',
            ID: id,
            Order_Date: Get_Date(),
            Order_ID: order_id,
            Order_Total: sub,
            Delivery_Method: delivery_method
        };

        console.log(obj);

        $.ajax({
            method: 'POST',
            url: '/Ice_Task/src/server/Views/CartView.php',
            data: JSON.stringify(obj),
            success:function(response){
                if (response === "true"){
                    window.location.reload();
                }
            },
            error:function(err){
                console.log(err)
            }
        });
    }

});

const Set_Class = arg => {
    $(arg).focus();
    $(arg).addClass('empty_input');
}

const Remove_Class = args => {
    $(args).removeClass('empty_input');
}



