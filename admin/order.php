<?php
include("../dbconnection.php");
require '../vendor/autoload.php'; // Ensure this path is correct
use PHPMailer\PHPMailer\PHPMailer;

// Check if the "Mark as Completed" button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // Fetch order details
    $query = "SELECT name, email, created_at FROM orders WHERE id = $order_id";
    $result = mysqli_query($con, $query);
    $order = mysqli_fetch_assoc($result);

    if ($order) {
        $user_name = $order['name'];
        $user_email = $order['email'];
        $order_date = $order['created_at'];

        // Update the order status to 'Completed'
        $update_query = "UPDATE orders SET status = 'Completed' WHERE id = $order_id";
        if (mysqli_query($con, $update_query)) {
            // Update `order_items` sold_date
            $update_items_query = "UPDATE order_items SET sold_date = DATE('$order_date') WHERE order_id = $order_id";
            mysqli_query($con, $update_items_query);

            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'Roshik9841@gmail.com'; 
                $mail->Password = 'vosq doyh wvee gnul'; 
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;

                // Email details
                $mail->setFrom('Roshik9841@gmail.com', 'Your Name');
                $mail->addAddress($user_email, $user_name);
                $mail->Subject = 'Order Status Update';
                $mail->Body = "Dear $user_name,\n\nYour food is ready!\n\nThank you for ordering with us.";

                $mail->send();
                echo '<script>alert("Order marked as completed and email sent!");</script>';
            } catch (Exception $e) {
                echo '<script>alert("Order updated, but email could not be sent.");</script>';
            }
        } else {
            echo '<script>alert("Failed to update order status.");</script>';
        }
    } else {
        echo '<script>alert("Order not found.");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order View</title>
    <link rel="stylesheet" href="admin-style/style.css">
</head>

<body>
    <?php include("adminHeader.php"); ?>

    <section class="display_product">
        <div class="display_message">
            <h2>Detailed Orders</h2>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Number</th>
                        <th>Email</th>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM orders ORDER BY created_at DESC";
                    $result = mysqli_query($con, $query);

                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>{$row['id']}</td>";
                            echo "<td>{$row['name']}</td>";
                            echo "<td>{$row['number']}</td>";
                            echo "<td>{$row['email']}</td>";
                            echo "<td>{$row['total_products']}</td>";
                            echo "<td>{$row['total_price']}</td>";
                            echo "<td>" . ucfirst($row['status']) . "</td>";
                            echo "<td>{$row['created_at']}</td>";
                            echo "<td>";
                            if ($row['status'] === 'Pending') {
                                echo "<form method='POST' action=''>";
                                echo "<input type='hidden' name='order_id' value='{$row['id']}'>";
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
