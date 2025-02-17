<?php
class userForms{
 public function signup_form(){
  ?>
  <!--------Main container------------>
<div class = "container d-flex justify-content-center align-items-center min-hv-100">
  <div class = "row border rounded-5 p-3 bg-white shadow box-area">
    <div class = "col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style = "background: #808080">
      <div class = "featured-image mb-3">
        <img src = "images/driver.jpg" class = "img-fluid" style= "width:450px">
      </div>
      <p class = "text-white fs-2" style = "font-family: 'Courier New', Courier, monospace; font-weight: 700;">Be verified</p>
      <small class = "text-white text-wrap text-center" style = "width: 17rem;font-family: 'Courier New', Courier, monospace;">Transporting farm produce</small>
    </div>
  <div class = "col-md-6 right-box">
    <div class = "row">
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
    <input type="checkbox" onclick="myFunction()"><small>Show password</small>
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
    <input type="checkbox" onclick="myFunction1()"><small>Show password</small>
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
 </div>
 </div>
  </div>
  <?php
 }
 public function login_form(){
  ?>
<div class = "container d-flex gap-3 my-5 justify-content-center align-items-center">
<div class = "row border rounded-5 p-3 bg-white shadow box-area">
    <div class = "col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style = "background: #808080">
      <div class = "featured-image mb-3">
        <img src = "images/driver.jpg" class = "img-fluid" style= "width:450px">
      </div>
      <p class = "text-white fs-2" style = "font-family: 'Courier New', Courier, monospace; font-weight: 700;">Be verified</p>
      <small class = "text-white text-wrap text-center" style = "width: 17rem;font-family: 'Courier New', Courier, monospace;">Transporting farm produce</small>
    </div>
    <div class = "col-md-6 right-box">
  <form class = "needs-validation" class = "col-log-6 offset-lg-3" method = "POST" novalidate>
  
  <?php if(isset($GLOBALS['error'])){echo $GLOBALS['error'];}?>
    <h2 style = "text-align:center;">Login</h2>

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
<p style = "text-align:center">Forgot your password? <a href = "resetpassword.php">Reset password</a></p>
  <p style = "text-align:center">Don't have an account? <a href = "usersignup.php">Sign up</a></p>
  </div>
  <div class = "d-grid col-6 mx-auto">
  <button type="submit" class="btn btn-primary mb-3" name = "login">Submit</button>
  <a href = "index.php" role = "button" class = "btn btn-secondary">Back Home</a>
 </div>
</form>
 </div>
 </div>
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
 <div class = "container-fluid">
    <div class = "row flex-nowrap">
      <div class = "col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
        <div class = "d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
          <a href = "/" class = "d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class = "fs-4 d-none d-sm-inline align-middle">Menu</span>
          </a>
          <ul class = "nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id ="menu">
            <li class = "nav-item">
              <a href = "" class = "nav-link align-middle px-0">
              <i class="bi bi-house"></i></i><span class = "ms-1 d-none d-sm-inline">Home</span>
              </a>
            </li>
            <li class = "nav-item">
              <a href = "order.php" class = "nav-link align-middle px-0">
              <i class="bi bi-truck"></i><span class = "ms-1 d-none d-sm-inline">Order</span>
              </a>
            </li>
          </ul>
          <hr>
          <div class = "dropdown pb-4">
            <a href = "" class = "d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src = "images/driver.jpg" alt = "" width = "30" height = "30" class ="rounded-circle">
                <span class = "d-none d-sm-inline mx-1"><?php echo $_SESSION['firstname'] ?></span>
            </a>
            <ul class = "dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class = "dropdown-item" href = "userprofile.php">Profile</a></li>
              <li>
                <hr class ="dropdown-divider">
              </li>
              <li><a class = "dropdown-item" href = "userlogout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class = "col py-3">
      <h5 class= "text-center">Welcome <?php echo $_SESSION['firstname'] ?> to Urban Link Transport!</h5>

        <table class = "table table-dark">
          <tr>
            <th>Delivery Status</th>
            <th>Total Cost</th>
          </tr>
          <?php foreach($GLOBALS['farmername'] as $row) { ?>
          <tr>
            <td><?= htmlspecialchar($row['status']) ?></td>
            <td><?= htmlspecialchar($row['total_cost']) ?></td>
          </tr>
            <?php } ?>
        </table>

      </div>
    </div>
  </div>
<?php
 }


 public function forgot_password(){
  ?>
  <div class = "container d-flex gap-3 my-5 justify-content-center align-items-center">
  <form method = "POST">
  <h1>Reset Your Password</h1>
  <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
  <div class="form-group p-3">
  <label for="email">Email</label>
  <input type="email" class="form-control" id="email" placeholder="Enter Email" name = "email" required>
  <button type="submit" class="btn btn-primary" name = "resetPassword">Submit</button>
 </div>
 </form>
 </div>
 <?php
}

public function reset_password(){
  ?>
    <div class = "container d-flex gap-3 my-5 justify-content-center align-items-center">
   <form method = "POST">
      <h1>Reset Your password</h1>
      <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
      <div class="form-group p-3">
         <input type="hidden" name = "token" class="form-control" value = "<?= htmlspecialchars($GLOBALS['token']) ?>">
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
          <button type="submit" class="btn btn-primary" name = "Reset">Submit</button>
    </div>
      </form>
      </div>

 <?php
}

public function profile(){
  ?>
<div class = "container d-flex gap-3 my-5 justify-content-center align-items-center border border-2 border-dark" style = "width: 19rem;">
<form>
<h2 style = "text-align:center">Profile</h2>
<div class = "justify-content-center p-2">
<img src = "" alt = "" width = "200" height = "200" class ="rounded-circle border border-2 border-dark mx-auto d-block">
</div>
<div class = "form-group p-3">
<label>Firstname:</label>
<input type = "text" class = "form-control" value = "<?php echo $_SESSION['firstname']?>">
</div>
<div class = "form-group p-3">
<label>Lastname:</label>
<input type = "text" class = "form-control" value = "<?php echo $_SESSION['lastname'] ?>">
</div>
<div class = "form-group p-3">
<label>Email:</label>
<input type = "text" class = "form-control" value = "<?php echo $_SESSION['email']?>">
</div>
<div class = "form-group mb-3">
  <label>Upload Profile picture:</label>
  <input type = "file" class = "form-control" id = "profilepic">
</div>
<div class = "row justify-content-center p-2">
<button type = "submit" class = "btn btn-primary">Update Profile</button>
</div>
</form>
</div>
  <?php
}

public function orders(){
  ?>
   <div class = "container d-flex justify-content-center align-items-center min-vh-100">
    <div class = "border rounded-5 p-3 bg-dark.bg-gradient shadow box-area">
        <form method = "POST">
          <div class = "mb-3">
            <h1 style = "text-align:center">Order placement <i class="bi bi-truck-flatbed"></i></h1>
          </div>
          <div class = "mb-3">
            <?php if(isset($GLOBALS['order'])){ echo $GLOBALS['order'];} ?>
            <?php if(isset($GLOBALS['Nodriver'])){ echo $GLOBALS['Nodriver'];} ?>
            <?php if(isset($GLOBALS['Novehicle'])){ echo $GLOBALS['Novehicle'];} ?>
          </div>
          <div class="mb-3">
            <label for="farmername" class="form-label">Farmer name</label>
            <input type="text" class="form-control" id="farmername" name = "fname" aria-describedby="" value = "<?php echo $_SESSION['firstname'] ?>">
          </div>
          <div class="mb-3">
            <label for="phonenumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="phonenumber" name = "Phonenumber" placeholder = "+254">
          </div>
          <div class="mb-3">
            <label for="producttype" class="form-label">Product Type</label>
            <select class="form-select" name = "producttype" id ="producttype">
              <option selected>Kindly Select A Product for Transport</option>
              <option value="Farm produce">Perishable Goods(Fruits, Vegetables, Dairy)</option>
              <option value="Farm Inputs">Farm inputs(Herbicides, Pesticides, Fertilizers)</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="weight" class="form-label">Weight(in tonnes)</label>
            <input type="number" class="form-control" id="weight" name = "weight" placeholder = "Measure of product in tonnes">
          </div>
          <div class="mb-3">
            <label for="plocation" class="form-label">Pickup Location</label>
            <input type="text" class="form-control" id="plocation" name = "plocation" placeholder = "Area of collection">
          </div>
          <div class="mb-3">
            <label for="dlocation" class="form-label">Delivery location</label>
            <input type="text" class="form-control" id="dlocation" name = "dlocation" placeholder = "Destination">
          </div>
          <div class="mb-3">
            <label for="distance" class="form-label">Distance(in km)</label>
            <input type="text" class="form-control" id="distance" name = "distance" placeholder = "Distance covered in kilometers">
          </div>
          <div class = "d-grid col-6 mx-auto">
            <button type="submit" class="btn btn-primary mb-3">Place Order <i class="bi bi-truck"></i></button>
            <a href="userpage.php" class = "btn btn-secondary" role = "button"> Back home</a>
          </div>
        </form>
</div>
</div>
  <?php
}
}





