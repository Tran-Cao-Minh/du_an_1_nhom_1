<?php
  function getProductBrand() {
    $conn = connectDatabase();

    $sql = "SELECT pr.* 
            FROM `product_brand` pr
            INNER JOIN `product` p 
              ON pr.`PkBrand_Id` = p.`FkBrand_Id`
            GROUP BY pr.`PkBrand_Id`";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getProductColor() {
    $conn = connectDatabase();

    $sql = "SELECT pc.* 
            FROM `product_color` pc
            INNER JOIN `product_variant` pv 
              ON pc.`PkColor_Id` = pv.`FkColor_Id`
            GROUP BY pc.`PkColor_Id`";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getProductSize() {
    $conn = connectDatabase();

    $sql = "SELECT `ProductSize`
            FROM `product_variant`
            GROUP BY `ProductSize`
            ORDER BY `ProductSize` ASC";
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