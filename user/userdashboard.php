<script>
    var state = false;
    function toggle(){
        if(state){
            document.getElementById("ipassword").setAttribute("type","password");
            document.getElementById("icon").innerText = "visibility_off";
            state = false;
        }
        else{
            document.getElementById("ipassword").setAttribute("type","text");
            document.getElementById("icon").innerText = "visibility";
            state = true;
            icon.innerT = "visibility";
        }
    }
</script>
<?php
    include_once 'userheader.php';

    if(isset($_POST['submit'])){
        $email=$_POST['Email'];
        $password =$_POST['password'];
        $username=$_POST['username'];
        $phonenum=$_POST['phonenum'];

        $sql="UPDATE user SET Email = '$email', password ='$password', Username = '$username', Pnumber = '$phonenum' WHERE User_id = '1111' ";
        $result = mysqli_query($con, $sql);
        if($result){
            echo "";
        }else{
            die(mysqli_error($con));
        }
    }
?>

<div class="page-content">
    <div class = "usrdash">
            <head2>
                <title>User Dashboard</title>
                <link rel="stylesheet" href="../style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
        <div>
            <img src="https://lumiere-a.akamaihd.net/v1/images/character_themuppets_kermit_b77a431b.jpeg" alt="User Picture" class = "usrpicture" style =" margin-left: -950px; height:170; width:270;border-radius:5%; padding:5px;">
        </div>

        <div class = "usrdashform">
            <div>
                <link rel="stylesheet" href="style.css">
                <form method = "post" class="login-form" style = "position: absolute; left:5px; top: 300px; width: 300px; height: 550px;">
                    <h2> Change Information </h2>
                    <div class = "login-input">
                        <label>Change Email<label> <input type = "text" placeholder =  "New Email..."  class = "login-input" name = "Email">
                    </div>
                    <div class = "login-input">
                            <label>Password</label>
                            <input type="password" name="password" placeholder="Password..." id="ipassword" name = "password">
                            <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                    </div>
                    <div class = "login-input">
                        <label>UserName<label> <input type = "text" placeholder = "New UserName..." class = "login-input" name="username">
                    </div>
                    <div class = "login-input">
                        <label>Phone Number<label> <input type = "text" placeholder = "New Phone Number..." class="login-input" name = "phonenum">
                    </div>
                    
                    <label>Ready To Submit Changes?<label>
                    <button type = "submit" name="submit" style="width: 200px; hieght:50px;background-color: #999DA0;border: none; color: Black; padding: 15px 32px;
   text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;"> Submit Changes</button>

                
                </form>
            </div>

            <form class="login-form" style = "position:absolute; top:130; left:390px; width:900px; height:210px;">
            <h2>User Information</h2>
                <table class ="table table-bordered">
                    <thead>
                        <tr>
                            <th scope = "col" style = "padding-left:30px;">User ID</th>
                            <th scope = "col" style = "padding-left:30px">UserName</th>
                            <th scope = "col" style = "padding-left:30px">First Name</th>
                            <th scope = "col" style = "padding-left:30px">Last Name</th>
                            <th scope = "col" style = "padding-left:30px">Email Address</th>
                            <th scope = "col" style = "padding-left:30px">DOB</th>
                            <th scope = "col" style = "padding-left:30px">Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "Select * from `user` Where User_id = '1111'";
                        $result = mysqli_query($con, $sql);
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $Uid = $row['User_id'];
                                $Uname = $row['Username'];
                                $fname = $row['Fname'];
                                $lname = $row['Lname'];
                                $email = $row['Email'];
                                $dob = $row['DOB'];
                                $pnum =$row['Pnumber'];

                                echo'<tr>
                                <th scope = "row" style = "padding-left:20px">'.$Uid.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$Uname.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$fname.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$lname.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$email.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$dob.'</th>
                                <th scope = "row" style = "padding-left:20px">'.$pnum.'</th>
                                
                                </tr>';
                            }
                        }


                    ?>
                    </tbody>
                    
                </table>
            </form>

            <form class="login-form" style = "position:absolute; top:350; left:390px; width:900px; height:500px;" >
            <h2> Item History </h2>
                <table>
                <tr>
                    <th scope = "col" style = "padding-left:30px;">Item Type</th>
                    <th scope = "col" style = "padding-left:30px">Item Name</th>
                    <th scope = "col" style = "padding-left:30px">Date Requested</th>
                    <th scope = "col" style = "padding-left:30px">Date Loaned</th>
                    <th scope = "col" style = "padding-left:30px">Due Date</th>
                    <th scope = "col" style = "padding-left:30px">Fine</th>
                </tr>
                <tr>
                    <th scope = "row" style = "padding:20px">Book</th>
                    <th scope = "row" style = "padding:20px">Harry Potter</th>
                    <th scope = "row" style = "padding:20px">2022-01-01</th>
                    <th scope = "row" style = "padding:20px">2022-01-03</th>
                    <th scope = "row" style = "padding:20px">2022-03-01</th>
                    <th scope = "row" style = "padding:20px">$0</th>
                </tr>
                <tr>
                    <th scope = "row" style = "padding:20px">Book</th>
                    <th scope = "row" style = "padding:20px">Harry Potter</th>
                    <th scope = "row" style = "padding:20px">2022-01-01</th>
                    <th scope = "row" style = "padding:20px">2022-01-03</th>
                    <th scope = "row" style = "padding:20px">2022-03-01</th>
                    <th scope = "row" style = "padding:20px">$0</th>
                </tr>
                <tr>
                    <th scope = "row" style = "padding:20px">Book</th>
                    <th scope = "row" style = "padding:20px">Harry Potter</th>
                    <th scope = "row" style = "padding:20px">2022-01-01</th>
                    <th scope = "row" style = "padding:20px">2022-01-03</th>
                    <th scope = "row" style = "padding:20px">2022-03-01</th>
                    <th scope = "row" style = "padding:20px">$0</th>
                </tr>
                </table>
            </form>
            
            <form class="login-form" style = "position:absolute; top:150; right:100px; width:400px; height:600px;" >
            <h2> Library Holds/Fines </h2>
            <table>
                <tr>
                    <th scope = "col" style = "padding:15px;">Item Name</th>
                    <th scope = "col" style = "padding:15px">Ammount Due</th>
                </tr>
                <tr>
                    <th scope = "row" style = "padding:20px">Harry Potter</th>
                    <th scope = "row" style = "padding:20px">$40</th>
                </tr>
                    </table>


                <label> Make a Payment <lable>
                <button type = "submit" style="width: 200px; hieght:50px;background-color: #999DA0;border: none; color: Black; padding: 15px 32px;
   text-align: center; text-decoration: none; display: inline-block; font-size: 16px; border-radius: 5px;"> Submit </button>


        </div>

    </div>
</div>

    

<?php
				include_once '../footer.php';
?>

