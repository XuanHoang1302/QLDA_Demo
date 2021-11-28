<?php
require_once("model/forgot_model.php");
require_once("model/entity.php");
class forgot_controller {
    private $forgot_model;
    function __construct() {
        $this->forgot_model = new forgot_model;
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
        $msg = $email = "";
        $flag = $result = true;
        $action = filter_input(INPUT_POST,'action');
        if($action){
            $email = filter_input(INPUT_POST,'email');
            $result = $this->forgot_model->checkEmail($email);
            if ($result) {
                $flag = false;
                $this->forgot_model->sendPass($email);          
                header("location: index.php?controller=login");
            }
            else {
                $msg = "Thông tin tài khoản không chính xác";
            }
        }     
        require_once("View/forgot/forgotlist_view.php");
    }
}
