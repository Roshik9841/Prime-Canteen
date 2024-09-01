<?php 
session_start(); 

include('dbconnection.php');

if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM registration WHERE Email = ?");
    $stmt->bind_param("s", $email); // "s" indicates the type (string) of the parameter
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the user exists
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Verify the hashed password
        if(password_verify($password, $row['password'])) {
            // Password is correct, start the session
            $_SESSION['email'] = $email;
            echo "<script>alert('Login successful');</script>";
            echo "<script type='text/javascript'> document.location ='index.php'; </script>";
        } else {
            // Password is incorrect
            echo "<script>alert('Invalid email or password');</script>";
            echo "<script type='text/javascript'> document.location ='login.php'; </script>";
        }
    } else {
        // User not found
        echo "<script>alert('Invalid email or password');</script>";
        echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    }
    
    $stmt->close(); // Close the statement
} 
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
        <form class="form" method="post" action="index.php">
            <p class="form-register">LOGIN NOW</p>
            <div>
                <input type="email" placeholder="Enter your email" class="form-table" name="email" required>
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