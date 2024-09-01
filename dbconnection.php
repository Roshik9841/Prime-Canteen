<?php
$host="localhost";
$username="root";
$pwd="";
$db="canteen";
$con=mysqli_connect($host, $username, $pwd, $db);
if(mysqli_connect_errno())
{
echo "Connection Fail".mysqli_connect_error();
}
?>