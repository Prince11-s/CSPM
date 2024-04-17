<?php

  include 'dbconn.php';

  $query= "SELECT SUM(quantity) FROM add_product";
  $result = $conn->query($query);

  print_r($result);

?>