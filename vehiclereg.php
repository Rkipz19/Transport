<?php
require_once "AutoLoad.php";
$Objlayout -> header();
$ObjAdminProcesses -> vehicleRegistration();
$Objadminpagelayout -> sidebar();
$ObjAdminForm ->registerVehicle();
$Objlayout -> footer();
