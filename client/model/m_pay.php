<?php
  function getUserData() {
    $conn = connectDatabase();

    $user_id = $_COOKIE['user_id'];
    $sql = "SELECT 
              `CustomerName`, 
              `CustomerPhone` 
            FROM `customer` 
            WHERE `PkCustomer_Id` = '$user_id'";

    $stmt = $conn->query($sql);
    $return_quantity = $stmt->rowCount();

    if ($return_quantity === 0) {
      $data_result = '';

    } else {
      $data_result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    $conn = null;
    return $data_result;
  }
?>