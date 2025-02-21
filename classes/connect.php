<?php
class connection {

  private $servername = "localhost";
  private $username = "root";
  private $password = "Sigei1738";
  private $dbname = "urbanlinktransport";

public function connect() {
try{
  $rn = 'mysql:host='.$this->servername.';dbname='.$this->dbname;
  $conn = new PDO($rn, $this->username, $this->password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $conn;
  //echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed" . $e->getMessage();
}
}
public function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
}

