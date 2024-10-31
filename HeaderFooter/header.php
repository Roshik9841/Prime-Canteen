<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="styles/style.css">

</head>

<body>
    <div class="header-container">
        <div class="navBar">
            <div>

                <img src="images/primeLogo.png" class="primeLogo"  onclick="window.location.href='index.php'">

            </div>
            <div>
                <ul class="nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About us</a></li>
                    <li><a href="product.php">Products</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
            <div>
                <?php
                if (session_status() == PHP_SESSION_NONE) {
                    session_start();
                }
                if (isset($_SESSION['uname'])) {
                ?>
                    <p>Hello <?php echo $_SESSION['uname'] ?></p>
                <?php
                    echo "<a href='logout.php'>Logout</a>";
                } else {
                ?>
                    <button class="login-button"><a href="login.php">Login</a></button>
                    <button class="register-button"><a href="registration.php">Register</a></button>
                <?php
                }
                ?>

            </div>

            <div>
                <?php
                include("dbconnection.php");
                if (isset($_SESSION['uname'])) {
                    $username = $_SESSION['uname'];
                    $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
                    $userId_row = mysqli_fetch_assoc($select_userId);
                    $userId = $userId_row['id'];
                    $selected_rows = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('O');
                    $row_count = mysqli_num_rows($selected_rows);
                ?>
                    <a class="cart-link header-link" href="cart.php">
                        <img class="cart-icon" src="images/cart-icon (2).png">
                        <div class="cart-text">Cart</div>
                    <?php
                } else {
                    ?>
                      <a class="cart-link header-link" href="cart.php">
                      <img class="cart-icon" src="images/cart-icon (2).png">
                    <div class="cart-text">Cart</div>
                    <?php
                }
                    ?>

                    </a>
            </div>

        </div>



    </div>




</body>

</html>