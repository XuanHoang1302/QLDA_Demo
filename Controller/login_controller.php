<?php
session_start();
require_once("model/login_model.php");
require_once("model/entity.php");
class login_controller {
    private $login_model;
    function __construct() {
        $this->login_model = new login_model;
        if (isset($_COOKIE['token'])) {
            $history = $_COOKIE['token'];
            $this->login_model->delHistory($history);
        }
        setcookie("token", "", time()- 3 * 60 * 60);
        session_destroy();
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
        // truy xuất vào sql lấy dl và đưa vào biến login_list
        $login = new login();
        $msg= "";
        $actionPOST = filter_input(INPUT_POST,"action");
        if ($actionPOST) {
            $login->email=filter_input(INPUT_POST,'email');
            $login->passWord=filter_input(INPUT_POST,'passWord');
            $result = $this->login_model->checkLogin($login);
            if(empty($result)) {
                $msg = "không thành công";
            }
            else {
                $msg = "";
                // lưu thông tin login vào cookie và bảng status và tạo 1 hóa đơn trống
               $this->login_model->InsertOrders($this->login_model->getUser($this->login_model->save($login)));
                header("location: index.php");
            }
        }
        require_once("View/login/index.php");
    }
}
?>
    

   

   
