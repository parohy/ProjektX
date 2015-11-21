/**
 * Created by Matúš on 3. 11. 2015.
*/

$(function(){
    $(".subnav-container").css("visibility","visible");
    $(".subnav-container").hide();
    var navButton = $(".nav-item");

    navButton.hover(function(){
        $(this).children("ul").stop(true, false).slideToggle(600);
    });
});
