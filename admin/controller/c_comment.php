<?php
  include_once 'model/m_comment.php';

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
        deleteComment($object_id);
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

        $_SESSION['filter_column'] = 'PkProductComment_Id';
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
        $data_result = getCommentByIdentifyValue(
          $_SESSION['filter_column'],
          $_SESSION['sort_rule'],
          $_SESSION['filter_value_identify'],
          $_SESSION['page_num'],
          $page_size
        );

      } else if ($_SESSION['filter_value'] === 'interval') {
        $data_result = getCommentByIntervalValue(
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
      $view_link = 'v_comment/v_comment_overview.php';
      break;

    case 'update':
      $notification = '';
      
      // UPDATE DATA
      if (
        isset($_GET['update_confirm']) && 
        isset($_GET['object_id']) &&
        isset($_GET['comment_content'])
      ) {
        $comment_content = $_GET['comment_content'];

        if (strlen($comment_content) > 800 || strlen($comment_content) === 0) {
          $notification = 'Vui lòng nhập nội dung bình luận ít hơn 800 ký tự </br>';

        } else {
          $object_id = $_GET['object_id'];
          updateComment(
            $object_id,
            $comment_content
          );
        }
      }
      // END UPDATE DATA

      // GET DATA FOR UPDATE PAGE
      if (isset($_GET['object_id'])) {
        $object_id = $_GET['object_id'];

        $object_data = getCommentDataById($object_id);

      } else {
        $object_data = '';
        $notification = 'Vui lòng truyền vào khóa chính để lấy thông tin của đối tượng </br>';
      }
      // END GET DATA FOR UPDATE PAGE

      $link_css_arr = array (
        '../public/css/admin/interaction_form.css',
      );
      $link_js_arr = '';
      $view_link = 'v_comment/v_comment_update.php';
      break;
  }
?>