<?php
include("dbconnection.php");

if (isset($_GET['q']) && !empty(trim($_GET['q']))) {
    $query = trim($_GET['q']);
    $sql = "SELECT * FROM new_product WHERE name LIKE '%$query%'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $product_name = htmlspecialchars($row["name"]);
            $product_price = htmlspecialchars($row["price"]);
            $product_image = str_replace("../", "", htmlspecialchars($row["image"]));
            $product_url = urlencode($row["productId"]);

            echo "
                <div class='product-item'>
                    <a href='singleitem.php?var=$product_url'>
                        <div class='product-image-container'>
                            <img class='product-image' src='$product_image' alt='Product Image'>
                        </div>
                    </a>
                    <a href='singleitem.php?var=$product_url'>
                        <div class='product-name limit-text-to-2-lines'>
                            $product_name
                        </div>
                    </a>
                    <div class='product-price'>Rs. $product_price</div>
                </div>
            ";
        }
    } else {
        echo "<p>No products found matching '$query'.</p>";
    }
} else {
    echo "<p>Please enter a search term.</p>";
}
?>
