<?php
include("../dbconnection.php");
?><?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/494f2e7fea.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body { /* Set height for html and body */
            height: 100%;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
        }

        .navBar {
            display: flex;
            flex-direction: column;
            background-color: #E5CB6A;
            padding-top: 50px;
            padding-left: 30px;
            text-align: left;
            width: 300px;
            height: 100vh; /* This ensures the navBar fills the full height */
            border-right: 1px solid black;
        }

        .nav {
            display: flex;
            margin: 20px;
            padding-bottom: 50px;
            flex-direction: column;
            list-style: none;
        }

        .nav li {
            padding-top: 40px;
        }

        .nav li a {
            text-decoration: none;
            color: black;
            margin: 10px;
        }

        .nav li a:hover {
            color: #F4BE40;
        }

        .user-info {
            border: 2px solid black;
            width: 250px;
            height: 180px;
            font-size: 16px;
            font-family: sans-serif;
            position: absolute;
            top: 70%;
            left: 10%;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .user {
            width: 80px;
            height: 80px;
            position: absolute;
            bottom: 15%;
            border: none;
            background-color: transparent;
            cursor: pointer;
        }
        .user img{
            width: 50px;
            height: 50px;
        }
        

        .logout-btn {
            background-color: #C0392B;
            width: 100px;
            height: 40px;
            border: none;
            color: white;
            cursor: pointer;
        }

        .logout-btn a {
            text-decoration: none;
            color: white;
        }

        .logout-btn:hover {
            background-color: #333333;
        }

        .username,
        .email {
            margin: 10px 0;
        }

        .container {
            display: flex; 
            flex: 1; 
            /* margin-right: 400px;  */
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="navBar">
            <div>
                <p>Admin Panel</p>
            </div>
            <div>
                <ul class="nav">
                    <li><a href="dashboard.php">DashBoard</a></li>
                    <li><a href="addproduct.php">Add Products</a></li>
                    <li><a href="viewProduct.php">View Products</a></li>
                    <li><a href="order.php">Orders</a></li>
                    <li><a href="dailystats.php">Order Status</a></li>
                    <li><a href="userview.php">Users</a></li>
                    <li><a href="messages.php">Messages</a></li>
                </ul>
            </div>
            <div class="user-btn">
                <button class="user"><img src="images/user.png"></button>
            </div>
        </div>
        <div class="user-info js-info">
            
            <p class="username">Username: <?php echo $_SESSION['uname']?></p>
            <p class="email">Email: <?php echo  isset($_SESSION['email']) ? $_SESSION['email'] : 'Email not available'; ?></p>
            <button class="logout-btn js-logout"><a href="../logout.php">LogOut</a></button>
        </div>
        
    </div>
    <script>
        let userBtn = document.querySelector('.user');
        let info = document.querySelector('.js-info');

        userBtn.addEventListener('click', function() {
            info.style.display = (info.style.display === 'none' || info.style.display === '') ? 'flex' : 'none';
        });

      
    </script>
</body>

</html>
