<?php
  function getAllOrder() {
    $conn = connectDatabase();

    $user_id = $_COOKIE['user_id'];
    $sql = "SELECT 
              o.`PkOrder_Id`, 
              o.`OrderDate`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              os.`OrderStatusName`
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_status` os ON o.`FkOrderStatus_Id` = os.`PkOrderStatus_Id`
            WHERE o.`FkCustomer_Id` = '$user_id'
            AND o.`FkOrderStatus_Id` <> '4'
            GROUP BY o.`PkOrder_Id`
            ORDER BY `OrderDate` DESC";

    $stmt = $conn->query($sql);
    $return_quantity = $stmt->rowCount();

    if ($return_quantity === 0) {
      $data_result = '';

    } else {
      $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    $conn = null;
    return $data_result;
  }
?>