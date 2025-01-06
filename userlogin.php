<?php
require_once "AutoLoad.php";

$Objlayout -> header("login");
$Objlogin -> login_user();
$Objlayout -> footer();