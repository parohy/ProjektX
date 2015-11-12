/**
 * Created by Matúš on 3. 11. 2015.
 */






$(function(){
    $(".subnav-container").hide(0);

    $(".nav-button").mouseover(function(){
        $(this).siblings(".subnav-container").slideDown("fast").delay(1);


    });




});



$(function(){
    $("#main-header").mouseout(function(){

        $(".subnav-container").slideUp("fast");


    });

});