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
                    <span class="fs-5">B<span class="d-none d-sm-inline">rand</span></span>
                </a>
                <ul class="nav nav-pills flex-column flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-house"></i><span class="ms-1 d-none d-sm-inline">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="#submenu1" data-bs-toggle="collapse" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-speedometer2"></i><span class="ms-1 d-none d-sm-inline">Dashboard</span> </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-table"></i><span class="ms-1 d-none d-sm-inline">Orders</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-grid"></i><span class="ms-1 d-none d-sm-inline">Products</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2 text-truncate">
                            <i class="fs-5 bi-people"></i><span class="ms-1 d-none d-sm-inline">Customers</span> </a>
                    </li>
                    <li class="nav-item">
                        <a href="#submenu1" class="nav-link px-sm-0 px-2" data-bs-toggle="collapse" data-bs-target="#submenu1">
                            <i class="fs-5 bi-star-fill"></i><span class="ms-1 d-none d-sm-inline">Expand <span class="bi-caret-down"></span></span>
                        </a>
                        <div class="collapse collapse-horizontal px-2" id="submenu1">
                            <ul class="list-unstyled mx-2">
                                <li>
                                    <a href="#" class="nav-link">
                                        <span>Item A</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">
                                        <span>Item B</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link text-nowrap">
                                        <span>Item CCCCCCCCCC</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">
                                        <span>Item D</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">
                                        <span>Item E</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link">
                                        <span>Item F</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-link"></i><span class="ms-1 d-none d-sm-inline">More</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-heart"></i><span class="ms-1 d-none d-sm-inline">More</span></a>
                    </li>
                    <li class="nav-item">
                        <a href="#submenu2" class="nav-link px-sm-0 px-2" data-bs-toggle="collapse" data-bs-target="#submenu2">
                            <i class="fs-5 bi-map"></i><span class="ms-1 d-none d-sm-inline">Expand <span class="bi-caret-down"></span></span>
                        </a>
                        <div class="collapse collapse-horizontal px-2" id="submenu2">
                            <ul class="list-unstyled mx-2">
                                <li>
                                    <a href="#" class="nav-link px-sm-0 px-2">
                                        <span>Item A</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-sm-0 px-2">
                                        <span>Item B</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-sm-0 px-2 text-nowrap">
                                        <span>Item wider</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-sm-0 px-2">
                                        <span>Item D</span></a>
                                </li>
                                <li>
                                    <a href="#" class="nav-link px-sm-0 px-2">
                                        <span>Item E</span></a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-star"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-star"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-star"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-star"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-star"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-basket"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2">
                            <i class="fs-5 bi-bookmark"></i><span class="ms-1 d-none d-sm-inline">Item</span></a>
                    </li>
                    <li>
                        <a href="#" class="nav-link px-sm-0 px-2 text-truncate">
                            <i class="fs-5 bi-binoculars"></i><span class="ms-1 d-none d-sm-inline">Last item</span></a>
                    </li>
                </ul>
                <div class="dropup py-sm-4 py-1 mt-sm-auto ms-auto ms-sm-0 flex-shrink-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="hugenerd" width="28" height="28" class="rounded-circle">
                        <span class="d-none d-sm-inline mx-1">Joe</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark px-0 px-sm-2 text-center text-sm-start" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-basket"></i><span class="d-none d-sm-inline ps-1">New project</span></a></li>
                        <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-bookmark"></i><span class="d-none d-sm-inline ps-1">Settings</span></a></li>
                        <li><a class="dropdown-item px-1" href="#"><i class="fs-6 bi-binoculars"></i><span class="d-none d-sm-inline ps-1">Profile</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
          <?php
    }

    public function rhscontent(){
        ?>
      <main class = "container-fluid bg-light">
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
          <div class="card text-bg-primary" style="width: 13rem;">
            <div class="card-body">
              <p class = "text-center">Amount Generated</p>
              <h5 class = "text-center">
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
                        <option value="Available"<?= isset($_GET['status']) == true ? ($_GET['status'] =='Available' ? 'selected':''):'' ?>>Available</option>
                        <option value="In Transit"<?= isset($_GET['status']) == true ? ($_GET['status'] == 'In Transit' ? 'selected':''):'' ?>>In Transit</option>
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
                        if(isset($_GET['status']) && $_GET['status'] != ''){
                          $status = $_GET['status'];
                          $vehicle = $conn->connect()->prepare("SELECT * FROM vehicle WHERE Status = '$status' ORDER BY vehicleid DESC")->execute();

                        }else{
                          $vehicle = $conn->connect()->prepare("SELECT * FROM vehicle ORDER BY vehicleid DESC")->execute();
                        }
                            $vehicles = getAll('vehicle');
                              if($vehicles){
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
                <?php
                }else{ 
                    echo 'No records found';  
                } 
              
                ?>
            </div>
        </div>
        
                <div class = "chart">
                  <canvas id="myChart" width = "400" height = "300"></canvas>
                </div>
        </main>
    <?php
    }

    public function settings(){
      ?>
    <div class ="row">
      <div class = "col-md-12">
        <div class = "card">
          <div class = "card-header">
            <h4>Web Settings</h4>
          </div>
          <div class = "card-body">
            <form action="code.php" method = "POST">
              <div class="mb-3">

              <input type="hidden" name="settingId" value="insert">

                <label>Title</label>
                <input type="text" name="title" class="form-control" >
              </div>

              <div class="mb-3">
                <label>URL / Domain</label>
                <input type="text" name="slug" class="form-control" >
              </div>

              <div class="mb-3">
                <label>Small Description</label>
                <input type="text" name="small_description" class="form-control" >
              </div>

              <h4>UBL Settings</h4>
              <div class="mb-3">
                <label>Meta Description</label>
                <textarea name="meta_description" class="form-control"  rows="3"></textarea>
              </div>

              <div class="mb-3">
                <label>Meta Keyword</label>
                <textarea name="meta_keyword" class = "form-control" rows="3"></textarea>
              </div>
              
              <h4 class="my-3">Contact Information</h4>
              <div class="row">
              <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="email" name="email1" class="form-control" >
              </div>

              <div class="col-md-6 mb-3">
                <label>Email2</label>
                <input type="email" name="email2" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Phone 1</label>
                <input type="text" name="email2" class="form-control">
              </div>

              <div class="col-md-6 mb-3">
                <label>Phone 1</label>
                <input type="text" name="email2" class="form-control">
              </div>

              <div class="col-md-12 mb-3">
                <label>Address</label>
                <textarea name="address" class = "form-control" rows="3"></textarea>
              </div>
              
              </div>
              <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save setting</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      <?php
    }
    public function orders(){
      ?>
        <div class="row">
          <div class = "col-md-12">
            <div class="card">
              <div class = "card-header">
                <h4>
                  Orders
                </h4>
              </div>
              <div class="card-body">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>farmername</th>
                      <th>farmerphonenumber</th>
                      <th>productdetails</th>
                      <th>Weight</th>
                      <th>PickupLocation</th>
                      <th>Delivery Location</th>
                      <th>Distance in km</th>
                      <th>Assigned Driver</th>
                      <th>Assigned Vehicle</th>
                      <th>Status</th>
                      <th>Total Cost</th>
                      <th>Ordered date</th>
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
                            <td><?= $order['farmerphoneno'] ?></td>
                            <td><?= $order['productdetails'] ?></td>
                            <td><?= $order['pickupLocation'] ?></td>
                            <td><?= $order['deliveryLocation'] ?></td>
                            <td><?= $order['distance_km'] ?></td>
                            <td><?= $order['assigned_vehicle'] ?></td>
                            <td><?= $order['assigned_driver'] ?></td>
                            <td><?= $order['status'] ?></td>
                            <td><?= $order['total_cost'] ?></td>
                            <td><?= $order['orderedAt'] ?></td>
                            <td>
                              <a href="view-orders.php?orderid=<?= $order['orderid']; ?>" class = "btn btn-success" role = "button">View</a>
                              <a href="order-delete.php?orderid=<?= $vehicle['orderid']; ?>" class = "btn btn-danger" role = "button">Delete</a>
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
          </div>
        </div>
      <?php
    }
    public function vieworders(){
      ?>
      <div class="row">
        <div class="col-md-12">
          <div class="card" style = "width: 20rem;">
            <div class="card-header">
              <h4>View Order
                <a href="orders.php" class = "btn btn-danger btn-sm mb-0 float-end">Back</a>
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
      </div>
      <?php
    }
}