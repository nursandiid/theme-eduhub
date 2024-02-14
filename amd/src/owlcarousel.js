require(["theme_eduhub/config", "owlcarousel"], function () {
    $(function () {
        $(".owl-carousel").owlCarousel({
            loop: false,
            margin: 16,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 3,
                },
                1000: {
                    items: 5,
                },
            },
        });
    });
});
