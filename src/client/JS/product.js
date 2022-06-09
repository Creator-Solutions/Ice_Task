$(function(){
    let url = window.location.href;
    let token = url.substring(url.indexOf('=') + 1);

    if (token){
        document.title= `Product || ${token}`;

        $.ajax({
            method: 'POST',
            url: '/Ice_Task/src/server/Views/ProductView.php',
            data: JSON.stringify({Token: token}),
            success:function(response) {
                let json = JSON.parse(response);
                let inStock = json[0].InStock;
                console.log(json);


                $('#title').text(json[0].Book_Name);
                $("#imgIcon").attr("src", `../../Images/${json[0].Image}`);
                $('#isbn').text(`ISBN(13): ${json[0].ISBN}`);
                $('#price').text(`R${json[0].Price}`);
                $('#seller').text(`Seller: ${json[0].Admin_Name}`);
                $('#description').text(json[0].Description);
                $('#collection').html('Wednesday, 15 June');

                inStock === 1
                ? Set_Stock({
                        node: "In Stock",
                        curr_node: "no_stock",
                        new_node: "stock",
                    })
                : Set_Stock({
                        node: "Out of Stock",
                        curr_node: "stock",
                        new_node: "no_stock",
                    })
                },
            error: function(err){
                console.log(err);
            }
        })
    }
});

const Set_Stock = (arg) => {
    $("#stock").text(arg.node);
    $("#stock").removeClass(arg.curr_node).addClass(arg.new_node);
}