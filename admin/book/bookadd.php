<!DOCTYPE html>
<html>
    <head>
        <title>Create Book</title>
        <link rel="stylesheet" href="../../style.css">
    </head>
    <body>

    <?php
        include '../../connect.php';
        session_start();

        if(isset($_REQUEST['submit'])){
            $Author= $_REQUEST['author'];
            $Name= filter_var($_REQUEST['name'],FILTER_SANITIZE_STRING);
            $Genre= $_REQUEST['genre'];
            $ISBN=filter_var($_REQUEST['isbn'],FILTER_SANITIZE_NUMBER_INT);
            $Publisher= $_REQUEST['publisher'];
            $Date= $_REQUEST['publishdate'];
            $Rental=$_REQUEST['rental'];

            if(empty($Name)){$errorMsg[0] = 'Name Required';}
            if(empty($ISBN)){$errorMsg[1] = 'ISBN Required';}
            if(empty($Date)){$errorMsg[2] = 'Publish Date Required';}
            if(empty($Rental)){$errorMsg[3] = 'Amount Required';}

            if(empty($errorMsg)){
                $sql = "INSERT INTO book (Author,Publisher,Genre,Name,Rental_status,ISBN,Publish_date) VALUES ('$Author','$Publisher','$Genre','$Name','$Rental','$ISBN','$Date')";
                    
                $result = mysqli_query($con,$sql);
                if($result){header("location: ../adminbook.php");}
                else{die(mysqli_error($con));}
            }
        }
    ?>

        <div class = "display-body">
            <form  action = "bookadd.php" method="post" class="signup-form">
                <h3 class="display-header">Create Book</h3>
                <div class = "signup-input">
                    <label class="label-single">Author</label><br>
                    <select name="author">
                        <?php
                            $sql = "SELECT * FROM author";
                            if($result = mysqli_query($con,$sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        $temp = $row['Full_name'];
                                        $authorid = $row['Author_id'];
                                        if($authorid == $Author){echo "<option selected value='$authorid'>$temp</option>";}
                                        else{echo "<option value='$authorid'>$temp</option>";}
                                    }
                                }
                            }
                        ?>
                    </select>
                    <label class="label-single">Name of Book</label>
                    <?php
                        if(isset($errorMsg[0])){
                            echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[0]."</p>";
                        }
                    ?>
                    <input type="text" placeholder="Book name..." class="input-single" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>">
                    <label class="label-single">Genre</label>
                    <select name="genre">
                        <?php
                            $sql = "SELECT * FROM genre";
                            if($result = mysqli_query($con,$sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        $temp = $row['Genre_type'];
                                        $genreid = $row['Genre_id'];
                                        if($genreid == $Genre){echo "<option selected value='$genreid'>$temp</option>";}
                                        else{echo "<option value='$genreid'>$temp</option>";}
                                    }
                                }
                            }
                        ?>
                    </select>
                    <label class="label-single">ISBN</label>
                    <?php
                        if(isset($errorMsg[1])){echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[1]."</p>";}
                    ?>
                    <input type="text" placeholder="ISBN..." class="input-single" name="isbn" value="<?php echo isset($_POST['isbn']) ? $_POST['isbn'] : '' ?>">
                    <label class="label-single">Publisher</label>
                    <select name="publisher">
                        <?php
                            $sql = "SELECT * FROM publisher";
                            if($result = mysqli_query($con,$sql)){
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        $temp = $row['Publisher_name'];
                                        $publisherid = $row['Publisher_id'];
                                        if($publisherid == $Publisher){echo "<option selected value='$publisherid'>$temp</option>";}
                                        else{echo "<option value='$publisherid'>$temp</option>";}
                                    }
                                }
                            }
                        ?>
                    </select>
                    <label class="label-single">Published Date</label>
                    <?php
                        if(isset($errorMsg[2])){echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[2]."</p>";}
                    ?>
                    <input type="date" class="input-single" name="publishdate" value="<?php echo isset($_POST['publishdate']) ? $_POST['publishdate'] : '' ?>">
                    <label class="label-single">Rental Amount</label>
                    <?php
                        if(isset($errorMsg[3])){echo "<p style='color:red; font-size:12px; margin-left:15px;'>".$errorMsg[3]."</p>";}
                    ?>
                    <input type="text" placeholder="1..." class="input-single" name="rental" value="<?php echo isset($_POST['rental']) ? $_POST['rental'] : '' ?>">
                </div>
                <div class = "signup-button">
                    <button type="submit" name ="submit">CREATE BOOK</button>
                </div>
            </form>
        </div>
    </body>
</html>