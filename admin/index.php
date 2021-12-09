<?php
  include_once '../global/connect_database.php';
  require 'model/m_admin.php';

  if (isset($_POST['logout_confirm'])) {
    // delete cookie by set time to past
    setcookie('admin_account', '', time() - 3600, '/');
    setcookie('admin_password', '', time() - 3600, '/');

    header("Refresh:0");
  }

  if (
    isset($_POST['admin_account']) &&
    isset($_POST['admin_password']) 
  ) {
    $admin_account = $_POST['admin_account'];
    $admin_password = md5($_POST['admin_password']);
    $check_admin = checkAdmin (
      $admin_account,
      $admin_password
    );
    if ($check_admin == true) {
      setcookie('admin_account', $admin_account, time() + 1800, '/');
      setcookie('admin_password', $admin_password, time() + 1800, '/');
    }
  } elseif (
    isset($_COOKIE['admin_account']) &&
    isset($_COOKIE['admin_password']) 
  ) {
    $admin_account = $_COOKIE['admin_account'];
    $admin_password = $_COOKIE['admin_password'];
    $check_admin = checkAdmin (
      $admin_account,
      $admin_password
    );
  } else {
    $check_admin = false;
  }

  if ($check_admin == true) {
    if (session_id() === '') {
      session_start();
    }

    $admin_data = getAdminData($admin_account);

    if (isset($_GET['page_name'])) {
      $_SESSION = []; // because session_destroy() respond to late for data flow
      $_SESSION['page_name'] = $_GET['page_name'];

    } elseif (!isset($_SESSION['page_name'])) {
      $_SESSION['page_name'] = 'manage_category';
    }
    $page_name = $_SESSION['page_name'];

    switch ($page_name) {
      case 'manage_category': 
        include_once 'controller/c_category.php';

        $main_bread_crumb = 'Quản lý thuộc tính';
        $sub_bread_crumb = 'Chỉnh sửa danh mục';
        break;

      case 'manage_brand': 
        include_once 'controller/c_brand.php';

        $main_bread_crumb = 'Quản lý thuộc tính';
        $sub_bread_crumb = 'Chỉnh sửa thương hiệu';
        break;

      case 'manage_color': 
        include_once 'controller/c_color.php';

        $main_bread_crumb = 'Quản lý thuộc tính';
        $sub_bread_crumb = 'Chỉnh sửa màu sắc';
        break;  

      case 'manage_product': 
        include_once 'controller/c_product.php';

        $main_bread_crumb = 'Quản lý sản phẩm';
        $sub_bread_crumb = 'Chỉnh sửa sản phẩm';
        break; 

      case 'statistic_product': 
        include_once 'controller/c_statistic_product.php';

        $main_bread_crumb = 'Quản lý sản phẩm';
        $sub_bread_crumb = 'Thống kê sản phẩm';
        break; 

      case 'manage_account': 
        include_once 'controller/c_account.php';

        $main_bread_crumb = 'Quản lý tài khoản';
        $sub_bread_crumb = 'Chỉnh sửa tài khoản';
        break; 

      case 'manage_comment': 
        include_once 'controller/c_comment.php';

        $main_bread_crumb = 'Quản lý bình luận';
        $sub_bread_crumb = 'Chỉnh sửa bình luận';
        break;

      case 'manage_order': 
        include_once 'controller/c_order.php';

        $main_bread_crumb = 'Quản lý đơn hàng';
        $sub_bread_crumb = 'Cập nhật đơn hàng';
        break; 
    }
    include_once 'view/layout_admin.php';

  } elseif ($check_admin == false) {
    include_once 'view/login_admin.php';
  }
?>