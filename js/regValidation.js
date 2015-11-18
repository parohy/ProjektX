window.onload = function() {
    var firstName = document.getElementById("first-name");
    var lastName = document.getElementById("last-name");
    var email = document.getElementById("email");
    var password = document.getElementById("password");
    var firstError = document.getElementById("first-registration");
    var secondError = document.getElementById("second-registration");
    var emailError = document.getElementById("mail-registration");
    var passwordError = document.getElementById("password-registration");

    firstName.onblur = function() {
      if(firstName.validity.typeMismatch) {
          firstError.innerHTML = "Wrong input";
      }
      else if(firstName.validity.rangeOverflow) {
          firstError.innerHTML = "Name is too long";
      }
      else if(firstName.validity.valueMissing) {
          firstError.innerHTML = "You must enter the first name";
      }
      else if(firstName.validity.valid){
          firstError.innerHTML = "";
      }

      setTimeout(function(){
          firstError.innerHTML = "";
      },2000);
    };

    lastName.onblur = function() {
      if(lastName.validity.typeMismatch) {
          secondError.innerHTML = "Wrong input";
      }
      else if(lastName.validity.rangeOverflow) {
          secondError.innerHTML = "Name is too long";
      }
      else if(lastName.validity.valueMissing) {
          secondError.innerHTML = "You must enter the last name";
      }
      else if(lastName.validity.valid){
          secondError.innerHTML = "";
      }

      setTimeout(function(){
          secondError.innerHTML = "";
      },2000);
    };

    email.onblur = function() {
      if(email.validity.typeMismatch) {
          emailError.innerHTML = "Wrong type of email";
      }
      else if(email.validity.rangeOverflow) {
          emailError.innerHTML = "Email is too long";
      }
      else if(email.validity.valueMissing) {
          emailError.innerHTML = "You must enter the email";
      }
      else if(email.validity.valid){
          emailError.innerHTML = "";
      }

      setTimeout(function(){
          emailError.innerHTML = "";
      },2000);
    };

    password.onblur = function() {
      if(password.validity.typeMismatch) {
          passwordError.innerHTML = "Wrong input";
      }
      else if(password.validity.rangeOverflow) {
          passwordError.innerHTML = "Password is too long";
      }
      else if(password.validity.rangeUnderflow) {
          passwordError.innerHTML = "Password must be at least 6 characters long";
      }
      else if(password.validity.valueMissing) {
          passwordError.innerHTML = "You must enter the first password";
      }
      else if(password.validity.valid){
          passwordError.innerHTML = "";
      }

      setTimeout(function(){
          passwordError.innerHTML = "";
      },2000);
    };
};
