/**
 * Created by Matúš on 3. 11. 2015.
*/

$(function(){
    $(".subnav-container").hide();
    var navButton = $(".nav-button");

    navButton.click(function(){
        $(this).siblings(".subnav-container").toggle();
    });
});