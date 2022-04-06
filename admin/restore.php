<?php
    include_once 'adminpanel.php';
?>

<div class="content">
    <p class="heading">Users</p>
    <style type="text/css">

    </style>

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
            $sql="SELECT $var FROM user WHERE Deleted_id=1";
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
                            <button style="background: #5dd959;"><a href="user/userrestore.php?restoreid='.$UID.'" style="color: black;">Restore</a>
                        </td> 
                        
                    </tr>';
                }
            }
        ?>
    </table> 

    <p class="heading">Books</p>

    <table class="admin-table" >
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Author First</th>
            <th>Author Last</th>
            <th>Genre</th>
            <th>ISBN</th>
            <th>Publisher</th>
            <th>Published</th>
            <th>Rental</th>
            <th>Actions</th>
        </tr>

        <?php
            include '../connect.php';
            $var = '*';
            $sql="SELECT book.Book_id, book.Name, author.FName, author.LName, book.Name, publisher.Publisher_name, genre.Genre_type, book.ISBN, book.Publish_date, book.Rental_status
            FROM book
            INNER JOIN author ON book.Author=author.Author_id
            INNER JOIN publisher ON book.Publisher=publisher.Publisher_id
            INNER JOIN genre ON book.Genre=genre.Genre_id
            WHERE Deleted_id=1
            ORDER BY Book_id";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $ID=$row['Book_id'];
                    $Name=$row['Name'];
                    $FAuthor=$row['FName'];
                    $LAuthor=$row['LName'];
                    $Genre=$row['Genre_type'];
                    $ISBN=$row['ISBN'];
                    $Publisher=$row['Publisher_name'];
                    $Published=$row['Publish_date'];
                    $Rental=$row['Rental_status'];
                    echo '<tr>
                        <td>'.$ID.'</td>
                        <td>'.$Name.'</td>
                        <td>'.$FAuthor.'</td>
                        <td>'.$LAuthor.'</td>
                        <td>'.$Genre.'</td>
                        <td>'.$ISBN.'</td>
                        <td>'.$Publisher.'</td>
                        <td>'.$Published.'</td>
                        <td>'.$Rental.'</td>
                        <td>
                            <button style="background: #5dd959;"><a href="book/bookrestore.php?restoreid='.$ID.'" style="color: black;">Restore</a>
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