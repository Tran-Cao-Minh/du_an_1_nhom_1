<?php
  if (session_id() === '') {
    session_start();
  }

  if (isset($_GET['page_name_c'])) {
    $_SESSION['page_name_c'] = $_GET['page_name_c'];

  } elseif (!isset($_SESSION['page_name_c'])) {
    $_SESSION['page_name_c'] = 'home';
  }
  $page_name_c = $_SESSION['page_name_c'];
  // echo $page_name_c; ////////////////////////////////////////

  switch ($page_name_c) {
    case 'home': 
      include_once 'controller/c_home.php';

      $main_bread_crumb = 'Trang chủ';
      $sub_bread_crumb = '';
      break;
      
    case 'introduce':
      include_once 'controller/c_introduce.php';

      $main_bread_crumb = 'Giới thiệu';
      $sub_bread_crumb= '';
      break;

    case 'order_list':
      include_once 'controller/c_order_list.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $sub_bread_crumb = 'Danh sách đơn hàng';
      break;

    
  }

  include_once 'view/layout/layout.php';
?>