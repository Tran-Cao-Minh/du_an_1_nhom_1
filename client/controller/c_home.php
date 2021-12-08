<?php
  include_once '../global/connect_database.php';
  include_once 'model/m_home.php';

  // some action like take banner, top product

  $link_css_arr = array (
    '../public/css/client/home.css',
  );
  $link_js_arr = array(
    '../public/js/client/slide_show.js',
  );
  $view_link = 'view/v_home.php';
?>