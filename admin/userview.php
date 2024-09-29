<?php
include("../dbconnection.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<section class="display_product">
    <h2 class="title">User Info</h2>
    <table>
        <thead>
            <th>Id</th>
            <th>User Name</th>
            <th>Email</th>
            <!-- <th>Password</th> -->
        </thead>
        <tbody>
            <?php
            $select_products = mysqli_query($con, "SELECT * FROM userinfo ");
            if(mysqli_num_rows($select_products)>0){
                while($row=mysqli_fetch_assoc($select_products)){
            ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['Username'];?></td>
                <td><?php echo $row['Email'];?></td>
                
            </tr>
            <?php
            };
        };
            ?>
        </tbody>
    </table>
</section>
</body>
</html>