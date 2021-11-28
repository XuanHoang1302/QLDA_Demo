<?php
require_once("model/auth_model.php");
require_once("model/entity.php");
class auth_controller {
    private $auth_model;
    function __construct() {
        $this->auth_model = new auth_model;
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

    function getCategory() {
        $msg="";
        require_once("View/auth/authadd_view.php");
    }
    
    function add() {
        $msg="";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $auth = new auth();
        if(!empty($arrdata['authName']) && !empty($arrdata['authImg']) && !empty($arrdata['authPhone']) && !empty($arrdata['authAdress'])) {
            $auth->authName = $arrdata['authName'];
            $auth->authImg = $arrdata['authImg'];
            $auth->authPhone = $arrdata['authPhone'];
            $auth->authAdress = $arrdata['authAdress'];  
            $this->auth_model->insert($auth);
            /// hiện lại trang sau khi thêm

            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $auth_row = $this->auth_model->getNumber();
            $totalPage = ceil($auth_row/5);
            $auth_list = $this->auth_model->select($curentPage);
            require_once("View/auth/authlist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            require_once("View/auth/authadd_view.php");
        }       
    }

    function update() {
        $msg="";
        $id = filter_input(INPUT_POST,"id");
        $auth_list = new auth();
        $tbltable = "auth";
        $auth_list = $this->auth_model->selectSingleId($tbltable,$id);
        require_once("View/auth/authupdate_view.php");
    }
    function update1() {
        $msg="";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $auth = new auth();
        $id = $arrdata['authId'];
        if(!empty($arrdata['authName']) && !empty($arrdata['authImg']) && !empty($arrdata['authPhone']) && !empty($arrdata['authAdress'])) {
            $auth->authName = $arrdata['authName'];
            $auth->authImg = $arrdata['authImg'];
            $auth->authPhone = $arrdata['authPhone'];
            $auth->authAdress = $arrdata['authAdress'];
            $this->auth_model->updateId($auth,$id);

            // in lại sau thêm
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $auth_row = $this->auth_model->getNumber();
            $totalPage = ceil($auth_row/5);
            $auth_list = $this->auth_model->select($curentPage);
            require_once("View/auth/authlist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            $auth_list = new auth();
            $tbltable = "auth";
            $auth_list = $this->auth_model->selectSingleId($tbltable,$id);
            require_once("View/auth/authupdate_view.php");
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->auth_model->delId($id);
            //header("location:index.php");
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $auth_row = $this->auth_model->getNumber();
            $totalPage = ceil($auth_row/5);
            $auth_list = $this->auth_model->select($curentPage);
            require_once("View/auth/authlist_view.php");
        }
    }

    function list() {
        // truy xuất vào sql lấy dl và đưa vào biến auth_list
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $auth_row = $this->auth_model->getNumber();
        $totalPage = ceil($auth_row/5);
        $auth_list = $this->auth_model->select($curentPage);
        require_once("View/auth/authlist_view.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $auth_row = $this->auth_model->getNumber();
        $totalPage = ceil($auth_row/5);
        $auth_list = $this->auth_model->select($curentPage);  
        require_once("View/auth/authpage_view.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $search = $this->auth_model->search($text_search);
        require_once("View/auth/search.php");
    }
}
