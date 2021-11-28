<?php
require_once('model/DB.php');
require_once('model/entity.php');
class home_model extends DB {
    public function select($page) {
        $itemStart = ($page - 1)*8;
        $sql = 'select * from book limit '.$itemStart.',8';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $book = new book();
           $book->bookId = $row['bookID'];
           $book->bookName = $row['bookName'];
           $book->bookQuantity = $row['quantity'];
           $book->bookImg = $row['img'];
           $book->bookPrice = $row['price'];
           $arr_data[] = $book;
        }
        return $arr_data;
    }
    public function selectId($id) {
        $sql = "select a3.bookID,a3.authName,a3.categoryName,a4.publishName,a4.bookName,a4.img,a4.price 
        from (select a1.bookID,a1.categoryName,a2.authName 
				from (select b.bookID,c.categoryName from category as c inner join book as b on c.categoryId=b.idCategory) as a1
						inner join (select b.bookID,a.authName from auth as a inner join book as b on a.authId=b.authId) as a2 
						on a1.bookID = a2.bookID
			) as a3 
        inner join (select b.bookID,b.bookName,b.img,b.price,p.publishName 
					from publish as p inner join book as b 
					on p.publishId=b.publishId) as a4 on a3.bookID = a4.bookID
        where a3.bookID = '$id'";

        $result = DB::excute($sql);
        $row = DB::getData($result);
        $book = new book();
        $book->bookId = $row['bookID'];
        $book->bookName = $row['bookName'];
        $book->bookImg = $row['img'];
        $book->bookPrice = $row['price'];
        $book->categoryName = $row['categoryName'];
        $book->publishName = $row['publishName'];
        $book->authName = $row['authName'];
        return $book;
    }
    public function getNumber() {
        $sql = 'select * from book';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function getNumberNews() {
        $sql = 'select * from news';
        $result = DB::excute($sql);
        $row = mysqli_num_rows($result);
        return $row;
    }
    public function getUser($getUserName) {
        $sql = "select reader.userName,reader.img,reader.Role,reader.idCard from status inner join reader on status.userId = reader.idCard where status.token = '$getUserName'";
        $result = DB::excute($sql);
        $data = DB::getData($result);
        return $data; 
    }

    public function InsertOrdersBook($user,$book)
    {
        $startPayment = date('Y-m-d , H:s:i');
        $newdate = strtotime ( '+2 day' , strtotime ( $startPayment ) ) ;
        $endPayment = date ( 'Y-m-j' , $newdate );
        // lấy ID hóa đơn đang thực thi của khách hàng
        $sql = "select id from orders group by id order by id desc";
        $result = DB::excute($sql);
        $data = DB::getData($result); 
        $orderId = $data['id'];
        // xóa hêt thông tin hóa đơn cuối cùng của khách trong ngày hôm nay
        $sql = "delete from readerBook where orderId = '$orderId'";
        DB::excute($sql);
        foreach($book as $item => $value) {
            $quantity = $value['quantity'];
            // Cập nhật lại hóa đơn cuối cùng cho khách ngày hôm nay
            $sql = "insert into readerBook(idCard,bookID,startPayment,endPayment,quantity,orderId) values(".$user['idCard'].",'$item','$startPayment','$endPayment','$quantity','$orderId')";
            DB::excute($sql); 
        }
    }
    public function search($arrdata) {
        //var_dump($arrdata);
        $bookName = $arrdata['bookName'];
        $authId = $arrdata['authId'];
        $publishId = $arrdata['publishId'];
        $sql = "select * from book where bookName = '$bookName' and publishId = '$publishId' and authId = '$authId'";
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $book = new book();
           $book->bookID = $row['bookID'];
           $book->bookName = $row['bookName'];
           $book->bookQuantity = $row['quantity'];
           $book->img = $row['img'];
           $book->bookPrice = $row['price'];
           $arr_data[] = $book;
        }
        return $arr_data;
    }
    public function getNews($page) {
        $itemStart = ($page - 1)*4;
        //$sql = "select * from news limit '$itemStart',4 ";
        $sql = 'select * from news limit '.$itemStart.',4';
        $result = DB::excute($sql);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $news = new book();
           $news->img = $row['img'];
           $news->title = $row['title'];
           $news->content = $row['content'];
           $news->start = $row['start'];
           $news->end = $row['end'];
           $arr_data[] = $news;
        }
        return $arr_data;
    }

    public function Pay($getEmail) {
        // xóa hết hóa đơn cũ trong session
        session_destroy();
        // tạo hóa đơn mới
        $sql = "select reader.userName,reader.img,reader.Role,reader.idCard from status inner join reader on status.userId = reader.idCard where status.token = '$getEmail'";
        $result = DB::excute($sql);
        $data = DB::getData($result);

        $userId = $data['idCard'];
        $createdDate = date('Y-m-d , H:s:i');
        $sql = "insert into orders(readerId,createdDate) values('$userId','$createdDate')";
        DB::excute($sql);
    }
}