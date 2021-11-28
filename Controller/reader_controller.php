<?php
require_once("model/reader_model.php");
require_once("model/entity.php");
class reader_controller {
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

    function getCategory() {
        $msg = "";
        require_once("View/reader/readeradd_view.php");
    }

    function add() {
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $reader = new reader();
        if (!empty($arrdata['readerName']) && !empty($arrdata['readerPassWord']) && !empty($arrdata['readerImg']) && !empty($arrdata['readerEmail'])
        && !empty($arrdata['readerJob']) && !empty($arrdata['readerBirthDay']) && !empty($arrdata['readerGender']) && !empty($arrdata['readerAdress']))
         {
            $reader->readerName = $arrdata['readerName'];
            $reader->readerPassWord = $arrdata['readerPassWord'];
            $reader->readerImg = $arrdata['readerImg'];
            $reader->readerEmail = $arrdata['readerEmail'];
            $reader->readerJob = $arrdata['readerJob'];
            $reader->readerBirthDay = $arrdata['readerBirthDay'];
            $reader->readerGender = $arrdata['readerGender'];
            $reader->readerAdress = $arrdata['readerAdress'];
            $checkEmail = $this->reader_model->checkemail($reader);
            if (empty($checkEmail)) {
                // lưu vào database
                $this->reader_model->insert($reader);
                // hiện thị lại danh sách
                if (isset($_POST['page'])) {
                    $curentPage = $_POST['page'];
                }
                else {
                    $curentPage = 1;
                }
                $reader_row = $this->reader_model->getNumber();
                $totalPage = ceil($reader_row/5);
                $reader_list = $this->reader_model->select($curentPage);
                require_once("View/reader/readerlist_view.php");
            }
            else {
                print "Email này đã tồn tại";
                require_once("View/reader/readeradd_view.php"); 
            }
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            require_once("View/reader/readeradd_view.php");
        }
    }

    function update() {
        $msg = "";
        $id = filter_input(INPUT_POST,"id");
        $reader_list = new reader();
        $reader_list = $this->reader_model->selectSingleId($id);
        require_once("View/reader/readerupdate_view.php");
    }
    function update1() {
        $msg = "";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $reader = new reader();
        $id = $arrdata['readerId'];
        if(!empty($arrdata['readerImg']) &&  !empty($arrdata['readerRole']) && !empty($arrdata['readerBirthDay'])
        &&  !empty($arrdata['readerJob'])  && !empty($arrdata['readerGender']) && !empty($arrdata['readerAdress'])) 
        {
            $reader->readerName = $arrdata['readerName'];
            $reader->readerImg = $arrdata['readerImg'];
            $reader->readerJob = $arrdata['readerJob'];
            $reader->readerBirthDay = $arrdata['readerBirthDay'];
            $reader->readerGender = $arrdata['readerGender'];
            $reader->readerAdress = $arrdata['readerAdress'];
            $reader->readerRole = $arrdata['readerRole'];
            //cập nhật lại thông tin người dùng
            $this->reader_model->updateId($reader,$id);
            // hiển thị lại danh sách sau khi cập nhật
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $reader_row = $this->reader_model->getNumber();
            $totalPage = ceil($reader_row/5);
            $reader_list = $this->reader_model->select($curentPage);
            require_once("View/reader/readerlist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            $reader_list = new reader();
            $reader_list = $this->reader_model->selectSingleId($id);
            require_once("View/reader/readerupdate_view.php");
        }
    }


    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->reader_model->delId($id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $reader_row = $this->reader_model->getNumber();
            $totalPage = ceil($reader_row/5);
            $reader_list = $this->reader_model->select($curentPage);
            require_once("View/reader/readerlist_view.php");
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
        $reader_row = $this->reader_model->getNumber();
        $totalPage = ceil($reader_row/5);
        $reader_list = $this->reader_model->select($curentPage);
        require_once("View/reader/readerlist_view.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $reader_row = $this->reader_model->getNumber();
        $totalPage = ceil($reader_row/5);
        $reader_list = $this->reader_model->select($curentPage);  
        require_once("View/reader/readerpage_view.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $search = $this->reader_model->search($text_search);
        require_once("View/reader/search.php");
    }
}
