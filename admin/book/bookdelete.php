<?php
    include '../../connect.php';
    if(isset($_GET['deleteid'])){
        $id=$_GET['deleteid'];

        $sql="UPDATE book SET Deleted_id = 1 WHERE Book_id=$id";
        $result=mysqli_query($con,$sql);
        if($result){
            header('location:../adminbook.php');
        }
        else{
            die(mysqli_error($con));
        }
    }
?>