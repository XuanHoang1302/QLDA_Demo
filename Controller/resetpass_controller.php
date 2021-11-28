<?php
require_once("model/resetpass_model.php");
require_once("model/entity.php");
class resetpass_controller {
    private $reset_model;
    function __construct() {
        $this->reset_model = new reset_model;
    }
   
    public function run() {
        $action = filter_input(INPUT_GET,'action');

        if (method_exists($this,$action)) {
            $this->$action();
        }
        else {
            $this->list();
        }
    }
    function list() {
        $token = $_COOKIE['token'];
        $msg1 = $msg2 = "";
        $flag1 = $flag2 = true;
        $result = $this->reset_model->getUser($token);
      //  var_dump($result);
        $action = filter_input(INPUT_POST,'action');
        $reset = new reset();
        $reset->passWord = "";
        $reset->newPassWord = "";
        $reset->confirm_passWord = "";


        if($action){
            $reset->userName = filter_input(INPUT_POST,'userName');
            $reset->passWord = filter_input(INPUT_POST,'passWord');
            $reset->newPassWord = filter_input(INPUT_POST,'newPassWord');
            $reset->confirm_passWord = filter_input(INPUT_POST,'confirm-passWord');
            $check = $this->reset_model->checkPass($reset);
            var_dump($check);
            if($check == true) {
                echo "hello";
                if( $reset->newPassWord ==  $reset->confirm_passWord) {
                    $this->reset_model->update($reset);
                    header("location:index.php?controller=login");
                }
                else {
                    $flag2 = false;
                    $msg2 = "Mật khẩu mới và Nhập lại mật khảu mới không trùng khớp";
                }
            }
            else {
                    $flag1 = false;
                    echo "hello";
                    $msg1 = "Mật khẩu không chính xác";
            }
            
        }
        require_once("View/forgot/resetpass_view.php");
    }
}
