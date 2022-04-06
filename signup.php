<script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("ipassword").setAttribute("type","password");
            document.getElementById("ipasswordrepeat").setAttribute("type","password");
            document.getElementById("icon").innerText = "visibility_off";
            state = false;
        }
        else{
            document.getElementById("ipassword").setAttribute("type","text");
            document.getElementById("ipasswordrepeat").setAttribute("type","text");
            document.getElementById("icon").innerText = "visibility";
            state = true;
            icon.innerT = "visibility";
        }
    }
</script>

<?php
    include 'connect.php';
    session_start();

    if(isset($_REQUEST['submit'])){
        $Fname= filter_var($_REQUEST['fname'],FILTER_SANITIZE_STRING);
        $Lname= filter_var($_REQUEST['lname'],FILTER_SANITIZE_STRING);
        $Email=filter_var($_REQUEST['email'],FILTER_SANITIZE_EMAIL);
        $Username=filter_var($_REQUEST['username'],FILTER_SANITIZE_STRING);
        $Password=$_REQUEST['password'];
        $Passwordrepeat=$_REQUEST['passwordrepeat'];

        if(empty($Fname) or empty($Lname)){
            $errorMsg[0] = 'Name Required';
        }

        if(empty($Email)){
            $errorMsg[1] = 'Email Required';
        }

        if(empty($Username)){
            $errorMsg[2] = 'Username Required';
        }

        if(strlen($Password) < 6){
            $errorMsg[3] = 'Must Be At Least 6 Characters';
        }

        if($Password != $Passwordrepeat){
            $errorMsg[4] = 'Passwords Must Match';
        }

        if(empty($errorMsg)){
            $sql = "SELECT * FROM user WHERE email='$Email'";
            $res = mysqli_query($con, $sql);

            if(mysqli_num_rows($res) > 0){
                $errorMsg[5] = 'Email Already Taken';
            }

            $sql = "SELECT * FROM user WHERE username='$Username'";
            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result) > 0){
                $errorMsg[6] = 'Username Already Taken';
            }

            if(empty($errorMsg)){
                $hashed_password = password_hash($Password, PASSWORD_DEFAULT);
                $created = new DateTime();
                $created = $created->format('Y-m-d H:i:s');
                $Hashed_Password = password_hash($Password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `user` (Fname,Lname,Email,Username,Password,Created) VALUES('$Fname','$Lname','$Email','$Username','$Hashed_Password','$created')";
                $result = mysqli_query($con,$sql);
                if($result){
                    header("location: index.php");
                }
                else{
                    die(mysqli_error($con));
                }
            }
            
        }

    }

?>

<?php
    include_once 'header.php';
?>
    <div class="page-content">
        <div class = "signup-body">
            <head2>
                <title>Sign Up</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form  action = "signup.php" method="post" class="signup-form">
                <h2>SIGN UP</h2>
                <div class = "signup-input">
                    <label class="label-double">Full Name</label><br>
                    <?php
                        if(isset($errorMsg[0])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[0]."</p>";
                        }
                    ?>
                    <input type="text" placeholder="First name..." class="input-double" name="fname" autocomplete="off" value="<?php echo isset($_POST['fname']) ? $_POST['fname'] : '' ?>">
                    <input type="text" placeholder="Last name..." class="input-double" name="lname" autocomplete="off" value="<?php echo isset($_POST['lname']) ? $_POST['lname'] : '' ?>"><br>
                    <label class="label-single">Email</label>
                    <?php
                        if(isset($errorMsg[1])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[1]."</p>";
                        }
                        if(isset($errorMsg[5])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[5]."</p>";
                        }
                    ?>
                    <input type="email" placeholder="Email..." class="input-single" name="email" autocomplete="on" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <label class="label-single">User Name</label>
                    <?php
                        if(isset($errorMsg[2])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[2]."</p>";
                        }
                        if(isset($errorMsg[6])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[6]."</p>";
                        }
                    ?>
                    <input type="text" placeholder="Username..." class="input-single" name="username" autocomplete="off" value="<?php echo isset($_POST['username']) ? $_POST['username'] : '' ?>">
                    <label class="label-single">Password</label>
                    <?php
                        if(isset($errorMsg[3])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[3]."</p>";
                        }
                    ?>
                    <input type="password" placeholder="Password..." id="ipassword" class="input-single" name="password" autocomplete="off">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                    <label class="label-single">Repeat Password</label>
                    <?php
                        if(isset($errorMsg[4])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[4]."</p>";
                        }
                    ?>
                    <input type="password" placeholder="Password..." id ="ipasswordrepeat" class="input-single" name="passwordrepeat"  autocomplete="off">
                </div>
                <div class = "message-signredirect">Already a User?</div>
                <div class = "link-signredirect"> 
                    <li><a href="login.php">Log In Instead</a></li>
                </div>



                <div class = "signup-button">
                    <button type="submit" name ="submit">SIGN UP</button>
                </div>
            </form>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>