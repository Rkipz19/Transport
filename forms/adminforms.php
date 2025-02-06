<?php 
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class adminForms extends connection{
    public function adminpage(){
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
            <li>
              <a href = "#sub-menu" data-bs-toggle="collapse" class = "nav-link px-0 align-middle">
              <i class="bi bi-speedometer"></i><span class = "ms-1 d-none d-sm-inline">Register</span></a>
              <ul class = "collapse nav flex-column ms-1" id = sub-menu data-bs-parent = "#menu">
                <li>
                  <a href = "driverreg.php" class = "nav-link px-0" ><span class= "d-none d-sm-inline"><small>Driver</small></span></a>
                </li>
                <li>
                  <a href ="" class = "nav-link px-0"><span class = "d-none d-sm-inline"><small>Loader</small></span></a>
                </li>
                <li>
                  <a href ="vehiclereg.php" class = "nav-link px-0"><span class = "d-none d-sm-inline"><small>Vehicle</small></span></a>
                </li>
              </ul>
            </li>
            <li>
              <a href = "" class = "nav-link px-0 align-middle">
              <i class="bi bi-table"></i><span class = "ms-1 d-none d-sm-inline">Orders</span></a>
            </li>
            <li>
              <a href = "" class = "nav-link px-0 align-middle">
              <i class="bi bi-people-fill"></i><span class = "ms-1 d-none d-sm-inline">Customers</span>
              </a>
            </li>
          </ul>
          <hr>
          <div class = "dropdown pb-4">
            <a href = "" class = "d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
              <img src = "images/driver.jpg" alt = "" width = "30" height = "30" class ="rounded-circle">
                <span class = "d-none d-sm-inline mx-1"><?php echo $_SESSION['adminname'] ?></span>
            </a>
            <ul class = "dropdown-menu dropdown-menu-dark text-small shadow">
              <li><a class = "dropdown-item" href = "">Profile</a></li>
              <li>
                <hr class ="dropdown-divider">
              </li>
              <li><a class = "dropdown-item" href = "adminlogout.php">Sign Out</a></li>
            </ul>
          </div>
        </div>
      </div>
      <div class = "col py-3">
      <h5 class= "text-center">Welcome <?php echo $_SESSION['adminname'] ?> to Urban Link Transport!</h5>.
      </div>
    </div>
  </div>
  <?php
    }
    public function adminlogin_form(){
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
        <h2 style = "text-align:center;">Admin Login</h2>
    
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
      <p style = "text-align:center">Forgot password? <a href = "resetpassword.php">Reset password</a></p>
    </div>
      <div class = "d-grid col-6 mx-auto">
      <button type="submit" class="btn btn-primary mb-3" name = "login">Submit</button>
      <a href = "index.php" role ="button" class = "btn btn-secondary">Back Home</a>
      </div>
    </form>
     </div>
     </div>
    </div>
    <?php
     }

     public function registerVehicle(){
      ?>
<div class = "container d-flex justify-content-center align-items-center min-vh-100">
<div class = "border rounded-5 p-3 bg-white shadow box-area">
<form method = "POST">
  <div class = "mb-3">
    <h1 style = "text-align:center">Vehicle Registration</h1>
  </div>
  <div class = "mb-3">
  <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
  <?php if(isset($GLOBALS['error'])){echo $GLOBALS['error'];}?>
  </div>
  <div class="mb-3">
    <label for="vehicletype" class="form-label">Vehicle Type</label>
    <input type="text" class="form-control" id="vehicletype" name = "vtype" aria-describedby="vehicletype" placeholder = "Vehicle Type">
  </div>
  <div class="mb-3">
    <label for="vehicleplate" class="form-label">Vehicle plate</label>
    <input type="text" class="form-control" id="vehicleplate" name = "vplate" placeholder = "e.g ABC 123D">
  </div>
  <div class="mb-3">
    <label for="maxloaders" class="form-label">Maximum Loaders</label>
    <input type="number" class="form-control" id="maxloaders" name = "vloaders" placeholder = "Maximum loaders">
  </div>
  <div class = "mb-3 justify-content-center">
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href = "adminpage.php" class = "btn btn-secondary" role = "button">Back</a>
  </div>
</form>
</div>
</div>
      <?php
     }

     public function registerDriver(){
      ?>
      <div class = "container d-flex justify-content-center align-items-center min-vh-100">
<div class = "border rounded-5 p-3 bg-white shadow box-area">
<form method = "POST">
  <div class = "mb-3">
    <h1 style = "text-align:center">Driver Registration</h1>
  </div>
  <?php if(isset($GLOBALS['email'])){ echo $GLOBALS['email']; } ?>
  <?php if(isset($GLOBALS['msg'])){echo $GLOBALS['msg'];}?>
  <?php if(isset($GLOBALS['error'])){echo $GLOBALS['error'];}?>
  <div class="mb-3">
    <label for="dname" class="form-label">Driver name</label>
    <input type="text" class="form-control" id="dname" name = "dname" aria-describedby="vehicletype" placeholder = "Driver name">
  </div>
  <div class="mb-3">
    <label for="dlicense" class="form-label">Driver's license</label>
    <input type="text" class="form-control" id="dlicense" name = "dlicense" placeholder = "e.g 12345678">
  </div>
  <div class="mb-3">
    <label for="demail" class="form-label">Driver's email</label>
    <input type="text" class="form-control" id="demail" name = "demail" placeholder = "Email">
  </div>
  <div class="mb-3">
    <label>Product Category</label>
  <select class="form-select" name = "product" aria-label="Default select example">
      <option selected>Product category</option>
      <option>Farm produce</option>
      <option>Farm inputs</option>
  </select>
  </div>
  <div class="mb-3">
  <label>Driver's Vehicle</label>
  <select class="form-select" name = "vehicleid">
      <option selected>Kindly Select A Vehicle</option>
      <?php
      $sql1 = "SELECT * FROM vehicle";
      $stmt = $this->connect()->prepare($sql1);
      $stmt->execute();
      while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      ?>
      <option value="<?php echo $row['vehicleid']; ?>"><?php echo $row['vehicle_type']; ?> <?php echo $row['vehicle_plate']; ?></option>
      <?php
      }
      ?>
  </select>
  </div>
  <div class="mb-3">
    <label for="dpassword" class="form-label">Driver's password</label>
    <input type="password" class="form-control" id="dpassword" name = "password" placeholder = "Password">
  </div>
  <div class="mb-3">
    <label for="dcpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="dcpassword" name="cpassword" placeholder = "Confirm password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <a href = "adminpage.php" class = "btn btn-secondary" role = "button">Back</a>
</form>
</div>
</div>
      <?php
     }

  public function registerLoader(){
  ?>
  <div class = "container d-flex justify-content-center align-items-center min-vh-100">
<div class = "border rounded-5 p-3 bg-white shadow box-area">
<form method = "POST">
  <div class = "mb-3">
    <h1 style = "text-align:center">Loader Registration</h1>
  </div>
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name" name = "loadername" aria-describedby="vehicletype" placeholder = "John Doe">
  </div>
  <div class="mb-3">
    <label for="identificationno." class="form-label">Identification Number</label>
    <input type="text" class="form-control" id="identificationno." aria-describedby="vehicletype" name = "identificationno." placeholder = "e.g 12345678">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name = "email" placeholder = "johndoe@abcd.efg">
  </div>
  <div class="mb-3">
    <label>Assign to driver</label>
  <select class="form-select" name = "vehicle">
      <option selected>Select Driver</option>
      <?php 
      $sql = "SELECT * FROM drivers";
      $stmt = $this->connect()->prepare($sql);
      $stmt -> execute();
      while($driver =  $stmt -> fetch(PDO::FETCH_ASSOC)){
      ?>
      <option value = "<?php echo $driver['driverid']; ?>"><?php echo $driver['drivername']; ?></option>
      <?php
      }
      ?>
  </select>
  </div>
  <div class = "d-grid col-6 mx-auto">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
  <?php
  }
}