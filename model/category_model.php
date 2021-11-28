<?php
require_once('model/DB.php');
require_once('model/entity.php');
class category_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select * from category limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $category = new category();
           $category->categoryId = $row['categoryId'];
           $category->categoryName = $row['categoryName'];
           $arr_data[] = $category;
        }
        return $arr_data;
    }
    public function getNumber() {
        $sql = 'select * from category';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }

    public function insert($category) {
        $created_at = $updated_at = date('Y-m-d , H:s:i');
        // kiểm tra xem đã tồn tại danh mục chưa
        $sql = "select * from category where categoryName = '$category->categoryName'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $sql = "insert into category(categoryName,created_at,updated_at) 
            values ('$category->categoryName','$created_at','$updated_at')";
            DB::excute($sql);
        }
    }
    public function updateId($category_list,$id) {
        $updated_at = date('Y-m-d , H:s:i');
        $sql = 'update category set categoryName = "'.$category_list->categoryName.'" , updated_at = "'.$updated_at.'" where categoryId = '.$id;
        DB::excute($sql);
    }

    public function selectSingleId($table,$id) {
        $sql = 'select * from '.$table.'  where categoryId = '.$id;
        $result = DB::excute($sql);
        //var_dump($result);
        $row = DB::getdata($result);
        //$row = mysqli_fetch_array($result);
        //var_dump($row);
        $category = new category();
        //$arr_data = array();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $category->categoryName = $row['categoryName'];
        $category->categoryId = $row['categoryId'];
        //$arr_data[] = $category;
        return $category;
    }
    public function delId($id) {
        $sql = 'delete from category where categoryId = '.$id;
        DB::excute($sql);
    }
    public function search($text_search) {
        //var_dump($arrdata);
        $sql = "select * from category where categoryName = '$text_search'";
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $category = new category();
           $category->categoryId = $row['categoryId'];
           $category->categoryName = $row['categoryName'];
           $arr_data[] = $category;
        }
        return $arr_data;

    }
}