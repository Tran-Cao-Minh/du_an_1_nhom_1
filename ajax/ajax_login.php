<?php
    include '../global/connect_database.php';
    $conn = connectDatabase();
    $accountValue = $_POST['accountValue'];

    $sql = "SELECT `PkCustomer_Id`
            FROM `customer` 
            WHERE `CustomerEmail` = '$accountValue' 
            OR `CustomerPhone` = '$accountValue'";

    $result = $conn->query($sql);

    if ($result->rowCount() === 0) {
      $data = 'saitaikhoan';

    } else {
      $data = 'dungtaikhoan';
      
      $passwordValue = md5($_POST['passwordValue']);
      $sql = "SELECT `FkCustomer_Id`
              FROM `account` 
              WHERE `AccountPassword` = '$passwordValue'";

      $result = $conn->query($sql);
      $account_id = $result->fetchColumn();

      if ($result->rowCount() === 0) {
        $data = 'saimatkhau';
      } else {
        $data = 'dungmatkhau';
      }
      setcookie('user_id', $account_id, time() + (3600*24*30), '/');
      setcookie('user_password', $passwordValue, time() + (3600*24*30), '/');
    }

    $conn = null;
    echo $data;
?>