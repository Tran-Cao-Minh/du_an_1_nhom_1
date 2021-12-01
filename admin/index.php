<?php
  session_start();

  if (isset($_GET['page_name'])) {
    session_destroy();
    $_SESSION['page_name'] = $_GET['page_name'];

  } elseif (!isset($_SESSION['page_name'])) {
    $_SESSION['page_name'] = 'manage-property';
  }
  $page_name = $_SESSION['page_name'];

  switch ($page_name) {
    case 'manage-property': 
      include_once 'controller/c_category.php';
      break;
  }

  include_once 'view/layout_admin.php';
?>