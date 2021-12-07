<?php
  function updateProductVariantMainImage(
    $product_id,
    $product_variant_main_img_id,
    $product_variant_main_img
  ) {
    $conn = connectDatabase();

    $sql = "SELECT `ImageFileName`
            FROM `product_image` 
            WHERE `PkImage_Id` = '$product_variant_main_img_id'
            LIMIT 1";
    $data_result = $conn->query($sql);
    $return_quantity = $data_result->rowCount();

    if ($return_quantity === 0) {
      $conn = null;

      global $notification;
      $notification = 'Không có ảnh sản phẩm có mã là "'.$product_variant_main_img_id.'" </br>';

    } else {
      $image_file_name = $data_result->fetch(PDO::FETCH_ASSOC);
      $image_file_name = $image_file_name['ImageFileName'];
      unlink('../public/image/product/'.$image_file_name);

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

      $sql = "UPDATE `product_image` 
              SET 
                `ImageFileName` = '$full_file_name' 
              WHERE 
                `PkImage_Id` = '$product_variant_main_img_id' 
              LIMIT 1";
      $conn->exec($sql);

      $conn = null;
    }
  }

  function getProductSubImgIdList (
    $product_id,
    $product_variant_color_id
  ) {
    $conn = connectDatabase();

    $sql = "SELECT `PkImage_Id`
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

  function deleteProductVariantSubImage($sub_img_id) {
    $conn = connectDatabase();

    $sql = "SELECT `ImageFileName`
            FROM `product_image` 
            WHERE `PkImage_Id` = '$sub_img_id'
            LIMIT 1";
    $data_result = $conn->query($sql);
    $return_quantity = $data_result->rowCount();

    if ($return_quantity === 0) {
      global $notification;
      $notification = 'Không có ảnh sản phẩm có mã là "'.$sub_img_id.'" </br>';

    } else {
      $image_file_name = $data_result->fetch(PDO::FETCH_ASSOC);
      $image_file_name = $image_file_name['ImageFileName'];
      unlink('../public/image/product/'.$image_file_name);

      $sql = "DELETE 
              FROM `product_image` 
              WHERE `PkImage_Id` = '$sub_img_id'
              LIMIT 1";
      $conn->exec($sql);
    }

    $conn = null;
  }

  function insertProductVariantImg(
    $product_id,
    $product_variant_color_id,
    $product_variant_sub_img_list,
    $product_variant_sub_img_quantity
  ) {
    $conn = connectDatabase();

    // set name for img and upload
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $current_time = date('mdY_his_', time());
    $img_file_name_prefix = $product_id.'_'.$current_time;

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

    $conn = null;
  }
  
?>