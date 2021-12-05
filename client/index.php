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

  }

  include_once 'view/layout/layout.php';
?>