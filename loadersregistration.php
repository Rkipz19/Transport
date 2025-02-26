<?php
require_once 'AutoLoad.php';

$ObjAdminProcesses -> loaderRegistration();
$Objlayout -> header();
$Objadminpagelayout -> sidebar();
$ObjAdminForm -> registerLoader();
$Objlayout -> footer();