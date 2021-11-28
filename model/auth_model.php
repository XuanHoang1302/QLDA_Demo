<?php
require_once('model/DB.php');
require_once('model/entity.php');
class auth_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select * from auth limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
           $auth = new auth();
           $auth->authId = $row['authId'];
           $auth->authName = $row['authName'];
           $auth->authImg = $row['authImg'];
           $auth->authAdress = $row['authAdress'];
           $auth->authPhone = $row['authPhone'];
           $arr_data[] = $auth;
        }
        return $arr_data;
    }
    public function getNumber() {
        $sql = 'select * from auth';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function insert($auth) {
        $created_at = $updated_at = date('Y-m-d , H:s:i');
        $sql = "select * from auth where authName = '$auth->authName' and authPhone = '$auth->authPhone' and authImg = '$auth->authImg'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $sql = "insert into auth(authName,authPhone,authAdress,authImg) 
            values ('$auth->authName','$auth->authPhone','$auth->authAdress','$auth->authImg')";
            DB::excute($sql);
        }
    }

    public function updateId($auth_list,$id) {
        $updated_at = date('Y-m-d , H:s:i');
        $sql = 'update auth set authName = "'.$auth_list->authName.'" ,authPhone = "'.$auth_list->authPhone.'" ,authAdress = "'.$auth_list->authAdress.'" ,authImg = "'.$auth_list->authImg.'" where authId = '.$id;
        DB::excute($sql);
    }

    public function selectSingleId($table,$id) {
        $sql = 'select * from  '.$table.'  where authId = '.$id;
        $result = DB::excute($sql);
        $row = DB::getdata($result);
        $auth = new auth();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $auth->authId = $row['authId'];
        $auth->authName = $row['authName'];
        $auth->authImg = $row['authImg'];
        $auth->authAdress = $row['authAdress'];
        $auth->authPhone = $row['authPhone'];
        return $auth;
    }
    public function delId($id) {
        $sql = 'delete from auth where authId = '.$id;
        DB::excute($sql);
    }
    public function search($text_search) {
        //var_dump($arrdata);
        $sql = "select * from auth where authName = '$text_search'";
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
           $auth = new auth();
           $auth->authId = $row['authId'];
           $auth->authName = $row['authName'];
           $auth->authImg = $row['authImg'];
           $auth->authAdress = $row['authAdress'];
           $auth->authPhone = $row['authPhone'];
           $arr_data[] = $auth;
        }
        return $arr_data;
        //return $result;
    }
}