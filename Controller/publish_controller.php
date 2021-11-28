<?php
require_once("model/publish_model.php");
require_once("model/entity.php");
class publish_controller {
    private $publish_model;
    function __construct() {
        $this->publish_model = new publish_model;
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
        $msg = "";
        require_once("View/publish/publishadd_view.php");
    }

    function add() {
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $publish = new publish();
        if(!empty($arrdata['publishName']) && !empty($arrdata['publishImg']) && !empty($arrdata['publishPhone']) && !empty($arrdata['publishAdress'])) {
            $publish->publishName = $arrdata['publishName'];
            $publish->publishImg = $arrdata['publishImg'];
            $publish->publishPhone = $arrdata['publishPhone'];
            $publish->publishAdress = $arrdata['publishAdress'];  
            $this->publish_model->insert($publish);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $publish_row = $this->publish_model->getNumber();
            $totalPage = ceil($publish_row/5);
            $publish_list = $this->publish_model->select($curentPage);
            require_once("View/publish/publishlist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            require_once("View/publish/publishadd_view.php");
        }
              
    }
    function update() {
        $msg = "";
        $id = filter_input(INPUT_POST,"id");
        $publish_list = new publish();
        $publish_list = $this->publish_model->selectSingleId($id);
        require_once("View/publish/publishupdate_view.php");
    }
    function update1() {
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $publish = new publish();
        $id = $arrdata['publishId'];
        if(!empty($arrdata['publishName']) && !empty($arrdata['publishImg']) && !empty($arrdata['publishPhone']) && !empty($arrdata['publishAdress'])) {
            $publish->publishName = $arrdata['publishName'];
            $publish->publishImg = $arrdata['publishImg'];
            $publish->publishPhone = $arrdata['publishPhone'];
            $publish->publishAdress = $arrdata['publishAdress'];
            //console.log($id);
            $this->publish_model->updateId($publish,$id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $publish_row = $this->publish_model->getNumber();
            $totalPage = ceil($publish_row/5);
            $publish_list = $this->publish_model->select($curentPage);
            require_once("View/publish/publishlist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            $publish_list = new publish();
            $publish_list = $this->publish_model->selectSingleId($id);
            require_once("View/publish/publishupdate_view.php");
        }
    }
    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->publish_model->delId($id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $publish_row = $this->publish_model->getNumber();
            $totalPage = ceil($publish_row/5);
            $publish_list = $this->publish_model->select($curentPage);
            require_once("View/publish/publishlist_view.php");
        }
    }

    function list() {
        // truy xuất vào sql lấy dl và đưa vào biến publish_list

        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $publish_row = $this->publish_model->getNumber();
        $totalPage = ceil($publish_row/5);
        $publish_list = $this->publish_model->select($curentPage);
        require_once("View/publish/publishlist_view.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $publish_row = $this->publish_model->getNumber();
        $totalPage = ceil($publish_row/5);
        $publish_list = $this->publish_model->select($curentPage);  
        require_once("View/publish/publishpage_view.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $search = $this->publish_model->search($text_search);
        require_once("View/publish/search.php");
    }
}
