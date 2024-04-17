<?php
    include 'dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="Styles/sidebar.css">
    <link rel="stylesheet" href="Styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="nav_bar">
        <div class="main-logo">
            <span>LOGO</span>
        </div>
        <div class="logout">
            <ul class="logo">
                <li><a href="#" class="logout-btn"><i class='bx bx-user-circle' ></i></a>
                <ul class="logout-show">
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="user.php">Users</a></li>
                </ul>
                </li>
            </ul>
        </div>
        
    </div>
    <div>
        <nav class="sidebar">
            <div class="text"> 
                <a href="dashboard.php" class="text-a">Dashboard</a>
            </div>
            <ul class="nav_list">
                <li>
                    <a href="dashboard.php" class="item"><i class='bx bxs-home' ></i>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="custo-btn"><i class='bx bxs-group'></i>
                        Customer
                        <span class="fas fa-caret-down first" ></span>
                    </a>
                    <ul class="custo-show">
                        <li><a href="add_customer.php">Add Customer</a></li>
                        <li><a href="manage_customer.php">ManageCustomer</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="prod-btn">
                        <i class='bx bxl-product-hunt' ></i>
                        Products
                        <span class="fas fa-caret-down second"></span>
                    </a>
                    <ul class="prod-show">
                        <li><a href="add_product.php">Add Product</a></li>
                        <li><a href="manage_prod.php">ManageProduct</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="invoice-btn"><i class='bx bx-file'></i>
                        Invoice
                        <span class="fas fa-caret-down first" ></span>
                    </a>
                    <ul class="invoice-show">
                        <li><a href="invoice.php">Create Invoice</a></li>
                        <li><a href="invoice_list.php">Invoice List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="user.php" class="item"><i class='bx bxs-user'></i></i>
                        Users
                    </a>
                </li>
            </ul>
        </nav>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('.custo-btn').click(function(){
        $('nav ul .custo-show').toggleClass("show");
    });
    $('.prod-btn').click(function(){
        $('nav ul .prod-show').toggleClass("show1");
    });

    $('.invoice-btn').click(function(){
        $('nav ul .invoice-show').toggleClass("show4");
    });

    $('.logout-btn').click(function(){
        $('div ul .logout-show').toggleClass("show3");
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>