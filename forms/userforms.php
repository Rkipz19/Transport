<?php
class userForms{
 public function signup_form(){
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
  <?php
 }
 public function login_form(){
  ?>
<div class = "container d-flex gap-3 my-5 justify-content-center align-items-center">
  <form class = "needs-validation" class = "col-log-6 offset-lg-3" method = "POST" novalidate>
    <div class="form-group p-3">
      <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group p-3">
    <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        <input type="checkbox" onclick="myFunction()">Show password
    </div>
<div>
  <p>Don't have an account? <a href = "usersignup.php">Sign up</a></p>
  <p>Back home <a href = "index.php"> Home</a></p>
  </div>
  <button type="submit" class="btn btn-primary" name = "login">Submit</button>
</form>
</div>
<?php
 }
 public function verification_form(){
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
 public function userpage(){
  ?>
  <div class = "d-flex justify-content-start">
  <table>
      <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
      </tr>
      <tr>
          <td><?php echo $_SESSION['firstname'] ?></td>
          <td><?php echo $_SESSION['lastname'] ?></td>
          <td><?php echo $_SESSION['email'] ?></td>
  </table>
</div>
<div>
  <a href = "logout.php">Logout</a>
</div>
<?php
 }
}



