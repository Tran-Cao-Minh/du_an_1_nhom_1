<?php
  function getProductCategory() {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_type`";
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