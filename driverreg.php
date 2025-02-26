<?php
require_once "AutoLoad.php";
$Objlayout -> header();
$ObjAdminProcesses -> driverRegistration();
$Objadminpagelayout -> sidebar();
$ObjAdminForm ->registerDriver();
$Objlayout -> footer();