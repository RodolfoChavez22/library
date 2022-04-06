<?php
    include_once 'adminpanel.php';
?>

    <div class="content">
        <p class="heading">Users</p>
        <button class="add-item" onclick="location.href='user/useradd.php';">
            Add User
        </button>

        <table class="admin-table" >
            <tr>
                <th>UID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>DOB</th>
                <th>Email</th>
                <th>Username</th>
                <th>Role</th>
                <th>Bal.</th>
                <th>Mobile</th>
                <th>Orders</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>

            <?php
                include '../connect.php';
                $var = '*';
                $sql="SELECT $var FROM user WHERE Deleted_id=0";
                $result=mysqli_query($con,$sql);
                if($result){
                    while($row=mysqli_fetch_assoc($result)){
                        $UID=$row['User_id'];
                        $Fname=$row['Fname'];
                        $Lname=$row['Lname'];
                        $DOB=$row['DOB'];
                        $Email=$row['Email'];
                        $Username=$row['Username'];
                        $Balance=$row['Balance'];
                        $Mobile=$row['Pnumber'];
                        $Orders=$row['Current_orders'];
                        $Role=$row['User_Status'];
                        $Created=$row['Created'];
                        echo '<tr>
                            <td>'.$UID.'</td>
                            <td>'.$Fname.'</td>
                            <td>'.$Lname.'</td>
                            <td>'.$DOB.'</td>
                            <td>'.$Email.'</td>
                            <td>'.$Username.'</td>
                            <td>'.$Role.'</td>
                            <td>'.$Balance.'</td>
                            <td>'.$Mobile.'</td>
                            <td>'.$Orders.'</td>
                            <td>'.$Created.'</td>
                            <td>
                                <button style="background: #5970d9;"><a href="user/userupdate.php?updateid='.$UID.'" style="color: black;">Update</a>
                                <button style="background: #d96459;"><a href="user/userdelete.php?deleteid='.$UID.'" style="color: black;">Delete</a>
                            </td> 
                            
                        </tr>';
                    }
                }
            ?>
        </table> 
    </div>
</section>

<?php
    include_once '../footer.php';
?>