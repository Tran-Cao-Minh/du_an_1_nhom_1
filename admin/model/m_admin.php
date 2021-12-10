<?php
  function checkAdmin($admin_account, $admin_password) {
    $conn = connectDatabase();

    $sql = "SELECT `PkCustomer_Id` 
            FROM `customer` c
            INNER JOIN `account` a
            WHERE 
              c.`CustomerPhone` = '$admin_account' 
              AND a.`AccountPassword` = '$admin_password' 
              AND a.`AccountRole` <> 0
            OR
              c.`CustomerEmail` = '$admin_account' 
              AND a.`AccountPassword` = '$admin_password' 
              AND a.`AccountRole` <> 0
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    $conn = null;

    if ($exist_result === 1) {
      return true;

    } else {
      return false;
    }
  }

  function getAdminData($admin_account) {
    $conn = connectDatabase();

    $sql = "SELECT c.`CustomerAvatar`, c.`CustomerName`, a.`AccountRole`
            FROM `customer` c
            INNER JOIN `account` a 
            ON c.`PkCustomer_Id` = a.`FkCustomer_Id`
            WHERE 
              c.`CustomerPhone` = '$admin_account' 
            OR
              c.`CustomerEmail` = '$admin_account' 
            LIMIT 1";
    $data_result = $conn->query($sql);

    $conn = null;

    return $data_result->fetch(PDO::FETCH_ASSOC);
  }
?>