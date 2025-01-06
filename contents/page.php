<?php 

require_once 'connect.php';

class page extends connection{
    public function userpage(){
        if(!isset($_SESSION['email'])){
            header("Location: userlogin.php");
        }else{
        $currentuser = $_SESSION['email'];
        $sql = "SELECT * FROM `users` WHERE `email` = '$currentuser'";
        $result = $this->connect()->prepare($sql);
        $result->execute();
        $row = $result->fetch();
        $Firstname = $row['firstname'];
        $Lastname = $row['lastname'];
        $Email = $row['email'];
        }
        ?>
        <div class = "d-flex justify-content-start">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                <tr>
                    <td><?php echo $Firstname ?></td>
                    <td><?php echo $Lastname ?></td>
                    <td><?php echo $Email ?></td>
            </table>
        </div>
        <div>
            <a href = "logout.php">Logout</a>
    </div>
        <?php
    }
}