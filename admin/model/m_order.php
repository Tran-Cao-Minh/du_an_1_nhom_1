<?php
  function getOrderByIdentifyValue (
    $filter_column,
    $sort_rule,
    $filter_value_identify,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $keyword_list = preg_split('/[\s,]+/', $filter_value_identify);

    $sql = "SELECT 
              o.`PkOrder_Id`, 
              o.`OrderDate`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              os.`OrderStatusName`
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_status` os ON o.`FkOrderStatus_Id` = os.`PkOrderStatus_Id`
            GROUP BY o.`PkOrder_Id`
            HAVING 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }

    $stmt = $conn->query($sql);

    $row_quantity = $stmt->rowCount();

    global $page_quantity;
    if ($row_quantity > 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc đơn hàng thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkOrder_Id':
          $notification .= 'Mã đơn hàng';
          break;
        case 'CustomerName':
          $notification .= 'Người tạo';
          break;
        case 'OrderDate':
          $notification .= 'Ngày tạo';
          break;
        case 'OrderTotalMoney':
          $notification .= 'Tổng tiền';
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

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT 
              o.`PkOrder_Id`, 
              o.`OrderDate`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              os.`OrderStatusName`
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_status` os ON o.`FkOrderStatus_Id` = os.`PkOrderStatus_Id`
            GROUP BY o.`PkOrder_Id`
            HAVING 1";
    foreach ($keyword_list as $keyword) {
      $sql .= " AND `$filter_column` LIKE '%$keyword%'";
    }
    $sql .= " ORDER BY `$filter_column` $sort_rule
              LIMIT $limit_start, $page_size";
    $stmt = $conn->query($sql);
    // print_r($stmt);
    $data_result = $stmt->fetchALL(PDO::FETCH_ASSOC);

    $conn = null;
    return $data_result;
  }

  function getOrderByIntervalValue (
    $filter_column,
    $sort_rule,
    $filter_value_interval_min,
    $filter_value_interval_max,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $sql = "SELECT 
              o.`PkOrder_Id`, 
              o.`OrderDate`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              os.`OrderStatusName`
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_status` os ON o.`FkOrderStatus_Id` = os.`PkOrderStatus_Id`
            GROUP BY o.`PkOrder_Id`
            HAVING `$filter_column`";
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
    $row_quantity = $stmt->rowCount();

    global $page_quantity;
    if ($row_quantity !== 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc đơn hàng thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkOrder_Id':
          $notification .= 'Mã đơn hàng';
          break;
        case 'CustomerName':
          $notification .= 'Người tạo';
          break;
        case 'OrderDate':
          $notification .= 'Ngày tạo';
          break;
        case 'OrderTotalMoney':
          $notification .= 'Tổng tiền';
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

    $limit_start = ($page_num - 1) * $page_size;
    $sql = "SELECT 
              o.`PkOrder_Id`, 
              o.`OrderDate`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              os.`OrderStatusName`
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_status` os ON o.`FkOrderStatus_Id` = os.`PkOrderStatus_Id`
            GROUP BY o.`PkOrder_Id`
            HAVING `$filter_column`";
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

  function getOrderDataById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              o.*,
              oi.`CustomerName`, 
              SUM(od.`OrderQuantity` * od.`ProductPrice`) AS OrderTotalMoney,
              oi.*
            FROM `order` o 
            INNER JOIN `order_detail` od ON o.`PkOrder_Id` = od.`FkOrder_Id`
            INNER JOIN `order_info` oi ON o.`PkOrder_Id` = oi.`FkOrder_Id`
            WHERE o.`PkOrder_Id` = '$object_id'
            LIMIT 1";
    $data_result = $conn->query($sql);

    $sql = "SELECT `PkOrder_Id`
            FROM `order`
            WHERE `PkOrder_Id` = '$object_id'
            LIMIT 1";
    $return_quantity_result = $conn->query($sql);
    $return_quantity = $return_quantity_result->rowCount();
    $conn = null;

    global $notification;
    if ($return_quantity === 0) {
      $notification = 'Không có đơn hàng có mã là "'.$object_id.'" </br>';
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function getOrderStatus() {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `order_status`";
    $data_result = $conn->query($sql);

    $conn = null;

    return $data_result->fetchAll(PDO::FETCH_ASSOC);
  }

  function getOrderProductInf($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              p.`ProductName`,
              pv.`FkColor_Id`,
              pv.`ProductSize`,
              od.`OrderQuantity`,
              od.`ProductPrice`
            FROM `order_detail` od
            INNER JOIN `product_variant` pv ON od.`FkVariant_Id` = pv.`PkVariant_Id`
            INNER JOIN `product` p ON pv.`FkProduct_Id` = p.`PkProduct_Id`
            WHERE od.`FkOrder_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $conn = null;

    return $data_result->fetchAll(PDO::FETCH_ASSOC);
  }

  function updateOrderStatus (
    $object_id,
    $order_status_id
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `order` 
            SET 
              `FkOrderStatus_Id` = '$order_status_id' 
            WHERE `PkOrder_Id` = '$object_id'";
    $update_result = $conn->exec($sql);

    global $notification;
    if ($update_result === 1) {
      $notification = 'Sửa đơn hàng thành công </br>'
                    . 'Mã đơn hàng được sửa: '.$object_id.' </br>';

    } else {
      $notification = 'Sửa đơn hàng không thành công </br>'
                    . 'Có thể do bạn chưa thay đổi thông tin trước khi nhấn nút xác nhận sửa </br>';
    }

    $conn = null;
  }
?>