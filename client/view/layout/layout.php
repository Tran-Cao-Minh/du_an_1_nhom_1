<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!-- Global CSS -->
  <link rel="stylesheet" href="../public/css/base/reset.css">
  <link rel="stylesheet" href="../public/css/base/theme.css">
  <link rel="stylesheet" href="../public/css/base/font.css">
  <!-- Font Awsome -->
  <script src="https://kit.fontawesome.com/aeb1173b82.js" crossorigin="anonymous"></script>
  <!-- Jquery -->
  <script src="../library/jquery.js"></script>
  <!-- Layout CSS -->
  <link rel="stylesheet" href="../public/css/client/layout/header.css">
  <link rel="stylesheet" href="../public/css/client/layout/bread_crumb.css">
  <link rel="stylesheet" href="../public/css/client/layout/footer.css">
  <?php
    if ($link_css_arr != '') {
      echo '<!-- Link CSS -->';
      foreach ($link_css_arr as $link_css) {
        echo '<link rel="stylesheet" href="'.$link_css.'">';
      }
    }
  ?>
</head>

<body>
  <?php 
      include_once 'header.php';
      include_once 'bread_crumb.php';
      include_once $view_link;
      if ($check_login == false) {
        include_once 'view/popup/v_sign_in.php';
        include_once 'view/popup/v_sign_up_phone.php';
        include_once 'view/popup/v_sign_up_phone_verify.php';
        include_once 'view/popup/v_sign_up.php';
        include_once 'view/popup/v_buy_prod_form.php';
        include_once 'view/popup/v_change_email_form.php';
        include_once 'view/popup/v_change_email_otp_form.php';
        include_once 'view/popup/v_change_phone_form.php';
      }
      include_once 'footer.php'; 
      if ($page == 'product') {
        include_once 'view/popup/v_buy_prod_form.php';
      }
      echo '
        <script type="text/javascript">
          sessionStorage.setItem("pageName", "'.$page.'");
        </script>
      ';
    ?>
  <?php
    if ($link_js_arr != '') {
      echo '<!-- link JS -->';
      foreach ($link_js_arr as $link_js) {
        echo '<script src="'.$link_js.'"></script>';
      }
    }
  ?>
</body>

</html>