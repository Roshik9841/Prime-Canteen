<?php
session_start(); 


if (isset($_SESSION['error_message'])) {
    echo '<script>alert("' . $_SESSION['error_message'] . '");</script>';
    unset($_SESSION['error_message']); 
}

$con = mysqli_connect("localhost", "root", "", "canteen");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    $username = $_POST['uname'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        
        $query = "SELECT * FROM userinfo WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

       
        if ($result && mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result); 

      
            if ($user_data['Verified'] == 0) {
              
                $_SESSION['error_message'] = "Your email is not verified. Please verify your email before logging in.";
                header("Location: login.php"); 
                exit;
            }

          
            if (password_verify($password, $user_data['Password'])) {
              
                $_SESSION['uname'] = $user_data['Username'];
                $_SESSION['logged_in'] = true;
                $_SESSION['email'] = $user_data['Email'];
                $_SESSION['number'] = $user_data['Number'];

               
                if ($username === "Admin") {
                    header("Location: admin/dashboard.php"); 
                } else {
                    header("Location: index.php"); 
                }
                exit; 
            } else {
              
                $_SESSION['error_message'] = "Incorrect password";
                header("Location: login.php"); 
                exit;
            }
        } else {
  
            $_SESSION['error_message'] = "Username not found";
            header("Location: login.php"); 
            exit;
        }
    } else {
     
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
