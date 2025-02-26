<?php
require_once "orderschart.php";

$chartData = new ChartData();
$data = $chartData->getVehicleOrderCount();

if (!$data) {
    echo json_encode(["error" => "No data found"]);
} else {
    header('Content-Type: application/json');
    echo json_encode($data);
}
?>
