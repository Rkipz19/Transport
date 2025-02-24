<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class orderchart{

public function getChartData(){
$pdo = new connection();
$sql = "SELECT * FROM orders";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

}
}
$chart = new orderchart();
$results = $chart->getChartData();
echo json_encode($results);
?>
