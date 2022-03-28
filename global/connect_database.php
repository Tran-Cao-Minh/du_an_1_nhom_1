<?php
  function connectDatabase() {
    $servername = "localhost:3325";
    $database_name = "ignite_shop_";
    $username = "root";
    $password = "";
    
    try {
      $conn = new PDO("mysql:host=$servername; dbname=$database_name", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
      
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      die();
    }
  }
?>