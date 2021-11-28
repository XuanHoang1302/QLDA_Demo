<?php
require_once('model/DB.php');
require_once('model/entity.php');
class publish_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select * from publish limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
            $publish = new publish();
            $publish->publishId = $row['publishId'];
            $publish->publishName = $row['publishName'];
            $publish->publishImg = $row['publishimg'];
            $publish->publishAdress = $row['publishAdress'];
            $publish->publishPhone = $row['publishPhone'];
            $arr_data[] = $publish;
        }
        return $arr_data;
    }

    public function insert($publish) { 
        $created_at = $updated_at = date('Y-m-d , H:s:i');
        $sql = "select * from publish where publishName = '$publish->publishName' and publishPhone = '$publish->publishPhone' and publishimg = '$publish->publishImg'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $sql = "insert into publish(publishName,publishPhone,publishAdress,publishimg) 
            values ('$publish->publishName','$publish->publishPhone','$publish->publishAdress','$publish->publishImg')";
            DB::excute($sql);
        }
    }

    public function updateId($publish_list,$id) {
        $updated_at = date('Y-m-d , H:s:i');
        $sql = 'update publish set publishName = "'.$publish_list->publishName.'" ,publishPhone = "'.$publish_list->publishPhone.'" ,publishAdress = "'.$publish_list->publishAdress.'" ,publishimg = "'.$publish_list->publishImg.'" where publishId = '.$id;
        DB::excute($sql);
    }

    public function selectSingleId($id) {
        $sql = 'select * from publish  where publishId = '.$id;
        $result = DB::excute($sql);
        $row = DB::getdata($result);
        $publish = new publish();
        //$arr_data = array();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $publish->publishId = $row['publishId'];
        $publish->publishName = $row['publishName'];
        $publish->publishImg = $row['publishimg'];
        $publish->publishAdress = $row['publishAdress'];
        $publish->publishPhone = $row['publishPhone'];
        return $publish;
    }
    public function delId($id) {
        $sql = 'delete from publish where publishId = '.$id;
        DB::excute($sql);
    }
    public function getNumber() {
        $sql = 'select * from publish';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function search($text_search) {
        //var_dump($arrdata);
        $sql = "select * from publish where publishName = '$text_search'";
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
            $publish = new publish();
            $publish->publishId = $row['publishId'];
            $publish->publishName = $row['publishName'];
            $publish->publishImg = $row['publishimg'];
            $publish->publishAdress = $row['publishAdress'];
            $publish->publishPhone = $row['publishPhone'];
            $arr_data[] = $publish;
        }
        return $arr_data;
    }
}