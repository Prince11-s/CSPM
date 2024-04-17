<?php
    include 'sidebar.php';
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
</head>
<body>
    <div class="main_manage">
    <span>Customer Details</span>
        <div class="prod_container">
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>State</td>
                        <th>Phone No.</th>
                        <th>Email</th>
                        <th>Update/Delete</th>
                    </tr>
                </thead>
                <tbody> 
                    <?php

                    include 'dbconn.php';

                    if($conn->connect_error){
                        die("Connection failed:" .$conn->connect_error);
                    }

                    $sql = "SELECT * FROM add_customer";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Invalid query:" .$conn->error);
                    }

                    while($row = $result->fetch_assoc()){
                        ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['first_name']; ?></td>
                        <td><?php echo $row['address_line1']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td><?php echo $row['state1']; ?></td>
                        <td><?php echo $row['phone_no']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <a href="edit_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><button><i class='bx bx-edit'></i></button></a>
                            <a href="delete_customer.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><button><i class='bx bx-trash'></i></button></a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>    
            </table>
        </div>
    </div>
</body>
</html>