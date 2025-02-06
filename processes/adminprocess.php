<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'C:\Apache24\htdocs\Transport\classes'); 
require_once 'connect.php';

class adminprocess extends connection{
    public function adminlogin(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $sql1 = "SELECT * FROM admin WHERE email = ?";
            $stmt = $this->connect()->prepare($sql1);
            $stmt->execute([$email]);
            $admin = $stmt->fetch();
            if($admin){
                $hashedPassword = hash('sha512', $password);

                if($hashedPassword === $admin['password']){
                    $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>You have successfully login!</h4>";
                    $_SESSION['email'] = $email;
                    header("Location: adminpage.php");
                }else{
                    $GLOBALS['error'] ="<h4 class='text-danger text-center'>Incorrect email or password</h4>";
                }
        }
        }
    }
    
    public function adminpage_process(){
        if(!isset($_SESSION['email'])){
            header("Location:userlogin.php"); //redirect to login page if user is not logged in
          }else{
            $currentuser = $_SESSION['email'];
            $sql = "SELECT * FROM `admin` WHERE `email`= '$currentuser'";
            $result = $this->connect()->prepare($sql);
            $result->execute();
            $user = $result->fetch();
            $_SESSION['adminname'] = $user['adminname'];
          }          
    }

    public function vehicleRegistration(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $vehicletype = $_POST['vtype'];
            $vehicleplate = $_POST['vplate'];
            $maxloaders = $_POST['vloaders'];

            $sql = "INSERT INTO vehicle(vehicle_type, vehicle_plate, max_loaders) VALUES('$vehicletype','$vehicleplate','$maxloaders')";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();

            if($stmt){
                $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>Vehicle Registration successful!</h4>";
            }else{
                $GLOBALS['error'] = "<h4 class='text-danger text-center'>Error in registration</h4>";
            }
        }
    }

    public function driverRegistration(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $drivename = $_POST['dname'];
            $dlicense = $_POST['dlicense'];
            $demail = $_POST['demail'];
            $cproduct = $_POST['product'];
            $password = $_POST['password'];
            $vehicleid = $_POST['vehicleid'];

            $mail = require __DIR__ .'/mailer.php';

            $mail->setFrom('Urbanlinktranport@example.com', 'Urbanlink Transport');
            $mail->addAddress($demail);
            $mail-> Subject = 'Driver Registration successful';
            $mail -> Body = <<<END
                Dear $drivename,
                Your registration as a driver with Urbanlink Transport has been successful.
                Use your email to reset your password. Hope to see you soon.
                
                Best regards,
                Urbanlink Transport.
            END;
            try{
                $mail->send();
            }catch(Exception $e){
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            $GLOBALS['email'] = "<h4 class= 'text-success text-center'>Email sent!</h4>";

            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO drivers(drivername, license, email, category, password, vehicleid) VALUES('$drivename','$dlicense','$demail','$cproduct','$encrypted_password','$vehicleid')";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute();

            if($stmt){
                $GLOBALS['msg'] = "<h4 class= 'text-success text-center'>Driver Registration successful!</h4>";
        }else{
            $GLOBALS['error'] = "<h4 class='text-danger text-center'>Error in registration</h4>";
        }
        }
    }

    public function loaderRegistration(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $loadername = $_POST['loadername'];
            $loaderid = $_POST['identificationno.'];
            $email = $_POST['email'];
            $assignedDriver = $_POST['driver'];

            $sql = "SELECT v.max_loaders FROM drivers d JOIN vehicle v ON d.vehicleid = v.vehicleid WHERE d.driverid = '$assignedDriver'";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute();
            $vehicle = $stmt->fetch();

            if(!$vehicle){
                $GLOBALS['drivererr'] = "Driver not found or not assigned to vehicle.";
            }

            $sql = "SELECT COUNT(*) as total_loaders FROM loaders WHERE driverid = '$assignedDriver'";
            $stmt = $this->connect()->prepare($sql);
            $stmt ->execute();
            $currentloaders = $stmt->fetch(PDO::FETCH_ASSOC)['total_loaders'];

            if($currentloaders >= $vehicle['max_loaders']){
                $GLOBALS['max'] = "Cannot assign more loaders. Vehicle limit reached";
            }

            $sql = "INSERT INTO loaders(loaderName, identificationNumber,email,vehicleid) VALUES('$loadername', '$loaderid','$email','$assignedVehicle')";
            $stmt = $this->connect()->prepare($sql);
            $stmt -> execute();

            $GLOBALS['success'] = "Loader $loadername assigned to Driver #$assignedDriver.";


        }
    }

}