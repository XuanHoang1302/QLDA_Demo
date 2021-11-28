<?php
require_once("model/reader_model.php");
require_once("model/entity.php");
class readerOnline_controller {
    private $reader_model;
    function __construct() {
        $this->reader_model = new reader_model;
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
        // truy xuất vào sql lấy dl và đưa vào biến reader_list
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $reader_row = $this->reader_model->getNumberOnline();
        $totalPage = ceil($reader_row/5);
        $reader_list = $this->reader_model->selectOnline($curentPage);
        require_once("View/readerOnline/list.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $reader_row = $this->reader_model->getNumberOnline();
        $totalPage = ceil($reader_row/5);
        $reader_list = $this->reader_model->selectOnline($curentPage);  
        require_once("View/readerOnline/page.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $check = $this->reader_model->checkOnline($text_search);
        if ($check == true) {
           // $msg = "Kết quả timmf kiếm là ";
            $search = $this->reader_model->search($text_search);
            require_once("View/readerOnline/search.php");
        }
        else {
            $text = "";
            //$msg = "Không tìm thấy kết quả ";
            $search = $this->reader_model->search($text);
            require_once("View/readerOnline/search.php");
        }
    }
}
