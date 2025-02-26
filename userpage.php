<?php
require_once 'AutoLoad.php';
$Objlayout -> header();
$ObjProcesses -> userpage_process();
$ObjUserForm -> userpage();
$ObjUserForm -> main();
$Objlayout -> footer();