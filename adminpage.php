<?php
require_once "AutoLoad.php";

$Objlayout -> header();
$ObjAdminProcesses -> adminpage_process();
$Objadminpagelayout -> sidebar();
$Objadminpagelayout -> rhscontent();
$Objlayout -> footer();