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
</head>

<body>
    <?php include("HeaderFooter/header.php"); ?>

    <?php
    if (isset($_POST['order_btn']) || isset($_POST['cash_btn'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $username = $_SESSION['uname'];

        // Get user ID
        $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
        $userId_row = mysqli_fetch_assoc($select_userId);
        $userId = $userId_row['id'];

        // Fetch cart items
        $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id = $userId");
        $price_total = 0;
        $product_names = [];

        if (mysqli_num_rows($cart_query) > 0) {
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                $product_names[] = $product_item['name'] . ' (' . $product_item['quantity'] . ')';
                $product_price = $product_item['price'] * $product_item['quantity'];
                $price_total += $product_price;
            }
        } else {
            echo "<script>alert('Your cart is empty!'); window.location.href='cart.php';</script>";
            exit();
        }

        $total_product = implode(', ', $product_names);

        // Insert into `orders` table
        $insert_order = mysqli_query($con, "INSERT INTO `orders` 
            (name, number, email, total_products, total_price, orderId, created_at) 
            VALUES('$name', '$number', '$email', '$total_product', '$price_total', $userId, NOW())");

        if ($insert_order) {
            $order_id = mysqli_insert_id($con); // Get the ID of the newly created order

            // Insert into `order_items` table
            mysqli_data_seek($cart_query, 0); // Reset cart query pointer
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                $product_name = $product_item['name'];
                $quantity = $product_item['quantity'];
                $price = $product_item['price'];

                $insert_items = mysqli_query($con, "INSERT INTO `order_items` 
                    (order_id, product_name, quantity, price, sold_date) 
                    VALUES('$order_id', '$product_name', $quantity, $price, CURDATE())");
            }

            // Clear user's cart
            $delete_cart = mysqli_query($con, "DELETE FROM cart WHERE id = $userId");

            if ($delete_cart) {
                header("Location: final_order.php?name=$name&total_price=$price_total");
                exit();
            } else {
                echo "<script>alert('Failed to clear the cart.');</script>";
            }
        } else {
            echo "<script>alert('Failed to place the order.');</script>";
        }
    }
    ?>

    <div class="contain">
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
                    <!-- Input fields -->
                    <div class="inputbo"><span>Your name</span><input type="text" name="name" required></div>
                    <div class="inputbo"><span>Your number</span><input type="number" name="number" id="num" required></div>
                    <div class="inputbo"><span>Your email</span><input type="email" name="email" id="email" required></div>
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

            var email = document.getElementById('email').value;
            var num = document.getElementById('num').value;

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
