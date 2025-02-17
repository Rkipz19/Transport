<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class staffprocess extends connection{
    public function stafflogin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql = "SELECT * FROM drivers WHERE email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if($user){
                if(password_verify($password, $user['password'])){
                    $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>You have successfully login!</h4>";
                    $_SESSION['email'] = $email;
                    header("Location: staffpage.php");
                }else{
                    $GLOBALS['error'] = "<h4 class='text-danger text-center'>Incorrect email or password</h4>";
                }
        }
        }
    }
        public function resetpassword(){
            if(isset($_POST['email'])){
             $email = $_POST['email'];
            
            $token = bin2hex(random_bytes(16));
     
            $token_hash = hash('sha256', $token);
            
            $expiry = date("Y-m-d H:i:s",time() + 60 * 30);
     
            $sql = "UPDATE drivers SET reset_token_hash = :reset_token_hash, reset_token_expires_at = :reset_token_expires_at WHERE email = :email";
     
             $stmt = $this->connect()->prepare($sql);
             $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);
             $stmt->bindParam(':reset_token_expires_at', $expiry, PDO::PARAM_STR);
             $stmt->bindParam(':email', $email, PDO::PARAM_STR);
             $stmt->execute();
     
             if($stmt->rowCount() > 0){
                 $mail = require __DIR__ . '/mailer.php';
     
                 $mail->setFrom('Urbanlinktranport@example.com', 'Urbanlink Transport');
                 $mail-> addAddress($email);
                 $mail->Subject = 'Password Reset';
                 $mail->Body = <<<END
                 Click <a href = "http://localhost/Transport/staffupdatepass.php?email=$email&token=$token">here</a> to reset your password.
                 
                 END;
                 
                 try{
                     $mail->send();
                 }catch(Exception $e){
                     echo "Message could not be sent. Mailer Error: {$mail->Error_Info}";
                 }
             }
             $GLOBALS['msg'] = "Message has been sent, please check your email";
            }
         }
    

    public function resetpassword_process(){
        if(isset($_GET['token'])){
           $GLOBALS['token'] = $_GET['token'];

           $token_hash = hash('sha256', $GLOBALS['token']);

           $pdo = $this->connect();

           $sql = "SELECT * FROM drivers WHERE reset_token_hash = :reset_token_hash";

           $stmt = $pdo -> prepare($sql);

           $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);

           $stmt->execute();

           $driver = $stmt->fetch();

           if($driver ===  null){
            die("token not found");
           }

           if(strtotime($driver['reset_token_expires_at']) <= time()){
            die("Token has expired");
           }
        }

        if(isset($_POST['token'])){
            $token = $_POST['token'];
 
            $token_hash = hash('sha256', $token);
 
            $pdo = $this->connect();
 
            $sql = "SELECT * FROM drivers WHERE reset_token_hash = :reset_token_hash";
 
            $stmt = $pdo -> prepare($sql);
 
            $stmt->bindParam(':reset_token_hash', $token_hash, PDO::PARAM_STR);
 
            $stmt->execute();
 
            $driver = $stmt->fetch();
 
            if($driver ===  null){
             die("token not found");
            }
 
            if(strtotime($driver['reset_token_expires_at']) <= time()){
             die("Token has expired");
            }
         
 
         $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
 
         $sql = "UPDATE drivers SET password = :password,reset_token_hash = NULL, reset_token_expires_at = NULL WHERE driverid = :id";
 
         $stmt = $pdo -> prepare($sql);
 
         $stmt->bindParam(':password', $password_hash, PDO::PARAM_STR);
         $stmt->bindParam(':id', $driver['driverid'], PDO::PARAM_INT);
 
         $stmt->execute();
 
         $GLOBALS['msg'] = "Password reset successfully. You can now <a href='stafflogin.php' class = 'btn btn-primary' role = 'button'>Login</a>.";
     }
    }

    public function staffpage(){
    $currentdriver = $_SESSION['email'];
    $sql = "SELECT * FROM `drivers` WHERE `email` = '$currentdriver'";
    $stmt = $this->connect()->prepare($sql);
    $stmt -> execute();
    $driver = $stmt->fetch();
    $_SESSION['drivername'] = $driver['drivername'];

    $driverid = $driver['driverid'];
    $sql = "SELECT * FROM orders WHERE assigned_driver = '$driverid' AND status = 'In progress'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $GLOBALS['driver'] = $stmt -> fetchAll();
    
    if(isset($_POST['completeorder'])){
        $orderid = $_POST['orderid'];

        $sql = "SELECT assigned_vehicle, assigned_driver, distance_km FROM orders WHERE orderid = '$orderid'";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $order = $stmt-> fetch(PDO::FETCH_ASSOC);

        if($order){
            $vehicleid = $order['assigned_vehicle'];
            $distancekm = $order['distance_km'];

            $vsql = "SELECT vehicle_type FROM vehicle WHERE vehicleid = '$vehicleid'";
            $vstmt = $this->connect()->prepare($vsql);
            $vstmt->execute();
            $vehicle = $vstmt->fetch(PDO::FETCH_ASSOC);

            $price_per_km = [
                'Pickup' => 200,
                'Lorry' => 650,
                'Trailer' => 1500,
                'Refrigerated Truck' =>1000
            ];

            $vehicletype = $vehicle['vehicle_type'];
            $costperkm = isset($price_per_km[$vehicletype]) ? $price_per_km[$vehicletype] : 0;

            $totalcost = $distancekm * $costperkm;

            $this->connect()->prepare("UPDATE orders SET status = 'Completed', total_cost = '$totalcost' WHERE orderid = '$orderid'")->execute();
            $this->connect()->prepare("UPDATE vehicle SET Status = 'Available' WHERE vehicleid = '$vehicleid'")->execute();
            
            $_GLOBAL['successorder'] = "<p class = 'text-success text-center'>Order #$orderid completed successfully! Total cost is $totalcost</p>";
            
        }else {
            $_GLOBAL['errororder'] = "<p class = 'text-danger text-center'>Order not found!</p>";
        }
    }

}
}


