<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\functions'); 
require_once 'functions.php';

class adminpage{
    public function sidebar(){
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
                  <i class="bi bi-person-add"></i></i><span class = "ms-1 d-none d-sm-inline">Register</span></a>
                  <ul class = "collapse nav flex-column ms-1" id = sub-menu data-bs-parent = "#menu">
                    <li>
                      <a href = "driverreg.php" class = "nav-link px-0" ><span class= "d-none d-sm-inline"><small>Driver</small></span></a>
                    </li>
                    <li>
                      <a href ="loadersregistration.php" class = "nav-link px-0"><span class = "d-none d-sm-inline"><small>Loader</small></span></a>
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
          <?php
    }

    public function rhscontent(){
        ?>
        <div class = "col py-3">
        <h5 class= "text-center">Welcome Admin <?php echo $_SESSION['adminname'] ?> to Urban Link Transport!</h5>.
        
        <div class="card">
            <div class = "card-header">
                <h4>Vehicle
                    <a href="vehiclereg.php" class = "btn btn-primary btn-sm float-end" role = "button">Add Vehicle</a>
                </h4>
                <?= alertMessage(); ?>
            </div>
            <div class="card-body">
                <table class = "table table-striped">
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
                            $vehicles = getAll('vehicle');
                                if($vehicles){
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
                                <a href="vehicle-delete.php?vehicleid=<?= $vehicle['vehicleid']; ?>" class = "btn btn-danger" role = "button"
                                onclick="return confirm('Are you sure you want to delete this record?')"
                                >
                                Delete</a>
                            </td>
                        </tr>
                        <?php }
                        }else{ ?>
                        <tr>
                            <td> No user found</td>
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
}