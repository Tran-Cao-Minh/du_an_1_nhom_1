<?php
  if (session_id() === '') {
    session_start();
  }

  // GET SOME GENERAL INFORMARION
  include_once '../global/connect_database.php';
  include_once 'model/m_common.php';
  $product_category_list = getProductCategory();

  $link_js_arr = array (
    '../public/js/client/common/find_product_by_keyword.js',
    '../public/js/client/common/show_product_in_cart.js',
  );
  // END GET SOME GENERAL INFORMARION

  // NAVIGATE TO PAGE
  if (isset($_GET['page'])) {
    $_SESSION['page'] = $_GET['page'];

  } elseif (!isset($_SESSION['page'])) {
    $_SESSION['page'] = 'home';
  }
  $page = $_SESSION['page'];

  switch ($page) {
    case 'home': 
      include_once 'controller/c_home.php';

      $main_bread_crumb = 'Trang chủ';
      $main_bread_crumb_link = '?page=home';
      $sub_bread_crumb = '';  
      break;
      
    case 'introduce':
      include_once 'controller/c_introduce.php';

      $main_bread_crumb = 'Giới thiệu';
      $main_bread_crumb_link = '?page=introduce';
      $sub_bread_crumb= '';
      break;

    case 'order_list':
      include_once 'controller/c_order_list.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $main_bread_crumb_link = '?page=cart';
      $sub_bread_crumb = 'Danh sách đơn hàng';
      $sub_bread_crumb_link = '?page=order_list';
      break;

    case 'account':
      include_once 'controller/c_account.php';
      
      $main_bread_crumb = 'Tài khoản';
      $main_bread_crumb_link = '?page=account';
      $sub_bread_crumb = '';
      break;

    case 'cart':
      include_once 'controller/c_cart.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $main_bread_crumb_link = '?page=cart';
      $sub_bread_crumb = '';
      break;
    
    case 'order_detail':
      include_once 'controller/c_order_detail.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $main_bread_crumb_link = '?page=cart';
      $sub_bread_crumb = 'Chi tiết đơn hàng';
      $sub_bread_crumb_link = '?page=order_detail';
      break;
    
    case 'pay':
      include_once 'controller/c_pay.php';
      
      $main_bread_crumb = 'Giỏ hàng';
      $main_bread_crumb_link = '?page=cart';
      $sub_bread_crumb = 'Thanh toán';
      $sub_bread_crumb_link = '?page=pay';
      break;

    case 'product':
      include_once 'controller/c_product.php';
      
      $main_bread_crumb = 'Sản phẩm';
      $main_bread_crumb_link = '?page=product';
      $sub_bread_crumb = '';
      break;

    case 'product_detail':
      include_once 'controller/c_product_detail.php';
      
      $main_bread_crumb = 'Trang sản phẩm';
      $main_bread_crumb_link = '?page=product';
      $sub_bread_crumb = 'Sản phẩm chi tiết';
      $sub_bread_crumb_link = '?page=product_detail';
      break;

    case 'favorite_product':
      include_once 'controller/c_favorite_product.php';
      
      $main_bread_crumb = 'Sản phẩm yêu thích';
      $main_bread_crumb_link = '?page=favorite_product';
      $sub_bread_crumb = '';
      break;

  }
  // NAVIGATE TO PAGE

  // CHECK LOGIN
  $check_login = false;
  if ($check_login == false) {
    if ($link_js_arr == '') {
      $link_js_arr = array (
        '../public/js/client/view_form/sign_in_view.js',
        '../public/js/client/view_form/sign_up_main_view.js',
        '../public/js/client/view_form/sign_up_email_view.js',
        '../public/js/client/view_form/sign_up_otp_view.js',
        '../public/js/client/view_form/buy_prod_view.js',
        '../public/js/client/view_form/change_email_view.js',
        '../public/js/client/view_form/change_email_otp_view.js',
        '../public/js/validation/account_validation.js',
        '../public/js/validation/date_validation.js',
        '../public/js/validation/email_validation.js',
        '../public/js/validation/name_validation.js',
        '../public/js/validation/otp_validation.js',
        '../public/js/validation/password_validation.js',
        '../public/js/validation/hide_show_password.js',
        '../public/js/validation/sign_up_validation.js',
        '../public/js/validation/pay_check.js',
        '../library/jquery.js',
        '../public/js/client/send_comment.js',
        '../public/js/client/send_login.js',
        '../public/js/client/send_otp.js',
        '../public/js/client/send_change_email_otp.js',
        '../public/js/client/send_otp_check.js',
        '../public/js/client/send_change_email.js',
      );
    } else {
      $link_js_arr[] = '../public/js/client/view_form/sign_in_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_main_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_email_view.js';
      $link_js_arr[] = '../public/js/client/view_form/sign_up_otp_view.js';
      $link_js_arr[] = '../public/js/client/view_form/buy_prod_view.js';
      $link_js_arr[] = '../public/js/client/view_form/change_email_view.js';
      $link_js_arr[] = '../public/js/client/view_form/change_email_otp_view.js';
      $link_js_arr[] = '../public/js/validation/account_validation.js';
      $link_js_arr[] = '../public/js/validation/date_validation.js';
      $link_js_arr[] = '../public/js/validation/email_validation.js';
      $link_js_arr[] = '../public/js/validation/name_validation.js';
      $link_js_arr[] = '../public/js/validation/otp_validation.js';
      $link_js_arr[] = '../public/js/validation/password_validation.js';
      $link_js_arr[] = '../public/js/validation/hide_show_password.js';
      $link_js_arr[] = '../public/js/validation/sign_up_validation.js';
      $link_js_arr[] = '../public/js/validation/pay_check.js';
      $link_js_arr[] = '../library/jquery.js';
      $link_js_arr[] = '../public/js/client/send_comment.js';
      $link_js_arr[] = '../public/js/client/send_login.js';
      $link_js_arr[] = '../public/js/client/send_otp.js';
      $link_js_arr[] = '../public/js/client/send_otp_check.js';
      $link_js_arr[] = '../public/js/client/send_change_email_otp.js';
      $link_js_arr[] = '../public/js/client/send_change_email.js';
    }

    if ($link_css_arr == '') {
      $link_css_arr = array (
        '../public/css/client/layout/form.css',
      );
    } else {
      $link_css_arr[] = '../public/css/client/layout/form.css';
    }
  }
  // END CHECK LOGIN

  include_once 'view/layout/layout.php';
?>