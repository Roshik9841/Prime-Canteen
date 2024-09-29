<?php
include('dbconnection.php');

if (isset($_POST['submit'])) {

    $name = $_POST['username'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Simple query using prepared statements to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO userinfo (Username, Number, Email, Password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $number, $email, $hashed_password);

  
    if ($stmt->execute()) {
        echo "<script>alert('Registration successful!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error occurred, please try again.');</script>";
    }

    // Close the statement and connection
    $stmt->close();
    $con->close();
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