<div class="row" id="content" style="padding-bottom:2em;">
<!-- <div id="content"> -->
    <?php          
    foreach ($result as $item) {
    ?>
    <?php 
        echo ' <div class="col-sm-3 book_hover" style="margin-top:3em;">
                    <div class="book_item" style="padding:2em 0;"> 
                        <img src="'.$item->img.'" alt="" style="width:80%;height:300px;">
                        <div style="margin-top:15px;">
                            <h4>'.$item->bookName.'</h4>
                        </div>
                        <div>
                            <button data-id='.$item->bookID.' class="show btn btn-primary">Xem chi tiêt</button>
                        </div>
                    </div>
                </div>';
    
    ?>
    <?php
            }
    ?>
</div> 