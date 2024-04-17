<?php

include 'dbconn.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "DELETE from add_customer where id = '$id' ";

  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Failed".mysqli_error());
  }else{
    header(('location:manage_customer.php?delete_msg=Data has been deleted.'));
  }
}
?>