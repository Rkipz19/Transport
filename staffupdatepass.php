<?php
require_once 'AutoLoad.php';

$ObjStaffProcess -> resetpassword_process();
$Objlayout -> header();
$ObjStaffForm -> updatepasswordform();
$Objlayout -> footer();