 <?php
//include 'C:\Apache24\htdocs\Transport\classes\init.php';
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 

require_once 'connect.php';
session_start();
class login extends connection{
    public function login_user(){
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
        ?>
<div class = "container d-flex gap-3 my-5 justify-content-center align-items-center">
<form class = "needs-validation" class = "col-log-6 offset-lg-3" method = "POST" novalidate>
  <div class="form-group p-3">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group p-3">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
    <input type="checkbox" onclick="myFunction()">Show password
  </div>
  <div>
  <p>Don't have an account? <a href = "usersignup.php">Sign up</a></p>
  <p>Back home <a href = "index.php"> Home</a></p>
  </div>
  <button type="submit" class="btn btn-primary" name = "login">Submit</button>
</form>
</div>
<script>
  function myFunction(){
    var p = document.getElementById("exampleInputPassword1");
    if(p.type === "password"){
        p.type = "text";
    }else{
        p.type = "password";
    }
}
</script>
<?php
  }
}


