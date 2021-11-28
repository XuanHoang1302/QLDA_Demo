<?php
require_once('model/DB.php');
require_once('model/entity.php');
class forgot_model extends DB {
   public function checkEmail($email) {
    $sql = 'select * from reader';
    $result = DB::excute($sql);
    $flag = false;
    while ($item = DB::getData($result)) {
        if ($item['email'] == $email) {
          $flag = true;
          return $flag;
          break;
          }
    }
    return $flag;
   }
   function sendPass($email) {
    $flag = false;
    $passWord = DB::RandomPassWord();
    $sql = "select * from reader where email = '$email'";
    $result = DB::excute($sql);
    $item = DB::getData($result);
    $to_email =$email;
    $subject ="Chào mừng ".$item['userName']."\n Bạn vùa đăng ký tài khoản tại thư viện ";
    $mesage = "Tên đăng nhập của bạn là: " .$item['userName']. "\n Mật khẩu là: ".$passWord."\n vui lòng không cung cấp tên đăng nhập và mật khẩu cho người khác";
    $header = 'From: lexuanhoang1302@gmail.com'; 
    if(mail($to_email,$subject,$mesage,$header) == true) {
        $passWord = DB::getSecurityMD5($passWord);
        $sql = "update reader set passWord = '$passWord' where email = '$email'";
        DB::excute($sql); 
        $flag = true;
        return $flag;
   }
  }
}   