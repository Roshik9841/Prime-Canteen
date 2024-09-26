<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <style>
        .product-container {
            /* border: 1px solid gainsboro; */
            padding: 0px 30px 30px 30px;
            margin-top: 100px;
        }

        .product-container>p {
            color: #263675;
            font-weight: bold;
            font-size: 40px;
            line-height: 0px;

        }

        .products-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
           margin-left: 50px;
            justify-content: flex-start;

        }

        .product-image-container {
            width: 300px;
      
            height: 300px;
            overflow: hidden;
          
            position: relative;
           
            cursor: zoom-in;
        }

        .product-image {
            width: 220px;
            height: 260px;
            border-radius: 30px;
            object-fit: cover;
            object-position: 50% 20%;
            transition: transform 0.3s ease;
        }

        .product-image-container:hover .product-image {
            transform: scale(1.3);
         
        }

        .product-name {
            font-weight: bold;
            font-size: 20px;
            display: flex;
            padding-right: 60px;
            justify-content: center;
            margin-bottom: 10px;
        }

        .product-item {
            width: calc(20% - 20px);

            box-sizing: border-box;
          
            margin-bottom: 20px;
      
        }

        .product-price {
            color: red;
            font-size: 18px;
            display: flex;
            padding-right: 60px;
            justify-content: center;

        }

        .product-quantity-container {
            display: flex;
            padding-right: 60px;
            justify-content: center;
            margin-top: 10px;

        }

        .product-quantity-container select {
            background-color: #F0F0F0;
            padding: 5px;
            border-radius: 7px;

        }

        .added-to-cart {
            display: none;
        }

        .product-spacer {
            flex: 1;
        }

        .add-to-cart-button {
            background-color: #F4BE40;
            margin-top: 20px;
            width: 200px;
            height: 40px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
        }
        .product-text{
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
<?php
    include('HeaderFooter/header.php');
    ?>

    <div class="product-container">
        <p class="product-text">Featured</p>
        <div class="products-grid js-products-grid">

        </div>

    </div>
    <?php
    include('HeaderFooter/footer.php');
    ?>
    <script type="module" src="scripts/script.js"></script>
</body>

</html>