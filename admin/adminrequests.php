<?php
    include_once 'adminpanel.php';
?>

<div class="content">
    <p class="heading">Requests</p>

    <table class="admin-table" >
        <tr>
            <th>ID</th>
            <th>Item ID</th>
            <th>User ID</th>
            <th>Status</th>
            <th>Request Date</th>
            <th>Actions</th>
        </tr>

        <?php
            include '../connect.php';
            $sql="SELECT reservation.Reservation_id, item.Item_id, user.User_id, reservation.Status, reservation.Request_date
            FROM reservation
            INNER JOIN item ON item.Item_id=reservation.Item
            INNER JOIN user ON user.User_id=reservation.User
            INNER JOIN reservation_status ON reservation_status.Reserve_id=reservation.Status
            ORDER BY Reservation_id";
            $result=mysqli_query($con,$sql);
            if($result){
                while($row=mysqli_fetch_assoc($result)){
                    $ID=$row['Reservation_id'];
                    $Item=$row['Item_id'];
                    $User=$row['User_id'];
                    $Status=$row['Status'];
                    $Date=$row['Request_date'];
                    echo '<tr>
                        <td>'.$ID.'</td>
                        <td>'.$Item.'</td>
                        <td>'.$User.'</td>
                        <td>'.$Status.'</td>
                        <td>'.$Date.'</td>
                        <td>
                            <button style="background: #5dd959;"><a href="requests/requestchange.php?requestid='.$ID.'" style="color: black;">Accept</a>
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