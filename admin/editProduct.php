<?php
include("../dbconnection.php");
if(isset($_GET['edit'])){
    $edit_id = $_GET['edit'];
    $select_query = mysqli_query($con, "SELECT * FROM new_product WHERE productId='$edit_id'");
    if(mysqli_num_rows($select_query) > 0){
        $row = mysqli_fetch_assoc($select_query);
        $product_name = $row["name"];
        $product_price = $row["price"];
        $product_image = $row["image"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h2>Edit Product</h2>
    <form action="viewProduct.php" method="post">
        <input type="hidden" name="product_id" value="<?php echo $edit_id; ?>">
        <label>Product Name:</label>
        <input type="text" name="name" value="<?php echo $product_name; ?>" required><br>

        <label>Product Price:</label>
        <input type="text" name="price" value="<?php echo $product_price; ?>" required><br>

        <label>Product Image URL:</label>
        <input type="text" name="image" value="<?php echo $product_image; ?>" required><br>

        <input type="submit" name="update" value="Update Product">
    </form>
</body>
</html>
