<?php
    session_start();
    include 'sidebar.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/add_user.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >

</head>
<body>
  <div class="main">
    <div class="head">
      <span>Add User</span>
    </div>
    <div class="message">
    <?php
    if(isset($_SESSION['add'])){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px; margin-left:52% !important">
      <strong>Alert! </strong> <?php echo $_SESSION['add'];?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
        
        unset($_SESSION['add']);
    }
    ?>
    <?php
    if(isset($_SESSION['exist'])){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px; margin-left:52% !important">
      <strong>Alert! </strong> <?php echo $_SESSION['exist'];?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
        
        unset($_SESSION['exist']);
    }
    ?>
    </div>
    
    <div class="container" style="width: 600px;">
      <form action="add_userphp.php" method="post">
        <div class="name">
          <span>Name</span>
          <input type="text" placeholder="name" name="fname" required>
        </div>
        <div class="phno">
          <span>Phone No</span>
          <input type="number" placeholder="Phone no" name="phone" required>
        </div>
        <div class="email">
          <span>Email</span >
          <input type="text" placeholder="Email" name="email" required>
        </div>
        <div class="uname">
          <span>Username</span>
          <input type="text" placeholder="Username" name="username" required>
        </div>
        <div class="pword">
          <span>Password</span>
          <input type="password" placeholder="password" name="password" required>
        </div>
        <div class="button-btn">
                    <div >
                        <a href="user.php"><button>Back</button><a>
                    </div>
                    <div class="btn_submit">
                        <button>ADD</button>
                    </div>
                </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>