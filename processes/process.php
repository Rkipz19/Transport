<?php
//include 'C:\Apache24\htdocs\Transport\classes\init.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

        //Load Composer's autoloader
require 'C:/Apache24/htdocs/PHPMailer/vendor/autoload.php';
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';
include 'functions/functions.php';
session_start();
class process extends connection{
    public function signup_process(){


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
}
    public function login_process(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
       
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch();
            if($user){
                if($user['email_verified_at'] == NULL){
                    echo "Please verify your email <a href = 'userverification.php?email=".$email."'>here</a>";
                    }
                if(password_verify($password, $user['password'])){
                    $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>You have successfully login!</h4>";
                    $_SESSION['email'] = $email;
                    header("Location: userpage.php");
                }else{
                    $GLOBALS['error'] = "<h4 class = 'text-danger text-center'>Incorrect email or password</h4>";
                }
        }
        }
}
    public function verify_process(){
        if(isset($_POST['verify_email'])){
            $email = $_POST['email'];
            $verification_code = $_POST['verificationcode'];
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
            $user = $stmt->fetch();
            if($user['verification_code'] == $verification_code){
                $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '$email'";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute();
                echo "Email verified successfully";
                header("Location: userlogin.php");
            }else{
                echo "Invalid verification code";
            }
        }
    }

    public function userpage_process(){
        if(!isset($_SESSION['email'])){
            header("Location: userlogin.php");
        }else{
        $currentuser = $_SESSION['email'];
        $sql = "SELECT * FROM `users` WHERE `email` = '$currentuser'";
        $result = $this->connect()->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        $_SESSION['firstname'] = $row['firstname'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['email'] = $row['email'];
        }
    }

    public function resetpassword(){
        if(isset($_POST['resetPassword'])){
            $email = $_POST['email'];

            $sql = "SELECT email FROM users WHERE email = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$email]);
            $row = $query->rowCount();
            
            if($row == 1){
                // existing user, proceed with reset password

                //generate a random code
                $code = generateRandomString();

                $link = 'href = "http://localhost/Transport/usernewpassword.php?email='.$email.'$code='.$code.'"';

                $link2 = '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;"'.$link.'>Link </a></span>';

                //echo $code, $link
                $sql1 = "SELECT * FROM reset WHERE email = ?";
                $query_exist = $this->connect()->prepare($sql1);
                $query_exist ->execute([$email]);
                $from_reset = $query_exist->fetch();

                if(empty($from_reset)){
                    $query_insert = $this->connect()->prepare("INSERT INTO reset(email, code) VALUES (?,?)");
                    $query_insert->execute([$email,$code]);
                }else{
                    //Already exist reseting attempt, switch to update the reset table instead
                    $query_insert = $this->connect()->prepare("UPDATE reset SET code = ? WHERE email =?");
                    $query_insert->execute([$code,$email]);
                }

                $mail = new PHPMailer(true);
   
                try {
                  //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'ronnie.kipkoech@strathmore.edu';                     //SMTP username
                  $mail->Password   = 'muettovltjukasab';                               //SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                  $mail->Port       = 465;    
              
                  //Recipients
                  $mail->setFrom('Urbanlinktranport@gmail.com', 'Urbanlink Transport');
                  $mail->addAddress($email); 
                  //Content
                  $mail->isHTML(true);                                  //Set email format to HTML
                  $mail->Subject = 'Reset password from Urban Links';
                  $mail->Body    = '
                    <p>Dear '.$email.',</p>

                    <p>Please click on this link to reset your password:</p>
                    <p>'.$link2.'</p>

                    Best wishes,
                    <br>
                    <span>Urban Link Transport</span>
                ';
                      //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                  
                  $mail->send();

                  echo '<script>alert("Please check your email(including spam) to see the password reset Link.")</script>';
                  
                  } catch (Exception $e) {
                      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                  }

            } else {
                echo "<script>alert('Email does not exist!')</script>";
            }
        }
    }

    public function newpassword(){
        if(isset($_GET['email']) && isset($_GET['code'])){
            $_SESSION['email'] = $_GET['email'];
            $code = $_GET['code'];

            $sql = "SELECT * FROM reset WHERE email = ?";
            $query = $this->connect()->prepare($sql);
            $query->execute([$_SESSION['email']]);
            $from_reset = $query->fetch();

            if($code != $from_reset['code']){
                $GLOBALS['expired'] = 'Sorry, your link is invalid or has expired!';
            }
        }

        if(isset($_POST['reset'])){
            $pass1 = $_POST['newpassword'];
            $pass2 = $_POST['confirmnewpassword'];
            $email = $_POST['email'];

            if($pass1 == $pass2){
                $hashed_password = password_hash($pass1, PASSWORD_DEFAULT);
                $query1 = $this->connect()->prepare('UPDATE users SET password = "$hashed_password"  WHERE email = "$email"');
               
               if($query1->execute()){
                if($query1->rowCount()>0){
                $GLOBALS['msg'] = 'Successfully updated your password!<a class="btn btn-success" href="userlogin.php">Login</a>';
                }else{
                    $GLOBALS['error'] = 'Failed to update password. No rows affected.';
                }
            }else{
                $GLOBALS['error'] = 'Failed to execute update query. Please try again.';
            } 
        }else{
                $GLOBALS['error'] = 'Password do not match!';
            }
            session_destroy();

        }
    }
}

