<?php
    include '../../connect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="UPDATE user SET Deleted_id = 1 WHERE User_id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:../adminuser.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>