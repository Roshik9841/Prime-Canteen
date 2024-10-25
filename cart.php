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
        };
    };

    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM cart WHERE id = '$remove_id'");
        header('location:cart.php');
    };

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

         .total {
             display: flex;
             justify-content: space-between;
             margin-left: 500px;
             align-items: center;
         }

         .quantity button {
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
             <table class="cart-header">
                 <thead>
                     <th>PRODUCT DETAIL</th>
                     <th>ITEM PRICE</th>
                     <th>QUANTITY</th>
                     <th>SUBTOTAL</th>
                     <th>ACTION</th>
                 </thead>
                 <?php
                    $total = 0;
                    if (isset($_SESSION['uname'])) {
                        $username = $_SESSION['uname'];
                        $select_userId = mysqli_query($con, "SELECT id from userinfo WHERE Username = '$username'");
                        $userId_row = mysqli_fetch_assoc($select_userId);
                        $userId = $userId_row['id'];
                        $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('O');
                        if (mysqli_num_rows($select_cart) > 0) {
                            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                                $product_id = $fetch_cart['cart_id'];
                                $product_name = $fetch_cart['name'];
                                $product_image = $fetch_cart['image'];
                                $product_price = $fetch_Cart['price'];
                                $product_quantity = $fetch_cart["quantity"];

                                $sub_total = floatval($product_price) * intval($product_quantity);
                                $grand_total += $sub_total; ?>
                             <tr class="cart-item">
                                 <div class="cart-product">
                                  <td> <img src="<?php echo $product_image ?>" alt="Smoky Red 5pc"></td>  
                                     <td><span> <?php echo $product_name ?></span></td>
                                 </div>
                                 <td><div class="price"><?php echo $product_price ?></div></td>

                                 <div class="quantity">
                                     <button class="subtract" onclick="$product_quantity--">-</button>
                                     <input type="number" value="<?php echo $product_quantity ?>" min="1">
                                     <button class="add" onclick="$product_quantity++">+</button>
                                 </div>
                                 <!-- <div class="div">
                                        <button>update</button>
                                    </div> -->
                                 <div class="subtotal">NRS <?php echo number_format($sub_total); ?></div>

                                 <a class="action"><a href="cart.php?remove=<?php echo $product_id ?>"
                                         onclick="return confirm('Remove item from cart?')">
                                         ><img src="images/delete-icon.png" alt="Delete"></a>
                             </tr>
             </table>
         </div>
     </div>
 <?php
                            };
                        }
                    }
    ?>

 <div class="total">
     <span>Total</span>
     <span>NRS 30</span>

     <button class="checkout">Checkout</button>
 </div>

 <script>


 </script>
 </body>

 </html>