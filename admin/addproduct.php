<?php
    session_start();
    if (isset($_POST['submit'])) {
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $category=$_POST['category_id'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $picture = $_FILES['picture'];
        $picture = '';
        if (isset($_FILES['picture']) && $_FILES['picture']['error'] == 0) {
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["picture"]["name"]);
            move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
            $picture = $target_file;
        }
        $con = mysqli_connect("localhost", "root", "", "canteen");
        if ($con) {
            $query = "INSERT INTO new_product(productId,name,price,detail,image,categoryId) VALUES($productId,'$productName','$price','$description','$picture','$category')";
            $result = mysqli_query($con, $query);
             if ($result) {
                echo "Inserted Sucessfully";
            } else {
                die("Error inserting data");
            }
         
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .add-product-form {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form {

            border: 2px solid black;
            border-radius: 2%;
            padding: 30px;
            width: 400px;
            background-color: white;


        }

        .add-product-box {
            display: block;
            border-radius: 13px;
            padding: 20px 15px;
            width: 100%;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            margin-bottom: 40px;
        }

        .add-product-btn {
            background-color: transparent;
            padding: 20px 12px;
            width: 200px;
            cursor: pointer;
            border-radius: 12px;
        }
    </style>
</head>

<body>
    <?php
    include('adminHeader.php');
    ?>
    <div class="add-product-form">
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form"  enctype="multipart/form-data">
            <h1>ADD PRODUCT</h1>
            <input type="number" class="add-product-box" name="product_id" placeholder="Product ID">
            <input type="text" class="add-product-box" name="product_name" placeholder="Enter The Product Name">
            <input type="text" class="add-product-box" name="category_id" placeholder="Enter Category id">
            <input type="text" class="add-product-box" name="price" placeholder="Enter product price">
            <input type="text" class="add-product-box" name="description" placeholder="Enter product description">

            <input type="file" name="picture" accept="image/png, image/jpg, image/jpeg" class="add-product-box">

            <button type="submit" name="submit" class="add-product-btn">Submit</button>
        </form>


    </div>

</body>

</html>