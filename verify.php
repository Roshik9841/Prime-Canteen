<?php
include('dbconnection.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    
    $query = "SELECT * FROM userinfo WHERE Token='$token'";
    $res = mysqli_query($con, $query);

    if ($res && mysqli_num_rows($res) > 0) {
      
        $update_query = "UPDATE userinfo SET Verified=1 WHERE Token='$token'";
        if (mysqli_query($con, $update_query)) {
            echo "<script>
            alert('Your email has been verified successfully!');
            window.location.href = 'login.php';
            </script>";
        } else {
            echo "<script>
            alert('Error verifying email. Please try again.');
            window.location.href = 'registration.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Invalid or expired token.');
        window.location.href = 'registration.php';
        </script>";
    }
}
?>
