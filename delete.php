<?php
    include "config1.php";

    if(isset($_GET['id'])){
        $user_id=$_GET['id'];
        $sql1="DELETE FROM `user` WHERE `id`='$user_id'";
        $result=mysqli_query($conn,$sql1);

        if($result==TRUE){
            echo "deleted successfully";
            header('Location: view.php');
        }
        else{
            echo "error".$sql1."<br>".$conn->error;
        }
        
    }
    ?>