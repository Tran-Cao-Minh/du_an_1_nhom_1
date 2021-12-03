<?php
  include_once 'model/m_color.php';

  if (isset($_GET['view_name'])) {
    $_SESSION['view_name'] = $_GET['view_name'];

  } elseif (!isset($_SESSION['view_name'])) {
    $_SESSION['view_name'] = 'overview';
  }
  $view_name = $_SESSION['view_name'];

  switch ($view_name) {
    case 'overview':
      $notification = '';
      
      // DELETE DATA
      if (isset($_GET['delete_confirm']) && isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];
        deleteColor($object_id);
      }
      // END DELETE DATA

      // DATA FILTER
      $page_quantity = '';
      $page_size = 6;

      if (isset($_GET['filter_confirm'])) {
        $_SESSION['filter_confirm'] = $_GET['filter_confirm'];

        $_SESSION['filter_column'] = $_GET['filter_column'];
        $_SESSION['sort_rule'] = $_GET['sort_rule'];

        if (isset($_GET['filter_value'])) {
          $_SESSION['filter_value'] = $_GET['filter_value'];
        }

        if ($_SESSION['filter_value'] === 'identify') {
          $_SESSION['filter_value_identify'] = $_GET['filter_value_identify'];

        } elseif ($_SESSION['filter_value'] === 'interval') {
          $_SESSION['filter_value_interval_min'] = $_GET['filter_value_interval_min'];
          $_SESSION['filter_value_interval_max'] = $_GET['filter_value_interval_max'];
        }

      } elseif (!isset($_SESSION['filter_confirm'])) {
        $_SESSION['filter_confirm'] = 'true';

        $_SESSION['filter_column'] = 'PkColor_Id';
        $_SESSION['sort_rule'] = 'ASC';

        $_SESSION['filter_value'] = 'identify';
        $_SESSION['filter_value_identify'] = '';
      }

      if (isset($_GET['page_num'])) {
        $_SESSION['page_num'] = $_GET['page_num'];

      } elseif (!isset($_SESSION['page_num'])) {
        $_SESSION['page_num'] = 1;
      }

      if ($_SESSION['filter_value'] === 'identify') {
        $data_result = getColorByIdentifyValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getColorByIntervalValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_interval_min'],
          $_SESSION['filter_value_interval_max'],
          $_SESSION['page_num'],
          $page_size
        );
      }
      // END DATA FILTER

      $link_css_arr = array (
        '../public/css/admin/filter_form.css',
        '../public/css/admin/data_table.css',
      );
      $link_js_arr = array (
          '../public/js/admin/filter_form.js',
      );
      $view_link = 'v_color/v_color_overview.php';
      break;

    case 'add':
      $notification = '';
      
      // INSERT DATA
      if (
        isset($_GET['insert_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['color_name'])
      ) {
        $object_id = substr($_GET['object_id'], 1, 6); // cut # char in HEX Code Color
        $color_name = $_GET['color_name'];
        
        if (checkColorId($object_id) == false) {
          $notification = 'Màu sắc có mã "'.$object_id.'" đã tồn tại </br>';

        } elseif (checkColorName($color_name) == false) {
          $notification = 'Màu sắc có tên "'.$color_name.'" đã tồn tại </br>';
          
        } elseif (strlen($color_name) > 32 || strlen($color_name) === 0) {
          $notification = 'Vui lòng nhập tên màu sắc ít hơn 32 ký tự </br>';

        } else {
          insertColor($object_id, $color_name);
        }
      }
      // END INSERT DATA

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_color/v_color_add.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE DATA
      if (
        isset($_GET['update_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['new_object_id']) &&
        isset($_GET['color_name'])
      ) {
        $object_id = $_GET['object_id']; 
        $new_object_id = substr($_GET['new_object_id'], 1, 6); // cut # char in HEX Code Color
        $color_name = $_GET['color_name'];
        
        if ($new_object_id == $object_id) {
          $check_object_id_exist = true;

        } else {
          $check_object_id_exist = checkColorId($new_object_id);
        }

        $update_status = false;

        if ($check_object_id_exist == false) {
          $notification = 'Màu sắc có mã "'.$new_object_id.'" đã tồn tại </br>';

        } elseif (checkColorName($color_name, $object_id) == false) {
          $notification = 'Màu sắc có tên "'.$color_name.'" đã tồn tại </br>';
          
        } elseif (strlen($color_name) > 32 || strlen($color_name) === 0) {
          $notification = 'Vui lòng nhập tên màu sắc ít hơn 32 ký tự </br>';

        } else {
          updateColor(
            $object_id,
            $new_object_id,
            $color_name
          );

          $update_status = true;
        }
      }
      // END UPDATE DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        if (isset($_GET['new_object_id']) && $update_status == true) {
          $object_id = substr($_GET['new_object_id'], 1, 6); // cut # char in HEX Code Color

        } else {
          $object_id = $_GET['object_id'];
        }
        $object_data = getColorDataById($object_id);

      } else {
        $object_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_color/v_color_update.php';
      break;
  }
?>