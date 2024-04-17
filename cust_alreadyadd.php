<?php
    include 'sidebar.html';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
<p style="padding-top: 5%;
    margin-left: 40%;
    font-size: 34px;
    font-weight: 500;">Customer registration from</p>
    <div style=" width: 900px;
    height: 100%;
    background: #15ffa1;
    margin-top: 1%;
    margin-right: 2%;
    padding-top: 40px;
    margin-left:28%;
    padding-left: 40px;
    padding-right: 65px;
    padding-bottom: 40px;
    border-radius: 10px;">
            <p style="text-align: center;
            font-size: 22px;
            font-weight: 500;">Already Exists</p>
                <div style="display: flex;
                justify-content: flex-end;
                padding-right: 300px;
                padding-top: 15px;">
                <a href="add_customer.php"><button style="margin-top: 2%;
                    width: 50px;
                    height: 35px;
                    border: solid 1px;
                    border-radius: 50px;
                    align-items: center;
                    font-weight: bold;"><i class="fa-solid fa-left-long" onclick="location.href='add_customer.php'"></i></i>
                </button>
                </a>
                </div>
    </div>
</body>
</html>