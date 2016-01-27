/**
 * Created by Matus on 11. 1. 2016.
 */
$(function () {
    $(".addToCart").click(function(e) {
        e.preventDefault();

        var destination = $(this).attr("href");

        $.getScript('libraries/js/popup.js', function () {
            popup("ACTION CONFIRMATION",
                "<h1>DO YOU WANT TO CONTINUE SHOPPING ?</h1>" +
                "<button id='confirm'>YES</button><button id='decline'>NO</button>", 400, 200);

            $("#confirm").click(function(){
                $.get(destination, function (data, status) {
                    $(".amount").innerHTML = "";
                    $(".amount").html(data);
                });

                $(".popupContainer").remove();
            });

            $("#decline").click(function () {
                $.get(destination, function (data, status) {
                    window.location = "/ProjektX/?page=cart";
                });
                return false;
            });

            return false;
        });
    });
});