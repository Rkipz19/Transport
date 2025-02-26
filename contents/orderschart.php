<?php
require_once __DIR__ . '/../classes/connect.php';

class ChartData {
    private $db;

    public function __construct() {
        $database = new connection();
        $this->db = $database->connect();
    }

    public function getVehicleOrderCount() {
        $query = "SELECT distance_km, total_cost FROM orders";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>

