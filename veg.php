<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css">
    
</head>

<body>
    <?php
    include("HeaderFooter/header.php");
    ?>

    <p class="heading-details">Veg Items</p>
    <div class="category-container">
        <?php
        include("dbconnection.php");
        $sql = "SELECT * FROM new_product WHERE categoryId='VI'";
        $result = mysqli_query($con, $sql);
        while ($product_row = mysqli_fetch_array($result)) {
            $product_id = $product_row["productId"];
            $product_name = $product_row["name"];
            $product_price = $product_row["price"];
            $product_detail = $product_row["detail"];
            $product_image = $product_row["image"];
            $selected_item = urlencode($product_id);
            $product_image = str_replace("../", "", $product_image);
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

    <?php
    include("HeaderFooter/footer.php");
    ?>
</body>

</html>