/**
 * Created by Matúš on 3. 11. 2015.
 */






$(function(){
    $(".subnav-container").hide(0);

    $(".nav-button").mouseover(function(){
        $(this).siblings(".subnav-container").toggle("fast").delay(1);


    });




});

$(function(){
    $(".subnav-container").mouseleave(function(){

        $(".subnav-container").hide(0);


    });

});