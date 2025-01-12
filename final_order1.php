<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart-Bakes And Cakes</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Pangolin&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/494f2e7fea.js" crossorigin="anonymous"></script>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Montserrat', sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.order-message-container {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}

.message-container {
    background-color: #ffffff;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    max-width: 600px;
    width: 90%;
    text-align: center;
    animation: fadeIn 0.5s ease-in-out;
}

h3 {
    color: #28a745;
    font-size: 1.8rem;
    margin-bottom: 20px;
    font-family: 'Pangolin', cursive;
}

.order-detail {
    margin-top: 20px;
    text-align: left;
}

.order-detail p {
    font-size: 1rem;
    color: #333333;
    line-height: 1.6;
}

.order-detail a {
    color: #007bff;
    text-decoration: none;
    font-weight: bold;
    transition: color 0.3s ease;
}

.order-detail a:hover {
    color: #0056b3;
}

.btn {
    display: inline-block;
    background-color: #007bff;
    color: #ffffff;
    padding: 12px 20px;
    font-size: 1rem;
    font-weight: bold;
    border-radius: 5px;
    text-decoration: none;
    transition: background-color 0.3s ease;
    margin-top: 20px;
}

.btn:hover {
    background-color: #0056b3;
}
    </style>
</head>

<body>

    <div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank You for Your Order!</h3>
            <div class='order-detail'>
                <p>Thank you for ordering. Your order has been placed successfully.</p>
                <p>We will send you an email when your food is ready.</p>
                <p>If you have any questions, feel free to <a href="contact.php">contact us</a>.</p>
                <p>We hope to see you again soon!</p>
            </div>
        </div>
    </div>

</body>

</html>