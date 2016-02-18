/**
 * @author Matus Kacmar
 */
$(function(){
    $("li .error").hide();

    $("#regForm").submit(function(e) {
        var inputFields = $(".input");
        var isEmpty = false;

        inputFields.each(function(){
            var input = $(this).val();

            if(input == null || input == "" || input == " ") {
                $("#form-err").html("You left some fields empty...");
                $("#form-err").slideDown("slow");
                isEmpty = true;
                return false;
            }
        });

        if(isEmpty === false) {
            var pass1 = document.getElementById('pass1');
            var pass2 = document.getElementById('pass2');

            if(pass1.value == pass2.value){
                return true;
            }
            else {
                $("#pass-err").html("Passwords does not match!");
                $("#pass-err").slideDown("slow");
            }
        }

        e.preventDefault();
    });
});