<?php
include("../dbconnection.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {

    $order_id = intval($_POST['order_id']);

    $query = "SELECT name, email FROM orders WHERE id = $order_id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
     
        $order = mysqli_fetch_assoc($result);
        $user_name = $order['name'];
        $user_email = $order['email'];

        $update_query = "UPDATE orders SET status = 'Completed' WHERE id = $order_id";
        if (mysqli_query($con, $update_query)) {
         
            $subject = "Order Status Update";
            $message = "Dear $user_name,\n\nYour food is ready!\n\nThank you for ordering with us.";
            $headers = "From: noreply@example.com";

            if (mail($user_email, $subject, $message, $headers)) {
            
                header("Location: order.php?message=Order marked as Completed and email sent");
            } else {
                
                header("Location: order.php?message=Order status updated, but email not sent");
            }
        } else {
           
            header("Location: order.php?message=Failed to update order status");
        }
    } else {
  
        header("Location: order.php?message=Order not found");
    }

    mysqli_close($con);
}
?>
