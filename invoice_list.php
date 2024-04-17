<?php
  include 'sidebar.php';
  include 'dbconn.php';

  $sql = "SELECT * FROM invoice";
  $result = $conn->query($sql);

  if(!$result){
    die("Invalid query:".$conn->error);
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="styles/invoice_list.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    
</head>
<body>
  <div class="list_contain">
    <div class="main">
    <?php
      while(  $row = $result->fetch_assoc()){
   ?>

      <div class="list">
        <a href="#">
          <span class="list_name">Invoice No : </span>
          <span class="live_list"><?php echo $row['INVOICE_NO']; ?></span>
          <span class="list_name">Invoice Date :</span>
          <span class="live_list"><?php echo $row['INVOICE_DATE']; ?></span>
          <span class="list_name">Name :</span>
          <span class="live_list"><?php echo $row['CNAME']; ?></span>
          <span class="list_name">Total :</span>
          <span class="live_list"><?php echo $row['GRAND_TOTAL']; ?></span>
        </a>
        <div class="btn">
          <button class="edit"><a href="#"><i class='bx bx-edit'></i></a></button>
          <button class="delete"><a href="delete_invoice.php?SID=<?php echo $row['SID'];?>"><i class='bx bx-trash' ></i></a></button>
          <button class="dowload"><a href="invoice_print.php?id=<?php echo $row['SID'];?>" target="_blank"><i class='bx bxs-download'></i></a>
        </div>
        
      </div>
     
      <?php
      }
      ?>
      </div>
  </div>
</body>
</html>