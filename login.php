<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Login</title>
    <link rel="stylesheet" href="styles/login_style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <nav>
        <ul class="logo">
            <li><a>Logo</a></li>
        </ul>
    </nav>
    <div class="login_form">
        <form action="" method="post">
            <h1>Login</h1>
            <div class="input_box">
                <input type="text" placeholder="Username" required name="username">
                <i class='bx bxs-user'></i>
            </div>
            <div class="input_box">
                <input type="password" placeholder="Password" required name="password">
                <i class='bx bxs-lock-alt' ></i>            
            </div>
            <div class="forgot">
                <a href="#">Forgot Password?</a>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
    <?php
    if(isset($_POST['username'])&& isset($_POST['password'])){
        if(!isset($_POST['submit']))
        {
            include 'dbconn.php';
            
            $Username =$_POST['username'];
            $Password=$_POST['password'];
            $con = mysqli_connect("localhost","root","","crm_product");

            $sql=mysqli_query($con,"SELECT * from user WHERE username='$Username' AND password='$Password' ");
            $row = mysqli_fetch_array($sql);

            if(is_array($row)){
                $_SESSION["username"] = $row['username'];
                $_SESSION["password"] = $row['password'];
            }else{
                echo '<script type = "text/javascript">';
                echo 'alert("Invalid Username or Password");';
                echo 'window.location.href = "login.php"';
                echo '</script>';
            }
        }
        if(isset($_SESSION["username"])){
            header("location:dashboard.php");
        }
    }
?>
</body>
</html>