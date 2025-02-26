<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\functions'); 
require_once 'functions.php';

class adminpage{
    public function sidebar(){
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
                        <a href="adminpage.php" class="nav-link">
                            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="tables.php" class="nav-link">
                            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Tables</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#submenu2" class="nav-link px-sm-0 px-2" data-bs-toggle="collapse" data-bs-target="#submenu2">
                            <i class="fs-5 bi-person-add"></i><span class="ms-1 d-none d-sm-inline">Register <span class="bi-caret-down"></span></span>
                        </a>
                        <div class="collapse collapse-horizontal px-2" id="submenu2">
                            <ul class="list-unstyled mx-2">
                                <li>
                                    <a href="driverreg.php" class="nav-link">
                                        <span>Driver</span></a>
                                </li>
                                <li>
                                    <a href="vehiclereg.php" class="nav-link">
                                        <span>Vehicle</span></a>
                                </li>
                                <li>
                                    <a href="loadersregistration.php" class="nav-link text-nowrap">
                                        <span>Loaders</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <div class="dropup py-sm-4 py-1 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION['adminname'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark px-0 px-sm-2 text-center text-sm-start" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-binoculars"></i><span class="d-none d-sm-inline ps-1">Profile</span></a></li>
                        <li><a class="dropdown-item px-1" href="adminlogout.php"><i class="fs-6 bi-bookmark"></i><span class="d-none d-sm-inline ps-1">Sign out</span></a></li>
                    </ul>
                </div>
            </div>
        </div>

          <?php
    }

    public function rhscontent(){
        ?>
  <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
        <h5 class= "text-center">Welcome Admin <?php echo $_SESSION['adminname'] ?> to Urban Link Transport!</h5>.
        <div class = "row">
          <div class = "col-sm mb-4 mx-0">
            <div class="card text-bg-primary" style="width: 10rem;">
              <div class="card-body">
              <p class = "text-center">Total Users</p>
              <h5 class = "text-center">
                <?= getCount('users'); ?>
              </h5>
            </div>
          </div>
        </div>

        <div class = "col-sm mb-4 mx-0">
          <div class="card text-bg-primary" style="width: 10rem;">
            <div class="card-body">
              <p class = "text-center">Total vehicles</p>
              <h5 class="text-center">
              <?= getCount('vehicle'); ?>
              </h5>
            </div>
          </div>
        </div>

        <div class = "col-sm mb-4 mx-0">
          <div class="card text-bg-primary" style="width: 10rem;">
            <div class="card-body">
              <p class = "text-center">Total drivers</p>
              <h5 class = "text-center">
              <?= getCount('drivers'); ?>
              </h5>
            </div>
          </div>
        </div>

        <div class = "col-sm mb-4 mx-0">
          <div class="card text-bg-primary" style="width: 10rem;">
            <div class="card-body">
              <p class = "text-center">Today's Orders</p>
              <h5 class = "text-center">
              <?php
                    $conn = new connection();
                    
                    $today = date('Y-m-d');
                    $query = "SELECT DATE(orderedAt) AS order_date FROM orders WHERE DATE(orderedAt) = '$today'";
                    $stmt = $conn->connect()->prepare($query);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    $count = count($rows); 
                    echo $count;
              ?>
              </h5>
            </div>
          </div>
        </div>

        <div class = "col-sm mb-4 mx-0">
          <div class="card text-bg-primary" style="width: 10rem;">
            <div class="card-body">
              <p class = "text-center">Today Completed Orders</p>
              <h5 class = "text-center">
              <?php
                    $conn = new connection();
                    
                    $today = date('Y-m-d');
                    $query = "SELECT * FROM orders WHERE status = 'Completed' AND DATE(orderedAt) = '$today'";
                    $stmt = $conn->connect()->prepare($query);
                    $stmt->execute();
                    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                    $count = count($rows); 
                    echo $count;
              ?>
              </h5>
            </div>
          </div>
        </div>
        </div>

        <div class="card">
              <div class = "card-header">
                <h4>
                  Orders
                  <a href="contents\generate_reports.php" class="btn btn-primary float-end">Report</a>
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
                            $orders = getAll('orders');
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
                              <a href="view-orders.php?orderid=<?= $order['orderid']; ?>" class = "btn btn-success mb-3" role = "button">View</a>
                            </td>
                        </tr>
                        <?php }
                        }else{ ?>
                        <tr>
                            <td> No Orders found</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
              </div>
          </div>
          <div class="row mt-4">
            <div class="col">
                <div class="card" style = "width: 30rem;">
                  <div class="card-body">
                    <div class = "chart-container" style = "position: relative; height: 40vh; width: 80vw">
                      <canvas id="myChart" ></canvas>
                    </div>
                  </div>
                </div>
              </div>
          </div>
      </div>
    </main>
  </div>
</div>
</div>
    <?php
    }


public function orders(){
      ?>
        <div class="row">
          <div class = "col-md-12">

          </div>
        </div>
      <?php
    }
    public function vieworders(){
      ?>
      
    <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
      <main class="row overflow-auto">
        <div class="col pt-3">
          <div class="card" style = "width: 20rem;">
            <div class="card-header">
              <h4>View Order
                <a href="adminpage.php" class = "btn btn-danger btn-sm mb-0 float-end">Back</a>
              </h4>
              <div class="card-body">
              <?php
                    $paramResult = checkParamId('orderid');
                    if(!is_numeric($paramResult)){
                    echo '<h5>'.$paramResult.'</h5>';
                    return false;
                    }

                    $vehicle = getByorderId('orders',checkParamId('orderid'));
                    if($vehicle['status'] == 200){
                  ?>
              <table class = "table table-bordered table-striped">
                  <tbody>
                    <tr>
                      <td>Orderid</td>
                      <td><?= $vehicle['data']['orderid'] ?></td>
                    </tr>
                    <tr>
                      <td>Farmername</td>
                      <td><?= $vehicle['data']['farmername'] ?></td>
                    </tr>
                    <tr>
                      <td>Farmer PhoneNumber</td>
                      <td><?= $vehicle['data']['farmerphoneno'] ?></td>
                    </tr>
                    <tr>
                      <td>Product details</td>
                      <td><?= $vehicle['data']['productdetails'] ?></td>
                    </tr>
                    <tr>
                      <td>Pickup Location</td>
                      <td><?= $vehicle['data']['pickupLocation'] ?></td>
                    </tr>
                    <tr>
                      <td>Delivery Location</td>
                      <td><?= $vehicle['data']['deliveryLocation'] ?></td>
                    </tr>
                    <tr>
                      <td>Distance in km</td>
                      <td><?= $vehicle['data']['distance_km'] ?></td>
                    </tr>
                    <tr>
                      <td>Assigned Vehicle</td>
                      <td><?= $vehicle['data']['assigned_vehicle'] ?></td>
                    </tr>
                    <tr>
                      <td>Assigned Driver</td>
                      <td><?= $vehicle['data']['assigned_driver'] ?></td>
                    </tr>
                    <tr>
                      <td>Status</td>
                      <td><?= $vehicle['data']['status'] ?></td>
                    </tr>
                    <tr>
                      <td>Total Cost</td>
                      <td><?= $vehicle['data']['total_cost'] ?></td>
                    </tr>
                    <tr>
                      <td>Order Date</td>
                      <td><?= $vehicle['data']['orderedAt'] ?></td>
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
    public function vehicledisplay(){
      ?>
    <div class="col offset-2 offset-sm-3 offset-xl-2 d-flex flex-column vh-100">
    <main class="row overflow-auto">
    <div class="col pt-3">
      <div class="card">
      <div class = "card-header">
        <div>
          <div class="col-md-5">
          <h4>Vehicle
          </h4>
          </div>
          <div class="col-md-7">
            <form action="" method = "GET">
              <div class="row">
                <div class="col-md-4">
                  <select name="status" class = "form-select" required>
                  <option value="">Select status</option>
                  <option value="Available" <?= isset($_GET['status']) == true ? ($_GET['status'] =='Available' ? 'selected':''):'' ?>>Available</option>
                  <option value="In Transit" <?= isset($_GET['status']) == true ? ($_GET['status'] == 'In Transit' ? 'selected':''):'' ?>>In Transit</option>
                  </select>
                </div>
                <div class="col-md-4 float-end">
                  <button type = "submit" class = "btn btn-primary">Filter</button>
                  <a href="adminpage.php" class="btn btn-danger">Reset</a>
                </div>
              </div>
            </form>
          </div>
        </div>
  
          <?= alertMessage(); ?>
      </div>
      <div class="card-body">
      <?php 
            
            $conn = new connection();
            $db = $conn->connect();
            
            
            if(isset($_GET['status']) && $_GET['status'] != ''){
                $status = $_GET['status'];
                $stmt = $db->prepare("SELECT * FROM vehicle WHERE Status = ? ORDER BY vehicleid DESC");
                $stmt->execute([$status]);
            } else {
                $stmt = $db->prepare("SELECT * FROM vehicle ORDER BY vehicleid DESC");
                $stmt->execute();
            }
            
            $vehicles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            ?>
          <table id="myTable" class = "table table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Vehicle Type</th>
                      <th>Vehicle Plate</th>
                      <th>Maximum Loaders</th>
                      <th>Load capacity</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                            <?php
                  foreach($vehicles as $vehicle){
                  ?>
                  <tr>
                      <td><?= $vehicle['vehicleid'] ?></td>
                      <td><?= $vehicle['vehicle_type'] ?></td>
                      <td><?= $vehicle['vehicle_plate'] ?></td>
                      <td><?= $vehicle['max_loaders'] ?></td>
                      <td><?= $vehicle['load_capacity'] ?></td>
                      <td><?= $vehicle['Status'] ?></td>
                      <td>
                          <a href="vehicle-edit.php?vehicleid=<?= $vehicle['vehicleid']; ?>" class = "btn btn-success" role = "button">Edit</a>
                          <a href="vehicle-delete.php?vehicleid=<?= $vehicle['vehicleid'];  ?>" class = "btn btn-danger" role = "button"
                          onclick="return confirm('Are you sure you want to delete this record?')"
                          >
                          Delete</a>
                      </td>
                  </tr>
                  
                  <?php }
                  ?>
              </tbody>
          </table>

      </div>
  </div>
  <?php
    }

    public function driverdisplay(){
      ?>
      <div class="card mt-4">
      <div class = "card-header">
        <div>
          <div class="col-md-5">
          <h4>Driver
          </h4>
          </div>
          <div class="col-md-7">
            <form action="" method = "GET">
              <div class="row">
                <div class="col-md-4">
                  <select name="dstatus" class = "form-select" required>
                  <option value="">Select status</option>
                  <option value="Active" <?= isset($_GET['dstatus']) == true ? ($_GET['dstatus'] =='Active' ? 'selected':''):'' ?>>Active</option>
                  <option value="Suspended" <?= isset($_GET['dstatus']) == true ? ($_GET['dstatus'] == 'Suspended' ? 'selected':''):'' ?>>Suspended</option>
                  <option value="Terminated" <?= isset($_GET['dstatus']) == true ? ($_GET['dstatus'] == 'Terminates' ? 'selected':''):'' ?>>Terminated</option>
                  </select>
                </div>
                <div class="col-md-4 float-end">
                  <button type = "submit" class = "btn btn-primary">Filter</button>
                  <a href="adminpage.php" class="btn btn-danger">Reset</a>
                </div>
              </div>
            </form>
          </div>
        </div>
  
          <?= alertMessage(); ?>
      </div>
      <div class="card-body">
      <?php 
           $conn = new connection();
           $db = $conn->connect();
           
           $drivers = [];
           
           if(isset($_GET['dstatus']) && $_GET['dstatus'] != ''){
               $status = $_GET['dstatus'];
               $stmt = $db->prepare("SELECT * FROM drivers WHERE Status = ? ORDER BY driverid DESC");
               $stmt->execute([$status]);
           } else {
               $stmt = $db->prepare("SELECT * FROM drivers ORDER BY vehicleid DESC");
               $stmt->execute();
           }
           
           $drivers = $stmt->fetchAll(PDO::FETCH_ASSOC);
           ?>
          <table id="myTable" class = "table table-striped">
              <thead>
                  <tr>
                      <th>Id</th>
                      <th>Driver Name</th>
                      <th>Driver's license</th>
                      <th>Driver email</th>
                      <th>Transport Category</th>
                      <th>Assigned vehicle</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                            <?php
                  foreach($drivers as $driver){
                  ?>
                  <tr>
                      <td><?= $driver['driverid'] ?></td>
                      <td><?= $driver['drivername'] ?></td>
                      <td><?= $driver['license'] ?></td>
                      <td><?= $driver['email'] ?></td>
                      <td><?= $driver['category'] ?></td>
                      <td><?= $driver['vehicleid'] ?></td>
                      <td><?= $driver['Status'] ?></td>
                      <td>
                          <a href="driver-edit.php?driverid=<?= $driver['driverid']; ?>" class = "btn btn-success" role = "button">Edit</a>
                          <a href="driver-delete.php?driverid=<?= $driver['vehicleid'];  ?>" class = "btn btn-danger" role = "button"
                          onclick="return confirm('Are you sure you want to delete this record?')"
                          >
                          Delete</a>
                      </td>
                  </tr>
                  
                  <?php }
                  ?>
              </tbody>
          </table>

      </div>
  </div>
      <?php
    }
    public function loaderdisplay(){
      ?>
       <div class="card mt-4">
      <div class = "card-header">
        <div>
          <div class="col-md-5">
          <h4>Loader
          </h4>
          </div>
  
          <?= alertMessage(); ?>
      </div>
      <div class="card-body">
          <table id="myTable" class = "table table-striped">
              <thead>
                  <tr>
                      <th>loaderid</th>
                      <th>loaderName</th>
                      <th>identificationNumber</th>
                      <th>Email</th>
                      <th>Assigned Driver</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                            <?php
                            $loaders = getAll('loaders');
                  foreach($loaders as $loader){
                  ?>
                  <tr>
                      <td><?= $loader['loaderid'] ?></td>
                      <td><?= $loader['loaderName'] ?></td>
                      <td><?= $loader['identificationNumber'] ?></td>
                      <td><?= $loader['email'] ?></td>
                      <td><?= $loader['driverid'] ?></td>
                      <td>
                          <a href="loader-edit.php?loaderid=<?= $loader['loaderid']; ?>" class = "btn btn-success" role = "button">Edit</a>
                          <a href="loader-delete.php?loaderid=<?= $loader['loaderid'];  ?>" class = "btn btn-danger" role = "button"
                          onclick="return confirm('Are you sure you want to delete this record?')"
                          >
                          Delete</a>
                      </td>
                  </tr>
                  
                  <?php }
                  ?>
              </tbody>
          </table>
      </div>
  </div>
  </div>
  </main>
  </div>
      <?php
    }
}