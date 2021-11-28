<?php
require_once("model/book_model.php");
require_once("model/entity.php");
class book_controller {
    private $book_model;
    function __construct() {
        $this->book_model = new book_model;
        $category_list = new category();
        $category_list = $this->book_model->selectCategory();
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
        $category_list = new category();
        $publish_list = new publish();
        $auth_list = new auth();
        $category_list = $this->book_model->selectCategory();
        $publish_list = $this->book_model->selectPublish();
        $auth_list = $this->book_model->selectAuth();
        require_once("View/book/bookadd_view.php");
    }
    
    function add() {
        $msg = "";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $book = new book();
        if(!empty($arrdata['bookName']) && !empty($arrdata['bookImg']) && !empty($arrdata['bookQuantity'])) {
            $book->bookName = $arrdata['bookName'];
            $book->bookImg = $arrdata['bookImg'];
            $book->bookQuantity = $arrdata['bookQuantity'];
            $book->bookPrice = $arrdata['bookPrice'];
            $book->idCategory = $arrdata['idCategory']; 
            $book->publishId = $arrdata['publishId']; 
            $book->authId = $arrdata['authId']; 
            $this->book_model->insert($book);

            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $book_row = $this->book_model->getNumber();
            $totalPage = ceil($book_row/5);
            $book_list = $this->book_model->select($curentPage);
        
            require_once("View/book/booklist_view.php");
        }
        else { 
            $msg = "Vui lòng điền đầy đủ thông tin";
            $category_list = new category();
            $publish_list = new publish();
            $auth_list = new auth();
            $category_list = $this->book_model->selectCategory();
            $publish_list = $this->book_model->selectPublish();
            $auth_list = $this->book_model->selectAuth();
            require_once("View/book/bookadd_view.php");
        }
    }

    function update() {
        $msg = "";
        $book_list = new book();
        $category_list = $this->book_model->selectCategory();
        $publish_list = $this->book_model->selectPublish();
        $auth_list = $this->book_model->selectAuth();
        $id = filter_input(INPUT_POST,"id");
        $book_list = $this->book_model->selectSingleId($id);
        require_once("View/book/bookupdate_view.php");
    }
    function update1() {
        $msg = "";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $id = $arrdata['bookId'];
        if(!empty($arrdata['bookName']) && !empty($arrdata['bookImg']) && !empty($arrdata['bookQuantity']) && !empty($arrdata['bookPrice'])) {
            $book = new book();
            $book->bookName = $arrdata['bookName'];
            $book->bookImg = $arrdata['bookImg'];
            $book->bookQuantity = $arrdata['bookQuantity'];
            $book->bookPrice = $arrdata['bookPrice'];
            $book->idCategory = $arrdata['idCategory']; 
            $book->publishId = $arrdata['publishId']; 
            $book->authId = $arrdata['authId']; 
            //console.log($id);
            $this->book_model->updateId($book,$id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $book_row = $this->book_model->getNumber();
            $totalPage = ceil($book_row/5);
            $book_list = $this->book_model->select($curentPage);
            require_once("View/book/booklist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin sách";
            $book_list = new book();
            $category_list = $this->book_model->selectCategory();
            $publish_list = $this->book_model->selectPublish();
            $auth_list = $this->book_model->selectAuth();
            $book_list = $this->book_model->selectSingleId($id);
            require_once("View/book/bookupdate_view.php");
        }
    }
    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->book_model->delId($id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $book_row = $this->book_model->getNumber();
            $totalPage = ceil($book_row/5);
            $book_list = $this->book_model->select($curentPage);
        
            require_once("View/book/booklist_view.php");
        }
    }

    function list() {
        // truy xuất vào sql lấy dl và đưa vào biến book_list
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $book_row = $this->book_model->getNumber();
        $totalPage = ceil($book_row/5);
        $book_list = $this->book_model->select($curentPage);
        require_once("View/book/booklist_view.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $book_row = $this->book_model->getNumber();
        $totalPage = ceil($book_row/5);
        $book_list = $this->book_model->select($curentPage);  
        require_once("View/book/bookpage_view.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $search = $this->book_model->search($text_search);
        require_once("View/book/search.php");
    }
}
