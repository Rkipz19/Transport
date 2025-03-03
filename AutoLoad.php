<?php

function classAutoLoader($classname){
    $directories = ["classes","contents","forms","processes"];

    foreach($directories as $directory){
        $filename = dirname(__FILE__) . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR . $classname . ".php";

        if(file_exists($filename) && is_readable($filename)){
            require_once $filename;
        }
    }
}
spl_autoload_register('classAutoLoader');

$Objlayout = new layout();
$Objpagecont = new pagecontent();
$ObjUserForm = new userForms();
$ObjAdminProcesses = new adminprocess();
$ObjAdminForm = new adminForms();
$ObjProcesses = new process();
$ObjStaffForm = new staffform();
$ObjStaffProcess = new staffprocess();
$Objadminpagelayout = new adminpage();

