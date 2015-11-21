window.onload=function() {
  var email = document.getElementById("mail-input");
  var password = document.getElementById("password-input");
  var mailError = document.getElementById("mail-error");
  var passwordError = document.getElementById("pass-error");

  email.onblur = function() {
      if(email.validity.typeMismatch) {
          mailError.innerHTML = "Wrong format of email";
      }
      else if(email.validity.rangeOverflow) {
          mailError.innerHTML = "Input is too long";
      }
      else if(email.validity.valueMissing) {
          mailError.innerHTML = "Please enter your email address";
      }
      else if(email.validity.valid){
          mailError.innerHTML = "";
      }

      setTimeout(function(){
          mailError.innerHTML = "";
      },2000);
  };

  password.onblur = function() {
      if(email.validity.rangeOverflow) {
          passwordError.innerHTML = "Password has too many characters";
      }
      else if(email.validity.valueMissing) {
          passwordError.innerHTML = "Please enter your password";
      }
      else {
          passwordError.innerHTML = "";
      }

      setTimeout(function(){
          passwordError.innerHTML = "";
      },2000);
  };

  if(document.getElementById("login-error") != null) {
      setTimeout(function(){
          document.getElementById("login-error").remove();
      },2500);
  }
}
