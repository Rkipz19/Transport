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
            
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
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
                    $GLOBALS['error'] = "<h4 class='text-danger text-center'>Incorrect email or password</h4>";
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
                $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = ?";
                $stmt = $this->connect()->prepare($sql);
                $stmt->execute([$email]);
                echo "Email verified successfully";
                header("Location: userlogin.php");
            }else{
                echo "Invalid verification code";
            }
        }
    }

    public function userpage_process(){
        if(!isset($_SESSION['email'])){
            header("Location:userlogin.php"); //redirect to login page if user is not logged in
          }else{
            $currentuser = $_SESSION['email'];
            $sql = "SELECT * FROM `users` WHERE `email`= '$currentuser'";
            $result = $this->connect()->prepare($sql);
            $result->execute();
            $user = $result->fetch();
            $_SESSION['firstname'] = $user['firstname'];
          }          
    }

    public function resetpassword(){
       if(isset($_POST['email'])){
        $email = $_POST['email'];
       
       $token = bin2hex(random_bytes(16));

       $token_hash = hash('sha256', $token);
       
       $expiry = date("Y-m-d H:i:s",time() + 60 * 30);

       $sql = "UPDATE users SET reset_token_hash = :reset_token_hash, reset_token_expires_at = :reset_token_expires_at WHERE email = :email";

        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);
        $stmt->bindParam(':reset_token_expires_at', $expiry, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $mail = require __DIR__ . '/mailer.php';

            $mail->setFrom('Urbanlinktranport@example.com', 'Urbanlink Transport.com');
            $mail-> addAddress($email);
            $mail->Subject = 'Password Reset';
            $mail->Body = <<<END
            Click <a href = "http://localhost/Transport/usernewpassword.php?email=$email&token=$token">here</a> to reset your password.
            
            END;
            
            try{
                $mail->send();
            }catch(Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->Error_Info}";
            }
        }
        $GLOBALS['msg'] = "Message has been sent, please check your email";
       }
    }

    public function resetpassword_process(){
        if(isset($_GET['token'])){
           $GLOBALS['token'] = $_GET['token'];

           $token_hash = hash('sha256', $GLOBALS['token']);

           $pdo = $this->connect();

           $sql = "SELECT * FROM users WHERE reset_token_hash = :reset_token_hash";

           $stmt = $pdo -> prepare($sql);

           $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);

           $stmt->execute();

           $user = $stmt->fetch();

           if($user ===  null){
            die("token not found");
           }

           if(strtotime($user['reset_token_expires_at']) <= time()){
            die("Token has expired");
           }
        }

        if(isset($_POST['token'])){
            $token = $_POST['token'];
 
            $token_hash = hash('sha256', $token);
 
            $pdo = $this->connect();
 
            $sql = "SELECT * FROM users WHERE reset_token_hash = :reset_token_hash";
 
            $stmt = $pdo -> prepare($sql);
 
            $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);
 
            $stmt->execute();
 
            $user = $stmt->fetch();
 
            if($user ===  null){
             die("token not found");
            }
 
            if(strtotime($user['reset_token_expires_at']) <= time()){
             die("Token has expired");
            }
         
 
         $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
         $sql = "UPDATE users SET password = :password,reset_token_hash = NULL, reset_token_expires_at = NULL WHERE userid = :id";
 
         $stmt = $pdo -> prepare($sql);
 
         $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
         $stmt->bindParam(':id', $user['userid'], PDO::PARAM_INT);
 
         $stmt->execute();
 
         $GLOBALS['msg'] = "Password reset successfully. You can now login.";
     }
    }

    public function profile(){
        $currentuser = $_SESSION['email'];
        $sql = "SELECT * FROM `users` WHERE `email`= '$currentuser'";
        $result = $this->connect()->prepare($sql);
        $result->execute();
        $user = $result->fetch();
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['email'] = $user['email'];
    }

    public function adminlogin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql1 = "SELECT * FROM admin WHERE email = ?";
            $stmt = $this->connect()->prepare($sql1);
            $stmt->execute([$email]);
            $admin = $stmt->fetch();
            if($admin){
                $hashedPassword = hash('sha512', $password);

                if($hashedPassword === $admin['password']){
                    $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>You have successfully login!</h4>";
                    $_SESSION['email'] = $email;
                    header("Location: regadminpage.php");
                }else{
                    $GLOBALS['error'] ="<h4 class='text-danger text-center'>Incorrect email or password</h4>";
                }
        }
        }
    }
    
    public function adminpage_process(){
        if(!isset($_SESSION['email'])){
            header("Location:userlogin.php"); //redirect to login page if user is not logged in
          }else{
            $currentuser = $_SESSION['email'];
            $sql = "SELECT * FROM `admin` WHERE `email`= '$currentuser'";
            $result = $this->connect()->prepare($sql);
            $result->execute();
            $user = $result->fetch();
            $_SESSION['adminname'] = $user['adminname'];
          }          
    }

}

