<?php
//include 'C:\Apache24\htdocs\Transport\classes\init.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once 'classes/connect.php';

class signup extends connection{
 public function displayform(){
//Load Composer's autoloader
require 'C:/Apache24/htdocs/PHPMailer/vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
  $firstname = $this->test_input($_POST['firstname']);
  $lastname = $this->test_input($_POST['lastname']);
  $email = $this->test_input($_POST['email']);
  $password = $this->test_input($_POST['password']);

  $mail = new PHPMailer(true);
   
  try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'ronnie.kipkoech@strathmore.edu';                     //SMTP username
    $mail->Password   = 'muettovltjukasab';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;    

    //Recipients
    $mail->setFrom('Urbanlinktranport@example.com', 'Urbanlink Transport.com');
    $mail->addAddress($email,$firstname); 
    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $verification_code = substr(number_format(time() * rand(),0,'',''),0,6);
    $mail->Subject = 'Email Verification Code';
    $mail->Body    = '<p>Your verification code is: <b>'.$verification_code.'</b></p>';
        //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
    $mail->send();
    echo 'Message has been sent';

    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (firstname, lastname, email, password, verification_code,email_verified_at) VALUES ( '$firstname', '$lastname', '$email', '$encrypted_password', '$verification_code',NULL)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    
    
    $email1 = filter_var($email, FILTER_SANITIZE_EMAIL);
    header("Location:userverification.php?email=" . urlencode($email1));
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

  }
  ?>
<div class = "container d-flex gap-3 justify-content-center align-items-center mt-2">
<form class = "needs-validation" class = "col-log-6 offset-lg-3" method = "POST" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" novalidate>
  <h1 style = "text-align:center;">Sign Up</h1>
  <div class="form-group p-2" class = "row justify-content-center">
    <label for="firstname">Firstname</label>
    <input type="text" class="form-control" id="firstname" placeholder="Enter Firstname" name="firstname" required>
  <div class= "valid-feedback">Valid</div>
  <div class= "invalid-feedback">Please fill out this field.</div>
</div>
  <div class="form-group p-2 " class = "row justify-content-center">
    <label for="lastname">Lastname</label>
    <input type="text" class="form-control" id="lastname" placeholder="Enter Lastname" name = "lastname" required>
    <div class = "valid-feedback">Valid</div>
    <div class = "invalid-feedback">Please fill out this field.</div>
  </div>
  <div class="form-group p-2" class = "row justify-content-center">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" placeholder="Enter Email" name = "email" oninput = "validateEmail(this.value)" required>
    <div class = "valid-feedback">Valid</div>
    <div class = "invalid-feedback">Please fill out this field.</div>	
    <i class = "fas fa-eye" id = "icon2"></i>  
  </div>
  <div class = "form-group p-2">
  <span id = "emailverification" class = "text-danger"></span>
  </div>
  <div class="form-group p-2" class = "row justify-content-center">
    <label for="password">Password</label>
    <input type="password" class= "form-control" id="password" placeholder="Enter Password" name = "password" oninput = "validatePassword(this.value)" required>
    <input type="checkbox" onclick="myFunction()">Show password
    <!--<div class = "valid-feedback">Valid</div>-->
    <div class = "invalid-feedback">Please fill out this field.</div>
   <i class = "fas fa-eye" id = "icon"></i>
  </div>
  <div class = "form-group">
    <span id="feedback" class = "text-danger"></span>
  </div>
  <div class="form-group p-2" class = "row justify-content-center">
    <label for="confirmpassword">ConfirmPassword</label>
    <input type="password" class = "form-control "id="confirmpassword" placeholder="Confirm Password" name = "confirmpassword" oninput ="validateConfirmPassword(this.value)" required>
    <input type="checkbox" onclick="myFunction1()">Show password
    <!--<div class = "valid-feedback">Valid</div>-->
    <div class = "invalid-feedback">Please fill out this field.</div>
    <i class = "fas fa-eye" id = "icon1"></i>
  </div>
  <div class = "form-group">
    <span id="feedback1" class = "text-danger"></span>
  </div>
  <div class = "row justify-content-center p-2">
  <button type="submit" class="btn btn-primary" id= "myButton" name = "signup">Submit</button>
  </div>
  <div class = "form-group justify-content-center">
    <p>Back Home <a href = "index.php"> Home</a></p>
</div>
</form>
  </div>
  <script>
// Disable form submissions if there are invalid fields
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
</script>
<script src = "forms/script.js"></script>
<?php
}
}



