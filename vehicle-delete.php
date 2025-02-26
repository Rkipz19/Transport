<?php

set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\functions'); 
require_once 'functions.php';

$paraResult = checkParamId('vehicleid');
if(is_numeric($paraResult)){

    $vehicleid = $paraResult;

    $vehicle = getById('vehicle',$vehicleid);
    if($vehicle['status'] == 200){
       $userDelete = deleteQuery('vehicle',$vehicleid);
       if($userDeleteRes){

       }else{
        redirect('adminpage.php','User Deleted Successfully');
       }
    }else{
        redirect('adminpage.php',$vehicle['message']);
    }
}else{
    redirect('adminpage.php',$paraResult);
}