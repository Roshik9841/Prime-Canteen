<?php
include("../dbconnection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = intval($_POST['order_id']);

    // Update the status of the selected order to 'Completed'
    $update_query = "UPDATE orders SET status = 'Completed' WHERE id = $order_id";

    if (mysqli_query($con, $update_query)) {
        // Redirect back to the orders page with a success message
        header("Location: order.php?message=Order%20marked%20as%20Completed");
        exit();
    } else {
        // Redirect back to the orders page with an error message
        header("Location: order.php?message=Failed%20to%20update%20order%20status");
        exit();
    }
}
?>
