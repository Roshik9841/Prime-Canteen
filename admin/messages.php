<?php
include("../dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin-style/style.css" type="text/css">
</head>

<body>
    <?php
    include('adminHeader.php');
    ?>
    <div class="display_message">
        <h2 class="title">Messages</h2>
        <table class="admin-table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Messages</th>

            </thead>
            <tbody>
                <?php
                $select_products = mysqli_query($con, "SELECT * FROM contact ");
                if (mysqli_num_rows($select_products) > 0) {
                    while ($row = mysqli_fetch_assoc($select_products)) {
                ?>
                        <tr class="admin-tr">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['msg']; ?></td>

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