$(function() {
    $(".subnav").css("visibility","visible");
    $(".subnav").hide();
    $(".addToCart").hide();
    $(".login-frame").hide();


    $(".button").hover(function() {
        $(this).children(".subnav").stop(true, false).slideToggle(600);
    });

    $(".link").hover(function() {
        $(this).css("font-weight", "bold");
    }, function() {
        $(this).css("font-weight", "lighter");
    });

    $(".product-item.first-row").hover(function() {
        $(this).stop(true, false).animate({
            height: "470px"
        });
        $(this).next().stop(true, false).animate({
            height: "370px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideDown();
    }, function() {
        $(this).stop(true, false).animate({
            height: "424px"
        });
        $(this).next().stop(true, false).animate({
            height: "424px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideUp();
    });

    $(".product-item.second-row").hover(function() {
        $(this).stop(true, false).animate({
            height: "470px"
        });
        $(this).prev().stop(true, false).animate({
            height: "370px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideDown();
    }, function() {
        $(this).stop(true, false).animate({
            height: "424px"
        });
        $(this).prev().stop(true, false).animate({
            height: "424px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideUp();
    });

    $("#login").click(function(){
        $(".login-frame").slideToggle();
    });
});
