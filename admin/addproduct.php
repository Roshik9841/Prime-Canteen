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
        <form action="" method="POST" class="form">
            <h1>ADD PRODUCT</h1>
            <input type="number" class="add-product-box" name="product_id" placeholder="Product ID">
            <input type="text" class="add-product-box" name="product_name" placeholder="Enter The Product Name">
            <input type="text" class="add-product-box" name="category_id" placeholder="Enter Category id">
            <input type="text" class="add-product-box" name="product_price" placeholder="Enter product price">
            <input type="text" class="add-product-box" name="product_description" placeholder="Enter product description">

            <input type="file" name="picture" accept="image/png, image/jpg, image/jpeg" class="add-product-box">

            <button type="submit" name="submit" class="add-product-btn">Submit</button>
        </form>


    </div>

</body>

</html>