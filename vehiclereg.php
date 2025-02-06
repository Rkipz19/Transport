<?php
require_once "AutoLoad.php";
$Objlayout -> header();
$ObjAdminProcesses -> vehicleRegistration();
$ObjAdminForm ->registerVehicle();
$Objlayout -> footer();
