
<div class="container" id="show" style="padding: 1em 0;" >
    <div class="row" style="background-color: white;padding:2em 1.5em;">
        <div class="col-md-5">
            <div class="book">
                <img style="width:300px;" src="<?php echo $result->bookImg; ?>" alt="">
            </div>
        </div>
        <div class="col-md-7">
            <div class="title">
                <h3> Mã sách : <?php echo $result->bookId ?></h3>
                <h3> Tên sách :  <?php echo $result->bookName ?></h3>
                <h3> Tên tác giả :  <?php echo $result->authName ?></h3>
                <h3> Thuộc danh mục :  <?php echo $result->categoryName ?></h3>
                <h3> Tên nhà xuât bản : <?php echo $result->publishName ?></h3>
                <h3> Giá bán : <?php echo $result->bookPrice ?></h3>
            </div>
            <div style="display:flex;justify-content:end;">
                <button class="reset btn btn-primary" style="margin-right: 1em;">Quay lại</button>
                <?php
                            if(!isset($_COOKIE['token'])) {
                               
                                echo '<a href="index.php?controller=login" class="add btn btn-primary">Thêm vào danh sách mượn</a>';
                            }
                            else{
                                echo '<button data-id='.$result->bookId.'  class="add btn btn-primary">Thêm vào danh sách mượn</button>';
                            }
                          
               ?>
                
            </div>
        </div>
    </div>
</div>