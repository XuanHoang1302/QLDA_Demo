<?php
require_once('model/DB.php');
require_once('model/entity.php');
class login_model extends DB {
    function checkLogin($login) {
        $passWord = DB::getSecurityMD5($login->passWord);
        $sql = "select * from reader where email = '$login->email' and passWord = '$passWord'";
        $result = DB::excute($sql);
        $data = DB::getData($result);
        return $data;
    }
    public function save($login) {
        $token = DB::getSecurityMD5($login->email);
        $sql = "select * from reader where email = '$login->email'";
        $result = DB::excute($sql);
        $data = DB::getData($result);
        $userId = $data['idCard'];
        $sql = "insert into status(userId,token) values('$userId','$token')";
        DB::excute($sql);
        // lưu vào cookie
        setcookie('token',$token,time() + 3 * 60 * 60);
        return $token;
    }
    public function getUser($getEmail) {
        $sql = "select reader.userName,reader.img,reader.Role,reader.idCard from status inner join reader on status.userId = reader.idCard where status.token = '$getEmail'";
        $result = DB::excute($sql);
        $data = DB::getData($result);
       return $data;
    }
    public function InsertOrders($user)
    {
        $userId = $user['idCard'];
        $createdDate = date('Y-m-d , H:s:i');
        $sql = "insert into orders(readerId,createdDate) values('$userId','$createdDate')";
        DB::excute($sql);
    }
    public function delHistory($token) {
        $sql = "delete from status where token = '$token'";
        DB::excute($sql);
    }
}