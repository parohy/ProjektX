/**
 * Created by Matus on 15. 2. 2016.
 */
$(function(){
    $("#recoverForm").submit(function(e){

        var email = $('.input').val();

        if(email == null || email == "" || email == " ") {
            $("#email-err").html("You cannot leave this field empty...");
        }
        else {
            return;
        }

        e.preventDefault();
    });
});