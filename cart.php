 <?php
    include('dbconnection.php');

    if (isset($_POST['update_btn'])) {
        $update_value = $_POST['update_quantity'];
        $update_id = $_POST['update_quantity_id'];
        $update_quantity_query = mysqli_query($con, "UPDATE cart SET quantity='$update_value' WHERE cart_id='$update_id'");



        if ($update_quantity_query) {
            header('location:cart.php');
        };
    };

    if (isset($_GET['remove'])) {
        $remove_id = $_GET['remove'];
        mysqli_query($con, "DELETE FROM cart WHERE cart_id = '$remove_id'");
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
         .cart-product img {
             width: 70px;
             height: 70px;
             margin-right: 10px;
             border-radius: 10px;
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
                     <th>Image</th>
                     <th>Name</th>
                     <th>Price</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                     <th>Action</th>
                 </thead>
                 <?php
                    $grand_total = 0;
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
                                $product_price = $fetch_cart['price'];
                                $product_quantity = $fetch_cart["quantity"];

                                $sub_total = floatval($product_price) * intval($product_quantity);
                                $grand_total += $sub_total; ?>
                             <tr class="cart-product">
                                 <td><img style="border-radius:10px" src="<?php echo $product_image ?>"></td>
                                 <td><?php echo $product_name ?></td>
                                 <td><?php echo $product_price ?></td>
                                 <td>
                                     <form action="" method="post" class="form-data">

                                         <input type="hidden" name="update_quantity_id" value="<?php echo $product_id ?>">
                                         <input type="number" name="update_quantity" min="1" value="<?php echo $product_quantity ?>">
                                         <input type="submit" class="btn" value="Update" name="update_btn">


                                     </form>
                                 </td>
                                 <td>Rs.<?php echo number_format($sub_total); ?></td>
                                 <td><a href="cart.php?remove=<?php echo $product_id ?>"
                                         onclick="return confirm('Remove item from cart?')" class="delete-btn">Delete<i
                                             class="fas fa-trash"></i></a></td>
                             </tr>
                 <?php
                            };
                        }
                    };
                    ?>
             </table>


             <div class="total">
                 <table>
                     <tr>
                         <td>Total</td>
                         <td>NRS <?php echo number_format($grand_total);?></td>

                         <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all from cart');">Delete All</a></td>
                     </tr>
                 </table>
             </div>
         </div>
         <div class="checkout-btn" style="margin-left:100px">
             <td><a href="product.php" class="btn">Continue Shopping</a></td> &nbsp;
             <td><a href="checkout.php" name="submit_btn" class="btn <?= ($grand_total > 1) ? '' : 'disbled'; ?>">Proceed to Checkout</a></td>
         </div>


 </body>

 </html>