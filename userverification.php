<?php
require_once "AutoLoad.php";
$Objlayout -> header("verify");
$Objverify -> verify_email();
$Objlayout -> footer();
?>