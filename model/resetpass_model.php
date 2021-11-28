<?php
require_once('model/DB.php');
require_once('model/entity.php');
class reset_model extends DB {
   public function checkEmail($email) {
    $sql = 'select * from reader';
    $result = DB::excute($sql);
    $flag = false;
    while ($item = DB::getData($result)) {
        if ($item['email'] == $email) {
            $flag = true;
        }
    }
    return $flag;
   }


   public function getUser($token) {
    $sql = "select userName,idCard,passWord from status as s inner join reader as r on r.idCard = s.userId where s.token = '$token'";
    $result = DB::excute($sql);
    $row = DB::getData($result);
    return $row;
   }


   public function checkPass($reset) {
       $flag = false;
       $passWord = DB::getSecurityMD5($reset->passWord);
       $sql = "select Role from reader where userName = '$reset->userName' and passWord = '$passWord' ";
       $result = DB::excute($sql);
       $data = DB::getData($result);
       if ($data != null) {
            $flag = true;
            return $flag;
       }
       else {
           return $flag;

       }
   }
   public function update($reset) {
        $passWord = DB::getSecurityMD5($reset->passWord);
        $newPassWord = DB::getSecurityMD5($reset->newPassWord);
        $sql = "update reader set passWord = '$newPassWord' where userName = '$reset->userName' and passWord = '$passWord' ";
        DB::excute($sql);
    }
}   