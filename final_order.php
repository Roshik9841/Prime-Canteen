<?php
include("dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        /* Reset default browser styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body styles */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    padding: 20px;
}

/* Container for the order message */
.order-message-container {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
}

/* Message container styles */
.message-container {
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 600px;
}

/* Heading style */
h3 {
    text-align: center;
    color: #28a745;
    font-size: 2em;
    margin-bottom: 20px;
}

/* Order details */
.order-detail {
    margin-top: 20px;
    text-align: left;
}

/* Product and total details */
.order-detail span {
    font-size: 1.2em;
    display: block;
    margin: 10px 0;
}

.total {
    color: #d9534f;
    font-weight: bold;
}

/* Customer details */
.customer-detail p {
    font-size: 1.1em;
    margin-bottom: 10px;
}

.customer-detail span {
    font-weight: bold;
}

/* Continue shopping button */
.btn {
    display: inline-block;
    background-color: #007bff;
    color: #fff;
    text-align: center;
    padding: 12px 25px;
    font-size: 1.1em;
    border-radius: 5px;
    text-decoration: none;
    margin-top: 20px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #0056b3;
}

/* Form for payment (hidden, but included for later use) */
form {
    margin-top: 20px;
}

    </style>
</head>

<body>
    <?php
        include("HeaderFooter/header.php");
    ?>
<div class='order-message-container'>
        <div class='message-container'>
            <h3>Thank you for shopping!</h3>
            <div class='order-detail'>
                <span><?php echo $_GET['total_product']; ?></span>
                <span class='total'>Total: Rs.<?php echo $_GET['price_total']; ?></span>
                <div class='customer-detail'>
                    <p>Your name: <span><?php echo $_GET['name']; ?></span></p>
                    <p>Your number: <span><?php echo $_GET['number']; ?></span></p>
                    <p>Your email: <span><?php echo $_GET['email']; ?></span></p>
                    
                    <p>*Pay when order arrives.</p>
                    
                </div>
                <a href='product.php' class='btn'>Continue Food hunt</a>
                <form action="pay_now.php" method="post" >
                
                </form>
            </div>
        </div>
    </div>
</body>

</html>
