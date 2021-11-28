<?php
//var_dump($home_list);
echo ' <div class="text-center" style="width:100%; color:green;">
            <h4> Trang hiện tại là : '.$curentPage.' </h4>
        </div>';              
foreach ($home_list as $item) {
?>
<?php 
    echo '<div class="col-sm-3 book_hover" style="margin-top:3em;">
                    <div class="book_item" style="padding:2em 0;"> 
                        <img src="'.$item->bookImg.'" alt="" style="width:80%;height:300px;">
                        <div style="margin-top:15px;">
                            <h4>'.$item->bookName.'</h4>
                        </div>
                        <div>
                            <button data-id="'.$item->bookId.'" class="show btn btn-primary">Xem chi tiêt</button>
                        </div>
                    </div>
                </div>';

?>
<?php
        }
?>
<!-- <div class="container" style="background-color: gray;display:flex;margin-top:35px;"> -->
