$(function() {
    /**
     * Created by PhpStorm.
     * User: Matus Kacmar
     * Date: 7. 12. 2015
     * Time: 14:23
     */
    $(".subnav").hide();

    $(".login-frame").css("visibility","visible").hide();
    $(".top-rated").css("visibility","visible").hide();
    $(".new-arrivals").css("visibility","visible").hide();

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
    $(".best-sellingButton").click(function(){
        $(".best-selling").show();
        $(".top-rated").hide();
        $(".new-arrivals").hide();
    });

    $(".top-ratedButton").click(function(){
        $(".top-rated").show();
        $(".best-selling").hide();
        $(".new-arrivals").hide();
    });

    $(".new-arrivalsButton").click(function(){
        $(".new-arrivals").show();
        $(".best-selling").hide();
        $(".top-rated").hide();
    });

   

    /*
     * Slides
     */
    var sliderWidth = $(".slider-wrapper").width();
    var sliderHeight = $(".slider-wrapper").height();

    $(".slides").css({"width": sliderWidth + "px","height": sliderHeight + "px"});

    /*
    * Prduct items
    */
    $(window).ready(function()
    {
        adjustThumbnail();

        $(window).resize(function()
        {
            adjustThumbnail();
        });
    });    
});

function adjustThumbnail()
{
    $(".thumbnailImage").each(function(){
        var maxWidth = $(".product-photo").width() - 20;
        var maxHeight = $(".product-photo").height() - 20;

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

        var marginTop = ((maxHeight+20) - height) / 2;
        var marginLeft = ((maxWidth+20) - width) / 2;
        $(this).css({"margin-top":marginTop+"px","margin-left":marginLeft+"px"});
    });
}