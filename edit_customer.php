<?php
    include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="styles/add_customer.css">
    <link rel="stylesheet" href="styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>
<body>
    <p class="head" style="padding:70px ;"></p>
    <div class="add_cust">
        <p>Update Customer Details</p>
        <div class="add_cust_contain">
            <?php
                include 'dbconn.php';

                if(isset($_GET['id'])){
                    $id = $_GET['id'];

                
                    $query = "select * from add_customer where id ='$id'";

                    $result = mysqli_query($conn,$query);

                    if(!$result){
                        die("query Failed".mysqli_error());
                    }else{
                        $row = mysqli_fetch_assoc($result);

                    }
                }
                
            ?>
            <?php
                if(isset($_POST['edit_customer'])){
                    if(isset($_GET['id_new'])){
                        $id_new = $_GET['id_new'];
                    }
                    $first_name = $_POST['fname'];
                    $gender = $_POST['gender'];
                    $addressline1 = $_POST['address_line1'];
                    $city = $_POST['city'];
                    $state1 = $_POST['state'];
                    $pin_code = $_POST['pin-code'];
                    $phone_no = $_POST['phno'];
                    $email = $_POST['email'];

                    include 'dbconn.php';

                    $query = "UPDATE add_customer set first_name = '$first_name', gender = '$gender', address_line1 = '$addressline1', city = '$city',  state1 = '$state1', pin_code = '$pin_code', phone_no = '$phone_no', email = '$email' where id = '$id_new'";

                    $result = mysqli_query($conn,$query);

                    if(!$result){
                        die("query Failed".mysqli_error());
                    }else{
                        header(('location:manage_customer.php?update_msg=Data has been updated.'));
                    }
                }
            ?>
            <form action="edit_customer.php?id_new=<?php echo $id; ?> " method="POST">
                <span>Name</span><span id="date-time" name="date1"></span><br>
                <div class="name">
                    <input type="text"  class="fname" name="fname" value="<?php echo $row['first_name'] ?>" required>
                    <div class="gen-contain">
                        <span class="gender">Gender</span>
                        <span>M</span><input type="radio" class="gen" name="gender" value="<?php echo $row['gender'] ?>" required>
                        <span>F</span><input type="radio" class="gen" name="gender" value="<?php echo $row['gender'] ?>" required>
                    </div>
                </div>
                <div class="address">
                    <br><span>Address</span><br>
                    <input type="text"  class="full_bar" placeholder="Address line 1" name="address_line1" value="<?php echo $row['address_line1'] ?>" required>
                </div>
                <div class="address2">
                    <input type="text" class="half-bar" placeholder="City" name="city" required value="<?php echo $row['city'] ?>" required>
                    <input type="text" class="half-bar" placeholder="State" name="state" required value="<?php echo $row['state1'] ?>">
                    <input type="text" class="half-bar" placeholder="Postal Code" name="pin-code" required value="<?php echo $row['pin_code'] ?>" required>
                </div>
                <div class="contact">
                    <span class="phno">Phone Number</span>
                    <span class="email">Email</span><br>
                    <div class="contact-input">
                        <input type="text" class="" placeholder="Phone Number" name="phno" required value="<?php echo $row['phone_no'] ?>" required>
                        <input type="text" class="" placeholder="Email" name="email" required value="<?php echo $row['email'] ?>" required>
                    </div>
                </div>
                <div class="button-btn">
                    
                    <div class="btn_submit">
                        <input type="submit" class="btn btn-success" name="edit_customer" value="UPDATE" style="width: 100px; border: 1px solid black; padding:0; margin-right:15%;
                        margin-left:15%;margin-top:9%;">
                     </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const today = new Date()
        const f=new Intl.DateTimeFormat("en-us",{
            dateStyle:"short",
        })
        document.getElementById('date-time').innerHTML=f.format(today);
    </script>
</body>
</html>