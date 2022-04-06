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
    include_once 'header.php';
?>
    <div class="page-content">
        <div class = "login-body">
            <head2>
                <title>Log In</title>
                <link rel="stylesheet" href="style.css">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
            </head2>
            <form action="login.inc.php" method="post" class="login-form">
            <h2>LOGIN</h2>
                <div class = "login-input">
                    <label class="label-single">User Name</label>
                    <input type="text" name="uname" placeholder="Username/Email..." class="input-single"><br>
                </div>
                <div class = "login-input">
                    <label class="label-single">Password</label>
                    <input type="password" name="password" placeholder="Password..." id="ipassword" class="input-single">
                    <i><span class="material-icons-outlined" id ="icon" onclick="toggle()">visibility_off</span></i>
                </div>
                <div class = "message-logredirect">No Account?</div>
                <div class = "link-logredirect"> 
                    <li><a href="signup.php">Register Instead</a></li>
                </div>
                <div class = "login-button">
                    <button type="submit">LOG IN</button>
                </div>
            </form>
        </div>
    </div>
<?php
    include_once 'footer.php';
?>