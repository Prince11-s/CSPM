<?php

      session_start();

      if(isset($_POST['fname'], $_POST['username'], $_POST['password'],  $_POST['phone'], $_POST['email'])) {
       
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        include 'dbconn.php';

        if (mysqli_connect_error()) {
          die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
      }else {
        $SELECT = "SELECT 'username' From user Where username = ? Limit 1";
        $INSERT = "INSERT Into user (fname,username,password,phone,email) values(?,?,?,?,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($username);
            $stmt->store_result();
            $rnum=$stmt->num_rows;

            if($rnum == 0) {
              $stmt->close();

              $stmt = $conn->prepare($INSERT);
              $stmt->bind_param("sssis", $fname,$username,$password,$phone,$email);
              $stmt->execute();

              $_SESSION['add']="New User Added Successfully";
              header('location: add_user.php');
              
          }else {
            $_SESSION['exist']="User Already Existed";
            header('location: add_user.php');
        }
        $stmt->close();
            $conn->close();
      }
    }else {
      echo "All fields are required";
  }
?>