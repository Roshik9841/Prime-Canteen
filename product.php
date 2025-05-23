<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    
    <link rel="stylesheet" href="styles/style.css" type="text/css">
</head>

<body>
    <?php include('HeaderFooter/header.php'); ?>

    <div class="product-container">
       
        <div class="search-bar">
            <input type="text" id="search-input" placeholder="Search..." class="search-input" onkeyup="searchProducts()">
            <button class="search-btn" onclick="searchProducts()"><i class="fas fa-search"></i></button>
        </div>
        
        <div id="search-results" class="products-grid"></div>
        
        <p class="product-text">Featured</p>
        <div class="products-grid">
            <?php
            include("dbconnection.php");
            $sql = "SELECT * FROM new_product";
            $result = mysqli_query($con, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $product_id = $row["productId"];
                $product_name = htmlspecialchars($row["name"]);
                $product_price = htmlspecialchars($row["price"]);
                $product_image = str_replace("../", "", htmlspecialchars($row["image"]));
                $product_url = urlencode($product_id);
            ?>
                <div class="product-item">
                    <a href="singleitem.php?var=<?php echo $product_url; ?>">
                        <div class="product-image-container">
                            <img class="product-image" src="<?php echo $product_image; ?>" alt="Product Image">
                        </div>
                    </a>
                    <a href="singleitem.php?var=<?php echo $product_url; ?>">
                        <div class="product-name limit-text-to-2-lines">
                            <?php echo $product_name; ?>
                        </div>
                    </a>
                    <div class="product-price">
                        Rs. <?php echo $product_price; ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <script>
        function searchProducts() {
            const query = document.getElementById('search-input').value;

            const xhr = new XMLHttpRequest();
            xhr.open("GET", `searchProducts.php?q=${query}`, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById('search-results').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
    </script>

    <?php include('HeaderFooter/footer.php'); ?>
</body>

</html>
