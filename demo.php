<?php
//Tạo connect database
function pdo_get_connection(){
    $servername = "localhost:3325";
    $username = "root";
    $password = "";
    $option=array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
    
    try {
      $conn = new PDO("mysql:host=$servername;dbname=kyle_shop", $username, $password,$option);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $conn;
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
}

//Thêm xóa sửa
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(),1);
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    return $stmt;
}
//Lấy ra tất cả
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(),1);
    $conn  =pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
//Lấy ra 1 cái
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(),1);
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute($sql_args);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
   