<?php
include("../dbconnection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daily Statistics</title>
    <link rel="stylesheet" href="admin-style/style.css" type="text/css">
    <script>
        function fetchDetails() {
            const selectedDate = document.getElementById("selectedDate").value;
            if (selectedDate) {
                window.location.href = `dailystats.php?date=${selectedDate}`;
            }
        }
    </script>
</head>

<body>
    <?php include("adminHeader.php"); ?>

    <section class="display_product">
        <div class="display_message">
            <h2 class="title">Daily Statistics</h2>

            <!-- Date Picker -->
            <div class="date-picker">
                <label for="selectedDate">Select a date:</label>
                <input
                    type="date"
                    id="selectedDate"
                    name="selectedDate"
                    max="<?php echo date('Y-m-d'); ?>"
                    onchange="fetchDetails()">
            </div>

            <?php
            if (isset($_GET['date'])) {
                $selected_date = $_GET['date'];
                echo "<h3 class='subtitle'>Statistics for " . $selected_date . "</h3>";

                // Fetch orders for the selected date
                $query_orders_by_date = "
                    SELECT DATE(created_at) AS order_date, COUNT(*) AS total_orders
                    FROM orders
                    WHERE DATE(created_at) = '$selected_date'
                    GROUP BY DATE(created_at)";
                $orders_by_date = mysqli_query($con, $query_orders_by_date);

                echo "<h4>Orders Sold</h4>";
                echo "<table class='admin-table'>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Number of Orders</th>
                            </tr>
                        </thead>
                        <tbody>";
                if (mysqli_num_rows($orders_by_date) > 0) {
                    while ($row = mysqli_fetch_assoc($orders_by_date)) {
                        echo "<tr>";
                        echo "<td>" . $row['order_date'] . "</td>";
                        echo "<td>" . $row['total_orders'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No orders found for this date</td></tr>";
                }
                echo "</tbody></table>";

                // Fetch products sold for the selected date
                $query_products_by_date = "
                    SELECT DATE(sold_date) AS sold_date, product_name, SUM(quantity) AS total_quantity
                    FROM order_items
                    WHERE sold_date LIKE '$selected_date%'
                    GROUP BY DATE(sold_date), product_name";

                $products_by_date = mysqli_query($con, $query_products_by_date);

                echo "<h4>Products Sold</h4>";
                echo "<table class='admin-table'>
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>";
                if (mysqli_num_rows($products_by_date) > 0) {
                    while ($row = mysqli_fetch_assoc($products_by_date)) {
                        echo "<tr>";
                        echo "<td>" . $row['sold_date'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['total_quantity'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No sales data found for this date</td></tr>";
                }
                echo "</tbody></table>";
            }
            ?>
        </div>
    </section>
</body>

</html>