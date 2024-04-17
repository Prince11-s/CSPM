<?php
    include 'sidebar.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="styles/add_product.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link rel="stylesheet" href="styles/dashboard_styl.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
</head>
<body>
    <div>
        <div class="add_prod_head">
            <span >Add Product</span>
        </div>
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
        <div class="add_prod"> 
            <form action="add_productphp.php" method="POST">
                <table>
                    <tr class="section1">
                        <th>Customer Name</th>
                        <th>Date</th>
                        
                    </tr>
                    <tr class="section11">
                        <td>
                            <select name="cust_name" id="cust_name" data-live-search="true" class="w-100">
                                <option></option>
                               
                                <?php 
                                    include 'add_productphp.php';
                                    $cust_detail = mysqli_query($conn, "SELECT * from add_customer");
                                    while($c = mysqli_fetch_array($cust_detail)){
                                ?>
                                <option value="<?php echo $c['first_name']?>"><?php echo $c['first_name'] ?> </option>
                                <?php }?>
                            </select>
                        </td>
                    
                        <td><input type="date" name="date1"></td>
                    </tr>
                    <tr class="section2">
                        <td>Product Name</td>
                        <td colspan="2">Description</td>
                        <td></td>
                        <td>Quantity</td>
                        <td>Rupees</td>
                        <td>Total</td>
                    </tr>
                    <tr class="section22">
                        <td class="input_prod"><input type="text" name="product_name" required></td>
                        <td class="input_serial" colspan="2">
                        <select name="descrip">
                                <option>--Select--</option>
                                <option>Assembly</option>
                                <option>Chamfering</option>
                                <option>Punching</option>
                                <option>Painting</option>
                            </select>
                        </td>
                        <td></td>
                        <td class="input_qty"><input type="number" name="quantity" id="quantity" required></td>
                        <td class="input_rs"><input type="number" name="rupees" id="rupees" required></td>
                        <td class="input_totl">
                            <input type="number" name="total" id="total" readonly required>
                            <input type="hidden" name="total_hidden" id="total_hidden" required>
                        </td>
                    </tr>
                    
                    <tr class="add">
                        <td colspan="6"></td>
                        <td><button>ADD</button></td>
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
    var rupeesinput = document.getElementById("rupees");
    var totalinput = document.getElementById("total");

    function updateResult() {
   
    var quantity = parseFloat(quantityinput.value);
    var rupees = parseFloat(rupeesinput.value);

    var total = quantity * rupees;

    totalinput.value = total;
    total_hidden.value = total;
}
quantity.addEventListener("input", updateResult);
rupees.addEventListener("input", updateResult);

updateResult();
</script> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
