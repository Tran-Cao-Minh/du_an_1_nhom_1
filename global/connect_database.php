<?php
  function connectDatabase() {
    $servername = "localhost";
    $database_name = "ignite_shop";
    $username = "root";
    $password = "";
    // $option = array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
    
    try {
      $conn = new PDO('mysql:host=$servername;dbname=$database_name', $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
      
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
      die();
    }
  }
?>