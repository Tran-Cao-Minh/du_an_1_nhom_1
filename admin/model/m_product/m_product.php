<?php
  function getProductByIdentifyValue (
    $filter_column,
    $sort_rule,
    $filter_value_identify,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $keyword_list = preg_split('/[\s,]+/', $filter_value_identify);

    $sql = "SELECT COUNT(*)
            FROM `product`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $stmt = $conn->query($sql);
    $row_quantity = $stmt->fetchColumn();

    global $page_quantity;
    if ($row_quantity > 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc sản phẩm thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkProduct_Id':
          $notification .= 'Mã sản phẩm';
          break;
        case 'ProductName':
          $notification .= 'Tên sản phẩm';
          break;
        case 'ProductPrice':
          $notification .= 'Giá sản phẩm';
          break;
        case 'ProductView':
          $notification .= 'Số lượt xem';
          break;
        case 'FkType_Id':
          $notification .= 'Danh mục';
          break;
      }
      $notification .= '</br>';

      $notification .= 'Cơ chế sắp xếp: ';
      if ($sort_rule === 'ASC') {
        $notification .= 'Tăng dần';

      } elseif ($sort_rule === 'DESC') {
        $notification .= 'Giảm dần';
      }
      $notification .= '</br>';

      $notification .= 'Tìm kiếm theo giá trị: ';
      if ($filter_value_identify !== '') {
        $notification .= $filter_value_identify;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
    }

    // count row in talbe if row is 0 and row get from data is greater than 0, set SESSION page_num
    // it help avoid to show table with no row inside
    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT `PkProduct_Id`
            FROM `product`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $sql .= " LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    $showed_row_quantity = $stmt->rowCount();
    if ($showed_row_quantity === 0 && $row_quantity > 0) {
      $page_num--;
      $_SESSION['page_num'] = $page_num;
    }
    // --------------------------------------------------------------------

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT 
              `PkProduct_Id`, `ProductName`, `ProductPrice`, `ProductView`, `ProductViewStatus`
            FROM `product`
            WHERE 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $sql .= " ORDER BY `$filter_column` $sort_rule
              LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }

  function getProductByIntervalValue (
    $filter_column,
    $sort_rule,
    $filter_value_interval_min,
    $filter_value_interval_max,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $sql = "SELECT COUNT(*)
            FROM `product`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
   
    $stmt = $conn->query($sql);
    $row_quantity = $stmt->fetchColumn();

    global $page_quantity;
    if ($row_quantity !== 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc sản phẩm thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkProduct_Id':
          $notification .= 'Mã sản phẩm';
          break;
        case 'ProductName':
          $notification .= 'Tên sản phẩm';
          break;
        case 'ProductPrice':
          $notification .= 'Giá sản phẩm';
          break;
        case 'ProductView':
          $notification .= 'Số lượt xem';
          break;
        case 'FkType_Id':
          $notification .= 'Danh mục';
          break;
      }
      $notification .= '</br>';

      $notification .= 'Cơ chế sắp xếp: ';
      if ($sort_rule === 'ASC') {
        $notification .= 'Tăng dần';

      } elseif ($sort_rule === 'DESC') {
        $notification .= 'Giảm dần';
      }
      $notification .= '</br>';

      $notification .= 'Tìm kiếm theo khoảng: </br>';
      $notification .= 'Giá trị nhỏ nhất: ';
      if ($filter_value_interval_min !== '') {
        $notification .= $filter_value_interval_min;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
      $notification .= 'Giá trị lớn nhất: ';
      if ($filter_value_interval_max !== '') {
        $notification .= $filter_value_interval_max;

      } else {
        $notification .= ' ~ Không có ~ ';
      }
      $notification .= '</br>';
    }

    // count row in talbe if row is 0 and row get from data is greater than 0, set SESSION page_num
    // it help avoid to show table with no row inside
    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT `PkProduct_Id`
            FROM `product`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
    $sql .= " LIMIT $limit_start, $page_size";

    $stmt = $conn->query($sql);
    $showed_row_quantity = $stmt->rowCount();
    if ($showed_row_quantity === 0 && $row_quantity > 0) {
      $page_num--;
      $_SESSION['page_num'] = $page_num;
    }
    // --------------------------------------------------------------------

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT 
              `PkProduct_Id`, `ProductName`, `ProductPrice`, `ProductView`, `ProductViewStatus`
            FROM `product`
            WHERE `$filter_column`";
    if ($filter_value_interval_min === '' && $filter_value_interval_max === '') {
      $sql .= " LIKE '%%'";

    } elseif ($filter_value_interval_min !== '' && $filter_value_interval_max === '') {
      $sql .= " >= '$filter_value_interval_min'";

    } elseif ($filter_value_interval_min === '' && $filter_value_interval_max !== '') {
      $sql .= " <= '$filter_value_interval_max'";
      
    } else {
      $sql .= " BETWEEN '$filter_value_interval_min' AND '$filter_value_interval_max'";
    }
    $sql .= " ORDER BY `$filter_column` $sort_rule
              LIMIT $limit_start, $page_size";
    
    $stmt = $conn->query($sql);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }

  function deleteProduct($object_id) {
    $conn = connectDatabase();

    $sql = "DELETE FROM `product` 
            WHERE `PkType_Id` = '$object_id'";
    $delete_result = $conn->exec($sql);

    global $notification;
    if ($delete_result === 1) {
      $notification = 'Xóa sản phẩm thành công </br>';

    } else {
      $notification = 'Xóa sản phẩm không thành công </br>';
    }

    $conn = null;
  }

  // CHECK PRODUCT INFORMATION BEFORE ADD OR UPDATE
  function checkProduct($product_id) {
    $conn = connectDatabase();

    $sql = "SELECT `PkProduct_Id` 
            FROM `product`
            WHERE `PkProduct_Id` = '$product_id'
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

  function checkProductName($product_name) {
    $conn = connectDatabase();

    $sql = "SELECT `ProductName` 
            FROM `product`
            WHERE `ProductName` = '$product_name'
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    $conn = null;

    if ($exist_result === 1) {
      return false;

    } else {
      return true;
    }
  }
  // END CHECK PRODUCT INFORMATION BEFORE ADD OR UPDATE

  function insertProduct(
    $product_name,
    $product_price,
    $product_sale,
    $product_category_id,
    $product_brand_id,
    $product_view_status
  ) {
    $conn = connectDatabase();

    $sql = "INSERT INTO `product` 
              (
                `FkType_Id`, 
                `FKBrand_Id`, 
                `ProductName`, 
                `ProductPrice`, 
                `ProductDiscount`, 
                `ProductViewStatus`
              ) 
            VALUES 
              (
                '$product_category_id', 
                '$product_brand_id', 
                '$product_name', 
                '$product_price', 
                '$product_sale', 
                '$product_view_status'
              )
          ";
    $insert_result = $conn->exec($sql);

    global $notification;
    if ($insert_result === 1) {
      $notification = 'Thêm sản phẩm thành công </br>'
                    . 'Tên sản phẩm được thêm: '.$product_name.' </br>';

    } else {
      $notification = 'Thêm sản phẩm không thành công </br>';
    }

    $conn = null;
  }

  // GET PRODUCT INFORMATION FOR UPDATE PRODUCT AND ADD VARIANT
  function getProductDataById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product` 
            WHERE `PkProduct_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    global $notification;
    if ($return_quantity === 0) {
      $notification = 'Không có sản phẩm có mã là "'.$object_id.'" </br>';
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }
  
  function getProductTypeById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT pt.`PkType_Id`, pt.`TypeName`
            FROM `product` AS p
            INNER JOIN `product_type` AS pt
            ON p.`FkType_Id` = pt.`PkType_Id`
            WHERE `PkProduct_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function getProductBrandById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT pb.`PkBrand_Id`, pb.`BrandName`
            FROM `product` AS p
            INNER JOIN `product_brand` AS pb
            ON p.`FkBrand_Id` = pb.`PkBrand_Id`
            WHERE `PkProduct_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function getProductChoosenColor($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_color`
            WHERE `PkColor_Id` 
            IN (
                SELECT `FkColor_Id`
                FROM `product_variant`
                WHERE `FkProduct_Id` = '$object_id'
                GROUP BY `FkColor_Id`
            )";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getProductNotChoosenColor($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_color`
            WHERE `PkColor_Id` 
            NOT IN (
                SELECT `FkColor_Id`
                FROM `product_variant`
                WHERE `FkProduct_Id` = '$object_id'
                GROUP BY `FkColor_Id`
            )";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }

  function getColorNameById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT `ColorName`
            FROM `product_color` 
            WHERE `PkColor_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    $color_name = $data_result->fetch(PDO::FETCH_ASSOC);
    $color_name = $color_name['ColorName'];

    return $color_name;
  }
  // END GET PRODUCT INFORMATION FOR UPDATE PRODUCT AND ADD VARIANT

  function updateProduct (
    $object_id,
    $product_name,
    $product_category_id,
    $product_brand_id,
    $product_price,
    $product_sale,
    $product_view_status
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `product` 
            SET 
              `ProductName` = '$product_name',
              `FkType_Id` = '$product_category_id',
              `FKBrand_Id` = '$product_brand_id',
              `ProductPrice` = '$product_price',
              `ProductDiscount` = '$product_sale',
              `ProductViewStatus` = '$product_view_status' 
            WHERE `PkProduct_Id` = '$object_id'";
    $update_result = $conn->exec($sql);

    global $notification;
    if ($update_result === 1) {
      $notification = 'Sửa sản phẩm thành công </br>'
                    . 'Mã sản phẩm được sửa: '.$object_id.' </br>';

    } else {
      $notification = 'Sửa sản phẩm không thành công </br>'
                    . 'Có thể do bạn chưa thay đổi thông tin trước khi nhấn nút xác nhận sửa </br>';
    }

    $conn = null;
  }

  // GET ALL FK KEY INFORMATION FOR PRODUCT
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

  function getProductBrand() {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `product_brand`";
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

    $sql = "SELECT * 
            FROM `product_color`";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    if ($return_quantity === 0) {
      return '';

    } else {
      return $data_result->fetchAll(PDO::FETCH_ASSOC);
    }
  }
  // END GET ALL FK KEY INFORMATION FOR PRODUCT
?>