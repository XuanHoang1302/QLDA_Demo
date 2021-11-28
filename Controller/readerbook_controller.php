<?php
require_once("model/readerbook_model.php");
require_once("model/entity.php");
class readerbook_controller {
    private $readerbook_model;
    function __construct() {
        $this->readerbook_model = new readerbook_model;
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
        // truy xuất vào sql lấy dl và đưa vào biến book_list
        $readerbook_list = $this->readerbook_model->select();
        //var_dump($readerbook_list);
        require_once("View/readerbook/list.php");
        //require_once("View/publish/publishadd_view.php");
    }
}
