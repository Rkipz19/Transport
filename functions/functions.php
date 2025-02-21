<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

function generateRandomString($length = 5){
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0;$i < $length;$i++){
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
 }

function redirect($url, $status){
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

function alertMessage(){
    if(isset($_SESSION['status'])){
        echo '<div class = "alert alert-success">
        <h4>'.$_SESSION['status'].'</h4>
        </div>';
        unset($_SESSION['status']);
    }
}

function checkParamId($paramType){
    if(isset($_GET[$paramType])){
        if($_GET[$paramType] != null){
            return $_GET[$paramType];
        }else{
            return 'No id found';
        }
    }else{
        return 'No id given';
    }
}


 function getAll($tableName){
    $conn = new connection();

    $query = "SELECT * FROM $tableName";
    $stmt = $conn->connect()->prepare($query);
    $stmt->execute();
    return $stmt-> fetchAll(PDO::FETCH_ASSOC);
 }

 function getById($table,$id){
    $conn = new connection();

    $sql = "SELECT * FROM $table WHERE  vehicleid  = '$id' LIMIT 1";
    $result = $conn->connect()->prepare($sql);
    $result->execute();

    if($result){
        if($result->rowCount() == 1 ){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $response = [
                'status' => 200,
                'message' => 'successful',
                'data'=> $row
            ];
            return $response;
        }else{
            $response = [
                'status'=> 404,
                'message'=> 'No record found'
            ];
            return $response;
        }
    }else{
        $response = [
            'status'=> 500,
            'message'=> 'Something went wrong'
        ];
        return $response;
    }
 }

 function deleteQuery($table,$id){
    $conn = new connection();

    $query = "DELETE FROM $table WHERE vehicleid='$id' LIMIT 1";
    $result = $conn->connect()->prepare($query);
    $result->execute();
    return $result;
 }