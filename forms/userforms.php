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
 <div class="container-fluid overflow-hidden">
  <div class="row g-0 vh-100 overflow-y-auto">
        <div class="col-2 col-sm-3 col-xl-2 d-flex fixed-top" id="sidebar">
            <div class="d-flex flex-column flex-grow-1 align-items-center align-items-sm-start bg-dark px-2 px-sm-3 py-2 text-white vh-100 overflow-auto">
                <a href="/" class="d-flex align-items-center pb-sm-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <span class="fs-5">U<span class="d-none d-sm-inline">rban Link Transport</span></span>
                </a>
                <ul class="nav nav-pills flex-column flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="userpage.php" class="nav-link">
                            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="order.php" class="nav-link">
                            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Order</span>
                        </a>
                    </li>
                </ul>
                <div class="dropup py-sm-4 py-1 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['firstname'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark px-0 px-sm-2 text-center text-sm-start" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item px-1" href="userprofile.php"><i class="fs-6 bi-binoculars"></i><span class="d-none d-sm-inline ps-1">Profile</span></a></li>
                        <li><a class="dropdown-item px-1" href="userlogout.php"><i class="fs-6 bi-bookmark"></i><span class="d-none d-sm-inline ps-1">Sign out</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
 }

public function main(){
      ?>
    <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
      <h5 class= "text-center">Welcome <?php echo $_SESSION['firstname'] ?> to Urban Link Transport!</h5>
  <div class = "row justify-content-between">
    <?php foreach($GLOBALS['farmername'] as $row) {?>
    <div class = "col-md-4 mb-4">
      <div class="card text-bg-primary" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Delivery status</h5>
          <p class="card-text"><?= $row['status'] ?></p>
        </div>
      </div>
    </div>
    <div class = "col-md-4 mb-4">
    <div class="card text-bg-success" style="width: 18rem;">
        <div class="card-body">
          <h5 class="card-title">Total Cost</h5>
          <p class="card-text"><?= $row['total_cost'] ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
  <div class="card">
              <div class = "card-header">
                <h4>
                  Orders
                </h4>
              </div>
              <div class="card-body">
                <table id="myTable" class=" w-25 table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>farmername</th>
                      <th>productdetails</th>
                      <th>Weight</th>
                      <th>PickupLocation</th>
                      <th>Delivery Location</th>
                      <th>Status</th>
                      <th>Ordered date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                        <?php 
                            $orders = getUserOrder($_SESSION['firstname']);
                                if($orders){
                                    foreach($orders as $order){
                        ?>
                        <tr>
                            <td><?= $order['orderid'] ?></td>
                            <td><?= $order['farmername'] ?></td>
                            <td><?= $order['productdetails'] ?></td>
                            <td><?= $order['weight'] ?></td>
                            <td><?= $order['pickupLocation'] ?></td>
                            <td><?= $order['deliveryLocation'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td><?= $order['orderedAt'] ?></td>
                            <td>
                              <a href="user-orderview.php?orderid=<?= $order['orderid']; ?>" class = "btn btn-success mb-3" role = "button">View</a>
                            </td>
                        </tr>
                    </tbody>
                    <?php }
                        } ?>
                </table>
              </div>
          </div>
      </div>
    </div>
<!---End-->
    </div>
  </main>
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
<div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
<main class="row overflow-auto">
  <div class="col pt-3">
    <div class = "border rounded-5 p-3 bg-dark.bg-gradient shadow box-area mx-3">
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
</main>
</div>

  <?php
}

public function uservieworder(){
  ?>
  
<div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
  <main class="row overflow-auto">
    <div class="col pt-3">
      <div class="card" style = "width: 20rem;">
        <div class="card-header">
          <h4>View Order
            <a href="userpage.php" class = "btn btn-danger btn-sm mb-0 float-end">Back</a>
          </h4>
          <div class="card-body">
          <?php
                $paramResult = checkParamId('orderid');
                if(!is_numeric($paramResult)){
                echo '<h5>'.$paramResult.'</h5>';
                return false;
                }

                $order = getByorderId('orders',checkParamId('orderid'));
                if($order['status'] == 200){
              ?>
          <table class = "table table-bordered table-striped">
              <tbody>
                <tr>
                  <td>Orderid</td>
                  <td><?= $order['data']['orderid'] ?></td>
                </tr>
                <tr>
                  <td>Farmername</td>
                  <td><?= $order['data']['farmername'] ?></td>
                </tr>
                <tr>
                  <td>Farmer PhoneNumber</td>
                  <td><?= $order['data']['farmerphoneno'] ?></td>
                </tr>
                <tr>
                  <td>Product details</td>
                  <td><?= $order['data']['productdetails'] ?></td>
                </tr>
                <tr>
                  <td>Pickup Location</td>
                  <td><?= $order['data']['pickupLocation'] ?></td>
                </tr>
                <tr>
                  <td>Delivery Location</td>
                  <td><?= $order['data']['deliveryLocation'] ?></td>
                </tr>
                <tr>
                  <td>Distance in km</td>
                  <td><?= $order['data']['distance_km'] ?></td>
                </tr>
                <tr>
                  <td>Assigned Vehicle</td>
                  <td><?= $order['data']['assigned_vehicle'] ?></td>
                </tr>
                <tr>
                  <td>Assigned Driver</td>
                  <td><?= $order['data']['assigned_driver'] ?></td>
                </tr>
                <tr>
                  <td>Status</td>
                  <td><?= $order['data']['status'] ?></td>
                </tr>
                <tr>
                  <td>Total Cost</td>
                  <td><?= $order['data']['total_cost'] ?></td>
                </tr>
                <tr>
                  <td>Order Date</td>
                  <td><?= $order['data']['orderedAt'] ?></td>
                </tr>
              </tbody>
            </table>
                  <?php
                }else{
                  echo '<h5>No Records Found</h5>';
                }
                  ?>
          </div>
        </div>
      </div>
      </div>
</main>
</div>
    
  
  <?php
}

}





