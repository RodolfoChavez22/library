<?php
    include_once 'adminpanel.php';
?>
    

    <div class="content">
        <p class="heading">Books</p>
        <button class="add-item" onclick="location.href='book/bookadd.php';">
            Add Book
        </button>
        <button class="add-item" onclick="location.href='key/author.php';">
            Add Author
        </button>
        <button class="add-item" onclick="location.href='key/genre.php';">
            Add Genre
        </button>
        <button class="add-item" onclick="location.href='key/publisher.php';">
            Add Publisher
        </button>

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
                $sql="SELECT book.Book_id, book.Name, author.FName, author.LName, book.Name, publisher.Publisher_name, genre.Genre_type, book.ISBN, book.Publish_date, book.Rental_status
                        FROM book
                        INNER JOIN author ON book.Author=author.Author_id
                        INNER JOIN publisher ON book.Publisher=publisher.Publisher_id
                        INNER JOIN genre ON book.Genre=genre.Genre_id
                        WHERE Deleted_id=0
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
                                <button style="background: #5970d9;"><a href="book/bookupdate.php?updateid='.$ID.'" style="color: black;">Update</a>
                                <button style="background: #d96459;"><a href="book/bookdelete.php?deleteid='.$ID.'" style="color: black;">Delete</a>
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