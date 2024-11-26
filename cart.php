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

         .cart-header {
             margin: 60px 0px 30px 150px;
             background-color: #FFFFFF;
             text-align: center;
             padding: 40px 50px 60px 0px;
             border-radius: 20px;
         }

         .cart-header th {
             font-size: 20px;
             padding-bottom: 30px;
             color: grey;

             padding-left: 50px;
             justify-content: center;
         }

         .cart-product td {
             padding-bottom: 20px;
             font-weight: 600;
             font-size: 15px;
             padding-left: 60px;

         }

         .styled-input {
             width: 60%;
             padding: 10px;
             font-size: 16px;
             border: 2px solid #4A90E2;
             border-radius: 8px;
             outline: none;
             transition: border-color 0.3s ease, box-shadow 0.3s ease;
         }

         .styled-input:hover {
             border-color: #357ABD;
       
         }

         .styled-input:focus {
             border-color: #357ABD;
             box-shadow: 0 0 8px rgba(53, 122, 189, 0.3);
           
         }

         .btn {
             background-color: #EBC874;
             color: white;
             padding: 10px 20px;
             font-size: 16px;
             border: none;
             border-radius: 5px;
             cursor: pointer;
             box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
             transition: background-color 0.3s ease, transform 0.2s ease;
            
         }

         .btn:hover {
             background-color: #ddbd73;
             transform: scale(1.05);
         
         }
         .delete-btn img{
            width: 30px;
            height: 30px;
        
         }
         .total{
            display: flex;
    justify-content: space-around;
    margin-top: 20px; /* Add space above the total section */
    padding: 20px;
    background-color: #f9f9f9; /* Optional: add background color */
    border-radius: 10px;
         }
         .total td{
            padding-left: 60px;
            font-weight: bold;
        
         }
         .btn-1{
            position: relative;
            bottom: 5px;
            left: 50px;
         }
         .cart-container{
            margin-bottom: 40px;
         }
         .cart h2{
            
            position: absolute;
            top: 13%;
            left: 10%;
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
                        $select_userId = mysqli_query($con, "SELECT id from userinfo WHERE Username = '$username'");    //userinfo bata id liyo yedi username session snga milyo bhane
                        $userId_row = mysqli_fetch_assoc($select_userId);   //tyo id ko data liyo
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
                                 <td>NRS <?php echo $product_price ?></td>
                                 <td>
                                     <form action="" method="post" class="form-data">

                                         <input type="hidden" name="update_quantity_id" value="<?php echo $product_id ?>">
                                         <input type="number" class="styled-input" name="update_quantity" min="1" value="<?php echo $product_quantity ?>">
                                         <input type="submit" class="btn" value="Update" name="update_btn">


                                     </form>
                                 </td>
                                 <td>NRS <?php echo number_format($sub_total); ?></td>
                                 <td><a href="cart.php?remove=<?php echo $product_id ?>"
                                         onclick="return confirm('Remove item from cart?')" class="delete-btn"><img src="images/delete-icon.png"></a></td>
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
                         <td>NRS <?php echo number_format($grand_total); ?></td>

                         <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all from cart');">Delete All</a></td>
                     </tr>
                 </table>
             </div>
         </div>
         <div class="checkout-btn" style="margin-left:100px">
             <td><a href="product.php" class="btn btn-1">Continue Food hunt</a></td> &nbsp;
             <td><a href="checkout.php" name="submit_btn" class=" btn btn-1 <?= ($grand_total > 1) ? '' : 'disbled'; ?>">Proceed to Checkout</a></td>
         </div>
         </div>

        <?php
            include("HeaderFooter/footer.php");
        ?>
 </body>

 </html>