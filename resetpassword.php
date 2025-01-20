<?php
require_once "AutoLoad.php";

$Objlayout -> header();
$ObjProcesses -> resetpassword();
$ObjUserForm -> forgot_password();
$Objlayout -> footer();