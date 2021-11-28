<?php
require_once("model/news_model.php");
require_once("model/entity.php");
class News_controller {
    private $news_model;
    function __construct() {
        $this->news_model = new news_model;
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
        require_once("View/news/add.php");
    }
    
    function add() {
        $msg = "";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        if (!empty($arrdata['img']) && !empty($arrdata['title']) && !empty($arrdata['content']) ) {
            $news = new news();
            $news->newsImg = $arrdata['img'];
            $news->newsTitle = $arrdata['title'];
            $news->newsContent = $arrdata['content'];
            $this->news_model->insert($news);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $news_row = $this->news_model->getNumber();
            $totalPage = ceil($news_row/5);
            $news_list = $this->news_model->select($curentPage);
            require_once("View/news/news.php");      

        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            require_once("View/news/add.php");
        }
    }

    function update() {
        $msg = "";
        $id = filter_input(INPUT_POST,"id");
        $news = new news();
        $tbltable = "news";
        $news = $this->news_model->selectSingleId($tbltable,$id);
        require_once("View/news/update.php");
    }
    function update1() {
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $news = new news();
        $id = $arrdata['id'];
        if (!empty($arrdata['img']) && !empty($arrdata['title']) && !empty($arrdata['content']) ) {
            $news->newsImg = $arrdata['img'];
            $news->newsTitle = $arrdata['title'];
            $news->newsContent = $arrdata['content'];
            $this->news_model->updateId($news,$id);
            //require_once("View/news/update.php");
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $news_row = $this->news_model->getNumber();
            $totalPage = ceil($news_row/5);
            $news_list = $this->news_model->select($curentPage);
            require_once("View/news/news.php");

        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            $news = new news();
            $tbltable = "news";
            $news = $this->news_model->selectSingleId($tbltable,$id);
            require_once("View/news/update.php");
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->news_model->delId($id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $news_row = $this->news_model->getNumber();
            $totalPage = ceil($news_row/5);
            $news_list = $this->news_model->select($curentPage);
            require_once("View/news/news.php");
        }
    }

    function list() {
        // truy xuất vào sql lấy dl và đưa vào biến news_list
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $news_row = $this->news_model->getNumber();
        $totalPage = ceil($news_row/5);
        $news_list = $this->news_model->select($curentPage);
        require_once("View/news/news.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $news_row = $this->news_model->getNumber();
        $totalPage = ceil($news_row/5);
        $news_list = $this->news_model->select($curentPage);  
        require_once("View/news/page.php");
    }
}
