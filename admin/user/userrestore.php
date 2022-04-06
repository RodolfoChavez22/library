<?php
    include '../../connect.php';
    if(isset($_GET['restoreid'])){
        $id=$_GET['restoreid'];

        $sql="UPDATE user SET Deleted_id = 0 WHERE User_id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:../restore.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>