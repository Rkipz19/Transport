<?php
include 'classes/connect.php';
session_start();
session_destroy();
header('location:userlogin.php');
?>