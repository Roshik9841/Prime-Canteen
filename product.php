<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    
</head>

<body>
    <?php
    include('HeaderFooter/header.php');
    ?>
<div class="product-container">
    <p class="product-text">Featured</p>

    <div class="products-grid">
        <?php
        include("dbconnection.php");
        $sql = "SELECT * FROM new_product";
        $result = mysqli_query($con, $sql);
        while ($product_row = mysqli_fetch_array($result)) {
            $product_id = $product_row["productId"];
            $product_name = $product_row["name"];
            $product_price = $product_row["price"];
            $product_image = $product_row["image"];
            $selected_item = urlencode($product_id);
            $product_image = str_replace("../", "", $product_image);
        ?>
            <div class="product-item">
                <a href="singleitem.php?var=<?php echo $selected_item ?>">
                    <div class="product-image-container">
                        <img class="product-image" src="<?php echo $product_image ?>" alt="">
                    </div>
                </a>
                <a href="singleitem.php?var=<?php echo $selected_item ?>">
                    <div class="product-name limit-text-to-2-lines">
                        <?php echo $product_name ?>
                    </div>
                </a>
                <div class="product-price">
                    Rs.<?php echo $product_price ?>
                </div>
            </div>
        <?php } ?>
    </div> 
</div>
    <?php
    include('HeaderFooter/footer.php');
    ?>
    <script type="module" src="scripts/script.js"></script>
</body>

</html>