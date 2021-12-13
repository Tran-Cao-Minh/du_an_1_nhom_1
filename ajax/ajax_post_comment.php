<?php 

    if (isset($_COOKIE['user_id']) && isset($_COOKIE['user_password']))  {
      include '../global/connect_database.php';
      $conn = connectDatabase();

      $user_id = $_COOKIE['user_id'];
      $user_password = $_COOKIE['user_password'];

      $commentContent = $_GET['commentContent'];
      $product_id = $_GET['commentProductId'];

      $sql = "SELECT COUNT(*)
                FROM `account` 
                WHERE `FkCustomer_Id` = '$user_id'
                AND `AccountPassword` = '$user_password'";

        $result = $conn->query($sql);
        $result = $result->fetch();
        $check_login = $result[0];
      
        if ($check_login == 1) {
          $sql = "INSERT INTO `product_comment` 
          (`PkProductComment_Id`, `FkCustomer_Id`, `FkProduct_Id`, `CommentContent`)
        VALUES 
        (NULL, '$user_id', '$product_id', '$commentContent')";

        if ($conn->query($sql) == true) {
            
        $sql = "SELECT `CustomerName`
                FROM `customer` 
                WHERE `PkCustomer_Id` = '$user_id'";
        $result = $conn->query($sql);
        $result = $result->fetch();
        $username = $result[0];

        $date = date('d-m-Y');

        $output = '<div class="prod__detail-comment-content-item">
        <div class="prod__detail-comment-content-item-heading">
            <div class="prod__detail-comment-content-item-heading-user">
                <div class="prod__detail-comment-content-item-heading-user-img">
                    <img src="../public/image/site/home_page/girl.jpg" alt="">
                </div>
                <div class="prod__detail-comment-content-item-heading-user-name">
                    <p>'.$username.'</p>
                    <div class="prod__detail-comment-content-item-heading-user-rating">
                    </div>
                </div>
            </div>
            <div class="prod__detail-comment-content-item-heading-user-date">
                '.$date.'
            </div>
        </div>
        <div class="prod__detail-comment-content-item-body">
            '.$commentContent.'
        </div>
        </div>';

        } else {
        $output = "fail";

        }
        
        } else {
          $output = "wrong password or id";
        }
        
      } else {
        $output = "not login";
      }

      echo $output;
      $conn = null;
?>