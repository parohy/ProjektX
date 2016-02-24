/**
 * Created by Matus on 11. 1. 2016.
 */
$(function () {
    /*UPDATE TOTAL PRICE IN HEADER*/
    var totalPrice = $(".bold").html();
    var index = totalPrice.indexOf(" ");
    totalPrice = totalPrice.substring(0,index);
    $(".amount").html(totalPrice);

    /*ADD TO CART BUTTON FUNCTIONALITY*/
    $('body').on('click','.addToCart',function(e) {
        e.preventDefault();

        var destination = $(this).attr("href");

        $.getScript('libraries/js/popup.js', function () {
            popup("ACTION CONFIRMATION",
                "<h1 class=\"textinpopup\">Do you want to continue shopping?</h1>" +
                "<button id='confirm'>Yes, please.</button><button id='decline'>No, thanks.</button>", 400, 180);
            
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

    /*NUMBER PICKER IN CART*/
    $('input[type="number"]').change(function(){
        var actual = parseInt($(this).val());
        var productId = parseInt($(this).attr("data-id"));

        var link = "/ProjektX/?page=cart&change=" + productId + "&value=" + actual;

        window.location = link;
        return false;
    });
});