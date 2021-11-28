<?php
require_once("model/home_model.php");
require_once("model/entity.php");
class admin_controller {
    private $home_model;
    function __construct() {
        $this->home_model = new home_model;
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
        // lấy thông tin người dùng từ cookie
        $getStatus = false;
        //$User = [];
        if (isset($_COOKIE['token'])) {
            $getUserName = $_COOKIE['token'];
            $User = $this->home_model->getUser($getUserName); 
            $getStatus = true;
            require_once("View/admin/admin_view.php");
        }
        else {
            $getStatus = false;
            header("location: index.php?controller=login");
            //$User['userName'] = '';
        }      
       // require_once("View/admin/admin_view.php");
    }
}
?>
    

   

   
