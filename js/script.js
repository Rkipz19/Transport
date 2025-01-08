
document.getElementById("myButton").addEventListener("click", function() {
 const passwordInput = document.getElementById("password");
 const icon = document.getElementById("icon");
 const confirmPasswordInput = document.getElementById("confirmpassword");
 const icon1 = document.getElementById("icon1");

 if(passwordInput.type === "password") {
   passwordInput.type = "text";
   icon.classList.remove("fa-eye-slash");
   icon.classList.add("fa-eye");
 } else {
   passwordInput.type = "password";
   icon.classList.remove("fa-eye");
   icon.classList.add("fa-eye-slash");
 }
 if(confirmPasswordInput.type === "confirmpassword") {
    confirmPasswordInput.type = "text";
    icon1.classList.remove("fa-eye-slash");
    icon1.classList.add("fa-eye");
  } else {
    confirmPasswordInput.type = "confirmpassword";
    icon1.classList.remove("fa-eye");
    icon1.classList.add("fa-eye-slash");
  }
});

function validatePassword(password) {
    const feedback = document.getElementById("feedback");
    const strongPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;


    let message = "";
    let IsValid = true;

    if(password.length < 8) {
        message = "Password must be at least 8 characters long";
        IsValid = false;
    }
    if(!/^(?=.*[a-z])/.test(password)) {
        message = "Password must contain at least one lowercase letter";
        IsValid = false;
    }
    if(!/^(?=.*[A-Z])/.test(password)) {
        message = "Password must contain at least one uppercase letter";
        IsValid = false;
    }
    if(!/^(?=.*[0-9])/.test(password)) {
        message = "Password must contain at least one number";
        IsValid = false;
    }
    if(!/^(?=.*[!@#\$%\^&\*])/.test(password)) {
        message = "Password must contain at least one special character";
        IsValid = false;
    }
    if(IsValid){
        feedback.textContent = "Password is strong";
        feedback.classList.remove('text-danger');
        feedback.classList.add('text-success');
        setTimeout(function(){
            feedback.textContent = "";
        }, 2000);
    } else {
        feedback.textContent = message;
        feedback.classList.remove('text-success');
        feedback.classList.add('text-danger');
    } 
}

function validateConfirmPassword(confirmpassword) {
    const feedback1 = document.getElementById("feedback1");
    var Password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("confirmpassword").value;
    if(confirmPassword !== Password) {
        feedback1.textContent = "Passwords do not match";
        feedback1.classList.remove('text-success');
        feedback1.classList.add('text-danger');
    } else {
        feedback1.textContent = "Passwords match";
        feedback1.classList.remove('text-danger');
        feedback1.classList.add('text-success');
        setTimeout(function(){
            feedback1.textContent = "";
        }, 3000);
    }
}

(function() {
    'use strict';
    window.addEventListener('load', function() {
      // Get the forms we want to add validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
      var email = document.getElementById('email');
      email.oninput = () => {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (re.test(email.value)) {
          email.setCustomValidity('');
          email.classList.add('is-valid');
        } else {
          email.classList.remove('is-valid');
          email.setCustomValidity('Invalid email format');
        }
      }
    }, false);
  })();
  
  function myFunction(){
      var p = document.getElementById("password");
      if(p.type === "password"){
          p.type = "text";
      }else{
          p.type = "password";
      }
  }
  
  function myFunction1(){
      var p = document.getElementById("confirmpassword");
      if(p.type === "password"){
          p.type = "text";
      }else{
          p.type = "password";
      }
  }






