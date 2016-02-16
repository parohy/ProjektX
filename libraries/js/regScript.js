/**
 * @author Tomas Paronai
 */
$(function(){
    $("#regForm").submit(function(e) {
        var inputFields = $(".input");
        var isEmpty = false;

        inputFields.each(function(){
            var input = $(this).val();

            if(input == null || input == "" || input == " ") {
                $("#form-err").html("You left some fields empty...");
                isEmpty = true;
                return false;
            }
        });

        if(isEmpty === false) {
            var pass1 = document.getElementById('pass1');
            var pass2 = document.getElementById('pass2');

            if(pass1.value == pass2.value){
                alert("ales good");
                return true;
            }
            else {
                $("#pass-err").html("Passwords does not match!");
            }
        }

        e.preventDefault();
    });
});