<?php 
  include '../global/connect_database.php';
  $conn = connectDatabase();

  if(
    isset($_COOKIE['user_id']) && 
    isset($_COOKIE['user_password'])) {
    $data = "ok";
    echo $data;
  } else {
    $data = "null";
    echo $data;
  }



?>