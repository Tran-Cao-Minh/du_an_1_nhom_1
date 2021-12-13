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
    $cart_info = $_GET['cart_info'];

    if ($cart_info != '') {
      $sql = "SELECT `PkOrder_Id`
              FROM `order`
              WHERE `FkCustomer_Id` = '$user_id'
              AND `FkOrderStatus_Id` = '4'
              LIMIT 1";
      $stmt = $conn->query($sql);
      $exist_result = $stmt->rowCount();

      if ($exist_result == 0) {
        $sql = "INSERT INTO `order`
                  (`FkCustomer_Id`, `FkOrderStatus_Id`)
                VALUES
                  ('$user_id', '4')";
        $stmt = $conn->exec($sql);

        $sql = "SELECT `PkOrder_Id`
                FROM `order`
                WHERE `FkCustomer_Id` = '$user_id'
                AND `FkOrderStatus_Id` = '4'
                LIMIT 1";
        $stmt = $conn->query($sql);
        $order_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $order_id = $order_id['PkOrder_Id'];
      } else {
        $order_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $order_id = $order_id['PkOrder_Id'];
      }

      $sql = "DELETE FROM `order_detail`
              WHERE `FkOrder_Id` = '$order_id'";
      $stmt = $conn->exec($sql);

      $output = '';
      foreach ($cart_info as $info) {
        $product_id = $info['id'];
        $color_id = $info['color'];
        $size = $info['size'];
        $quantity = $info['quantity'];
        $price = $info['price'];

        $sql = "SELECT `PkVariant_Id` 
                FROM `product_variant` 
                WHERE `FkProduct_Id` = '$product_id' 
                AND `FkColor_Id` = '$color_id' 
                AND `ProductSize` = '$size'";
        $stmt = $conn->query($sql);
        $variant_id = $stmt->fetch(PDO::FETCH_ASSOC);
        $variant_id = $variant_id['PkVariant_Id'];

        $sql = "INSERT INTO `order_detail` 
                  (`FkVariant_Id`, `FkOrder_Id`, `OrderQuantity`, `ProductPrice`) 
                VALUES 
                  ('$variant_id', '$order_id', '$quantity', '$price')";
        $stmt = $conn->exec($sql);
      }

    } else if ($cart_info == '') {
      $sql = "DELETE FROM `order`
              WHERE `FkCustomer_Id` = '$user_id'
              AND `FkOrderStatus_Id` = '4'
              LIMIT 1";
      $stmt = $conn->exec($sql);
    }


   
  
    // foreach ($cart_info as $info) {
  
    // }
  }

  
  


  // $output .= $sql; //########################################
  // $output .= $product_list; //########################################
  // $output .= $product_quantity; //########################################

  $conn = null;
  // echo $output;
?>