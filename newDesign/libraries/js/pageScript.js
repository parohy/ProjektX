$(function() {
    /**
     * Created by PhpStorm.
     * User: Matus Kacmar
     * Date: 7. 12. 2015
     * Time: 14:23
     */
    $(".login-frame").css("visibility","visible");
    $(".subnav").hide();
    $(".addToCart").hide();
    $(".login-frame").hide();

    /*
     * LOGIN FORM
    */
    $("#login").click(function(){
        $(".login-frame").slideToggle();
    });

    /*
     * PAGE NAVIGATION
     */

    $(".button").hover(function() {
        $(this).children(".subnav").stop(true, false).slideToggle(600);
    });

    /*
     * SEARCH BAR
     */

    $("#search").on('keypress', function(event){
        if(event.which == 13) {
            $("#searchForm").submit();
            return false;
        }
    });

    /*
     * TABS
     */

    $(".link").hover(function() {
        $(this).css("color", "#34A994");
	}, function() {
        $(this).css("color", "#595959");
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
});
