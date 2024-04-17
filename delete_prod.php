<?php

include 'dbconn.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "DELETE from add_product where id = '$id' ";

  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Failed".mysqli_error());
  }else{
    header(('location:manage_prod.php?delete_msg=Data has been deleted.'));
  }
}
?>