<?php
include("../dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order View</title>
    <link rel="stylesheet" href="admin-style/style.css" type="text/css">

</head>

<body>
    <?php
    include("adminHeader.php");
    ?>

    <section class="display_product" style="width:70%">
        <div class="display_message">
            <h2 class="title">Order Info</h2>
            <table class="admin-table">
                <thead>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Number</th>
                    <th>Email</th>
                    <th>FLat</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Pin_code</th>
                    <th>Total Product</th>
                    <th>Total Price</th>
                </thead>
                <tbody>
                    <?php
                    $select_products = mysqli_query($con, "SELECT * FROM `orders`");
                    if (mysqli_num_rows($select_products) > 0) {
                        while ($row = mysqli_fetch_assoc($select_products)) {
                    ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['number']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['flat']; ?></td>
                                <td><?php echo $row['street']; ?></td>
                                <td><?php echo $row['city']; ?></td>
                                <td><?php echo $row['pin_code']; ?></td>
                                <td><?php echo $row['total_products']; ?></td>
                                <td><?php echo $row['total_price']; ?></td>
                            </tr>
                    <?php
                        };
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>