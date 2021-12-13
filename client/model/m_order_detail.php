<?php
  function getOrderDataById($order_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              o.*,
              oi.`CustomerName`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              oi.*
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_info` oi ON o.`PkOrder_Id` = oi.`FkOrder_Id`
            WHERE o.`PkOrder_Id` = '$order_id'
            AND o.`FkOrderStatus_Id` <> '4'
            LIMIT 1";

    $data_result = $conn->query($sql);
    $conn = null;

    return $data_result->fetch(PDO::FETCH_ASSOC);
  }

  function getOrderProductInf($order_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              p.`ProductName`,
              pv.`FkColor_Id`,
              pv.`ProductSize`,
              od.`OrderQuantity`,
              od.`ProductPrice`,
              p_i.`ImageFileName`
            FROM `order_detail` od
            INNER JOIN `product_variant` pv ON od.`FkVariant_Id` = pv.`PkVariant_Id`
            INNER JOIN `product` p ON pv.`FkProduct_Id` = p.`PkProduct_Id`
            INNER JOIN `product_image` p_i ON pv.`FkProduct_Id` = p_i.`FkProduct_Id`
              AND pv.`FkColor_Id` = p_i.`FkColor_Id`
            WHERE od.`FkOrder_Id` = '$order_id'
            GROUP BY pv.`PkVariant_Id`";
    $data_result = $conn->query($sql);

    $conn = null;

    return $data_result->fetchAll(PDO::FETCH_ASSOC);
  }
?>