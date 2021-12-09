<?php
  function getAccountByIdentifyValue (
    $filter_column,
    $sort_rule,
    $filter_value_identify,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $keyword_list = preg_split('/[\s,]+/', $filter_value_identify);

    $sql = "SELECT COUNT(*)
            FROM `customer`
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
      $notification = 'Lọc tài khoản thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkCustomer_Id':
          $notification .= 'Mã tài khoản';
          break;
        case 'CustomerName':
          $notification .= 'Tên người dùng';
          break;
        case 'CustomerPhone':
          $notification .= 'Số điện thoại';
          break;
        case 'CustomerEmail':
          $notification .= 'Email người dùng';
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
    $sql = "SELECT `PkCustomer_Id`
            FROM `customer`
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
    $sql = "SELECT * 
            FROM `customer` AS c
            INNER JOIN `account` AS a
            ON c.`PkCustomer_Id` = a.`FkCustomer_Id`
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

  function getAccountByIntervalValue (
    $filter_column,
    $sort_rule,
    $filter_value_interval_min,
    $filter_value_interval_max,
    $page_num,
    $page_size
  ) {
    $conn = connectDatabase();

    $sql = "SELECT COUNT(*)
            FROM `customer`
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
      $notification = 'Lọc tài khoản thành công trả về '.$row_quantity.' hàng kết quả </br>';

      $notification .= 'Cột được lọc: ';
      switch ($filter_column) {
        case 'PkCustomer_Id':
          $notification .= 'Mã tài khoản';
          break;
        case 'CustomerName':
          $notification .= 'Tên người dùng';
          break;
        case 'CustomerPhone':
          $notification .= 'Số điện thoại';
          break;
        case 'CustomerEmail':
          $notification .= 'Email người dùng';
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
    $sql = "SELECT `PkCustomer_Id`
            FROM `customer`
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
    $sql = "SELECT *
            FROM `customer` AS c
            INNER JOIN `account` AS a
            ON c.`PkCustomer_Id` = a.`FkCustomer_Id`
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

  function deleteAccount($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT `FkCustomer_Id`
            FROM `account` 
            WHERE `FkCustomer_Id` = '$object_id' 
            AND `AccountRole` <> 0
            LIMIT 1";
    $stmt = $conn->query($sql);
    $exist_result = $stmt->rowCount();

    // if account is not user it can not be deleted
    global $notification;
    if ($exist_result === 1) {
      $notification = 'Chỉ có thể xóa tài khoản của người dùng </br>';

    } else {
      $sql = "SELECT `PkOrder_Id`
              FROM `order` 
              WHERE `FkCustomer_Id` = '$object_id' 
              LIMIT 1";
      $stmt = $conn->query($sql);
      $exist_result = $stmt->rowCount();

      if ($exist_result === 1) {
        $notification = 'Không thể xóa tài khoản do người dùng đã tạo đơn hàng tại Website </br>';
  
      } else {
        // delete is set to cascade to account
        $sql = "DELETE FROM `customer` 
                WHERE `PkCustomer_Id` = '$object_id'
                LIMIT 1";
        $delete_result = $conn->exec($sql);
  
        if ($delete_result === 1) {
          $notification = 'Xóa tài khoản thành công </br>';
  
        } else {
          $notification = 'Xóa tài khoản không thành công </br>';
        }
      }
    }

    $conn = null;
  }

  function checkAccountPhone($account_phone) {
    $conn = connectDatabase();

    $sql = "SELECT `PkCustomer_Id` 
            FROM `customer`
            WHERE `CustomerPhone` = '$account_phone'
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

  function checkAccountEmail($account_email) {
    $conn = connectDatabase();

    $sql = "SELECT `PkCustomer_Id` 
            FROM `customer`
            WHERE `CustomerEmail` = '$account_email'
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

  function insertAccount(
    $account_name,
    $account_phone,
    $account_email,
    $account_role,
    $account_status
  ) {
    $conn = connectDatabase();

    $sql = "INSERT INTO `customer` 
              (`CustomerPhone`, `CustomerName`, `CustomerEmail`)
            VALUES 
              ('$account_phone', '$account_name', '$account_email')";
    $insert_result = $conn->exec($sql);

    global $notification;
    if ($insert_result === 1) {
      $notification = 'Thêm người dùng thành công </br>'
                    . 'Tên người dùng được thêm: '.$account_name.' </br>';

      $sql = "SELECT `PkCustomer_Id`
              FROM `customer` 
              WHERE `CustomerPhone` = '$account_phone'
              AND `CustomerEmail` = '$account_email'";
      $data_result = $conn->query($sql);
      $account_id = $data_result->fetchColumn();
      $account_password = rand(100000, 999999);
      $encode_account_password = md5($account_password);

      $sql = "INSERT INTO `account` 
                (
                  `FkCustomer_Id`, 
                  `AccountRole`, 
                  `AccountPassword`, 
                  `AccountDate`, 
                  `AccountStatus`
                )
              VALUES 
                (
                  '$account_id', 
                  '$account_role', 
                  '$encode_account_password', 
                  CURRENT_DATE(),
                  '$account_status'
                )
              ";
      $insert_result = $conn->exec($sql);

      if ($insert_result === 1) {
        $notification .= 'Thêm tài khoản tương ứng thành công </br>';
        if ($account_role == 0) {
          $role = 'Người dùng';
        } else {
          $role = 'Quản trị viên';
        }
        if ($account_status == 0) {
          $status = 'Vô hiệu';
        } else {
          $status = 'Kích hoạt';
        }

        include '../global/function/send_mail.php';
        $send_mail_result = sendMail (
          $recipient_email = $account_email, 
          $recipient_name = $account_name,
          $email_subject = 'Thông báo thiết lập tài khoản tại Ignite Shop',  
          $email_content = '
            Mật khẩu của tài khoản mới là: <b>'.$account_password.'</b><br>
            Chức vụ: '.$role.'<br>
            Trạng thái tài khoản: '.$status.'<br>
          '
        );

        if ($send_mail_result == true) {
          $notification .= 'Gởi Mail thông báo mật khẩu đến người dùng thành công </br>';

        } else {
          $notification .= 'Gởi Mail thông báo mật khẩu đến người dùng thất bại </br>'
                        . 'Lỗi: '.$send_mail_result.' </br>';
        }

      } else {
        $notification .= 'Thêm tài khoản tương ứng thất bại => Xóa người dùng tương ứng </br>';
        $sql = "DELETE FROM `customer` 
                WHERE `CustomerPhone` = '$account_phone'
                AND `CustomerEmail` = '$account_email'
                LIMIT 1";
        $conn->exec($sql);
      }

    } else {
      $notification = 'Thêm người dùng không thành công </br>';
    }

    $conn = null;
  }

  function getAccountDataById($object_id) {
    $conn = connectDatabase();

    $sql = "SELECT * 
            FROM `customer` AS c
            INNER JOIN `account` AS a
            ON c.`PkCustomer_Id` = a.`FkCustomer_Id`
            WHERE c.`PkCustomer_Id` = '$object_id'";
    $data_result = $conn->query($sql);

    $return_quantity = $data_result->rowCount();
    $conn = null;

    global $notification;
    if ($return_quantity === 0) {
      $notification = 'Không có tài khoản có mã là "'.$object_id.'" </br>';
      return '';

    } else {
      return $data_result->fetch(PDO::FETCH_ASSOC);
    }
  }

  function updateAccount (
    $object_id,
    $account_role,
    $account_status
  ) {
    $conn = connectDatabase();

    $sql = "UPDATE `account` 
            SET 
              `AccountRole` = '$account_role',
              `AccountStatus` = '$account_status' 
            WHERE `FkCustomer_Id` = '$object_id'
            AND `AccountRole` = '0'";
    $update_result = $conn->exec($sql);

    global $notification;
    if ($update_result === 1) {
      $notification = 'Sửa tài khoản thành công </br>'
                    . 'Mã tài khoản được sửa: '.$object_id.' </br>';

    } else {
      $notification = 'Sửa tài khoản không thành công </br>'
                    . 'Có thể do bạn chưa thay đổi thông tin trước khi nhấn nút xác nhận sửa </br>'
                    . 'Lưu ý: Chỉ có thể cập nhật cho tài khoản với quyền hạn là Người dùng </br>';
    }

    $conn = null;
  }
?>