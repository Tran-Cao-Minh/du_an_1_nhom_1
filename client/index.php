<?php
  if (session_id() === '') {
    session_start();
  }

  if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];

  } elseif (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'home';
  }
  $page = $_SESSION['page'];
  // echo $page; ////////////////////////////////////////

  switch ($page) {
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

    case 'account':
      include_once 'controller/c_account.php';
      
      $main_bread_crumb = 'Tài khoản';
      $sub_bread_crumb = '';
      break;

    case 'cart':
      include_once 'controller/c_cart.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $sub_bread_crumb = '';
      break;
    
    case 'order_detail':
      include_once 'controller/c_order_detail.php';
      
      $main_bread_crumb = 'Chi tiết đơn hàng';
      $sub_bread_crumb = '';
      break;
    
    case 'pay':
      include_once 'controller/c_pay.php';
      
      $main_bread_crumb = 'Thanh toán';
      $sub_bread_crumb = '';
      break;

    case 'product':
      include_once 'controller/c_product.php';
      
      $main_bread_crumb = 'Trang sản phẩm';
      $sub_bread_crumb = '';
      break;

    case 'product_detail':
      include_once 'controller/c_product_detail.php';
      
      $main_bread_crumb = 'Sản phẩm chi tiết';
      $sub_bread_crumb = '';
      break;

    case 'favorite_product':
      include_once 'controller/c_favorite_product.php';
      
      $main_bread_crumb = 'Sản phẩm yêu thích';
      $sub_bread_crumb = '';
      break;

    
  }

  $check_login = false;
  if ($check_login == false) {
    include_once 'view/popup/v_sign_in.php';
    include_once 'view/popup/v_sign_up_phone.php';
    include_once 'view/popup/v_sign_up_phone_verify.php';
    include_once 'view/popup/v_sign_up.php';
    include_once 'view/popup/v_buy_prod_form.php';

    if ($link_js_arr == '') {
      $link_js_arr = array (
        '../public/js/client/view_form/sign_in_view.js',
        '../public/js/client/view_form/sign_up_main_view.js',
        '../public/js/client/view_form/sign_up_email_view.js',
        '../public/js/client/view_form/sign_up_otp_view.js',
        '../public/js/client/view_form/buy_prod_view.js',
        '../public/js/validation/account_validation.js',
        '../public/js/validation/date_validation.js',
        '../public/js/validation/email_validation.js',
        '../public/js/validation/name_validation.js',
        '../public/js/validation/otp_validation.js',
        '../public/js/validation/password_validation.js',
        '../public/js/validation/hide_show_password.js',
      );
    } else {
      $link_js_arr[] = '../public/js/client/view_form/sign_in_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_main_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_email_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_otp_view.js';
      $link_js_arr[] = '../public/js/client/view_form/buy_prod_view.js';
      $link_js_arr[] = '../public/js/validation/account_validation.js';
      $link_js_arr[] = '../public/js/validation/date_validation.js';
      $link_js_arr[] = '../public/js/validation/email_validation.js';
      $link_js_arr[] = '../public/js/validation/name_validation.js';
      $link_js_arr[] = '../public/js/validation/otp_validation.js';
      $link_js_arr[] = '../public/js/validation/password_validation.js';
      $link_js_arr[] = '../public/js/validation/hide_show_password.js';
    }

    if ($link_css_arr == '') {
      $link_css_arr = array (
        '../public/css/client/layout/form.css',
      );
    } else {
      $link_css_arr[] = '../public/css/client/layout/form.css';
    }
    
  }
  
  include_once 'view/layout/layout.php';
?>