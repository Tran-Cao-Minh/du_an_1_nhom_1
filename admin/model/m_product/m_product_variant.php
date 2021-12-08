<?php
  function checkProductVariant($product_id, $product_variant_color_id) {
    $conn = connectDatabase();

    $sql = "SELECT `PkVariant_Id`
            FROM `product_variant`
            WHERE `FkProduct_Id` = '$product_id'
            AND `FkColor_Id` = '$product_variant_color_id'
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

  function insertProductVariant (
    $product_id,
    $product_name,
    $product_variant_color_id,
    $product_variant_main_img,
    $product_variant_sub_img_list,
    $product_variant_sub_img_quantity,
    $product_variant_size_list,
    $product_variant_quantity_list,
    $product_variant_quantity_by_color
  ) {
    // get fk product id
    $conn = connectDatabase();

    if ($product_id == '') {
      $sql = "SELECT `PkProduct_Id`
              FROM `product` 
              WHERE `ProductName` = '$product_name'";
      $data_result = $conn->query($sql);
      $product_id = $data_result->fetch(PDO::FETCH_ASSOC);
      $product_id = $product_id['PkProduct_Id'];
    }

    // set name for img and upload
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date('mdY_his_', time());

    $img_file_name_prefix = $product_id.'_'.$current_time;

    $file_name = $img_file_name_prefix.'0';
    $file_extension = substr($product_variant_main_img['type'], 6);
    $full_file_name = $file_name.'.'.$file_extension;
    move_uploaded_file (
      $product_variant_main_img['tmp_name'], 
      '../public/image/product/'.$full_file_name
    );

    $sql = "INSERT INTO `product_image` 
              (`FkProduct_Id`, `FkColor_Id`, `ImageFileName`)
            VALUES 
              ('$product_id', '$product_variant_color_id', '$full_file_name')";
    $conn->exec($sql);

    for ($i = 0; $i < $product_variant_sub_img_quantity; $i++) {
      $file_index = $i + 1;
      $file_name = $img_file_name_prefix.$file_index;
      $file_extension = substr($product_variant_sub_img_list['type'][$i], 6);
      $full_file_name = $file_name.'.'.$file_extension;

      move_uploaded_file (
        $product_variant_sub_img_list['tmp_name'][$i], 
        '../public/image/product/'.$full_file_name
      );

      $sql = "INSERT INTO `product_image` 
                (`FkProduct_Id`, `FkColor_Id`, `ImageFileName`)
              VALUES 
                ('$product_id', '$product_variant_color_id', '$full_file_name')";
      $conn->exec($sql);
    }

    for ($i = 0; $i < $product_variant_quantity_by_color; $i++) {
      $product_variant_size = (int)$product_variant_size_list[$i];
      $product_variant_quantiy = (int)$product_variant_quantity_list[$i];

      $sql = "INSERT INTO `product_variant` 
              (`FkProduct_Id`, `FkColor_Id`, `ProductSize`, `ProductQuantity`)
            VALUES 
              ('$product_id', '$product_variant_color_id', '$product_variant_size', '$product_variant_quantiy')";
      $conn->exec($sql);
    }

    $conn = null;

    return $product_id;
  }

  function getProductVariantInf($product_id, $product_variant_color_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_variant`
            WHERE `FkProduct_Id` = '$product_id'
            AND `FkColor_Id` = '$product_variant_color_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getProductVariantImg($product_id, $product_variant_color_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_image`
            WHERE `FkProduct_Id` = '$product_id'
            AND `FkColor_Id` = '$product_variant_color_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getProductVariantSizeList (
    $product_id,
    $product_variant_color_id
  ) {
    $conn = connectDatabase();

    $sql = "SELECT `ProductSize`
            FROM `product_variant`
            WHERE `FkProduct_Id` = '$product_id'
            AND `FkColor_Id` = '$product_variant_color_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function deleteProductSubVariant(
    $product_id,
    $product_variant_color_id,
    $size
  ) {
    $conn = connectDatabase();

    // get product sub variant id
    $sql = "SELECT `PkVariant_Id` 
            FROM `product_variant` 
            WHERE `FkProduct_Id` = '$product_id' 
            AND `FkColor_Id` = '$product_variant_color_id' 
            AND `ProductSize` = '$size' 
            LIMIT 1";
    $stmt = $conn->query($sql);
    $product_sub_variant_id = $stmt->fetch(PDO::FETCH_ASSOC);
    $product_sub_variant_id = $product_sub_variant_id['PkVariant_Id'];

    // check if variant exist in order detail
    $sql = "SELECT `FkOrder_Id` 
            FROM `order_detail`
            WHERE `FkVariant_Id` = '$product_sub_variant_id' 
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    // if product variant exist in order detail it can not be deleted
    if ($exist_result === 1) {
      global $notification;
      $notification = 'Không thể xóa do có đơn hàng mang biến thể sản phẩm với </br>'
                    . 'Kích thước là "'.$size.'" và mã màu là "'.$product_variant_color_id.'" tồn tại </br>';

    } else {
      $sql = "DELETE FROM `product_variant` 
              WHERE `PkVariant_Id` = '$product_sub_variant_id'
              LIMIT 1";
      $conn->exec($sql);
    }

    $conn = null;
  }

  function updateProductSubVariant(
    $product_id,
    $product_variant_color_id,
    $size,
    $quantity
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `product_variant` 
            SET 
              `ProductQuantity` = '$quantity'
            WHERE `FkProduct_Id` = '$product_id'
            AND `FkColor_Id` = '$product_variant_color_id' 
            AND `ProductSize` = '$size'
            LIMIT 1";
    $conn->exec($sql);

    $conn = null;
  }

  function insertProductSubVariant(
    $product_id,
    $product_variant_color_id,
    $size,
    $quantity
  ) {
    $conn = connectDatabase();

    $sql = "INSERT INTO `product_variant` 
              (`FkProduct_Id`, `FkColor_Id`, `ProductSize`, `ProductQuantity`) 
            VALUES 
              ('$product_id', '$product_variant_color_id', '$size', '$quantity')";
    $conn->exec($sql);

    $conn = null;
  }

  function getNextVariantProductColorId (
    $product_id, 
    $product_variant_color_id
  ) {
    $conn = connectDatabase();

    $sql = "SELECT `FkColor_Id` 
            FROM `product_variant` 
            WHERE `FkProduct_Id` = '$product_id' 
            AND `FkColor_Id` <> '$product_variant_color_id' 
            LIMIT 1";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function deleteProductVariant (
    $product_id, 
    $product_variant_color_id
  ) {
    $conn = connectDatabase();

    // check if variant exist in order detail
    $sql = "SELECT `FkOrder_Id`, `FkVariant_Id`
            FROM `order_detail` 
            WHERE `FkVariant_Id` 
            IN ( 
              SELECT `PkVariant_Id` 
              FROM `product_variant` 
              WHERE `FkProduct_Id` = '$product_id' 
              AND `FkColor_Id` = '$product_variant_color_id' 
            ) 
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    // if product variant exist in order detail it can not be deleted
    if ($exist_result === 1) {
      $conn = null;

      global $notification;
      $notification = 'Không thể xóa do có đơn hàng mang biến thể sản phẩm với </br>'
                    . 'Mã màu là "'.$product_variant_color_id.'" tồn tại </br>';
      return false;

    } else {
      // get all product variant images to delete
      $sql = "SELECT `ImageFileName` 
              FROM `product_image` 
              WHERE `FkProduct_Id` = '$product_id' 
              AND `FkColor_Id` = '$product_variant_color_id'";
      $data_result = $conn->query($sql);  
      $image_file_name_list = $data_result->fetchAll(PDO::FETCH_ASSOC);
      
      foreach ($image_file_name_list as $image_file_name) {
        unlink('../public/image/product/'.$image_file_name['ImageFileName']);
      }

      // delete product variant
      $sql = "DELETE FROM `product_image` 
              WHERE `FkProduct_Id` = '$product_id'
              AND `FkColor_Id` = '$product_variant_color_id'";
      $conn->exec($sql);

      $sql = "DELETE FROM `product_variant` 
              WHERE `FkProduct_Id` = '$product_id'
              AND `FkColor_Id` = '$product_variant_color_id'";
      $conn->exec($sql);

      $conn = null;
      return true;
    }
  }
?>