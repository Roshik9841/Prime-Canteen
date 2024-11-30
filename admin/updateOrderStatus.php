<?php
include("../dbconnection.php");

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
            // Prepare and send email
            $subject = "Order Status Update";
            $message = "Dear $user_name,\n\nYour food is ready!\n\nThank you for ordering with us.";
            $headers = "From: noreply@example.com";

            if (mail($user_email, $subject, $message, $headers)) {
                // Redirect back to the orders page with a success message
                header("Location: order.php?message=Order%20marked%20as%20Completed%20and%20email%20sent");
            } else {
                // Redirect with a message about email failure
                header("Location: order.php?message=Order%20status%20updated,%20but%20email%20not%20sent");
            }
        } else {
            // Redirect with an error message
            header("Location: order.php?message=Failed%20to%20update%20order%20status");
        }
    } else {
        // Redirect with an error message about order not found
        header("Location: order.php?message=Order%20not%20found");
    }

    // Close statements
    $stmt->close();
    $update_stmt->close();
    $con->close();
}
?>
