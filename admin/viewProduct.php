<?php
include("../dbconnection.php");

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($con, "DELETE FROM new_product WHERE productId = $delete_id");
    if($delete_query){
        // header('location:viewProduct.php');
        // echo 'Product has been deleted';
    }
}

if(isset($_POST['update'])){
    $product_id = $_POST['product_id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_picture = $_POST['image'];

    // Update query
    $update_query = mysqli_query($con, "UPDATE new_product SET name='$product_name', price='$product_price', image='$product_picture' WHERE productId='$product_id'");

    if($update_query){
        echo "
        Product updated successfully!";
        header('location:viewProduct.php');
    } else {
        echo "Failed to update product.";
    }
}
?>

<?php 
    include('../dbconnection.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include('adminHeader.php');
    ?>
<section class="display_product" >
    <h2 class="title">All Products</h2>
    <table>
        <thead>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $select_products = mysqli_query($con, "SELECT * FROM new_product ");
            if(mysqli_num_rows($select_products) > 0){
                while($row = mysqli_fetch_assoc($select_products)){
                    $product_id = $row["productId"];
                    $product_name = $row["name"];
                    $product_picture = $row["image"];
                    $product_price = $row["price"];
            ?>
            <tr>
                <td><img style="width:50px; height:50px; border-radius:10px" src="<?php echo $product_picture ?>" ></td>
                <td><?php echo $product_name?></td>
                <td><?php echo $product_price?></td>
                <td><a style="text-decoration:none; color:blue" href="editProduct.php?edit=<?php echo  $product_id ?>" class="edit-btn">Edit</a></td>
                <td>
                    <a style="text-decoration:none; color:red" href="viewProduct.php?delete=<?php echo  $product_id ?>" class="delete-btn" 
                    onclick="return confirm('Are you sure you want to delete it?');">Delete </a>
                </td>
            </tr>
            <?php
            };
        }else{
            echo"<span>no products</span>";
        }
            ?>
        </tbody>
    </table>
</section>
</body>
</html>

