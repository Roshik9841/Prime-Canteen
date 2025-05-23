<?php
include("dbconnection.php");
session_start();

$username = $_SESSION['uname'] ?? null;
if (!$username) die("User is not logged in.");

$select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '" . mysqli_real_escape_string($con, $username) . "'");
if (mysqli_num_rows($select_userId) === 0) die("User not found.");

$userId = mysqli_fetch_assoc($select_userId)['id'];

$select_order = mysqli_query($con, "SELECT * FROM orders WHERE orderId = '$userId' AND paymentMode = 'khalti' ORDER BY id DESC LIMIT 1");
if (mysqli_num_rows($select_order) > 0) {
    $fetch_order = mysqli_fetch_assoc($select_order);
    $total_price = (int)$fetch_order['total_price'];
    $name = $fetch_order['name'];
    $email = $fetch_order['email'];
    $num = $fetch_order['number'];
    $order_id = $fetch_order['id'];

    if ($total_price <= 0) die("Invalid total price");

    $payload = array(
        "return_url" => "http://localhost/primeCanteen/final_order1.php?order_id=$order_id",
        "website_url" => "http://localhost/primeCanteen/",
        "amount" => $total_price * 100,
        "purchase_order_id" => "Order$order_id",
        "purchase_order_name" => "Order from Prime Canteen",
        "customer_info" => array(
            "name" => $name,
            "email" => $email,
            "phone" => $num,
        ),
    );

    $_SESSION['Payload']= $payload;
    $_SESSION['userId']= $userId;
    
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
            'Authorization: Key 0e380c613e884487b6ac92e9a9021fd3', 
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

        
        header('Location: ' . $payment_url);
        exit();
    } else {
        die("Failed to get payment URL. Response: " . json_encode($response));
    }
} else {
    die("No orders found for the user.");
}
?>
