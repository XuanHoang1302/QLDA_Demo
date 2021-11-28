<?php
require_once('model/DB.php');
require_once('model/entity.php');
class news_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*5;
        $sql = 'select * from news limit '.$itemStart.',5 ';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $news = new news();
           $news->newsId = $row['id'];
           $news->newsImg = $row['img'];
           $news->newsTitle = $row['title'];
           $news->newsContent = $row['content'];
           $news->newsStart = $row['start'];
           $news->newsEnd = $row['end'];
           $arr_data[] = $news;
        }
        return $arr_data;
    }
    public function getNumber() {
        $sql = 'select * from news';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }

    public function insert($news) {
        $start = date('Y-m-d , H:s:i');
        $newdate = strtotime ( '+2 day' , strtotime ( $start ) ) ;
        $end = date ( 'Y-m-d' , $newdate );
        // kiểm tra xem đã tồn tại danh mục chưa
        $sql = "select * from news where title = '$news->newsTitle'";
        $result = DB::getData(DB::excute($sql));
        if ($result == null) {
            $sql = "insert into news(img,title,content,start,end) 
            values ('$news->newsImg','$news->newsTitle','$news->newsContent','$start','$end')";
            DB::excute($sql);
        }
    }
    public function updateId($news,$id) {
        $start = date('Y-m-d , H:s:i');
        $newdate = strtotime ( '+2 day' , strtotime ( $start ) ) ;
        $end = date ( 'Y-m-d' , $newdate );
        $sql = 'update news set img = "'.$news->newsImg.'",title = "'.$news->newsTitle.'",content = "'.$news->newsContent.'",start = "'.$start.'",end = "'.$end.'"  where id = '.$id;
        DB::excute($sql);
    }

    public function selectSingleId($table,$id) {
        $sql = 'select * from '.$table.'  where id = '.$id;
        $result = DB::excute($sql);
        //var_dump($result);
        $row = DB::getdata($result);
        //$row = mysqli_fetch_array($result);
        //var_dump($row);
        $news = new news();
        //$arr_data = array();
        // nếu trả về là array ta cần fetch dữ liệu ra biến khác ms dùng dc
        $news->newsId = $row['id'];
        $news->newsImg = $row['img'];
        $news->newsTitle = $row['title'];
        $news->newsContent = $row['content'];
        //$arr_data[] = $news;
        return $news;
    }
    public function delId($id) {
        $sql = 'delete from news where id = '.$id;
        DB::excute($sql);
    }
}