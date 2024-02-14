// Configure RequireJS paths and shims
require.config({
    paths: {
        owlcarousel:
            M.cfg.wwwroot + "/theme/eduhub/js/owl-carousel/owl.carousel.min",
    },
    shim: {
        owlcarousel: { deps: ["jquery"], exports: "jQuery.fn.owlCarousel" },
    },
});
