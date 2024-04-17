<?php
    session_start();
    include 'dbconn.php';

    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    } else {
    }

if(isset($_POST['cust_name'],$_POST['date1'],$_POST['product_name'],$_POST['descrip'],$_POST['quantity'],$_POST['rupees'],$_POST['total'])) {

    // Sanitize and validate input data
    $id =($_POST['id']);
    $cust_name = htmlspecialchars($_POST['cust_name']);
    $date1 = htmlspecialchars($_POST['date1']);
    $product_name = htmlspecialchars($_POST['product_name']);
    $descrip = htmlspecialchars($_POST['descrip']);
    $quantity = (int)$_POST['quantity'];
    $rupees = (int)$_POST['rupees'];
    $total = (int)$_POST['total'];

    // Database connection
    include 'dbconn.php';

    if (mysqli_connect_error()) {
        die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    } else {
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $SELECT = "SELECT descrip FROM add_product WHERE descrip = ? LIMIT 1";
        $INSERT = "INSERT INTO add_product (cust_name,date1,product_name,descrip,quantity,rupees,total) VALUES (?,?,?,?,?,?,?)";

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if($rnum == 0) {
            $stmt->close();

            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssssii", $cust_name, $date1, $product_name, $descrip, $quantity, $rupees, $total);
            $stmt->execute();

            $_SESSION['add']="New Customer Added Successfully";
            header("location: add_product.php");

        } else {
            $_SESSION['exist']="Customer Already Existed";
                header("location: add_product.php");
        }
        $stmt->close();
        $conn->close();
    }

} else {
    echo "All fields are required";
}
?>
