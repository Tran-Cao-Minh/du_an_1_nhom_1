<?php
  include_once 'model/m_account.php';

  // some action like take banner, top product

  $link_css_arr = array (
    '../public/css/client/account.css',
  );
  $link_js_arr[] = '../public/js/client/send_change_email_otp.js';
  $link_js_arr[] = '../public/js/client/send_change_email.js';
  $link_js_arr[] = '../public/js/client/view_form/change_email_view.js';
  $link_js_arr[] = '../public/js/client/view_form/change_email_otp_view.js';
  $view_link = 'view/v_account.php';
?>