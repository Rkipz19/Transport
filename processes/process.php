<?php
//include 'C:\Apache24\htdocs\Transport\classes\init.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';
class process extends connection{
    public function signup_process(){
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
                if(password_verify($password, $user['password'])){
                    echo '<script>alert("Login successful")</script>';
                }else{
                    echo '<script>alert("Invalid password")</script>';
                }
                if($user['email_verified_at'] == NULL){
                  echo "Please verify your email <a href = 'userverification.php?email=".$email."'>here</a>";
                  }else{
                  $_SESSION['email'] = $email;
                  header("Location: userpage.php");
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
        $Firstname = $row['firstname'];
        $Lastname = $row['lastname'];
        $Email = $row['email'];
        }
    }
}