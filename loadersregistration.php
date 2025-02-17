<?php
require_once 'AutoLoad.php';

$ObjAdminProcesses -> loaderRegistration();
$Objlayout -> header();
$ObjAdminForm -> registerLoader();
$Objlayout -> footer();