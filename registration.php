<?php
// Include DB connection
include('dbconnection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Ensure this path is correct

if (isset($_POST['submit'])) {
    $name = $_POST['username'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if username or email already exists
    $user_exist_query = "SELECT * FROM userinfo WHERE username='$name' OR email='$email'";
    $res = mysqli_query($con, $user_exist_query);

    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            $res_fetch = mysqli_fetch_assoc($res);
            if ($res_fetch['Username'] == $name) {
                echo "<script>
                alert('Username $name is already taken');
                window.location.href = 'registration.php';
                </script>";
            } elseif ($res_fetch['Email'] == $email) {
                echo "<script>
                alert('Email $email is already taken');
                window.location.href = 'registration.php';
                </script>";
            }
        } else {
            // Hash the password for security
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Generate a unique verification token
            $token = bin2hex(random_bytes(32));

            // Insert user data into database with 'verified' set to 0 (unverified)
            $stmt = $con->prepare("INSERT INTO userinfo (Username, Number, Email, Password, Token, Verified) VALUES (?, ?, ?, ?, ?, 0)");
            $stmt->bind_param("sssss", $name, $number, $email, $hashed_password, $token);

            if ($stmt->execute()) {
                // Send verification email
                try {
                    $mail = new PHPMailer(true);

                    $mail->isSMTP();
                    $mail->Host = 'smtp.gmail.com';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'Roshik9841@gmail.com'; // Your email
                    $mail->Password = 'vosq doyh wvee gnul';    // Your app password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                    $mail->Port = 587;

                    $mail->setFrom('Roshik9841@gmail.com', 'Prime Canteen');
                    $mail->addAddress($email); // User's email

                    // Email content
                    $mail->isHTML(true);
                    $mail->Subject = 'Verify Your Email';
                    $mail->Body = "Hello $name,<br><br>Please click the link below to verify your email:<br><br>
                    <a href='http://localhost/primeCanteen/verify.php?token=$token'>Verify Email</a><br><br>Thank you!";
                    $mail->AltBody = "Hello $name, Please click the link to verify your email: http://localhost/primeCanteen/verify.php?token=$token";

                    $mail->send();
                    echo "<script>
                    alert('Registration successful! A verification email has been sent to $email.');
                    window.location.href = 'login.php';
                    </script>";
                } catch (Exception $e) {
                    echo "Registration successful, but email could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            } else {
                echo "<script>alert('Error occurred, please try again.');</script>";
            }

            $stmt->close();
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
    <link rel="stylesheet" href="styles/style.css">
</head>

<body>
    <div class="container">
        <form class="form" method="post">
            <p class="form-register">REGISTER NOW</p>
            <div>
                <input type="text" placeholder="enter your username" class="form-table js-user" name="username"
                    required>
                <input type="text" placeholder="enter your number" class="form-table js-num" name="number" required>
                <input type="text" placeholder="enter your email" class="form-table js-email" name="email" required>
                <input type="password" placeholder="enter your password" class="form-table js-password" name="password"
                    required>
            </div>
            <div class="center">
                <button type="submit" class="form-button js-register" name="submit">Register Now</button>
                <p class="js-error errMsg"></p>
                <p class="form-login">Already have an account? <a href="login.php" class="form-link">Login now</a></p>
            </div>
        </form>
    </div>
    <script>
        let username = document.querySelector('.js-user');
        let number = document.querySelector('.js-num');
        let email = document.querySelector('.js-email');
        let pass = document.querySelector('.js-password');
        let error = document.querySelector('.js-error');
        let form = document.querySelector('.form');

        form.addEventListener('submit', function(event) {
            // Regular expression patterns
            let passPattern = /^(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])[A-Za-z0-9!@#$%^&*]{6,30}$/;
            let emailPattern = /^[^ \s@]+@[^\s@]+\.[^\s@]+$/;
            let phonePattern = /^\d{10}$/;

            // Test the patterns against the values
            let validPass = passPattern.test(pass.value);
            let validEmail = emailPattern.test(email.value);
            let validPhone = phonePattern.test(number.value);

            if (username.value === '' || number.value === '' || email.value === '' || pass.value === '') {
                error.innerHTML = 'Please fill up all the forms';
                event.preventDefault();
            } else if (!validPass) {
                error.innerHTML = 'Password must contain at least one capital letter, one number, and one special character.';
                event.preventDefault();
            } else if (!validEmail) {
                error.innerHTML = 'Please enter a valid email address.';
                event.preventDefault();
            } else if (!validPhone) {
                error.innerHTML = 'Phone number must contain exactly 10 digits.';
                event.preventDefault();
            } else {
                error.innerHTML = '';
            }
        });
    </script>
</body>

</html>