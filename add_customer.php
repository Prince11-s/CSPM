<?php
    session_start();
    include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="styles/add_customer.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <p class="head">Customer registration from</p>
    <div class="add_cust">
        <p>Customer Details</p>
        <div class="message">
    <?php
    if(isset($_SESSION['add'])){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px;margin-right:52%;">
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
      <div class="alert alert-warning alert-dismissible fade show" role="alert" style="width: 600px;margin-right:52%;">
      <strong>Alert! </strong> <?php echo $_SESSION['exist'];?>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <?php
        
        unset($_SESSION['exist']);
    }
    ?>
        </div>
        <div class="add_cust_contain">
            <form action="add_customerphp.php" method="POST">
                <span>Name</span><br>
                <div class="name">
                    <input type="text" placeholder="First name" class="fname" name="fname" required>
                    <div class="gen-contain">
                        <span class="gender">Gender</span>
                        <span>M</span><input type="radio" class="gen" name="gender" value="m" required>
                        <span>F</span><input type="radio" class="gen" name="gender" value="f" required>
                    </div>
                </div>
                <div class="address">
                    <br><span>Address</span><br>
                    <input type="text"  class="full_bar" placeholder="Address line 1" name="address_line1" required>
                </div>
                <div class="address2">
                    <input type="text" class="half-bar" placeholder="City" name="city" required>
                    <input type="text" class="half-bar" placeholder="State" name="state" required>
                    <input type="text" class="half-bar" placeholder="Postal Code" name="pin-code" required>
                </div>
                <div class="contact">
                    <span class="phno">Phone Number</span>
                    <span class="email">Email</span><br>
                    <div class="contact-input">
                        <input type="text" class="" placeholder="Phone Number" name="phno" required>
                        <input type="text" class="" placeholder="Email" name="email" required>
                    </div>
                </div>
                <div class="button-btn">
                    <div >
                        <a href=""><button>Back</button><a>
                    </div>
                    <div class="btn_submit">
                        <button>ADD</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        const today = new Date()
        const f=new Intl.DateTimeFormat("en-us",{
            dateStyle:"short",
        })
        document.getElementById('date-time').innerHTML=f.format(today);
    </script>
</body>
</html>