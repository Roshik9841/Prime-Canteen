   <!-- ----------single product details---------- -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <style>



        </style>
    </head>
    <body>

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
                <div class="col-2">
                    <img src="<?php echo $product_image ?>" alt="" width="100%" style="border-radius: 10px;">
                </div>
                <div class="col-2">
                    <h1><?php echo $product_name ?></h1>
                    <h4>Rs.<?php echo $product_price ?></h4>
                    <!-- Hidden inputs for product details -->
                    <input type="hidden" name="product_name" value="<?php echo $product_name ?>">
                    <input type="hidden" name="product_price" value="<?php echo $product_price ?>">
                    <input type="hidden" name="product_image" value="<?php echo $product_image ?>">


                    <!-- Add to Cart button -->
                    <button type="submit" class="btn" name="add_to_cart" style="border:0; width:150px">Add to
                        Cart</button>
                    <h3>Item Details <i class="fa fa-indent"></i></h3>
                    <br>
                    <p><?php echo $product_detail ?></p>
                </div>
            </div>
        </div>
    </form>

    <script>
        // Function to show the popup with the specified message
        function showPopup(message) {
            document.getElementById('popup-text').innerText = message;
            document.getElementById('popup').style.display = 'block';

            setTimeout(function () {
                closePopup();
            }, 5000);
        }

        function closePopup() {
            document.getElementById('popup').style.display = 'none';
        }

        // Check if the PHP variable $message is set and call the showPopup function
        <?php if (isset($message)): ?>
            showPopup("<?php echo $message; ?>");
        <?php endif; ?>
    </script>


    <div class="small-container">
        <div class="row row-2">
            <h2>Other Products</h2>
        </div>
        <div class="row">
            <?php

            include ("dbconnection.php");
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
                    <a href="singleitem.php?var=<?php echo $selected_item ?>"><img src="<?php echo $product_image ?>"></a>
                    <a href="singleitem.php?var=<?php echo $selected_item ?>">
                        <h4>
                            <?php echo $product_name ?>
                        </h4>
                    </a>
                    <p>
                        Rs.<?php echo $product_price ?>
                    </p>
                </div>
            <?php }
            ?>
        </div>
    </div>

        
    </body>
    </html>
  