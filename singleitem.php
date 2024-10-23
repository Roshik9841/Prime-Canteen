   <!-- ----------single product details---------- -->
   <!DOCTYPE html>
   <html lang="en">

   <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Document</title>
       <link rel="stylesheet" href="styles/style.css">
       <style>
           .small-container {
               margin: 80px 170px 120px 300px;

           }

           .row {
               display: flex;
           }

           .col-2 {
               margin: 60px 70px 0px 50px;
           }

           .col-2 h1 {
               margin-bottom: 30px;
               font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
               font-size: 40px;
               font-weight: bold;
           }

           .cart-btn {
               margin: 30px 0px 20px 0px;
               border-radius: 30px;
               height: 30px;
               background-color: #F4BE40;
               cursor: pointer;
               font-weight: bold;
           }

           .cart-btn:hover {
               background-color: #ffd77c;
           }

           .prod-details {
               color: #F4BE40;
           }

           .col-2 h3 {
               color: #263675;
               font-size: 20px;
               font-weight: bold;
           }
           .other-container{
            margin:0px 0px 30px 230px;
           }
           .row-2{
            margin-bottom:50px;
            margin-left: 60px;
            color:#263675;
            font-weight: bold;
            font-size: 30px;
           }
       </style>
   </head>

   <body>
       <?php
        include('HeaderFooter/header.php');
        ?>

       <?php
        include('dbconnection.php');
        $selected_item = urldecode($_GET['var']);


        $product_query = "SELECT * FROM new_product WHERE productId='$selected_item'";
        $product_result = mysqli_query($con, $product_query);
        while ($product_row = mysqli_fetch_array($product_result)) {
            $product_name = $product_row["name"];
            $product_price = $product_row["price"];
            $product_detail = $product_row["detail"];
            $product_image = $product_row["image"];
            $product_image = str_replace("../", "", $product_image);
        }
        ?>

       <form action="" method="post">
           <div class="small-container single-product">
               <div class="row">

                   <img src="<?php echo $product_image ?>" alt="" width="400px" height="400px" style="border-radius: 10px;">

                   <div class="col-2">
                       <h1><?php echo $product_name ?></h1>
                       <h4>Rs.<?php echo $product_price ?></h4>


                       <!-- Add to Cart button -->
                       <button type="submit" class="cart-btn" name="add_to_cart" style="border:0; width:150px">Add to
                           Cart</button>
                       <h3>Item Details <i class="fa fa-indent"></i></h3>
                       <br>
                       <p class="prod-details"><?php echo $product_detail ?></p>
                   </div>
               </div>
           </div>
       </form>


       <div class="other-container">
           <div class="row row-2">
               <h2>Other Products</h2>
           </div>

           <div class="category-container">
               <?php

                include("dbconnection.php");
                $product_query = "SELECT * FROM new_product ORDER BY RAND() LIMIT 4";
                $product_result = mysqli_query($con, $product_query);
                while ($product_row = mysqli_fetch_array($product_result)) {
                    $product_id = $product_row["productId"];
                    $product_name = $product_row["name"];
                    $product_price = $product_row["price"];
                    $product_image = $product_row["image"];
                    $product_image = str_replace("../", "", $product_image);
                    $selected_item = urlencode($product_id);
                ?>
                   <div class="col-4">
                       <div class="hover-container">
                           <a href="singleitem.php?var=<?php echo $selected_item ?>"> <img src="<?php echo $product_image ?>" class='item-image' alt="
                    <?php echo $product_name ?>">
                           </a>
                       </div>
                       <a href="singleitem.php?var=<?php echo $selected_item ?>">
                           <h3 class="item-name">
                               <?php echo $product_name ?>
                           </h3>
                       </a>

                       <p class="item-price">
                           Rs.<?php echo $product_price ?>
                       </p>
                   </div>
               <?php }
                ?>
           </div>
       </div>

       <?php
        include('HeaderFooter/footer.php');
        ?>
                
   </body>

   </html>