<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include("HeaderFooter/header.php");
    ?>
  <?php
        include("dbconnection.php");
    $sql = "SELECT * FROM new_product WHERE categoryId='NV'";
    $result = mysqli_query($con,$sql);
    while($product_row = mysqli_fetch_array($result)){
        $product_id = $product_row["productId"];
        $product_name = $product_row["name"];
        $product_price = $product_row["price"];
        $product_detail = $product_row["detail"];
        $product_image = $product_row["image"];
        $selected_item = urlencode($product_id);
        $product_image = str_replace("../", "", $product_image);
        ?>
      <div class="col-4">
                    <a href="singleitem.php?var=<?php echo $selected_item ?>"> <img src="<?php echo $product_image ?>" alt="
                    <?php echo $product_name ?>">
                </a>
                    <a href="singleitem.php?var=<?php echo $selected_item ?>">
                        <h4>
                            <?php echo $product_name ?>
                        </h4>
                    </a>
                    <!-- <div class="rating">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div> -->
                    <p>
                        Rs.<?php echo $product_price ?>
                    </p>
                </div>
            <?php }
            ?>
<?php
    include("HeaderFooter/footer.php");
    ?>
</body>
</html>