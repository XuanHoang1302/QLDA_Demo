<?php
require_once("model/register_model.php");
require_once("model/entity.php");
class register_controller {
    private $register_model;
    function __construct() {
        $this->register_model = new register_model;
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
        // truy xuất vào sql lấy dl và đưa vào biến register_list 
        $register = new register();
        $action = filter_input(INPUT_POST,"action");
        $msg = $msg1 = $msg2 = $register->userName =  $register->img =  $register->email = $register->adress = $register->job = $register->gender = $register->birthDay = "";

        if ($action) {
            $register->userName = filter_input(INPUT_POST,'userName');  
            $register->img = filter_input(INPUT_POST,'img');
            $register->email = filter_input(INPUT_POST,'email');
            $register->adress = filter_input(INPUT_POST,'adress');
            $register->job = filter_input(INPUT_POST,'job');
            $register->gender = filter_input(INPUT_POST,'gender');
            $register->birthDay = filter_input(INPUT_POST,'birthDay');
            $flag = $this->register_model->checkRegister($register);
            $flag1 = $this->register_model->checkEmail($register);
            $flag2 = $this->register_model->checkUserName($register);
            if($flag == true) {
                header("location: index.php?controller=login");  
            }
            else {
                if($flag1 == true) {
                    $msg1 = " Email này đã tồn tại";
                }
                elseif ($flag2 == true) {
                    $msg2 = " Tên người dùng này đã tồn tại";
                }
            }
        }
        require_once("View/register/index.php");
    }
   
}
?>
    

   

   
