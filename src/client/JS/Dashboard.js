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

$(function(){
    $('#btnApplyFilter').on('click', function(){
        $('#container').html('');

        let network_filter = $('#chkNetworking').is(':checked');
        let prog_filter = $('#chkProg').is(':checked');
        let proj_management = $('#chkManage').is(':checked');
        let business_studies = $('#chkBusiness').is(':checked');
        let filter_tag = '';

        let minValue = $('#txtminVal').val() ? $('#txtminVal').val(): "0";
        let maxValue = $('#txtmaxVal').val() ? $('#txtmaxVal').val(): "2000";

        if (network_filter){
            filter_tag = "Networking";
        }else if (proj_management){
            filter_tag = "Project Management";
        }else if (prog_filter){
            filter_tag = "Programming";
        }else if (business_studies){
            filter_tag = "Business";
        }

        let obj = {
            Tag: filter_tag,
            Min: minValue,
            Max: maxValue
        };


        $.ajax({
            method: 'POST',
            url: '/Ice_Task/src/server/Views/BookView.php',
            data: JSON.stringify(obj),
            success:function(response){
                $('#container').html(response);
            },
            error:function(err){
                console.log(err);
            }
        });

    });
});

const Add_To_Cart = (id) => {
    /**
     * Function to add items to the cart
     *
     */

    let data = {
        SKU: id,
        Type:'Add'
    }

    $.ajax({
        method: 'POST',
        url:'/Ice_Task/src/server/Views/CartView.php',
        data: JSON.stringify(data),
        success:function(response){
          let resp_data = response;
          $('#cart').text(`Cart(${resp_data})`);
        },
        error:function(err){
            console.log(err)
        }
    })

}

