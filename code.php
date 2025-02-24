<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\functions'); 
require_once 'functions.php';


if(isset($_POST['updateVehicle'])){
    $conn = new connection();
    $vehicletype = $_POST['vehicletype'];
    $vehicleplate = $_POST['vehicleplate'];
    $maxloaders = $_POST['maxloaders'];
    $loadcapacity = $_POST['loadcapacity'];
    $status = $_POST['status'];
    
    $vehicleid = $_POST['userId'];
    $vehicle = getById('vehicle', $vehicleid);
    if($vehicle['status'] != 200){
        redirect('vehicle-edit.php?vehicleid='.$vehicleid, 'No such vehicle id');
    }
    if($vehicletype != '' || $vehicleplate != '' || $maxloaders != '' || $loadcapacity != '' || $status != ''){
        $sql = "UPDATE vehicle SET vehicle_type = '$vehicletype', vehicle_plate = '$vehicleplate', max_loaders = '$maxloaders', load_capacity = '$loadcapacity', Status = '$status' WHERE vehicleid = '$vehicleid'";
        $stmt = $conn->connect()->prepare($sql);
        $stmt->execute();
        redirect('adminpage.php', 'Vehicle updated successfully');
    }
}

