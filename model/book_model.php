<?php
require_once('model/DB.php');
require_once('model/entity.php');
class book_model extends DB {
    public function selectCategory () {
        $sql = 'select * from category ';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
            $category = new category();
            $category->categoryName = $row['categoryName'];
            $category->categoryId = $row['categoryId'];
            $arr_data[] = $category;
        }
        return $arr_data;
    }
    function getCategoryId($id) {
        $sql = "select * from category where categoryId='$id'";
        $result = DB::excute($sql);
        $row = DB::getData($result);
        $category = new category();
        $category->categoryName = $row['categoryName'];
        $category->categoryId = $row['categoryId'];
        return $category;
    }
    function getPublishId($id) {
        $sql = "select * from publish where publishId='$id'";
        $result = DB::excute($sql);
        $row = DB::getData($result);
        $publish = new publish();
        $publish->publishName = $row['publishName'];
        $publish->publishId = $row['publishId'];
        return $publish;
    }
    function getAuthId($id) {
        $sql = "select * from auth where authId='$id'";
        $result = DB::excute($sql);
        $row = DB::getData($result);
        $auth = new auth();
        $auth->authName = $row['authName'];
        $auth->authId = $row['authId'];
        return $auth;
    }
    public function selectPublish() {
        $sql = 'select * from publish';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
            $publish= new publish();
            $publish->publishName = $row['publishName'];
            $publish->publishId = $row['publishId'];
            $arr_data[] = $publish;
        }
        return $arr_data;
    }
    public function selectAuth() {
        $sql = 'select * from auth ';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
            $auth = new auth();
            $auth->authName = $row['authName'];
            $auth->authId = $row['authId'];
            $arr_data[] = $auth;
        }
        return $arr_data;
    }
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select book.bookID, book.bookName, book.img, book.price, book.quantity , book.idCategory , book.publishId , book.authId
        from book limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        //var_dump($result);

        // while ($row = DB::getData($result)) {
        foreach ($result as $row) {
            $book = new book();
            // $id = $row['bookID'];
            // $sql = "select * from category where categoryId='$id'";
            // $result = DB::excute($sql);
            // $data = DB::getData($result);
            $book->bookId = $row['bookID'];
            $book->bookName = $row['bookName'];
            $book->bookImg = $row['img'];
            $book->bookQuantity = $row['quantity'];
            $book->bookPrice = $row['price'];
            $book->idCategory = $row['idCategory'];
            $book->publishId = $row['publishId'];
            $book->authId = $row['authId'];
            $arr_data[] = $book;
        }
        return $arr_data;
    }
    public function getNumber() {
        $sql = 'select * from book';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function insert($book) {
        $created_at = $updated_at = date('Y-m-d , H:s:i');
        $sql = "select * from book where bookName = '$book->bookName' and img = '$book->bookImg'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $sql = "insert into book(publishId,authId,bookName,img,quantity,price,idCategory) 
            values ('$book->publishId','$book->authId','$book->bookName','$book->bookImg','$book->bookQuantity','$book->bookPrice','$book->idCategory')";
            DB::excute($sql);
        }
    }

    public function updateId($book_list,$id) {
        $updated_at = date('Y-m-d , H:s:i');
        $sql = 'update book set publishId = "'.$book_list->publishId.'", authId = "'.$book_list->authId.'" , bookName = "'.$book_list->bookName.'" ,img = "'.$book_list->bookImg.'" 
        ,quantity = "'.$book_list->bookQuantity.'" ,price = "'.$book_list->bookPrice.'" ,idCategory = "'.$book_list->idCategory.'"  where bookID = '.$id;
        $result = DB::excute($sql);
    }

    public function selectSingleId($id) {
        $sql = 'select * from book  where bookId = '.$id;
        $result = DB::excute($sql);
        $row = DB::getdata($result);
        $book = new book();
        //$arr_data = array();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $book->bookId = $row['bookID'];
        $book->bookName = $row['bookName'];
        $book->bookImg = $row['img'];
        $book->bookQuantity = $row['quantity'];
        $book->bookPrice = $row['price'];
        $book->bookidCategory = $row['idCategory'];
        $book->bookPublishId = $row['publishId'];
        $book->bookAuthId = $row['authId'];
        return $book;
    }
    public function delId($id) {
        $sql = 'delete from book where bookId = '.$id;
        DB::excute($sql);
    }
    public function search($text_search) {
        //var_dump($arrdata);
        $sql = "select * from book where bookName = '$text_search'";
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
            $book= new book();
            $book->bookName = $row['bookName'];
            $book->bookId = $row['bookID'];
            $book->bookImg = $row['img'];
            $book->bookQuantity = $row['quantity'];
            $book->bookPrice = $row['price'];
            $book->idCategory = $row['idCategory'];
            $book->authId = $row['authId'];
            $book->publishId = $row['publishId'];
            $arr_data[] = $book;
        }
        return $arr_data;
    }
}