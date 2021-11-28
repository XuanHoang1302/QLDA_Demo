<?php
require_once('entity.php');
class DB {
    private $HOST = "localhost";
    private $USERNAME = "root";
    private $PASSWORD = "";
    private $DATABASE = "quanlythuvien";
    private $connect = null;
    private $result = null;
    private $Private_key = "saymotvongtayaidangcathanhxuandoilaynoibuon";

    // hàm kết nối database
    public function __construct() {
        $this->connect = new mysqli($this->HOST,$this->USERNAME,$this->PASSWORD,$this->DATABASE);
        if ($this->connect) {
           mysqli_set_charset($this->connect,"utf8");
        }
        else {
            echo "kết nối database thất bại";
            exit();
        }
        return $this->connect;
    }
    // hàm thực thi truy vấn
    public function excute($sql) {
        $this->result = $this->connect->query($sql);
        return $this->result;
    }
    // lấy 1 dòng dữ liệu
    public function getData($result) {
        if($this->result) {
            $data = mysqli_fetch_array($this->result);
        }
        else {
            $data = 0;
        }
        return $data;
    }
    // lấy toàn bộ dữ liệu
    public function getAllData($sql) {
        if($this->result) {
            while($datas = mysqli_fetch_array($this->result));
            $data = $datas;
        }
        else {
            $data = 0;
        }
        return $data;
    }
    // chèn dữ liệu
    public function getAcount() {
        $sql = 'select * from reader';
        $result = $this->excute($sql);
        $arr_data = array();
        while ($row = $this->getData($result)) {
           $reader = new reader();
           $reader->passWord = $row['passWord'];
           $reader->userName = $row['userName'];
           $arr_data[] = $reader;
        }
        return $arr_data;
    }
    function getSecurityMD5($passWord) {
        return md5($passWord.$this->Private_key);
    }
    function RandomPassWord()
    {
        $characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $pass = "";
        for ($i = 0; $i < 3; $i++) {
            $pass = $pass.$characters[rand(0, strlen($characters)-1)];
        }
        return $pass;
    }
}
