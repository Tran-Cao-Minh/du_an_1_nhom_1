<?php 
  include '../global/connect_database.php';
  $conn = connectDatabase();

  if(isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
    $data = "ok";
    echo $data;
  } else {
    $data = "null";
    echo $data;
  }



?>