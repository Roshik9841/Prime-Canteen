<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/494f2e7fea.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f4f6f9;
        }

        .wrapper {
            display: flex;
            height: 100vh;
        }

        .sidebar {
            width: 250px;
            background: #d4af37;
            padding: 20px;
            
            height: 100vh;
            color: black;
        }

        .sidebar a {
            color: black;
            text-decoration: none;
            display: block;
            padding: 10px;
            font-size: 18px;
        }

        .sidebar a:hover {
            background: #f0d98f;
            border-radius: 5px;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .info-box {
            display: flex;
            align-items: center;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            height: 100px;
        }

        .info-box i {
            font-size: 30px;
            margin-right: 15px;
            color: #f3aa29;
        }

        .dashboard-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .chart-container {
            width: 45%;
            background: white;
            padding: 20px;
            border-radius: 10px;
            height: 300px;
        }

        canvas {
            width: 100% !important;
            height: 100% !important;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Sidebar -->
       <?php include("adminHeader.php"); ?>
        <!-- Main Content -->
        <div class="content">
            <h3>Dashboard</h3>

            <div class="dashboard-row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="info-box">
                                <i class="fa-solid fa-list"></i>
                                <div>
                                    <h3>32</h3>
                                    <p>Total Products</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <i class="fa-solid fa-users"></i>
                                <div>
                                    <h3>4</h3>
                                    <p>Total Users</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="info-box">
                                <i class="fa-solid fa-cart-shopping"></i>
                                <div>
                                    <h3>62</h3>
                                    <p>Total Orders</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart -->
                <div class="chart-container">
                    <h4 class="text-center">System Overview</h4>
                    <canvas id="dashboardChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <script>
        var ctx = document.getElementById("dashboardChart").getContext("2d");
        var dashboardChart = new Chart(ctx, {
            type: "pie",
            data: {
                labels: ["Products", "Users", "Orders"],
                datasets: [{
                    label: "Total Count",
                    data: [32, 4, 62],
                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56"],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
</body>

</html>
