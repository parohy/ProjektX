window.onload=function() {
  var email = document.getElementById("mail-input");
  var password = document.getElementById("password-input");
  var error = document.getElementById("error");

  email.onblur = function() {
      if(email.validity.typeMismatch) {
          error.innerHTML = "Wrong type of email";
      }
      else if(email.validity.rangeOverflow) {
          error.innerHTML = "Input is too long";
      }
      else if(email.validity.valueMissing) {
          error.innerHTML = "You must enter the email";
      }
      else {
          error.innerHTML = "";
          console.log("hello");
      }
  };
}
