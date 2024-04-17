<?php
    include 'dbconn.php';
    include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM</title>
    <link rel="stylesheet" href="styles/invoice.css">
    <link rel="stylesheet" href="styles/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="crossorigin="anonymous"></script>
    
  </head>
<body>
    <div class="heading">
        <span>Create Invoice</span>
    </div>
    <?php
        if(isset($_POST['submit'])){
            $invoice_no = $_POST["invoice_no"];
            $invoice_date = date("y-m-d",strtotime($_POST["invoice_date"]));
            $cname = mysqli_real_escape_string($conn,$_POST["cname"]);
            $caddress = mysqli_real_escape_string($conn,$_POST["caddress"]);
            $ccity = mysqli_real_escape_string($conn,$_POST["ccity"]);
            $pin_code = mysqli_real_escape_string($conn,$_POST["pin_code"]);
            $cstate = mysqli_real_escape_string($conn,$_POST["cstate"]);
            $phone_no = mysqli_real_escape_string($conn,$_POST["phone_no"]);
            $email = mysqli_real_escape_string($conn,$_POST["email"]);
            $grand_qty = mysqli_real_escape_string($conn,$_POST["grand_qty"]);

            $grand_total = mysqli_real_escape_string($conn,$_POST["grand_total"]);
            
            $sql = "INSERT INTO invoice (INVOICE_NO, INVOICE_DATE, CNAME, CADDRESS, CCITY, CSTATE, PIN_CODE, PHONE_NO, EMAIL,GRAND_QTY, GRAND_TOTAL) VALUES ('{$invoice_no}', '{$invoice_date}', '{$cname}', '{$caddress}', '{$ccity}', '{$cstate}', '{$pin_code}', '{$phone_no}', '{$email}','{$grand_qty}', '{$grand_total}')";

            if($conn->query($sql)){
                $sid = $conn->insert_id;
                
                $sql2 = "INSERT into invoice_products (SID,PNAME,PROCESS,PRICE,QTY,TOTAL) values   ";
                $rows = [];

                for ($i=0;$i<count($_POST['pname']);$i++)
                {
                    $pname = mysqli_real_escape_string($conn,$_POST["pname"][$i]);
                    $process = mysqli_real_escape_string($conn,$_POST["process"][$i]);
                    $rupees = mysqli_real_escape_string($conn,$_POST["price"][$i]);
                    $qty = mysqli_real_escape_string($conn,$_POST["qty"][$i]);
                    $total = mysqli_real_escape_string($conn,$_POST["total"][$i]);

                    $rows[]="('{$sid}','{$pname}','{$process}','{$rupees}','{$qty}','{$total}')";
                }
                $sql2.=implode(",",$rows);
                if($conn->query($sql2)){

                    echo "<script>alert('Invoice Added Sucessfully')</script>";
                    
                }else{
                    echo "<script>alert('Invoice Added Failed')</script>";


                }
            }else{
                echo "<script>alert('Invoice Added Failed')</script>";

            }
        }
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
        <div class="invoice_nd">
            <span>Invoice No</span>
            <input type="text" name="invoice_no" required>
            <span>Invoice Date</span>
            <input type="date" name="invoice_date" required>
        </div>
        <div class="container">
            <?php
            include 'dbconn.php';

            $row = []; // Initialize $row as an empty array
            
            if(isset($_GET['first_name'])){
                $first_name = $_GET['first_name'];

                $query = "SELECT * FROM add_customer WHERE first_name ='$first_name'";
                $result = mysqli_query($conn, $query);

                $row = mysqli_fetch_assoc($result);
                include 'dbconn.php';
                        $product_query = "SELECT * FROM add_product WHERE cust_name= '{$row['first_name']}' ";
                        $product_result = mysqli_query($conn,$product_query);
            }
            ?>
            <div class="cust_contain">
                <div class="cust_head">
                    <h4>Customer Information</h4>
                    <a href="exist_customer.php" class=""><b>OR</b>  Select Existing Customer</a>
                </div>
                <div class="cust_info"> 
                    <div class="cust_info_left">
                        <div class="info_content">
                            <input type="text" class="" name="cname" id="first_name" placeholder="Enter Name" value="<?php echo isset($row['first_name']) ? $row['first_name'] : ''; ?>" required>
                        </div>

                        <div class="info_content">
                            <input type="text" class="" name="caddress" id="address_1" placeholder="Address" value="<?php echo isset($row['address_line1']) ? $row['address_line1'] : ''; ?>" required>	
                        </div>

                        <div class="info_content">
                            <input type="text" class="" name="cstate" id="state1" placeholder="State" value="<?php echo isset($row['state1']) ? $row['state1'] : ''; ?>" required>
                        </div>

                        <div class="info_content">
                            <input type="text" class="" name="phone_no" id="phone_no" placeholder="Phone Number" value="<?php echo isset($row['phone_no']) ? $row['phone_no'] : ''; ?>" required>
                        </div>
                    </div>
                    <div class="cust_info_right">
                        <div class="info_content">
                            <input type="text" class="" name="ccity" id="city" placeholder="City" value="<?php echo isset($row['city']) ? $row['city'] : ''; ?>" required>		
                        </div>

                        <div class="info_content">
                            <input type="text" class="" name="pin_code" id="postcode" placeholder="Postcode" value="<?php echo isset($row['pin_code']) ? $row['pin_code'] : ''; ?>" required>					
                        </div>

                        <div class="info_content">
                            <input type="email" class="" name="email" id="email" placeholder="E-mail Address" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="prod_contain">
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Process</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="product_tbody">
                        <?php 
                                if (isset($product_result) && mysqli_num_rows($product_result) > 0) {
                                    while ($product_row = mysqli_fetch_assoc($product_result)) {
                                      ?>
                                      
                                      <tr>
                                      <td><input type='text' name="pname[]" value='<?php echo "$product_row[product_name]"  ?>' class='prod_name'></td>
                                      <td><input type='text' name="process[]" value='<?php  echo " $product_row[descrip] " ?>'class='descrip_cls'></td>
                                      <td><input type='text' name="price[]" value='<?php  echo " $product_row[rupees] " ?>'class='price'></td>
                                      <td><input type='text' name="qty[]" value='<?php  echo" $product_row[quantity] "?>'class='qty'></td>
                                      <td><input type='text' name="total[]" value='<?php  echo "$product_row[total]" ?>'class='total'></td>
                                      <td><button class='remove-product btn-row-remove' data-product-id='<?php echo" $product_row[id]" ?>'><i class='bx bxs-minus-circle' ></i></button></td>  
                                    </tr>
                                      <?php
                                    }
                                } else {
                                }
                            ?>
                        </tbody>
                        <tfoot>
                            <td colspan="3"><button type="button" id="add-row-btn">Add Row</button></td>
                            <td><input type="text" name="grand_qty" id="grand_qty" class="grand_qty"></td>
                            <td><input type="text" name="grand_total" id="grand_total"></td>
                        </tfoot>
                    </table>
                    <div class="submit-div">
                        <input type="submit" name="submit" value="Save Invoice" class="save-button">
                    </div>
                </div>
                
            </div>
        </div>
    </form>
    <script>
    $(document).ready(function(){

        function grand_total(){
            var tot = 0;
            $(".total").each(function(){
                tot += Number($(this).val());
            });
            $("#grand_total").val(tot);
        }
        function qty_total(){
            var qty=0;
            $(".qty").each(function(){
                qty += Number($(this).val());
            });
            $("#grand_qty").val(qty);
        }

        // Call grand_total function on document ready
        qty_total();
        grand_total();
        

        // Delegate event handling to the table-container
        $(".table-container").on('input', '.total', function() {
            grand_total();
            qty_total();

            
        });
       

        $(".table-container").on('click', '.remove-product', function() {
                        $(this).closest('tr').remove();
                        qty_total();
                        grand_total();
                       
                    });

        $('#add-row-btn').on('click', function() {
                        const newRowHtml = `
                            <tr>
                                <td><input type='text' name='pname[]' class='prod_name'></td>
                                <td><input type='text' name='process[]' class='descrip_cls'></td>
                                <td><input type='text' name="rupees[]' class='price'></td>
                                <td><input type='text' name='qty[]' class='qty'></>
                                <td><input type='text' name='total[]' class='total'></td>
                                <td><button class='remove-product btn-row-remove'><i class='bx bxs-minus-circle'></i></button></td>
                            </tr>
                        `;
                        $('#product_tbody').append(newRowHtml);
                    });
        });

        
</script>

</body>
</html>
