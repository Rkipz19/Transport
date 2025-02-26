<?php
require_once "AutoLoad.php";
$Objlayout -> header();
$Objadminpagelayout -> sidebar();
$Objadminpagelayout -> vehicledisplay();
$Objadminpagelayout -> driverdisplay();
$Objadminpagelayout -> loaderdisplay();
$Objlayout -> footer();