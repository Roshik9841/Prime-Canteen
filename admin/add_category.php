<?php
include("../dbconnection.php");

if(isset($_POST['category_submit'])){
    $categoryName = $_POST['category_name'];
    $categoryId = $_POST['category_id'];
    $sql = "INSERT INTO category(category_id,category_name)VALUES('$categoryId','$categoryName')";
    if(mysqli_query($con,$sql)){
        echo "New record created succesfully";
    }else{
        echo "Error". $sql . "</br" .$con->error;
    }
}
$con->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action=""method="post">
    <label for = "category_id">Category id</label>
    <input type="text" placeholder="Enter category id" name="category_id">
    
    <label for = "category_name">Category name</label>
    <input type="text" placeholder="Enter category name" name="category_name">

    <button type="submit" name="category_submit">Submit</button>
    
</form>
    
</body>
</html>