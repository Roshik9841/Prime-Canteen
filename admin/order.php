<?php
include("../dbconnection.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php'; // Ensure this path is correct

// Check if the "Mark as Completed" button is clicked
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // Fetch order details
    $query_select_order = "
        SELECT name, email 
        FROM orders 
        WHERE id = ?";
    $stmt = $con->prepare($query_select_order);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $order = $result->fetch_assoc();

    if ($order) {
        $user_name = $order['name'];
        $user_email = $order['email'];

        // Update the order status to 'Completed'
        $query_update_order = "
            UPDATE orders 
            SET status = 'Completed' 
            WHERE id = ?";
        $update_stmt = $con->prepare($query_update_order);
        $update_stmt->bind_param("i", $order_id);

        if ($update_stmt->execute()) {
            // Send email using PHPMailer
            $mail = new PHPMailer(true);
            try {
                // Server settings
                $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'Roshik9841@gmail.com'; // Your email
    $mail->Password = 'vosq doyh wvee gnul';    // Your app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

                // Recipients
                $mail->setFrom('Roshik9841@gmail.com', 'Your Name');
                $mail->addAddress($user_email, $user_name);

                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Order Status Update';
                $mail->Body = "Dear $user_name,<br><br>Your food is ready!<br><br>Thank you for ordering with us.";
                $mail->AltBody = "Dear $user_name,\n\nYour food is ready!\n\nThank you for ordering with us.";
 
                $mail->send();
                echo '<script>alert(" Order marked as completed and email sent!");</script>';
            } catch (Exception $e) {
                echo "Order marked as completed, but email could not be sent. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo "Failed to update order status.";
        }
    } else {
        echo "Order not found.";
    }

    $stmt->close();
    $update_stmt->close();
}
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
                                echo "<form method='POST' action='' style='display:inline;'>";
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
