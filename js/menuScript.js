/**
 * Created by Mat�� on 3. 11. 2015.
*/

$(function(){
    $(".subnav-container").css("visibility","visible");
    $(".subnav-container").hide();
    var navButton = $(".nav-button");

    navButton.click(function(){
        $(this).siblings(".subnav-container").toggle();
    });
});
