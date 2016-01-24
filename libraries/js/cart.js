/**
 * Created by Matus on 11. 1. 2016.
 */
$(function(){
    $(".addToCart").click(function(e) {
        e.preventDefault();

        var destination = $(this).attr("href");

        var popup = confirm("Do you want to continue shopping ?");

        if(popup == true) {
            $.get(destination, function(data,status) {});
        }
        else {
            $.get(destination, function(data,status) {
                window.location = "/ProjektX/?page=cart";
            });
        }
    });
});