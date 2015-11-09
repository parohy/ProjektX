/**
 * Created by Matúš on 8. 11. 2015.
 */

$(function() {

    $(".hideShow-button").click(function(){
        var list = $(this).parent(".headline").siblings("ul");

        if(list.hasClass("hide")) {
            list.removeClass("hide");
            list.addClass("show");
            list.hide("fast");
            $(this).html("+");
        }
        else if(list.hasClass("show")) {
            list.removeClass("show");
            list.addClass("hide");
            list.show("fast");
            $(this).html("-");
        }
    });
});