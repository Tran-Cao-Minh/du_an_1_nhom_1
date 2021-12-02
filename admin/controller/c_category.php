<?php
  include_once 'model/m_category.php';

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
        deleteCategory($object_id);
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

        $_SESSION['filter_column'] = 'PkType_Id';
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
        $data_result = getCategoryByIdentifyValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getCategoryByIntervalValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_interval_min'],
          $_SESSION['filter_value_interval_max'],
          $_SESSION['page_num'],
          $page_size
        );
      }
      // END DATA FILTER

      $view_link = 'v_category/v_category_overview.php';
      break;

    case 'add':
      $notification = '';
      
      // INSERT DATA
      if (
        isset($_GET['insert_confirm']) && 
        isset($_GET['category_name'])
      ) {
        $category_name = $_GET['category_name'];
        
        if (strlen($category_name) > 32) {
          $notification = 'Vui lòng nhập tên danh mục ít hơn 32 ký tự </br>';

        } else {
          insertCategory($category_name);
        }
      }
      // END INSERT DATA

      $view_link = 'v_category/v_category_add.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE DATA
      if (
        isset($_GET['update_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['category_name'])
      ) {
        $category_name = $_GET['category_name'];
        
        if (strlen($category_name) > 32) {
          $notification = 'Vui lòng nhập tên danh mục ít hơn 32 ký tự </br>';

        } else {
          $object_id = $_GET['object_id'];
          updateCategory(
            $object_id,
            $category_name
          );
        }
      }
      // END UPDATE DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];

        $object_data = getCategoryDataById($object_id);

      } else {
        $object_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $view_link = 'v_category/v_category_update.php';
      break;
  }
?>