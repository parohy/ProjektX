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
        $(".login-frame").stop(true, false).slideToggle();
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

    var sliderWidth = $(".slider").width() - 35;
    $("#right-arrow").css({"margin-left":sliderWidth + "px"});

    /*
     * TABS
     */

    $(".link").hover(function() {
        $(this).css("color", "#34A994");
	}, function() {
        $(this).css("color", "#595959");
    });

    $(".product-item").hover(function() {
        $(this).stop(true, false).animate({
            height: "470px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideDown();
    }, function() {
        $(this).stop(true, false).animate({
            height: "424px"
        });
        $(this).children('.product-description').children('.addToCart').stop(true, false).slideUp();
    });

    /*
    * Image scaling
    */

    /*
     * Slides
     */
    var sliderWidth = $(".slider-wrapper").width();
    var sliderHeight = $(".slider-wrapper").height();

    $(".slides").css({"width": sliderWidth + "px","height": sliderHeight + "px"});

    /*
    * Prduct items
    */
    $(document).ready(function()
    {
        adjustThumbnail();

        $(window).resize(function()
        {
            adjustThumbnail();
        });
    });

    function adjustThumbnail()
    {
        $(".thumbnailImage").each(function(){
            var maxWidth = $(".product-photo").width() - 30;
            var maxHeight = $(".product-photo").height() - 30;

            var ratio;
            var width = $(this).width();
            var height = $(this).height();

            ratio = maxWidth / width;
            $(this).css("width", maxWidth);
            $(this).css("height", height * ratio);
            height *= ratio;
            width *= ratio;

            if(height > maxHeight){
                ratio = maxHeight / height;
                $(this).css("height", maxHeight);
                $(this).css("width", width * ratio);
                height *= ratio;
                width *= ratio;
            }
            
            var marginY = ((maxHeight+30) - height) / 2;
            var marginX = ((maxWidth+30) - width) / 2;

            $(this).css({"margin-top":marginY + "px",
                         "margin-right":marginX + "px",
                         "margin-bottom":marginY + "px",
                         "margin-left":marginX + "px"}); 
        });
    }
});
