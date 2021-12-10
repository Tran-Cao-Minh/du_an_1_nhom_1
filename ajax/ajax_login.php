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

    $accountValue = $_POST['accountValue'];

    $sql = "SELECT `PkCustomer_Id`
            FROM `customer` 
            WHERE `CustomerEmail` = '$accountValue' 
            OR `CustomerPhone` = '$accountValue'";

     $result = $conn->query($sql);

     if ($result->rowCount() === 0) {
        $data = 'saitaikhoan';

    } else {
        $data = 'dungtaikhoan';
        
        $passwordValue = md5($_POST['passwordValue']);
        $sql = "SELECT `FkCustomer_Id`
                FROM `account` 
             WHERE `AccountPassword` = '$passwordValue'";

    $result = $conn->query($sql);
     if ($result->rowCount() === 0) {
        $data = 'saimatkhau';

    } else {
        $data = 'dungmatkhau';
    }
    
    setcookie('user_id', $accountValue, time() + (3600*24*30), '/');
    setcookie('user_password', $passwordValue, time() + (3600*24*30), '/');
    }

    echo $data;
?>