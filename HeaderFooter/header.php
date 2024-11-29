<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="styles/style.css" type="text/css">
    <script src="https://kit.fontawesome.com/494f2e7fea.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="header-container">
        <div class="navBar">
            <div>
                <img src="images/primeLogo.png" class="primeLogo">
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
                    <p>Hello <?php echo htmlspecialchars($_SESSION['uname']); ?></p>
                    <a href='logout.php'>Logout</a>
                <?php
                } else {
                ?>
                    <button class="login-button"><a href="login.php">Login</a></button>
                    <button class="register-button"><a href="registration.php">Register</a></button>
                <?php } ?>
            </div>
            <div>
                <?php
                include("dbconnection.php");
                if (isset($_SESSION['uname'])) {
                    $username = $_SESSION['uname'];
                    $user_query = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
                    $user_row = mysqli_fetch_assoc($user_query);
                    $user_id = $user_row['id'];

                    $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id = $user_id");
                    $cart_count = mysqli_num_rows($cart_query);
                ?>
                    <a class="cart-link header-link" href="cart.php">
                        <img class="cart-icon" src="images/cart-icon (2).png">
                        <span style="font-size:16px; color:#F2AD2F;"><?php echo $cart_count; ?></span>
                        <div class="cart-text">Cart</div>
                    </a>
                <?php } else { ?>
                    <a class="cart-link header-link" href="cart.php">
                        <img class="cart-icon" src="images/cart-icon (2).png">
                        <div class="cart-text">Cart</div>
                    </a>
                <?php } ?>
            </div>

        </div>
    </div>




</body>

</html>