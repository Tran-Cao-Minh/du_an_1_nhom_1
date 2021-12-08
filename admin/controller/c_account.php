<?php
  include_once 'model/m_account.php';

  if (isset($_GET['view_name'])) {
    $_SESSION['view_name'] = $_GET['view_name'];

  } elseif (!isset($_SESSION['view_name'])) {
    $_SESSION['view_name'] = 'overview';
  }
  $view_name = $_SESSION['view_name'];

  switch ($view_name) {
    case 'overview':
      $notification = '';
      
      // DELETE DATA
      if (isset($_GET['delete_confirm']) && isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];
        deleteAccount($object_id);
      }
      // END DELETE DATA

      // DATA FILTER
      $page_quantity = '';
      $page_size = 6;

      if (isset($_GET['filter_confirm'])) {
        $_SESSION['filter_confirm'] = $_GET['filter_confirm'];

        $_SESSION['filter_column'] = $_GET['filter_column'];
        $_SESSION['sort_rule'] = $_GET['sort_rule'];

        if (isset($_GET['filter_value'])) {
          $_SESSION['filter_value'] = $_GET['filter_value'];
        }

        if ($_SESSION['filter_value'] === 'identify') {
          $_SESSION['filter_value_identify'] = $_GET['filter_value_identify'];

        } elseif ($_SESSION['filter_value'] === 'interval') {
          $_SESSION['filter_value_interval_min'] = $_GET['filter_value_interval_min'];
          $_SESSION['filter_value_interval_max'] = $_GET['filter_value_interval_max'];
        }

      } elseif (!isset($_SESSION['filter_confirm'])) {
        $_SESSION['filter_confirm'] = 'true';

        $_SESSION['filter_column'] = 'PkCustomer_Id';
        $_SESSION['sort_rule'] = 'ASC';

        $_SESSION['filter_value'] = 'identify';
        $_SESSION['filter_value_identify'] = '';
      }

      if (isset($_GET['page_num'])) {
        $_SESSION['page_num'] = $_GET['page_num'];

      } elseif (!isset($_SESSION['page_num'])) {
        $_SESSION['page_num'] = 1;
      }

      if ($_SESSION['filter_value'] === 'identify') {
        $data_result = getAccountByIdentifyValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getAccountByIntervalValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_interval_min'],
          $_SESSION['filter_value_interval_max'],
          $_SESSION['page_num'],
          $page_size
        );
      }
      // END DATA FILTER

      $link_css_arr = array (
        '../public/css/admin/filter_form.css',
        '../public/css/admin/data_table.css',
      );
      $link_js_arr = array (
          '../public/js/admin/filter_form.js',
      );
      $view_link = 'v_account/v_account_overview.php';
      break;

    case 'add':
      $notification = '';
      
      // INSERT DATA
      if (
        isset($_POST['insert_confirm']) && 
        isset($_POST['account_name']) &&
        isset($_POST['account_phone']) &&
        isset($_POST['account_email']) &&
        isset($_POST['account_role']) &&
        isset($_POST['account_status'])
      ) {
        $account_name = $_POST['account_name'];
        $account_phone = $_POST['account_phone'];
        $account_email = $_POST['account_email'];
        $account_role = $_POST['account_role'];
        $account_status = $_POST['account_status'];
        
        if (strlen($account_name) > 80 || strlen($account_name) === 0) {
          $notification = 'Vui lòng nhập tên tài khoản ít hơn 32 ký tự </br>';

        } elseif (!filter_var($account_email, FILTER_VALIDATE_EMAIL)) {
          $notification = 'Email bạn đã nhập không hợp lệ </br>';

        } elseif (!preg_match("/[0-9][10-11]*$/", $account_phone)) {
          $notification = 'Số điện thoại bạn đã nhập không hợp lệ </br>';

        } elseif (checkAccountPhone($account_phone) == false) {
          $notification = 'Đã có tài khoản với số điện thoại "'.$account_phone.'" tồn tại </br>';

        } elseif (checkAccountEmail($account_email) == false) {
          $notification = 'Đã có tài khoản với số Email "'.$account_email.'" tồn tại </br>';

        } else {
          insertAccount(
            $account_name,
            $account_phone,
            $account_email,
            $account_role,
            $account_status
          );
        }
      }
      // END INSERT DATA

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_account/v_account_add.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE DATA
      if (
        isset($_POST['update_confirm']) && 
        isset($_POST['account_id']) &&
        isset($_POST['account_role']) &&
        isset($_POST['account_status'])
      ) {
        $account_id = $_POST['account_id'];
        $account_role = $_POST['account_role'];
        $account_status = $_POST['account_status'];      

        updateAccount(
          $object_id = $account_id,
          $account_role,
          $account_status
        );
      }
      // END UPDATE DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];

        $object_data = getAccountDataById($object_id);

      } elseif (isset($_POST['account_id'])) {
        $object_id = $_POST['account_id'];

        $object_data = getAccountDataById($object_id);

      } else {
        $object_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_account/v_account_update.php';
      break;
  }
?>