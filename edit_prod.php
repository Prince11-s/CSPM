<?php
    include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="styles/add_product.css">
    <link rel="stylesheet" href="styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>
    <div>
        <div class="add_prod_head">
            <span>Update Product</span>
        </div>
        <div class="add_prod"> 
            <?php
            include 'dbconn.php';
            
            if(isset($_GET['id'])){
                $id = $_GET['id'];

                $query = "select * from add_product where id ='$id'";

                $result = mysqli_query($conn,$query);

                if(!$result){
                    die("query Failed".mysqli_error());
                }else{
                    $row = mysqli_fetch_assoc($result);
                }
            }
            ?>
            <?php
            if(isset($_POST['edit_prod'])){
                if(isset($_GET['id_new'])){
                    $id_new = $_GET['id_new'];
                }
                $cust_name = ($_POST['cust_name']);
                $date1 = htmlspecialchars($_POST['date1']);
                $product_name = htmlspecialchars($_POST['product_name']);
                $descrip = htmlspecialchars($_POST['descrip']);
                $quantity = (int)$_POST['quantity'];
                $rupees = (int)$_POST['rupees'];
                $total = $quantity * $rupees;

                $query = "UPDATE add_product set cust_name = '$cust_name', date1 = '$date1', product_name = '$product_name', descrip = '$descrip', quantity = '$quantity', rupees = '$rupees', total = '$total' where id = '$id_new'";

                $result = mysqli_query($conn,$query);

                if(!$result){
                    die("query Failed".mysqli_error());
                }else{
                    header('location: manage_prod.php?update_msg=Data has been updated.');
                }
            }
            ?>
            <form action="edit_prod.php?id_new=<?php echo $id; ?>" method="POST">
                <table>
                    <tr class="section1">
                        <th>Customer Name</th>
                        <th>Date</th>
                        
                    </tr>
                    <tr class="section11">
                        <td>
                            <input type="text" name="cust_name" value="<?php echo $row['cust_name'] ?>">
                        </td>
                        <td><input type="date" name="date1" value="<?php echo $row['date1'] ?>"></td>
                    </tr>
                    <tr class="section2">
                        <td>Product Name</td>
                        <td colspan="2">Description</td>
                        <td>Quantity</td>
                        <td>Rupees</td>
                        <td>Total</td>
                    </tr>
                    <tr class="section22">
                        <td class="input_prod"><input type="text" name="product_name" required value="<?php echo $row['product_name'] ?>"></td>
                        <td class="input_serial" colspan="2"><input type="text" name="descrip" required value="<?php echo $row['descrip'] ?>"></td>
                        <td class="input_qty"><input type="number" name="quantity" id="quantity" required value="<?php echo $row['quantity'] ?>"></td>
                        <td class="input_rs"><input type="number" name="rupees" id="rupees" required value="<?php echo $row['rupees'] ?>"></td>
                        <td class="input_totl">
                            <input type="number" name="total" id="total" readonly required value="<?php echo $row['total'] ?>">
                        </td>
                    </tr>
                    <tr class="add">
                        <td colspan="6"></td>
                        <td><input type="submit" class="btn btn-success" name="edit_prod" value="UPDATE"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
        $(document).ready(function(){
            $('select').selectpicker();
        })

        var quantityinput = document.getElementById("quantity");
        var rupeesinput = document.getElementById
