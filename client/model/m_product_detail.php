<?php
  function checkProductIdExist($product_id) {
    $conn = connectDatabase();

    $sql = "SELECT `PkProduct_Id` 
            FROM `product`
            WHERE `PkProduct_Id` = '$product_id'
            AND `ProductViewStatus` = 1
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

  function increaseProductView($product_id) {
    $conn = connectDatabase();

    $sql = "UPDATE `product` 
            SET 
              `ProductView` = `ProductView` + 1
            WHERE `PkProduct_Id` = '$product_id'
            LIMIT 1";
    $conn->exec($sql);

    $conn = null;
  }

  function getProductDataById($product_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              p.`ProductName`,
              pt.`TypeName`,
              pr.`BrandName`,
              p.`ProductView`,
              p.`ProductPrice`,
              p.`ProductDiscount`
            FROM `product` p
            INNER JOIN `product_type` pt
            ON p.`FkType_Id` = pt.`PkType_Id`
            INNER JOIN `product_brand` pr
            ON p.`FKBrand_Id` = pr.`PkBrand_Id`
            WHERE p.`PkProduct_Id` = '$product_id'
            LIMIT 1";
    $data_result = $conn->query($sql);

    $conn = null;
    return $data_result->fetch(PDO::FETCH_ASSOC);
  }

  function getProductVariantDataById($product_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              `FkColor_Id`,
              `ProductSize`,
              `ProductQuantity`
            FROM `product_variant` 
            WHERE `FkProduct_Id` = '$product_id'
            ORDER BY `FkColor_Id`, `ProductSize` ASC";
    $data_result = $conn->query($sql);

    $conn = null;
    return $data_result->fetchAll(PDO::FETCH_ASSOC);
  }

  function getProductImageDataById($product_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              `FkColor_Id`,
              `ImageFileName`
            FROM `product_image` 
            WHERE `FkProduct_Id` = '$product_id'
            ORDER BY `FkColor_Id`, `PkImage_Id` ASC";
    $data_result = $conn->query($sql);

    $conn = null;
    return $data_result->fetchAll(PDO::FETCH_ASSOC);
  }
?>