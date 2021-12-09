<?php
  function getCommentByIdentifyValue (
    $filter_column,
    $sort_rule,
    $filter_value_identify,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $keyword_list = preg_split('/[\s,]+/', $filter_value_identify);

    $sql = "SELECT 
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
            WHERE 1";
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
      $notification = 'Lọc bình luận thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkProductComment_Id':
          $notification .= 'Mã bình luận';
          break;
        case 'ProductName':
          $notification .= 'Tên sản phẩm';
          break;
        case 'CustomerName':
          $notification .= 'Người bình luận';
          break;
        case 'CommentDate':
          $notification .= 'Ngày đăng';
          break;
        case 'CommentContent':
          $notification .= 'Nội dung';
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
    $sql = "SELECT 
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
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
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
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

  function getCommentByIntervalValue (
    $filter_column,
    $sort_rule,
    $filter_value_interval_min,
    $filter_value_interval_max,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $sql = "SELECT 
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
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
    $row_quantity = $stmt->rowCount();

    global $page_quantity;
    if ($row_quantity !== 0) {
      $page_quantity = $row_quantity / $page_size;

    } else {
      $page_quantity = 0;
    }

    global $notification;
    if ($notification === '') {
      $notification = 'Lọc bình luận thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkProductComment_Id':
          $notification .= 'Mã bình luận';
          break;
        case 'ProductName':
          $notification .= 'Tên sản phẩm';
          break;
        case 'CustomerName':
          $notification .= 'Người bình luận';
          break;
        case 'CommentDate':
          $notification .= 'Ngày đăng';
          break;
        case 'CommentContent':
          $notification .= 'Nội dung';
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
    $sql = "SELECT 
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
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
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
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

  function deleteComment($object_id) {
    $conn = connectDatabase();

    $sql = "DELETE FROM `product_comment` 
            WHERE `PkProductComment_Id` = '$object_id'
            LIMIT 1";
    $delete_result = $conn->exec($sql);

    global $notification;
    if ($delete_result === 1) {
      $notification = 'Xóa bình luận thành công </br>';

    } else {
      $notification = 'Xóa bình luận không thành công </br>';
    }

    $conn = null;
  }

  function getCommentDataById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT 
              pc.`PkProductComment_Id`, 
              p.`ProductName`, 
              c.`CustomerName`, 
              pc.`CommentDate`, 
              pc.`CommentContent` 
            FROM `product_comment` pc 
            INNER JOIN `product` p ON pc.`FkProduct_Id` = p.`PkProduct_Id` 
            INNER JOIN `customer` c ON pc.`FkCustomer_Id` = c.`PkCustomer_Id`
            WHERE `PkProductComment_Id` = '$object_id'
            LIMIT 1";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    global $notification;
    if ($return_quantity === 0) {
      $notification = 'Không có bình luận có mã là "'.$object_id.'" </br>';
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function updateComment (
    $object_id,
    $comment_content
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `product_comment` 
            SET 
              `CommentContent` = '$comment_content' 
            WHERE `PkProductComment_Id` = '$object_id'";
    $update_result = $conn->exec($sql);

    global $notification;
    if ($update_result === 1) {
      $notification = 'Sửa bình luận thành công </br>'
                    . 'Mã bình luận được sửa: '.$object_id.' </br>';

    } else {
      $notification = 'Sửa bình luận không thành công </br>'
                    . 'Có thể do bạn chưa thay đổi thông tin trước khi nhấn nút xác nhận sửa </br>';
    }

    $conn = null;
  }
?>