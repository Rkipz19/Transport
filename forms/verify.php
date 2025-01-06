<?php 
//include 'C:\Apache24\htdocs\Transport\classes\init.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class verify extends connection{
public function verify_email(){
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
?>
<div class = "container d-flex gap-3 justify-content-center align-items-center mt-2">
<form method = "POST">
  <div class="form-group p-3">
    <input type="hidden" name = "email" class="form-control" value ="<?php echo $_GET['email']; ?>" required>
  </div>
  <div class="form-group p-3">
    <label for="verificationcode">Verification Code</label>
    <input type="text" name = "verificationcode" class="form-control" id="verificationcode" placeholder="Enter Verification Code"  required>
  </div>
  <button type="submit" class="btn btn-primary" name = "verify_email" value= "Verify">Submit</button>
  <div>
  <a href = "index.php">Back to home</a>
  </div>
</form>
</div>
<?php
      
    }
  }

    
