<?php 
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class adminForms extends connection{
    public function adminpage(){
        ?>
     
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
<div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
<main class="row overflow-auto">
<div class="col pt-3">
<div class = "border rounded-5 p-3 bg-white shadow box-area mx-3">
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
    <select class="form-select" name = "vtype" aria-label="Default select example">
      <option selected>Vehicle type</option>
      <option value = "Pickup">Pickup</option>
      <option value = "Lorry">Lorry</option>
      <option value = "Trailer">Trailer</option>
      <option value = "Refrigerated Truck">Refrigerated Truck</option>
  </select>

  </div>
  <div class="mb-3">
    <label for="vehicleplate" class="form-label">Vehicle plate</label>
    <input type="text" class="form-control" id="vehicleplate" name = "vplate" placeholder = "e.g ABC 123D">
  </div>
  <div class="mb-3">
    <label for="maxloaders" class="form-label">Maximum Loaders</label>
    <input type="number" class="form-control" id="maxloaders" name = "vloaders" placeholder = "Maximum loaders">
  </div>
  <div class="mb-3">
    <label for="maxload" class="form-label">Maximum Load</label>
    <input type="number" class="form-control" id="maxload" name = "maxload" placeholder = "Maximum load in tonnes">
  </div>
  <div class = "mb-3 justify-content-center">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
</div>
</div>
</main>
</div>
      <?php
     }

     public function registerDriver(){
      ?>
<div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
<main class="row overflow-auto">
<div class="col pt-3">
<div class = "border rounded-5 p-3 bg-white shadow box-area mx-3">
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
</form>
</div>
</div>
</main>
</div>
      <?php
     }

  public function registerLoader(){
  ?>
<div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
<main class="row overflow-auto">
<div class="col pt-3">
<div class = "border rounded-5 p-3 bg-white shadow box-area mx-3">
<form method = "POST">
  <div class = "mb-3">
    <h1 style = "text-align:center">Loader Registration</h1>
    <?php if(isset($GLOBALS['success'])){echo $GLOBALS['success'];}?>
    <?php if(isset($GLOBALS['max'])){echo $GLOBALS['max'];}?>
  </div>
  <div class="mb-3">
    <label for="Name" class="form-label">Name</label>
    <input type="text" class="form-control" id="Name" name = "loadername" placeholder = "John Doe">
  </div>
  <div class="mb-3">
    <label for="id" class="form-label">Identification Number</label>
    <input type="text" class="form-control" id="id" name = "idnumber" placeholder = "e.g 12345678">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name = "email" placeholder = "johndoe@abcd.efg">
  </div>
  <div class="mb-3">
    <label>Assign to driver</label>
  <select class="form-select" name = "driver">
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
  <button type="submit" class="btn btn-primary mb-3">Submit</button>
  </div>
</form>
</div>
</div>
</main>
</div>
  <?php
  }
  public function editvehicle(){
    ?>
    <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
  <div class = "card">
  <form method = "POST" class="row g-3" action = "code.php">
    <?php
    $paramResult = checkParamId('vehicleid');
    if(!is_numeric($paramResult)){
      echo '<h5>'.$paramResult.'</h5>';
      return false;
    }

    $vehicle = getById('vehicle',checkParamId('vehicleid'));
    if($vehicle['status'] == 200){
      ?>
    <input type="hidden" name = "userId" value = "<?= $vehicle['data']['vehicleid']?>" required>
    <div class="col-md-6">
    <label for="inputType" class="form-label">Vehicle Type</label>
    <input type="text" class="form-control" id="inputType" name = "vehicletype" value = "<?= $vehicle['data']['vehicle_type']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPlate" class="form-label">Vehicle Plate</label>
    <input type="text" class="form-control" id="inputPlate" name = "vehicleplate" value = "<?= $vehicle['data']['vehicle_plate'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputloaders" class="form-label">Maximum loaders</label>
    <input type="number" class="form-control" id="inputloaders" name = "maxloaders" value = "<?= $vehicle['data']['max_loaders'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputcapacity" class="form-label">Load Capacity</label>
    <input type="number" class="form-control" id="inputcapacity" name = "loadcapacity" value = "<?= $vehicle['data']['load_capacity'] ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputstatus" class="form-label">Status</label>
    <input type="text" class="form-control" id="inputstatus" name = "status" value = "<?= $vehicle['data']['Status'] ?>" required>
  </div>
  <div class="col-12 float-end">
    <button type="submit" name = "updateVehicle" class="btn btn-primary">Update</button>
  </div>
</form>
  </div>
      <?php
    }else{
      echo '<h5>'.$vehicle['message'].'</h5>';
    }
    ?>
  </div>
  </main>
  </div>
    <?php
  }

  public function editloader(){
    ?>
    <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
  <div class = "card">
  <form method = "POST" class="row g-3" action = "code.php">
    <?php
    $paramResult = checkParamId('loaderid');
    if(!is_numeric($paramResult)){
      echo '<h5>'.$paramResult.'</h5>';
      return false;
    }

    $loader = getByloaderid('loaders',checkParamId('loaderid'));
    if($loader['status'] == 200){
      ?>
    <input type="hidden" name = "userId" value = "<?= $loader['data']['loaderid']?>" required>
    <div class="col-md-6">
    <label for="inputType" class="form-label">Loader's Na,e</label>
    <input type="text" class="form-control" id="inputType" name = "vehicletype" value = "<?= $loader['data']['loaderName']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPlate" class="form-label">Loader's Id</label>
    <input type="text" class="form-control" id="inputPlate" name = "vehicleplate" value = "<?= $loader['data']['identificationNumber'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputloaders" class="form-label">Loader's Email</label>
    <input type="text" class="form-control" id="inputloaders" name = "maxloaders" value = "<?= $loader['data']['email'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputcapacity" class="form-label">Assigned Driver</label>
    <input type="text" class="form-control" id="inputcapacity" name = "loadcapacity" value = "<?= $loader['data']['driverid'] ?>" required>
  </div>
  <div class="col-12 float-end">
    <button type="submit" name = "updateLoader" class="btn btn-primary">Update</button>
  </div>
</form>
  </div>
      <?php
    }else{
      echo '<h5>'.$loader['message'].'</h5>';
    }
    ?>
  </div>
  </main>
  </div>
    <?php
  }

  public function editdriver(){
    ?>
       <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
  <div class = "card">
  <form method = "POST" class="row g-3" action = "code.php">
    <?php
    $paramResult = checkParamId('driverid');
    if(!is_numeric($paramResult)){
      echo '<h5>'.$paramResult.'</h5>';
      return false;
    }

    $driver = getBydriverid('drivers',checkParamId('driverid'));
    if($driver['status'] == 200){
      ?>
    <input type="hidden" name = "userId" value = "<?= $driver['data']['driverid']?>" required>
    <div class="col-md-6">
    <label for="inputType" class="form-label">Driver Name</label>
    <input type="text" class="form-control" id="inputType" name = "drivername" value = "<?= $driver['data']['drivername']?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputPlate" class="form-label">Driver's license</label>
    <input type="text" class="form-control" id="inputPlate" name = "license" value = "<?= $driver['data']['license'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputloaders" class="form-label">Driver's email</label>
    <input type="text" class="form-control" id="inputloaders" name = "email" value = "<?= $driver['data']['email'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputcapacity" class="form-label">Transportation category</label>
    <input type="text" class="form-control" id="inputcapacity" name = "category" value = "<?= $driver['data']['category'] ?>" required>
  </div>
  <div class="col-12">
    <label for="inputcapacity" class="form-label">Assigned vehicle</label>
    <input type="number" class="form-control" id="inputcapacity" name = "vehicleid" value = "<?= $driver['data']['vehicleid'] ?>" required>
  </div>
  <div class="col-md-6">
    <label for="inputstatus" class="form-label">Status</label>
    <input type="text" class="form-control" id="inputstatus" name = "status" value = "<?= $driver['data']['Status'] ?>" required>
  </div>
  <div class="col-12 float-end">
    <button type="submit" name = "updateDriver" class="btn btn-primary">Update</button>
  </div>
</form>
  </div>
      <?php
    }else{
      echo '<h5>'.$driver['message'].'</h5>';
    }
    ?>
  </div>
  </main>
  </div>
    <?php
  }
}