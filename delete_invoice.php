<?php

include 'dbconn.php';

if(isset($_GET['SID'])){
  $id = $_GET['SID'];

  $query = "DELETE FROM invoice WHERE SID = '$id' ";

  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Failed".mysqli_error());
  }else{
    header(('location:invoice_list.php?delete_msg=Data has been deleted.'));
  }
}
?>