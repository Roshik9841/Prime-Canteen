<?php
include("dbconnection.php");
session_start();
$username = $_SESSION['uname'];
$select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
$userId_row = mysqli_fetch_assoc($select_userId);
$userId = $userId_row['id'];
$select_cart = mysqli_query($con, "SELECT * FROM `orders` WHERE orderId= '$userId'");
if (mysqli_num_rows($select_cart) > 0) {
    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
        $total_price = $fetch_cart['total_price'];
        $name = $fetch_cart['name'];
        $email = $fetch_cart['email'];
        $num = $fetch_cart['number'];
?>

    <?php
    };
} ?>   
 <?php
    // Assuming $name and $email are defined and accessible here
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
        CURLOPT_POSTFIELDS => json_encode($payload), // Use json_encode to ensure proper JSON formatting
        CURLOPT_HTTPHEADER => array(
            'Authorization: Key 0e380c613e884487b6ac92e9a9021fd3',
            'Content-Type: application/json',
        ),
    ));

    $payload = array(
        "return_url" => "http://localhost/primeCanteen/final_order1.php",
        "website_url" => "https://localhost/phpmyadmin/",
        "amount" => $total_price,
        "purchase_order_id" => "Order01",
        "purchase_order_name" => "test",
        "customer_info" => array(
            "name" => $name,
            "email" => $email,
            "phone" => "9800000000",
            "amount" => $total_price
        )
    );


    $response = curl_exec($curl);
    curl_close($curl);

    $response = json_decode($response, true);
    $payment_url = $response['payment_url'];

    // Redirect back to payment_url
    header('location:' . $payment_url);
    ?>
