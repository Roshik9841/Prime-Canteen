<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <script src="https://kit.fontawesome.com/494f2e7fea.js" crossorigin="anonymous"></script>
    <style>
        body{
            background-color: #5469b7;
        }
        #interface {
            width: 70%;
            margin-right: 140px;
            margin-top: 50px;
            
        }
        .value
        {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        i {
            color: #F3AA29;
            border: 1px solid;
            border-radius: 50%;
            width: 70px;
            height: 70px;
            padding-top: 18px;
            text-align: center;
            font-size: 30px;
        }
        .value-box{
            border: 1px solid black;
            width: 250px;
            height: 120px;
            border-radius: 20px;
            background-color: white;
            display: flex;
            padding-left: 30px;
            align-items: center;
            text-align: center;
        }
        .dash{
            font-size: 30px;
        }
        .dash-text{
            color: black;
            padding-left: 20px;
        }
    </style>

</head>

<body>
    <?php
    include("adminHeader.php");
    ?>
    <!-- side container -->
    <section id="interface">

        <h3 class="dash">DashBoard</h3>
        <div class="value">
            <a style="text-decoration:none;" href="viewProduct1.php">
                <div class="value-box">
                    <i class="fa-solid fa-list"></i>
                    <div>
                        <?php
                        include("../dbconnection.php");
                        $product_query = "SELECT COUNT(*) AS productId FROM new_product ";
                        $product_result = mysqli_query($con, $product_query);
                        while ($product_row = mysqli_fetch_array($product_result)) {
                            $product_count = $product_row["productId"];
                        ?>
                            <h3 class="dash-text"><?php echo $product_count ?> </h3>
                        <?php } ?>
                        <span class="dash-text">Total Products</span>
                    </div>
                </div>
            </a>

            <a style="text-decoration:none;" href="userview.php">
                <div class="value-box">
                    <i class="fa-solid fa-users"></i>
                    <div>
                        <?php
                        include("../dbconnection.php");
                        $product_query = "SELECT COUNT(*) AS Username FROM userinfo ";
                        $product_result = mysqli_query($con, $product_query);
                        while ($product_row = mysqli_fetch_array($product_result)) {
                            $product_count = $product_row["Username"];
                        ?>
                            <h3 class="dash-text"><?php echo $product_count ?> </h3>
                        <?php } ?>
                        <span class="dash-text">Total Users</span>
                    </div>
                </div>
            </a>

            <a style="text-decoration:none;" href="orderview.php">
                <div class="value-box">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <div>
                        <?php
                        include("../dbconnection.php");
                        $product_query = "SELECT COUNT(*) AS id FROM `orders` ";
                        $product_result = mysqli_query($con, $product_query);
                        while ($product_row = mysqli_fetch_array($product_result)) {
                            $product_count = $product_row["id"];
                        ?>
                            <h3 class="dash-text"><?php echo $product_count ?> </h3>
                        <?php } ?>
                        <span class="dash-text">Total Order</span>
                    </div>
                </div>
            </a>
        </div>
    </section>

    <script>
        $('#menu-btn').click(function() {
            $('#menu').toggleClass("active");
        })
    </script>
</body>

</html>