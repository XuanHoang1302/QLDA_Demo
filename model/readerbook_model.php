<?php
require_once('model/DB.php');
require_once('model/entity.php');
class readerbook_model extends DB {
    public function select() {
        $sql = "select a1.userName,a2.bookName,a1.startPayment,a1.endPayment,a1.quantity,a1.Status 
        from (select rd.userName,rb.bookID,rb.startPayment,rb.endPayment,rb.quantity,rb.Status  from readerBook as rb inner join reader as rd on rb.idCard = rd.idcard) as a1 inner join book as a2
        on a1.bookID=a2.bookID";
        // $sql = 'select * from book ';
        $result = DB::excute($sql);
        // print "<pre>";
        //var_dump($result);
        $arr_data = array();
        while ($row = DB::getData($result)) {
           $readerbook = new readerbook();
           $readerbook->userName = $row['userName'];
           $readerbook->bookName = $row['bookName'];
           $readerbook->startPayment = $row['startPayment'];
           $readerbook->endPayment = $row['endPayment'];
           $readerbook->quantity = $row['quantity'];
           $readerbook->Status = $row['Status'];
           $arr_data[] = $readerbook;
        }
        return $arr_data;
    }
}