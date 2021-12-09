<?php
  if (session_id() === '') {
    session_start();
  }
  // session_destroy();

  include_once '../global/connect_database.php';

  if (isset($_GET['page_name'])) {
    $_SESSION = []; // because session_destroy() respond to late for data flow
    $_SESSION['page_name'] = $_GET['page_name'];

  } elseif (!isset($_SESSION['page_name'])) {
    $_SESSION['page_name'] = 'manage_category';
  }
  $page_name = $_SESSION['page_name'];
  // echo $page_name; ////////////////////////////////////////

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

    case 'manage_order': 
      include_once 'controller/c_order.php';

      $main_bread_crumb = 'Quản lý đơn hàng';
      $sub_bread_crumb = 'Cập nhật đơn hàng';
      break; 
  }

  include_once 'view/layout_admin.php';
?>