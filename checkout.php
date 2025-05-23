

<?php
include("dbconnection.php");
session_start(); // Ensure session is started for `$_SESSION['uname']`

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        
    .contain {
        max-width: 1200px;
        margin: 20px auto;
        padding: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        background-color: #fff;
        border-radius: 8px;
    }

    .heading {
        font-size: 24px;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    .checkout-form {
        display: flex;
        flex-direction: column; 
        gap: 20px;
        padding: 20px;
        width: 90%;
    }

    .display-order {
        width: 90%;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        background-color: #f9f9f9;
        margin-bottom: 20px;
        text-align: center;
        color: #555;
    }

    .grand-total {
        font-weight: bold;
        color: #333;
    }

    .flex {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        width: 100%;
    }

    .inputbo {
        flex: 1 1 45%;
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .inputbo span {
        font-weight: bold;
        color: #333;
    }

    .inputbo input {
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .btn {
        background-color: #E3CD67;
        color: #fff;
        border: none;
        padding: 12px 20px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 16px;
        width: 200px;
        text-align: center;
    }

    .btn:hover {
        background-color: #F4AE35;
    }
    </style>
    </style>
</head>

<body>
    <?php include("HeaderFooter/header.php"); ?>

    <?php
   if (isset($_POST['order_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $username = $_SESSION['uname'];
    $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
    $userId_row = mysqli_fetch_assoc($select_userId);
    $userId = $userId_row['id'];

    $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('Cart query failed');
    $price_total = 0;

    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ' )';
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }
    $total_product = implode(', ', $product_name);

    $detail_query = mysqli_query($con, "INSERT INTO orders 
        (name, number, email, total_products, total_price, orderId, paymentMode)
        VALUES('$name', '$number', '$email', '$total_product', '$price_total', $userId, 'khalti')") or die('Order query failed');

    mysqli_query($con, "DELETE FROM cart WHERE id = $userId");

    if ($cart_query && $detail_query) {
        header("Location: pay_now.php");
        exit();
    }
}

if (isset($_POST['cash_btn'])) {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];

    $username = $_SESSION['uname'];
    $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
    $userId_row = mysqli_fetch_assoc($select_userId);
    $userId = $userId_row['id'];

    $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('Cart query failed');
    $price_total = 0;
    if (mysqli_num_rows($cart_query) > 0) {
        while ($product_item = mysqli_fetch_assoc($cart_query)) {
            $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ' )';
            $product_price = $product_item['price'] * $product_item['quantity'];
            $price_total += $product_price;
        }
    }

    $total_product = implode(', ', $product_name);

    $detail_query = mysqli_query($con, "INSERT INTO orders 
        (name, number, email, total_products, total_price, orderId, paymentMode)
        VALUES('$name','$number','$email','$total_product','$price_total',$userId, 'cash')") or die('query failed');

    mysqli_query($con, "DELETE FROM cart WHERE id = $userId");

    if ($cart_query && $detail_query) {
        header("Location:final_order.php?name=$name&number=$number&email=$email&total_product=$total_product&price_total=$price_total");
        exit();
    }
}
?>

   <div class="container">
    <section class="form">
        <h1 class="heading">Complete your order</h1>
        <form method="post" onsubmit="return validate()" class="checkout-form">
            <div class="display-order">
                <?php
                $username = $_SESSION['uname'];
                $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
                $userId_row = mysqli_fetch_assoc($select_userId);
                $userId = $userId_row['id'];

                $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId");
                $grand_total = 0;

                if (mysqli_num_rows($select_cart) > 0) {
                    while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                        $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                        $grand_total += $total_price;
                        echo "<span>{$fetch_cart['name']} ({$fetch_cart['quantity']})</span>";
                    }
                } else {
                    echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                }
                ?>
                <span class="grand-total">Grand Total: Rs. <?= $grand_total; ?></span>
            </div>
            <div class="flex">
                <div class="inputbo"><span>Your name</span><input type="text" value ="<?php echo $_SESSION['uname']?>" name="name" required></div>
                <div class="inputbo"><span>Your number</span><input type="number" name="number" id="num" value= "<?php echo $_SESSION['number']?>" required></div>
                <div class="inputbo"><span>Your email</span><input type="email" name="email" id="email" value= "<?php echo $_SESSION['email']?>" required></div>
            </div>
            <input type="submit" value="Pay with Khalti" name="order_btn" class="btn">
            <input type="submit" value="Order Now" name="cash_btn" class="btn">
        </form>
    </section>
</div>


    <script>
        function validate() {
            var emailREGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var numREGEX = /^98\d{8}$/;

            var email = document.querySelector('input[name="email"]').value;
            var num = document.querySelector('input[name="number"]').value;

            var emailError = !emailREGEX.test(email);
            var numError = !numREGEX.test(num);

            if (emailError || numError) {
                if (emailError) alert("Invalid email");
                if (numError) alert("Invalid phone number");
                return false;
            }
            return true;
        }
    </script>

    <?php include("HeaderFooter/footer.php"); ?>
</body>

</html>