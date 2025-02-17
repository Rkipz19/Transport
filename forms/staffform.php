<?php
class staffform{

    public function resetpassword(){
        ?>
    <div class = "container d-flex justify-content-center align-items-center mt-5">
        <div class = "border p-3 border-primary rounded bg-light shadow box-area">
            <form method="POST">
                <div class = "mb-3">
                    <h1 style = "text-align:center">Staff Reset Password</h1>
                    <?php if(isset($GLOABALS['msg'])){echo $GLOBALS['msg']; }?>
                </div>
                <div class = "mb-3">  
                    <input type="text" name = "email" class = "form-control" placeholder = "Enter your email">
                </div>
                <div class = "d-grid col-6 mx-auto">
                    <button type = "submit" class = "btn btn-primary width-75" name = "resetpassword">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
        <?php
    }

    public function updatepasswordform(){
        ?>
    <div class="container d-flex justify-content-center align-items-center mt-5">
      <div class="border p-3 border-primary rounded bg-light shadow box-area">
          <form method = "POST">
            <div class="mb-3">
              <h1 style = "text-align:center">Staff reset password</h1>
              <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
            </div>
            <div class = "mb-3">
              <input type = "hidden" class = "form-control" name = "token" value = "<?= htmlspecialchars($GLOBALS['token']) ?>">
            </div>

            <div class = "mb-3">
              <label for = "password">New Password</label>
              <input type = "password" class = "form-control" id = "password" name = "password" placeholder = "Enter new password" oninput = "validatePassword(this.value)" required>
              <input type = "checkbox" onclick = "myFunction()"><small>Show password</small>
              <i class="fas fa-eye" id = "icon"></i>
            </div>

            <div class="mb-3">
              <span id = "feedback" class="text-danger"></span>
            </div>

            <div class = "mb-3">
              <label for = "confirmpassword">Confirm new password</label>
              <input type = "password" class = "form-control" id = "confirmpassword" name = "confirmpassword" placeholder = "Enter new password" oninput = "validateConfirmPassword(this.value)" required>
              <input type = "checkbox" onclick = "myFunction1()"><small>Show password</small>
              <i class="fas fa-eye" id = "icon1"></i>
            </div>

            <div class="mb-3">
              <span id = "feedback1" class="text-danger"></span>
            </div>

            <div class="d-grid col-6 mx-auto">
            <button type = "submit" class = "btn btn-primary" name = "Reset">Reset Password</button>
            </div>
          </form>
      </div>
    </div>
        <?php
    }

    public function stafflogin(){
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
      <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
      <?php if(isset($GLOBALS['error'])){echo $GLOBALS['error'];}?>
        <h2 style = "text-align:center;">Staff Login</h2>
    
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
      <p style = "text-align:center">Forgot password? <a href = "staffresetpassword.php">Reset password</a></p>
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

    public function staffpage(){
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
              <span class = "ms-1 d-none d-sm-inline"></span>
              </a>
            </li>
          </ul>
          <hr>
          <div class = "dropdown pb-4">
            <a href = "" class = "d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src = "images/driver.jpg" alt = "" width = "30" height = "30" class ="rounded-circle">
                <span class = "d-none d-sm-inline mx-1"><?php echo $_SESSION['drivername'] ?></span>
            </a>
            <ul class = "dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class = "dropdown-item" href = "driverprofile.php">Profile</a></li>
              <li>
                <hr class ="dropdown-divider">
              </li>
              <li><a class = "dropdown-item" href = "driverlogout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class = "col py-3">
      <h5 class= "text-center">Welcome driver <?php echo $_SESSION['drivername'] ?> to Urban Link Transport!</h5>
      <h5 class = "text-center">Assigned Orders</h5>
      <?php if(isset($_GLOBALS['successorder'])){ echo $_GLOBALS['successorder']; } ?>
      <?php if(isset($_GLOBALS['successorder'])){ echo $_GLOBALS['successorder']; } ?>
      <table class = "table table-dark">
      <tr>
        <th scope = "col">Order ID</th>
        <th scope = "col">Farmer name</th>
        <th scope = "col">Phone number</th>
        <th scope = "col">Product</th>
        <th scope = "col">Weight</th>
        <th scope = "col">Pickup</th>
        <th scope = "col">Delivery</th>
        <th scope = "col">Distance(Kilometers)</th>
        <th scope = "col">Actions</th>
      </tr>
      <tr>
      <?php foreach($GLOBALS['driver'] as $row) {?>
        <td><?=  $row['orderid']?></td>
        <td><?=  $row['farmername']?></td>
        <td><?=  $row['farmerphoneno']?></td>
        <td><?=  $row['productdetails']?></td>
        <td><?=  $row['weight']?></td>
        <td><?=  $row['pickupLocation']?></td>
        <td><?=  $row['deliveryLocation']?></td>
        <td><?=  $row['distance_km']?></td>
        <td>
          <form method = "POST">
              <input type="hidden" name="orderid" id = "orderid" value ="<?= $row['orderid'] ?>">
              <button type = "submit" class="btn btn-primary" name = "completeorder">Complete Order</button>
          </form>
        </td>
      </tr>
      <?php } ?>
      </table>
      </div>
    </div>
  </div>
      <?php
    }
}