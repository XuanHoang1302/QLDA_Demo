<?php
require_once("model/category_model.php");
require_once("model/entity.php");
class category_controller {
    private $category_model;
    function __construct() {
        $this->category_model = new category_model;
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
        require_once("View/category/categoryadd_view.php");
    }
    function add() {
        $msg="";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $category = new category();
        if(!empty($arrdata['nameCategory'])) {
            $category->categoryName = $arrdata['nameCategory'];  
            $this->category_model->insert($category);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $category_row = $this->category_model->getNumber();
            $totalPage = ceil($category_row/5);
            $category_list = $this->category_model->select($curentPage);        
            require_once("View/category/categorylist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            require_once("View/category/categoryadd_view.php");
        }    
    }

    function update() {
        $msg="";
        $id = filter_input(INPUT_POST,"id");
        $category_list = new category();
        $tbltable = "category";
        $category_list = $this->category_model->selectSingleId($tbltable,$id);
        require_once("View/category/categoryupdate_view.php");
    }
    function update1() {
        $msg="";
        $listdata = filter_input(INPUT_POST,"listdata");
        parse_str($listdata,$arrdata);
        $category = new category();
        $id = $arrdata['idCategory'];
        if(!empty($arrdata['nameCategory'])) {
            $category->categoryName = $arrdata['nameCategory'];
            //console.log($id);
            $this->category_model->updateId($category,$id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $category_row = $this->category_model->getNumber();
            $totalPage = ceil($category_row/5);
            $category_list = $this->category_model->select($curentPage);        
            require_once("View/category/categorylist_view.php");
        }
        else {
            $msg = "Vui lòng điền đầy đủ thông tin";
            $category_list = new category();
            $tbltable = "category";
            $category_list = $this->category_model->selectSingleId($tbltable,$id);
            require_once("View/category/categoryupdate_view.php");
        }
    }

    function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $this->category_model->delId($id);
            if (isset($_POST['page'])) {
                $curentPage = $_POST['page'];
            }
            else {
                $curentPage = 1;
            }
            $category_row = $this->category_model->getNumber();
            $totalPage = ceil($category_row/5);
            $category_list = $this->category_model->select($curentPage);        
            require_once("View/category/categorylist_view.php");
        }
    }

    function list() {
        // truy xuất vào sql lấy dl và đưa vào biến category_list
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $category_row = $this->category_model->getNumber();
        $totalPage = ceil($category_row/5);
        $category_list = $this->category_model->select($curentPage);        
        require_once("View/category/categorylist_view.php");
    }
    function loadPage() {
        if (isset($_POST['page'])) {
            $curentPage = $_POST['page'];
        }
        else {
            $curentPage = 1;
        }
        $category_row = $this->category_model->getNumber();
        $totalPage = ceil($category_row/5);
        $category_list = $this->category_model->select($curentPage);  
        require_once("View/category/categorypage_view.php");
    }
    function search() {
        $text_search = filter_input(INPUT_POST,"text_search");
        $search = $this->category_model->search($text_search);
        require_once("View/category/search.php");
    }
}
