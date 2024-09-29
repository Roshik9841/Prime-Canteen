<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="display_message">
    <h2 class="title">Messages</h2>
    <table>
        <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Messages</th>
            
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
</div>
</body>
</html>