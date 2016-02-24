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

    setTimeout(function() {
        $(".headerErrorMessage").fadeOut();
    },3000);

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
    var tabsLoad = [0,0,0];

    $(".best-sellingButton").click(function(e){
        $(this).css({"color":"#34A994"});
        $(".top-ratedButton").css({"color":"#484848"});
        $(".new-arrivalsButton").css({"color":"#484848"});

        $(".activeTab").removeClass("activeTab");
        $(".top-rated").hide();
        $(".new-arrivals").hide();
        $(".best-selling").show();
        $(".best-selling").addClass("activeTab");    
        $(".loadMore").show();
        tabSwitch(0);
    });

    $(".top-ratedButton").click(function(e){
        $(this).css({"color":"#34A994"});
        $(".best-sellingButton").css({"color":"#484848"});
        $(".new-arrivalsButton").css({"color":"#484848"});

        $(".activeTab").removeClass("activeTab");
        $(".best-selling").hide();
        $(".new-arrivals").hide();
        $(".top-rated").show();
        $(".top-rated").addClass("activeTab");        
        $(".loadMore").show();
        tabSwitch(1);
    });

    $(".new-arrivalsButton").click(function(e){
        $(this).css({"color":"#34A994"});
        $(".best-sellingButton").css({"color":"#484848"});
        $(".top-ratedButton").css({"color":"#484848"});

        $(".activeTab").removeClass("activeTab");
        $(".best-selling").hide();
        $(".top-rated").hide();
        $(".new-arrivals").show();
        $(".new-arrivals").addClass("activeTab");     
        $(".loadMore").show();
        tabSwitch(2);
    });
   

    /*
     * Slides
     */
    var sliderWidth = $(".slider-wrapper").width();
    var sliderHeight = $(".slider-wrapper").height();

    $(".slides").css({"width": sliderWidth + "px","height": sliderHeight + "px"});

    function tabSwitch(tab){
        tabsLoad[currentTab] = load;
        currentTab = tab;
        load = tabsLoad[currentTab];
        $(".messages").html("");
        if(tabsLoad[tab] == 0){
            enableLoad();
        }        
    }
       
});

$(window).ready(function()
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
        adjustOneThumbnail($(this));
    });
}

function adjustOneThumbnail(img)
{
    var maxWidth = img.parent().parent().width();
    var maxHeight = img.parent().parent().height();

    var ratio;
    var width = img.width();
    var height = img.height();

    ratio = maxWidth / width;
    img.css("width", maxWidth);
    img.css("height", height * ratio);
    height *= ratio;
    width *= ratio;

    if(height > maxHeight){
        ratio = maxHeight / height;
        img.css("height", maxHeight);
        img.css("width", width * ratio);
        height *= ratio;
        width *= ratio;
    }

    var marginTop = ((maxHeight) - height) / 2;
    var marginLeft = ((maxWidth) - width) / 2;
    img.css({"margin-top":marginTop+"px","margin-left":marginLeft+"px"});
    img.removeClass("notLoaded");
}