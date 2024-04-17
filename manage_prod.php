<?php
    include 'sidebar.php';
    include 'dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['descrip']) && $_POST['descrip'] != '') {
        $descrip = $_POST['descrip'];
        $sql = "SELECT * FROM add_product WHERE descrip = '$descrip' ORDER BY id DESC";
    } else {
        $sql = "SELECT * FROM add_product ORDER BY id DESC";
    }

    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/manage.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main_manage">
        <div class="prod_container">
            <div class="table-heading">
                <div>
                    <span>Product Details</span>
                </div>
                <div class="form-filter">
                    <form action="" method="post" class="form-clas">
                        <select name="descrip" class="from-select" required>
                            <option>Select Process</option>
                            <option value="Chamfering" <?= isset($_POST['descrip']) && $_POST['descrip'] == 'Chamfering' ? 'selected' : '' ?>>Chamfering</option>
                            <option value="Assembly" <?= isset($_POST['descrip']) && $_POST['descrip'] == 'Assembly' ? 'selected' : '' ?>>Assembly</option>
                            <option value="Painting" <?= isset($_POST['descrip']) && $_POST['descrip'] == 'Painting' ? 'selected' : '' ?>>Painting</option>
                            <option value="Punching" <?= isset($_POST['descrip']) && $_POST['descrip'] == 'Punching' ? 'selected' : '' ?>>Punching</option>
                        </select>
                        <div class="filter-end">
                            <button type="submit" class="">Filter</button>
                            <a href="manage_prod.php" class="reset">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Product ID</th>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['cust_name'] . "</td>";
                            echo "<td>" . $row['date1'] . "</td>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['descrip'] . "</td>";
                            echo "<td>" . $row['quantity'] . "</td>";
                            echo "<td>" . $row['rupees'] . "</td>";
                            echo "<td>" . $row['total'] . "</td>";
                            echo "<td>";
                            echo "<a href='edit_prod.php?id=" . $row['id'] . "'><button><i class='bx bx-edit'></i></button></a>";
                            echo "<a href='delete_prod.php?id=" . $row['id'] . "'><button><i class='bx bx-trash'></i></button></a>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No records found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
    </div>
</body>
</html>
