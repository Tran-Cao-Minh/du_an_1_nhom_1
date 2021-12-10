<?php
  function getProductCategory() {
    $conn = connectDatabase();

    $sql = "SELECT pt.* 
            FROM `product_type` pt
            INNER JOIN `product` p 
              ON pt.`PkType_Id` = p.`FkType_Id`
            GROUP BY pt.`PkType_Id`";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }
?>