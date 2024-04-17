<?php

include 'dbconn.php';

if(isset($_GET['id'])){
  $id = $_GET['id'];

  $query = "DELETE from user where id = '$id' ";

  $result = mysqli_query($conn, $query);

  if(!$result){
    die("Query Failed".mysqli_error());
  }else{
    header(('location:user.php?delete_msg=Data has been deleted.'));
  }
}
?>