<?php
const HOST = "localhost";
const USERNAME = "root";
const PASSWORD = "";
const DATABASE = "quanlythuvien";
const PRIVATE_KEY = "abusduydđugđgydggdggdgdg";

function select($sql) { 
    $connect = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    
    // lưu dữ liệu dạng utf8
    mysqli_set_charset($connect,"utf8");
    
    // kiểm tra kết nối thaanhf công k
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }

    $data = array();
    $result = mysqli_query($connect, $sql);   
    // fetch dữ liệu từ dattabase sang php để dùng  
    while ($row = mysqli_fetch_array($result, 1))
    {
        $data[] = $row;
    }; 
    $connect->close();
    return $data;
}
function insert($sql) {
    $connect = new mysqli(HOST,USERNAME,PASSWORD,DATABASE);
    
    // lưu dữ liệu dạng utf8
    mysqli_set_charset($connect,"utf8");
    
    // kiểm tra kết nối thaanhf công k
    if($connect->connect_error)
    {
        var_dump($connect->connect_error);
        die();
    }

    mysqli_query($connect, $sql);
    $connect->close();
}
function getSecurityMD5($passWord) {
    return md5(md5($passWord).PRIVATE_KEY);
}