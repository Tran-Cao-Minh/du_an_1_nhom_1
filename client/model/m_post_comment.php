<?php 
$servername = "localhost:3325";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=ignite_shop", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

    $commentContent = $_GET['commentContent'];

    $sql = "INSERT INTO `product_comment` 
            (`PkProductComment_Id`, `FkCustomer_Id`, `FkProduct_Id`, `CommentContent`)
            VALUES 
            ('1', '1', '5', '$commentContent')";

    if ($conn->query($sql) == true) {
        
    $sql = "SELECT `CustomerName`
            FROM `customer` 
            WHERE `Pk_Customer_Id` = '1'
            AND `CustomerPhone` = '332345012'";
    $result = $conn->query($sql);
    $result = $result->fetch_array();
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
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="far fa-star"></i>
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
































?>