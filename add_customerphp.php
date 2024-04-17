<?php

    session_start();

    if(isset($_POST['fname'],  $_POST['gender'], $_POST['address_line1'], $_POST['city'], $_POST['state'], $_POST['pin-code'], $_POST['phno'], $_POST['email'])) {
        
        $first_name = $_POST['fname'];
        $gender = $_POST['gender'];
        $addressline1 = $_POST['address_line1'];
        $city = $_POST['city'];
        $state1 = $_POST['state'];
        $pin_code = $_POST['pin-code'];
        $phone_no = $_POST['phno'];
        $email = $_POST['email'];

        include 'dbconn.php';
        
        if (mysqli_connect_error()) {
            die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
        } else {
            $SELECT = "SELECT email From add_customer Where email = ? Limit 1";
            $INSERT = "INSERT Into add_customer (first_name,gender,address_line1,city,state1,pin_code,phone_no,email) values(?,?,?,?,?,?,?,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email); 
            $stmt->store_result();
            $rnum=$stmt->num_rows;

            if($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssssiis", $first_name, $gender, $addressline1, $city, $state1, $pin_code, $phone_no, $email);
                $stmt->execute();

                $_SESSION['add']="New Customer Added Successfully";
                header("location: add_customer.php");
            } else {
                $_SESSION['exist']="Customer Already Existed";
                header("location: add_customer.php");
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        
        echo "All fields are required";
    }
?>