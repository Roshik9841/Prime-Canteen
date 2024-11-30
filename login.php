<?php
session_start(); 

// Check if there's an error message in the session and show it
if (isset($_SESSION['error_message'])) {
    echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
    unset($_SESSION['error_message']); 
}

$con = mysqli_connect("localhost", "root", "", "canteen");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted (when the user clicks login)
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $username = $_POST['uname'];
    $password = $_POST['password'];

    // Check if the username and password fields are not empty
    if (!empty($username) && !empty($password)) {
        // Check if the username exists in the userinfo table
        $query = "SELECT * FROM userinfo WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        // If the user exists
        if ($result && mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result); // Get user data from the database

            // Check if the user has verified their email (Verified = 1)
            if ($user_data['Verified'] == 0) {
                // If not verified, show error message and redirect
                $_SESSION['error_message'] = "Your email is not verified. Please verify your email before logging in.";
                header("Location: login.php"); 
                exit;
            }

            // Check if the entered password matches the password in the database
            if (password_verify($password, $user_data['Password'])) {
                // Set session variables for the logged-in user
                $_SESSION['uname'] = $user_data['Username'];
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $user_data['Email'];
                $_SESSION['number'] = $user_data['Number'];

                // If username is Admin, redirect to admin page
                if ($username === "Admin") {
                    header("Location: admin/dashboard.php"); 
                } else {
                    header("Location: index.php"); // Redirect to user dashboard or homepage
                }
                exit; 
            } else {
                // If password is incorrect, set an error message
                $_SESSION['error_message'] = "Incorrect password";
                header("Location: login.php"); 
                exit;
            }
        } else {
            // If user not found
            $_SESSION['error_message'] = "Username not found";
            header("Location: login.php"); 
            exit;
        }
    } else {
        // If any of the fields are empty
        $_SESSION['error_message'] = "Please fill in both fields";
        header("Location: login.php"); 
        exit;
    }
}

mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <form class="form" method="post" action="">
            <p class="form-register">LOGIN NOW</p>
            <div>
                <input type="text" placeholder="Enter your Username" class="form-table" name="uname" required>
                <input type="password" placeholder="Enter your password" class="form-table" name="password" required>
            </div>
            <div class="center">
                <button type="submit" class="form-button" name="submit">Login Now</button>
                <p class="form-login">Don't have an account? <a href="registration.php" class="form-link">Register now</a></p>
            </div>
        </form>
    </div>
</body>
</html>
