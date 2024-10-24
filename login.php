<?php
session_start();

if (isset($_SESSION['error_message'])) {
    echo '<script type="text/javascript">alert("' . $_SESSION['error_message'] . '");</script>';
    unset($_SESSION['error_message']); // Clear the message
}

$con = mysqli_connect("localhost", "root", "", "canteen");

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $username = $_POST['uname'];
    $pw = $_POST['password'];

    // Ensure fields are not empty
    if (!empty($username) && !empty($pw)) {
        $query = "SELECT * FROM userinfo WHERE Username = '$username' LIMIT 1";
        $result = mysqli_query($con, $query);

        if ($result && $result->num_rows == 1) {
            $user_data = $result->fetch_assoc();
            // Verify password
            if (password_verify($pw, $user_data['Password'])) {
                if ($username === "admin") {
                    $_SESSION['uname'] = $username;
                    $_SESSION['logged_in']=true;
                    header("Location: admin/dashboard.php");
                    exit;
                } else {
                    $_SESSION['logged_in']=true;
                    $_SESSION['uname'] = $username;
                    header("Location: index.php");
                    exit;
                }
            }
        }

        // Set the error message if login fails
        $_SESSION['error_message'] = "Wrong username or password";
        header("Location: login.php");
        exit;
    } else {
        // Set the error message if fields are empty
        $_SESSION['error_message'] = "Username or password cannot be empty";
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
