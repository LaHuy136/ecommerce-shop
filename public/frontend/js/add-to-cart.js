$(document).ready(function () {
    const btnAddToCart = $(".add-to-cart");

    btnAddToCart.on("click", function (e) {
        e.preventDefault();

        const productId = $(this).closest(".product-image-wrapper").data("id");

        $.ajax({
            url: window.cartAddUrl,
            method: "POST",
            data: {
                product_id: productId,
            },
            success: function (res) {
                $("#cartQty").text(res.totalQty);
                console.log(res.message);
            },
            error: function (error) {
                console.log(error.responseText);
            },
        });
    });
});
