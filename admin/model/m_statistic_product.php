<?php
  function getStatisticProductData (
    $choose_statistic_value,
    $page_num,
    $page_size,
    $order_column
  ) {
    $conn = connectDatabase();

    $sql = "SELECT COUNT(*)
            FROM `product_type`";
    $stmt = $conn->query($sql);
    $row_quantity = $stmt->fetchColumn();

    global $page_quantity;
    if ($row_quantity > 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }
    
    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT 
    	          pt.`PkType_Id` AS TypeId,
                pt.`TypeName` AS ProductType, 
                COUNT(DISTINCT p.`PkProduct_Id`) AS MainProduct, 
                SUM(pv.`ProductQuantity`) AS ProductInventory, 
                SUM(od.`OrderQuantity`) AS ProductSold
            FROM `order_detail` od
            RIGHT OUTER JOIN `product_variant` pv
            ON od.`FkVariant_Id` = pv.`PkVariant_Id`
            RIGHT OUTER JOIN `product` p
            ON pv.`FkProduct_Id` = p.`PkProduct_Id`
            RIGHT OUTER JOIN `product_type` pt
            ON p.`FkType_Id` = pt.`PkType_Id`
            GROUP BY pt.`PkType_Id`
            ORDER BY `$order_column` DESC
            LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }
?>