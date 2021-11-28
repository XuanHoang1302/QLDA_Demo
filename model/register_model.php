<?php
require_once('model/DB.php');
require_once('model/entity.php');
class register_model extends DB {
      function checkRegister($register) {
        $flag = false;
        // sinh mât khẩu ngẫu nhiên
        $passWord = DB::RandomPassWord();
        // kiểm tra xem đã tồn tại email và tên chưa
        $email = $register->email;
        $userName = $register->userName;
        $sql = "select * from reader where email = '$email' or userName = '$userName' ";
        $result = DB::excute($sql);
        $data = DB::getData($result);
        // nếu chưa
        if (empty($data)) {
          $to_email =$email;
          $subject ="Chào mừng ".$userName."\n Bạn vùa đăng ký tài khoản tại thư viện ";
          $mesage = "Tên đăng nhập của bạn là: " .$userName. "\n Mật khẩu là: ".$passWord."\n vui lòng không cung cấp tên đăng nhập và mật khẩu cho người khác";
          $header = 'From: lexuanhoang1302@gmail.com'; 
          if(mail($to_email,$subject,$mesage,$header) == true) {
              $passWord = DB::getSecurityMD5($passWord);
              $sql1 = 'insert into reader(img,userName,passWord,email,adress,birthDay,job,gender)
                  values("'.$register->img.'","'.$register->userName.'","'.$passWord.'","'.$register->email.'","'.$register->adress.'","'.$register->birthDay.'","'.$register->job.'","'.$register->gender.'")';
              DB::excute($sql1); 
              $flag = true;
              return $flag;
            }
          else {
            return $flag;

          }
    }
  }
  function checkEmail($register) {
    $flag = true;
    $email = $register->email;
    $sql = "select * from reader where email = '$email' ";
    $result = DB::excute($sql);
    $data = DB::getData($result);
    if (empty($data)) {
      $flag=false;
      return $flag;
    }
    else {
      return $flag;
    }
  }
  function checkUserName($register) {
    $flag = true;
    $userName = $register->userName;
    $sql = "select * from reader where userName = '$userName' ";
    $result = DB::excute($sql);
    $data = DB::getData($result);
    if (empty($data)) {
      $flag=false;
      return $flag;
    }
    else {
      return $flag;
    }
  }

}