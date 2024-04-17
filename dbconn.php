<?php

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "crm_product";

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
if(!$conn)
{
  die('Connection Error');
}
?>