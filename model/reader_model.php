<?php
require_once('model/DB.php');
require_once('model/entity.php');
class reader_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select * from reader limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
           $reader = new reader();
           $reader->readerId = $row['idCard'];
           $reader->readerName = $row['userName'];
           $reader->readerImg = $row['img'];
           $reader->readerPassWord= $row['passWord'];
           $reader->readerEmail = $row['email'];
           $reader->readerJob = $row['job'];
           $reader->readerBirthDay = $row['birthDay'];
           $reader->readerGender = $row['gender'];
           $reader->readerAdress = $row['adress'];
           $reader->readerRole = $row['Role'];
           $arr_data[] = $reader;
        }
        return $arr_data;
    }

    public function selectOnline($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select userId from status limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
            $id = $row['userId'];
            $sql = "select * from reader where idCard ='$id' ";
            $result1 = DB::excute($sql);
            $item = DB::getData($result1);
            $reader = new reader();
            $reader->readerId = $item['idCard'];
            $reader->readerName = $item['userName'];
            $reader->readerImg = $item['img'];
            $reader->readerPassWord= $item['passWord'];
            $reader->readerEmail = $item['email'];
            $reader->readerJob = $item['job'];
            $reader->readerBirthDay = $item['birthDay'];
            $reader->readerGender = $item['gender'];
            $reader->readerAdress = $item['adress'];
            $reader->readerRole = $item['Role'];
            $arr_data[] = $reader;
        }
        return $arr_data;
    }
    public function getNumber() {
        $sql = 'select * from reader';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }

    public function getNumberOnline() {
        $sql = 'select * from status';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }

    public function insert($reader) {
        $created_at = $updated_at = date('Y-m-d , H:s:i');
        $sql = "select * from reader where userName = '$reader->readerName'and email = ' $reader->readerEmail'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $passWord = DB::getSecurityMD5($reader->readerPassWord);
            $sql1 = 'insert into reader(img,userName,passWord,email,adress,Role,birthDay,job,gender)
            values("'.$reader->readerImg.'","'.$reader->readerName.'","'.$passWord.'","'.$reader->readerEmail.'","'.$reader->readerAdress.'","'.$reader->readerRole.'","'.$reader->readerBirthDay.'","'.$reader->readerJob.'","'.$reader->readerGender.'")';
            DB::excute($sql1); 
        }
    }

    public function updateId($reader_list,$id) {
        $sql = 'update reader set userName = "'.$reader_list->readerName.'" ,  Role = "'.$reader_list->readerRole.'" , adress = "'.$reader_list->readerAdress.'" ,img = "'.$reader_list->readerImg.'" , job = "'.$reader_list->readerJob.'" ,gender = "'.$reader_list->readerGender.'" ,birthDay = "'.$reader_list->readerBirthDay.'"  where idCard = '.$id;
        DB::excute($sql);
    }

    public function selectSingleId($id) {
        $sql = 'select * from reader  where idCard = '.$id;
        $result = DB::excute($sql);
        //var_dump($result);
        $row = DB::getdata($result);
        //$row = mysqli_fetch_array($result);
        //var_dump($row);
        $reader = new reader();
        //$arr_data = array();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $reader->readerId = $row['idCard'];
        $reader->readerName = $row['userName'];
        $reader->readerImg = $row['img'];
        $reader->readerJob = $row['job'];
        $reader->readerBirthDay = $row['birthDay'];
        $reader->readerGender = $row['gender'];
        $reader->readerAdress = $row['adress'];
        $reader->readerPassWord = $row['passWord'];
        $reader->readerEmail = $row['email'];
        $reader->readerRole = $row['Role'];
        return $reader;
    }
    public function delId($id) {
        $sql = 'delete from reader where idCard = '.$id;
        DB::excute($sql);
    }
    public function checkemail($reader) {
        $email = $reader->readerEmail;
        $sql = 'select * from reader where email='.$email;
        $result = DB::excute($sql);
        $row = DB::getdata($result);
        return $row;
    }

    public function search($text_search) {
        //var_dump($arrdata);
        $sql = "select * from reader where userName = '$text_search'";
        $result = DB::excute($sql);
        $arr_data = array();
        
        while ($row = DB::getData($result)) {
           $reader = new reader();
           $reader->idCard = $row['idCard'];
           $reader->userName = $row['userName'];
           $reader->img = $row['img'];
           $reader->passWord= $row['passWord'];
           $reader->email = $row['email'];
           $reader->job = $row['job'];
           $reader->birthDay = $row['birthDay'];
           $reader->gender = $row['gender'];
           $reader->adress = $row['adress'];
           $reader->Role = $row['Role'];
           $arr_data[] = $reader;
        }
        return $arr_data;
    }
    public function checkOnline($text_search) {
        $flag = false;
        $sql = "select idCard from reader where userName = '$text_search'";
        $data = DB::getData(DB::excute($sql));
        if ($data != null) {
            $id = $data['idCard']; 
            $sql = "select * from status where userId = '$id'";
            $data = DB::getData(DB::excute($sql));
            $flag = true;
        }
        return $flag;
    }
}