<!DOCTYPE html>
<html>
    <head>
        <title>Update User</title>
        <link rel="stylesheet" href="../../style.css">
    </head>
    <body>

    <?php
        include '../../connect.php';
        session_start();

        $id=$_GET['updateid'];
        $sql="Select * from user where User_id=$id";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        $Fname=$row['Fname'];
        $Lname=$row['Lname'];
        $DOB=$row['DOB'];
        $Email=$row['Email'];
        $Username=$row['Username'];
        $Balance=$row['Balance'];
        $Mobile=$row['Pnumber'];
        $Role=$row['User_Status'];

        if(isset($_REQUEST['submit'])){
            $Fname= filter_var($_REQUEST['fname'],FILTER_SANITIZE_STRING);
            $Lname= filter_var($_REQUEST['lname'],FILTER_SANITIZE_STRING);
            $DOB= $_REQUEST['date'];
            $Email=filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
            $Username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
            $Balance= filter_var($_REQUEST['balance'],FILTER_SANITIZE_NUMBER_INT);
            $Mobile= filter_var($_REQUEST['mobile'],FILTER_SANITIZE_NUMBER_INT);
            $Role=$_REQUEST['role'];

            if(empty($Fname) or empty($Lname)){$errorMsg[0] = 'Name Required';}

            if(empty($DOB)){$errorMsg[1] = 'Date of Birth Required';} 

            if(empty($Email)){$errorMsg[2] = 'Email Required';}

            if(empty($Username)){$errorMsg[3] = 'Username Required';}

            if(empty($Balance)){$errorMsg[5] = 'Balance Required';}

            if(empty($Mobile)){$errorMsg[6] = 'Mobile Required';}

            if(empty($Role)){$errorMsg[7] = 'Role Required';}

            if(empty($errorMsg)){
                $sql = "SELECT * FROM user WHERE email='$Email' AND User_id!=$id";
                $res = mysqli_query($con, $sql);

                if(mysqli_num_rows($res) > 0){$errorMsg[8] = 'Email Already Taken';}

                $sql = "SELECT * FROM user WHERE username='$Username' AND User_id!=$id";
                $result = mysqli_query($con, $sql);

                if(mysqli_num_rows($result) > 0){$errorMsg[9] = 'Username Already Taken';}

                if(empty($errorMsg)){
                    $sql = "UPDATE `user` SET User_id=$id,Fname='$Fname',Lname='$Lname',DOB='$DOB',Email='$Email',Username='$Username',Balance=$Balance,Pnumber='$Mobile',User_Status='$Role'
                            WHERE User_id=$id";
                    $result = mysqli_query($con,$sql);
                    if($result){header("location: ../adminuser.php");}
                    else{die(mysqli_error($con));}
                }
            }
        }
    ?>

        <div class = "display-body">
            <form method="post" class="signup-form">
                <h3 class="display-header">Update User</h3>
                <div class = "signup-input">
                    <label class="label-double">Full Name</label><br>
                    <?php
                        if(isset($errorMsg[0])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[0]."</p>";}
                    ?>
                    <input type="text" placeholder="First name..." class="input-double" name="fname" value="<?php echo $Fname;?>">
                    <input type="text" placeholder="Last name..." class="input-double" name="lname" value="<?php echo $Lname;?>"><br>
                    <label class="label-single">Date of Birth</label>
                    <?php
                        if(isset($errorMsg[1])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[1]."</p>";}
                    ?>
                    <input type="date" class="input-single" name="date" value="<?php echo $DOB;?>">
                    <label class="label-single">Email</label>
                    <?php
                        if(isset($errorMsg[2])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[2]."</p>";}
                        if(isset($errorMsg[8])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[8]."</p>";}
                    ?>
                    <input type="email" placeholder="Email..." class="input-single" name="email" value="<?php echo $Email;?>">
                    <label class="label-single">User Name</label>
                    <?php
                        if(isset($errorMsg[3])){echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[3]."</p>";}
                        if(isset($errorMsg[9])){echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[9]."</p>";}
                    ?>
                    <input type="text" placeholder="Username..." class="input-single" name="username" value="<?php echo $Username;?>">
                    <label class="label-single">Balance</label>
                    <?php
                        if(isset($errorMsg[5])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[5]."</p>";}
                    ?>
                    <input type="text" placeholder="0..." class="input-single" name="balance" value="<?php echo $Balance;?>">
                    <label class="label-single">Mobile</label>
                    <?php
                        if(isset($errorMsg[6])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[6]."</p>";}
                    ?>
                    <input type="text" placeholder="713..." class="input-single" name="mobile" value="<?php echo $Mobile;?>">
                    <label class="label-single">Role</label>
                    <?php
                        if(isset($errorMsg[7])){echo "<p style='color:red; font-size:12px; margin-left:9px;'>".$errorMsg[7]."</p>";}
                    ?>
                    <select name="role">
                        <option <?php if($Role== 'user'){echo("selected");}?> value="user">User</option>
                        <option <?php if($Role== 'staff'){echo("selected");}?> value="staff">Staff</option>
                        <option <?php if($Role== 'admin'){echo("selected");}?> value="admin">Admin</option>
                    </select>
                </div>
                <div class = "signup-button">
                    <button type="submit" name ="submit">UPDATE USER</button>
                </div>
            </form>
        </div>
    </body>
</html>