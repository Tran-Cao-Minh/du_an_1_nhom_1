<?php
  include_once '../global/connect_database.php';
  $conn = connectDatabase();

  $account_id = $_COOKIE['user_id'];
  $account_password = $_COOKIE['user_password'];

  $sql = "SELECT `FkCustomer_Id`
          FROM `account` 
          WHERE `FkCustomer_Id` = '$account_id'
          AND `AccountPassword` = '$account_password'
          LIMIT 1";
  $stmt = $conn->query($sql);
  $exist_result = $stmt->rowCount();

  if ($exist_result === 1) {
    $user_id = $stmt->fetch(PDO::FETCH_ASSOC);
    $user_id = $user_id['FkCustomer_Id'];

    $sql = "SELECT `PkOrder_Id`
            FROM `order`
            WHERE `FkCustomer_Id` = '$user_id'
            AND `FkOrderStatus_Id` = '4'
            LIMIT 1";
    $stmt = $conn->query($sql);
    $order_id = $stmt->fetch(PDO::FETCH_ASSOC);
    $order_id = $order_id['PkOrder_Id'];

    $pay_note = $_GET['order_note'];
    $sql = "UPDATE `order` 
            SET 
              `FkOrderStatus_Id` = '1', 
              `OrderNote` = '$pay_note', 
              `OrderDate` = CURRENT_DATE(),
              `OrderPayment` = 'Truyền thống', 
              `OrderShipping` = 'Viettel Post'
            WHERE `PkOrder_Id` = '$order_id'";
    $stmt = $conn->exec($sql);


    $customer_name = $_GET['customer_name'];
    $customer_phone = $_GET['customer_phone'];
    $customer_address = $_GET['customer_address'];

    $sql = "INSERT INTO `order_info` 
              (`FkOrder_Id`, `CustomerName`, `CustomerPhone`, `CustomerAddress`) 
            VALUES 
              ('$order_id', '$customer_name', '$customer_phone', '$customer_address')";
    $stmt = $conn->exec($sql);
  }

  
  


  // $output .= $sql; //########################################
  // $output .= $product_list; //########################################
  // $output .= $product_quantity; //########################################

  $conn = null;
  // echo $output;
?>