<?php
include("dbconnection.php");
session_start();

$username = $_SESSION['uname'] ?? null; // Ensure the username is set
if (!$username) {
    die("User is not logged in.");
}

// Fetch user ID from the database
$select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '" . mysqli_real_escape_string($con, $username) . "'");
if (mysqli_num_rows($select_userId) === 0) {
    die("User not found.");
}

$userId_row = mysqli_fetch_assoc($select_userId);
$userId = $userId_row['id'];

// Fetch order details from the database
$select_order = mysqli_query($con, "SELECT * FROM `orders` WHERE orderId= '$userId' ORDER BY id DESC LIMIT 1"); // Ensure you're fetching the latest order
if (mysqli_num_rows($select_order) > 0) {
    $fetch_order = mysqli_fetch_assoc($select_order);
    $total_price = (int)$fetch_order['total_price']; // Cast to integer to avoid issues
    $name = $fetch_order['name'];
    $email = $fetch_order['email'];
    $num = $fetch_order['number'];

    // Debugging: Verify the total price and other details
    // echo "Total Price: " . $total_price; die;

    if ($total_price <= 0) {
        die("Invalid total price: " . $total_price);
    }

    // Define payload for Khalti
    $payload = array(
        "return_url" => "http://localhost/primeCanteen/final_order1.php",
        "website_url" => "http://localhost/primeCanteen/",
        "amount" => $total_price * 100, // Convert to paisa for Khalti
        "purchase_order_id" => "Order" . $userId,
        "purchase_order_name" => "Order from Prime Canteen",
        "customer_info" => array(
            "name" => $name,
            "email" => $email,
            "phone" => $num,
        ),
    );

    // Initialize cURL for Khalti payment
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://a.khalti.com/api/v2/epayment/initiate/',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode($payload),
        CURLOPT_HTTPHEADER => array(
            'Authorization: Key 0e380c613e884487b6ac92e9a9021fd3', // Replace with your actual API key
            'Content-Type: application/json',
        ),
    ));

    $response = curl_exec($curl);
    if ($response === false) {
        die("Error initiating payment: " . curl_error($curl));
    }
    curl_close($curl);

    $response = json_decode($response, true);
    if (isset($response['payment_url'])) {
        $payment_url = $response['payment_url'];

        // Redirect to Khalti payment page
        header('Location: ' . $payment_url);
        exit();
    } else {
        die("Failed to get payment URL. Response: " . json_encode($response));
    }
} else {
    die("No orders found for the user.");
}
?>
