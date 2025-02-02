<?php
require_once 'AutoLoad.php';

$Objlayout -> header();
$ObjProcesses -> resetpassword_process();
$ObjUserForm -> reset_password();
$Objlayout -> footer();