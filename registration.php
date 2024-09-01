<?php 
include('dbconnection.php');

if(isset($_POST['submit'])) {
    $name = $_POST['username'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   
    // Query for data insertion
    $query = mysqli_query($con, "INSERT INTO registration (Username, Number, Email, password) VALUES ('$name', '$number', '$email', '$password')");
    
    if ($query) {
        echo "<script>alert('You have successfully registered. You will be redirected to the login page.');</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
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



        form.addEventListener('submit', function () {
            let passRule = /[A-Z]/;
            let res2 = passRule.test(pass.value);

            let passRule2 = /[0-9]/;
            let res3 = passRule2.test(pass.value);
            if (username.value == '' || number.value == '' || email.value == '' || pass.value == '') {
                error.innerHTML = 'Please fill up all the forms';
                event.preventDefault();
            } else if (!res2) {
                error.innerHTML = 'Password must contain atlease one Capital Letter';
                event.preventDefault();
            } else if (!res3) {
                error.innerHTML = 'password must contain atleast one number';
                event.preventDefault();
            } else if (number.value.length < 10 || number.value.length > 10) {
                error.innerHTML = 'Number must contain  10 digits';
                event.preventDefault();
            } else {
                error.innerHTML = '';
            }
        })

    </script>
</body>

</html>