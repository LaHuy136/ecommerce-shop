$(".rate").each(function () {
    let rating = $(this).data("rate");

    $(this)
        .find(".ratings_stars")
        .each(function (index) {
            if (index < rating) {
                $(this).addClass("ratings_over");
            }
        });
});
