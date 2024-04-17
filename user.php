<?php
    include 'sidebar.php';
    include 'dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/user.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="main_manage">
        <div class="prod_container">
            <div class="table-heading">
            <div class="add_user">
                <a href="add_user.php"><i class='bx bx-plus'></i> Add User</a>
            </div>
            </div>
        </div>
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                        include 'dbconn.php';

                        if($conn->connect_error){
                            die("Connection failed:" .$conn->connect_error);
                        }

                        $sql = "SELECT * FROM user";
                        $result = $conn->query($sql);

                        if(!$result){
                            die("Invalid query:" .$conn->error);
                        }

                        while($row = $result->fetch_assoc()){
                            ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['fname']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            
                            

                            <td>
                                <a href="delete_user.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><button><i class='bx bx-trash'></i></button></a>
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
