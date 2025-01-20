<?php
require_once 'AutoLoad.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

$Objlayout -> header();
$ObjProcesses -> newpassword();
$ObjUserForm -> newpassword_form();
$Objlayout -> footer();