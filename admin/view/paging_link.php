<?php
  $page_num = $_SESSION['page_num'];
  $max_paging_link = ($offset * 2) + 1;

  if ($page_quantity <= $max_paging_link) {
    for ($i = 1; $i < ($page_quantity + 1); $i++) {
      if ($i == $page_num) {
        echo '
          <li>
            <span class="data-table__footer-bread-crumb-link--disabled">
            '.$i.'
            </span>
          </li>
        ';
      } else {
        echo '
          <li>
            <a href="?page_num='.$i.'" class="data-table__footer-bread-crumb-link">
              '.$i.'
            </a>
          </li>
        ';
      }
    }
  } elseif ($page_quantity > $max_paging_link) {
    if ($page_num >= ($offset + 1) && $page_num <= ($page_quantity - $offset)) {
      echo '
        <li>
          <a href="?page_num=1" class="data-table__footer-bread-crumb-link">
            <i class="data-table__footer-bread-crumb-link-icon fas fa-angle-double-left"></i>
          </a>
        </li>
      ';
      $prev_page = $page_num - 1;
      echo '
        <li>
          <a href="?page_num='.$prev_page.'" class="data-table__footer-bread-crumb-link">
            '.$prev_page.'
          </a>
        </li>
      ';
      echo '
        <li>
          <span class="data-table__footer-bread-crumb-link--disabled">
          '.$page_num.'
          </span>
        </li>
      ';
      $next_page = $page_num + 1;
      echo '
        <li>
          <a href="?page_num='.$next_page.'" class="data-table__footer-bread-crumb-link">
            '.$next_page.'
          </a>
        </li>
      ';
      echo '
        <li>
          <a href="?page_num='.$page_quantity.'" class="data-table__footer-bread-crumb-link">
            <i class="data-table__footer-bread-crumb-link-icon fas fa-angle-double-right"></i>
          </a>
        </li>
      ';
    } elseif ($page_num < ($offset + 1)) {
      for ($i = 1; $i <= ($offset * 2); $i++) {
        if ($i == $page_num) {
          echo '
            <li>
              <span class="data-table__footer-bread-crumb-link--disabled">
              '.$i.'
              </span>
            </li>
          ';
        } else {
          echo '
            <li>
              <a href="?page_num='.$i.'" class="data-table__footer-bread-crumb-link">
                '.$i.'
              </a>
            </li>
          ';
        }
      }
      echo '
        <li>
          <a href="?page_num='.$page_quantity.'" class="data-table__footer-bread-crumb-link">
            <i class="data-table__footer-bread-crumb-link-icon fas fa-angle-double-right"></i>
          </a>
        </li>
      ';
    } elseif ($page_num > ($page_quantity - $offset)) {
      echo '
        <li>
          <a href="?page_num=1" class="data-table__footer-bread-crumb-link">
            <i class="data-table__footer-bread-crumb-link-icon fas fa-angle-double-left"></i>
          </a>
        </li>
      ';
      for ($i = ($page_quantity - ($offset + 1)); $i <= $page_quantity; $i++) {
        if ($i == $page_num) {
          echo '
            <li>
              <span class="data-table__footer-bread-crumb-link--disabled">
              '.$i.'
              </span>
            </li>
          ';
        } else {
          echo '
            <li>
              <a href="?page_num='.$i.'" class="data-table__footer-bread-crumb-link">
                '.$i.'
              </a>
            </li>
          ';
        }
      }
    }
  }
?>
