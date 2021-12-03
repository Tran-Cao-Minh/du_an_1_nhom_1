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
  }

  include_once 'view/layout_admin.php';
?>