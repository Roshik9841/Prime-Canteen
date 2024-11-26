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
    <?php include("adminHeader.php"); ?>

    <section class="display_product">
        <div class="display_message">
            <h2 class="title">Detailed Orders</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>User Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Total Products</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_select_orders = "
                        SELECT id, name, number, email, total_products, total_price, status, created_at
                        FROM orders 
                        ORDER BY created_at DESC";

                    $select_orders = mysqli_query($con, $query_select_orders);

                    if ($select_orders && mysqli_num_rows($select_orders) > 0) {
                        while ($row = mysqli_fetch_assoc($select_orders)) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['number']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total_products']) . "</td>";
                            echo "<td>" . htmlspecialchars($row['total_price']) . "</td>";
                            echo "<td>" . htmlspecialchars(ucfirst($row['status'])) . "</td>";
                            echo "<td>" . htmlspecialchars($row['created_at']) . "</td>";
                            echo "<td>";
                            if ($row['status'] === 'Pending') {
                                echo "<form method='POST' action='updateOrderStatus.php' style='display:inline;'>";
                                echo "<input type='hidden' name='order_id' value='" . htmlspecialchars($row['id']) . "'>";
                                echo "<button type='submit'>Mark as Completed</button>";
                                echo "</form>";
                            } else {
                                echo "Completed";
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No orders found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
