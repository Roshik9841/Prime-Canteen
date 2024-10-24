 <?php
    include('dbconnection.php');
    
if (isset($_POST['update_btn'])) {
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $update_quantity_query = mysqli_query($con, "UPDATE cart SET quantity='$update_value' WHERE id='$update_id'");
    $message = isset($_POST['message']) ? mysqli_real_escape_string($con, $_POST['message']) : '';
    $update_quantity_query = mysqli_query($con, "UPDATE cart SET quantity='$update_value' WHERE id='$update_id'");

    if (!empty($message)) {
        $update_message_query = mysqli_query($con, "UPDATE cart SET message='$message' WHERE id='$update_id'");
    }

    if ($update_quantity_query) {
        header('location:cart.php');
    }
    ;
}
;

if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    mysqli_query($con, "DELETE FROM cart WHERE id = '$remove_id'");
    header('location:cart.php');
}
;

if (isset($_GET['delete_all'])) {
    mysqli_query($con, "DELETE FROM cart");
    header('location:cart.php');
}

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        .cart-container {
            display: flex;
            justify-content: space-around;
            padding: 20px;

        }

        .cart {
            width: 65%;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .cart h2 {
            margin-bottom: 20px;
        }

        .cart-header {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            font-weight: bold;
            border-bottom: 1px solid #ddd;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            margin-bottom: 30px;
            border-bottom: 1px solid #eee;
        }

        .cart-product {
            display: flex;
            align-items: center;
        }

        .cart-product img {
            width: 70px;
            height: 70px;
            margin-right: 10px;
            border-radius: 10px;
        }

        .price,
        .quantity,
        .subtotal,
        .action {
            display: flex;
            align-items: center;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity button {
            border: 1px solid #ff0000;
            background: none;
            color: #ff0000;
            padding: 5px 10px;
            font-size: 18px;
            border-radius: 5px;
        }

        .quantity input {
            width: 30px;
            text-align: center;
            border: none;
            font-size: 18px;
        }

        .action img {
            width: 20px;
            cursor: pointer;
        }


        .checkout {
            width: 30%;
            padding: 15px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
        }
        .total{
            display: flex;
            justify-content: space-between;
            margin-left: 500px;
            align-items: center;
        }
        .quantity button{
            cursor: pointer;
        }
      
    </style>
</head>

<body>
    <?php
        include('HeaderFooter/header.php');
    ?>
    <div class="cart-container">
        <div class="cart">
            <h2>Your Bucket</h2>
            <div class="cart-header">
                <span>PRODUCT DETAIL</span>
                <span>ITEM PRICE</span>
                <span>QUANTITY</span>
                <span>SUBTOTAL</span>
                <span>ACTION</span>
            </div>
            <div class="cart-item">
                <div class="cart-product">
                    <img src="images/samosha.avif" alt="Smoky Red 5pc">
                    <span>Samosha</span>
                </div>
                <div class="price">NRS 30</div>
                <div class="quantity">
                    <button class="subtract">-</button>
                    <input type="text" value="1">
                    <button class="add">+</button>
                </div>
                <div class="div">
                    <button>update</button>
                </div>
                <div class="subtotal">NRS 30</div>
                <div class="action"><img src="images/delete-icon.png" alt="Delete"></div>
            </div>



            <div class="total">
                <span>Total</span>
                <span>NRS 30</span>

                <button class="checkout">Checkout</button>
            </div>
        </div>

        <script>


        </script>
</body>

</html>