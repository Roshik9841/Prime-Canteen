<?php
include("dbconnection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
<?php
    include("HeaderFooter/header.php");
    ?>
    <?php

    if (isset($_POST['order_btn'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $flat = $_POST['flat'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $pin_code = $_POST['pin_code'];
        
        $username = $_SESSION['uname'];
        $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
        $userId_row = mysqli_fetch_assoc($select_userId);
        $userId = $userId_row['id'];
        $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('O');
        $price_total = 0;
        if (mysqli_num_rows($cart_query) > 0) {
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ' )';
                $product_price = $product_item['price'] * $product_item['quantity'];
                $price_total += $product_price;
            }
        }
        $total_product = implode(', ', $product_name);
        $detail_query = mysqli_query($con, "INSERT INTO `order` 
    (name,number,email,flat,street,city,pin_code,total_products,total_price,orderId)
    VALUES('$name','$number','$email','$flat','$street','$city','$pin_code','$total_product','$price_total',$userId)") or die('query failed');


         $delete_cart = mysqli_query($con, "DELETE FROM cart WHERE id = $userId");
         if ($cart_query && $detail_query) {
             // Redirect to a new page to display order message
             header("Location: pay_now.php?name=$name&number=$number&email=$email&flat=$flat&street=$street&city=$city&pin_code=$pin_code&total_product=$total_product&price_total=$price_total");
             exit();
        }
    }
    ?>

<?php    

if (isset($_POST['cash_btn'])) {
        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];
        $flat = $_POST['flat'];
        $street = $_POST['street'];
        $city = $_POST['city'];
        $pin_code = $_POST['pin_code'];
        
        $username = $_SESSION['uname'];
        $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
        $userId_row = mysqli_fetch_assoc($select_userId);
        $userId = $userId_row['id'];
        $cart_query = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('O');
        $price_total = 0;
        if (mysqli_num_rows($cart_query) > 0) {
            while ($product_item = mysqli_fetch_assoc($cart_query)) {
                $product_name[] = $product_item['name'] . ' (' . $product_item['quantity'] . ' )';
                $product_price = $product_item['price'] * $product_item['quantity'];
                $price_total += $product_price;
            }
        }
        $total_product = implode(', ', $product_name);
        $detail_query = mysqli_query($con, "INSERT INTO `order` 
    (name,number,email,flat,street,city,pin_code,total_products,total_price,orderId)
    VALUES('$name','$number','$email','$flat','$street','$city','$pin_code','$total_product','$price_total',$userId)") or die('query failed');

     $delete_cart = mysqli_query($con, "DELETE FROM cart WHERE id = $userId");

     if ($cart_query && $detail_query) {
        // Redirect to a new page to display order message
        header("Location:final_order.php?name=$name&number=$number&email=$email&flat=$flat&street=$street&city=$city&pin_code=$pin_code&total_product=$total_product&price_total=$price_total");
        exit();
   }

    }

    
?>

<?php
//Import PHPMailer classes into the global namespace

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['order_btn']) || isset($_POST['cash_btn'])) {
    
require './source/src/Exception.php';
require './source/src/PHPMailer.php';
require './source/src/SMTP.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
//to view proper logging details for success and error messages
// $mail->SMTPDebug = 1;

$user_email = $_POST['email'];
echo "<alert>$user_email</alert>";
$mail->Host = 'smtp.gmail.com';  //gmail SMTP server
$mail->Username = 'ritikamaharjan645@gmail.com';   //email
$mail->Password = 'rpvo uzor ywiv zdkl';   //16 character obtained from app password created
$mail->Port = 465;                    //SMTP port
$mail->SMTPSecure = "ssl";


//sender information
$mail->setFrom('ritikamaharjan645@gmail.com', 'ritika');

//receiver address and name
$mail->addAddress($user_email, 'Recipientname');
echo 'Email gayooooooooooooooooooooooooooooooo';


// Add cc or bcc   
// $mail->addCC('email@mail.com');  
// $mail->addBCC('user@mail.com');  

// $mail->addAttachment(__DIR__ . '/download.png');
// $mail->addAttachment(__DIR__ . '/exampleattachment2.jpg');


$mail->isHTML(true);

$mail->Subject = 'Order Confirmation';

    // Construct email body with order details
    $mail->Body = "<h3>Order Details:</h3>
                   <p><strong>Name:</strong> $name</p>
                   <p><strong>Contact Number:</strong> $number</p>
                   <p><strong>Address:</strong><br>$flat, $street, $city</p>
                   <p><strong>Ordered Items:</strong><br>$total_product</p>";

// Send mail   
if (!$mail->send()) {
    echo 'Email not sent an error was encountered: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent.';
}

$mail->smtpClose();
}
?>
    <div class="contain">
        <section class="form">
            <h1 class="heading">Complete your order</h1>


            <form  method="post" onsubmit="return validate()">
                <div class="display-order">
                    <?php
                    $username = $_SESSION['uname'];
                    $select_userId = mysqli_query($con, "SELECT id FROM userinfo WHERE Username = '$username'");
                    $userId_row = mysqli_fetch_assoc($select_userId);
                    $userId = $userId_row['id'];
                    $select_cart = mysqli_query($con, "SELECT * FROM cart WHERE id= $userId") or die('O');
                    $total = 0;
                    $grand_total = 0;
                    if (mysqli_num_rows($select_cart) > 0) {
                        while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                            $total_price = $fetch_cart['price'] * $fetch_cart['quantity'];
                            $grand_total = $total += $total_price;
                            ?>
                            <span><?= $fetch_cart['name']; ?>(<?= $fetch_cart['quantity']; ?>)</span>
                            <?php
                        }
                        ;
                    } else {
                        echo "<div class='display-order'><span>Your cart is empty!</span></div>";
                    }

                    ?>
                    <span class="garnd-total">Grand Total:Rs.<?= $grand_total; ?></span>
                </div>
                <div class="flex">
                    <div class="inputbo">
                        <span>Your name</span>
                        <input type="text" placeholder="Enter your name" name="name" required>
                    </div>
                    <div class="inputbo">
                        <span>Your number</span>
                        <input type="number" placeholder="Enter your number" name="number" id="num">
                        <p style="color:red" id="numError" class="error"></p>
                    </div>
                    <div class="inputbo">
                        <span>Your email</span>
                        <input type="text" placeholder="Enter your email" name="email" id="email">
                        <p style="color:red" id="emailError" class="error"></p>
                    </div>
                    <div class="inputbo">
                        <span>Address line 1</span>
                        <input type="text" placeholder="e.g. flat no." name="flat" required>
                    </div>
                    <div class="inputbo">
                        <span>Address line 2</span>
                        <input type="text" placeholder="e.g. street name" name="street" required>
                    </div>
                    <div class="inputbo">
                        <span>City</span>
                        <input type="text" placeholder="e.g. Kathmandu" name="city" required>
                    </div>
                    <div class="inputbo">
                        <span>Pin code</span>
                        <input type="text" placeholder="e.g. 12345" name="pin_code" required>
                    </div>
                </div>
                <input type="submit" value="Pay with Khalti" name="order_btn" class="btn" >
                <input type="submit" value="Order Now" name="cash_btn" class="btn">
                </form>
        </section>
    </div>

    <script>
        function validate() {
            var emailREGEX = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            var numREGEX = /^98\d{8}$/;

            var email = document.getElementById('email').value;
            var emailError = document.getElementById('emailError');
            if (!emailREGEX.test(email)) {
                emailError.textContent = "*Invalid email";
            } else {
                emailError.textContent = "";
            }

            var num = document.getElementById('num').value;
            var numError = document.getElementById('numError');
            if (!numREGEX.test(num)) {
                numError.textContent = "*invalid number.";
            } else {
                numError.textContent = "";
            }

            // Prevent form submission if there are errors
            if (emailError.textContent || numError.textContent) {
                return false;
            }
        }
    </script>

   
</body>

</html>

