<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {

            font-family: Arial, Helvetica, sans-serif;
            display: flex;
        
        /* align-items: flex-start; */
        }

        .navBar {
            display: flex;
            flex-direction: column;
            background-color: red;
            height: 725px;
            padding-top: 50px;
            padding-left: 30px;
            text-align: left;
            width: 300px;
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

            margin: 10px;
            color: black;
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
            top: 100px;
            right: 20px;
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .user {
            background-color: color-;
            width: 40px;
            height: 40px;

            border: none;
            cursor: pointer;
        }

        .user-img {
            width: 100%;
            height: 100%;
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
            margin-bottom: 40px;
            margin-right: 400px;
         

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
                    <li><a href="#">Orders</a></li>
                    <li><a href="userview.php">Users</a></li>
                    <li><a href="messages.php">Messages</a></li>
                </ul>
            </div>
            <div class="user-btn">
                <button class="user"><img src="images/user.jpg" class="user-img"></button>
            </div>
        </div>
        <div class="user-info js-info">
            <p class="username">Username: Roshik Maharjan</p>
            <p class="email">email: roshik9841@gmail.com</p>
            <button class="logout-btn js-logout"><a href="../logout.php">LogOut</a></button>
        </div>
    </div>
    <script>
        let userBtn = document.querySelector('.user');
        let info = document.querySelector('.js-info');
        userBtn.addEventListener('click', function() {
            if (info.style.display === 'none' || info.style.display === '') {
                info.style.display = 'flex';
            } else {
                info.style.display = 'none';
            }
        });

        let logoutBtn = document.querySelector('.js-logout')

        logoutBtn.addEventListener('.click', function() {

        });
    </script>
</body>

</html>