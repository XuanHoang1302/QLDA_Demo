<?php
require_once("./model/book_model.php");


?>
</html><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" href="./View/home/main.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- navbar header -->
    <div class="container-fuild" style="width:100%;background-color:gray;padding-bottom:2em;">
        <div class="row">
            <div class="col-sm-3">
                <div class="logo" style="display:flex;align-items:center;justify-content: center;margin-top:15px;">
                    <img src="https://upload.wikimedia.org/wikipedia/vi/a/ad/LogoTLU.jpg" alt="" style="width:150px;border-radius:100%;align-items:center;">
                </div>
            </div>

            <div class="col-sm-6" style="display:flex;justify-content: center;">
                <div style="width:100%;">
                    <div class="tittle">
                        <h1>Thông tin liên hệ</h1>
                    </div>
                    <div class="tittle">
                        <div>
                            <h4>Hotline: (+84) 123 456 778</h4>
                            <h4>Email: tvonline@gmail.com</h4>
                        </div>
                        <div>
                            <h4>Địa chỉ: Hoàng Mai - Hà Nội</h4>
                            <h4>Giờ làm việc: 7h - 20h</h4>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-3" style="height:200px;">
                <?php 
                    if($getStatus == true) {
                        echo '
                            <div class="text-center" >
                            <img class="img" src="'.$User['img'].'" alt="" style="width:100px;border-radius:100%;">
                            </div>
                            <div class="text-center">
                                <h5>Xin chào '.$User['userName'].' </h5>
                            </div>
                        ';
                    }
                    else {
                        echo '
                            <div class="text-center" >
                            <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQc4Gtvgh2N6b1Pw6jNTQoAc0k8cN0FTDnesA&usqp=CAU" alt="" style="width:100px;border-radius:100%;">
                            </div>
                            <div class="text-center">
                                <h5>Chưa đăng nhập </h5>
                            </div>
                        ';
                    }
                ?>
                <div class="status">
                    <div class="text-center" style="margin-bottom:15px ;">
                        <ul class="status_link">
                            <li>
                                <?php 
                                    if($getStatus == true) {
                                        echo '<a name="status_login" style="text-decoration: none;color:black;margin:0 10px;" href="index.php?controller=login">log out</a>';
                                        echo '<a name="status_login" style="text-decoration: none;color:black;margin:0 10px;" href="index.php?controller=resetpass">Đổi mật khẩu</a>';
                                    }
                                    else {
                                        echo '<a name="status_login" style="text-decoration: none;color:black;margin:0 10px;" href="index.php?controller=login">log in</a>';
                                    }
                                ?>
                            </li>
                        </ul>
                        <ul class="status_admin">
                            <li>
                                <?php 
                                    if ($User['Role'] != 'reader') {
                                        echo '<a style="color: white;" href="index.php?controller=admin">Đến trang Admin</a>';
                                    }
                                    else {
                                        echo "";
                                    }
                                ?>  
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- category -->
    <div class="container-fuild" style="margin-top:25px;background-color:green;">
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">
                <ul class="category">
                    <li> <a class="link" href="index.php">Trang Chủ </a></li>
                    <li>
                        <a class="link link__gt" href="https://www.manula.com/manuals/lexuanhoang1302/h-ng-d-n/1/vi/topic/tr-giup">Trợ giúp <i class="fas fa-chevron-down"></i> </a>
                        <!-- <div class="gt">
                            <ul class="gt_link" style="padding-left:1em;font-size:0.7em;" >
                                <li class="link_extra"> <a style="color: black;" href="#"> Giới Thiệu Về Thư Viện </a> </li>
                                <li class="link_extra"> <a style="color: black;" href="#"> Nội Quy Của Thư Viện </a> </li>
                            </ul>
                        </div>      -->
                    </li>
                    <li> <a class="link link__tc" href="#"> Tra Cứu <i class="fas fa-chevron-down"></i> </a> 
                        <div class="book-search" style="padding: 0.5em 1em;">
                            <form method="POST" id="list">

                                <div class="book_space " style="margin: 20px 0;">
                                    <input name="bookName" type="text" placeholder=" Nhập Tên Sách" >
                                </div>
                                <div class="book_space " style="margin: 20px 0;">
                                    <select style="width:100%;height:40px" name="publishId" id="publishId">
                                        <option value="publishId"></option>
                                        <?php
                                        foreach ($publish_list as $item)
                                        {
                                            echo '<option value="'.$item->publishId.'">'.$item->publishName.' </option>';
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="book_space " style="margin: 20px 0;">
                                    <select style="width:100%;height:40px" name="authId" id="authId">
                                        <option value="authId"></option>
                                        <?php
                                        foreach ($auth_list as $item)
                                        {
                                            echo '<option value="'.$item->authId.'">'.$item->authName.' </option>';
                                        }
                                        ?>
                                    </select> 
                                </div>
                                <button name="action" value="save" type="button" id="timkiem" class="btn btn-primary">Search</button>
                            </form>
                        </div>
                    </li>
                    <li> <a class="link home1" href="#">Dịch Vụ </a> </li>
                    <li> <a class="link home2" href="#">Tin tức </a> </li>
                </ul>
            </div>
        </div>

    </div>

    <!-- product -->
        
        <div class="container-fuild" style="margin-top:40px;padding-left:20px;background-color:rgb(216, 211, 211);">
            <div id="category-1">

                <div class="row" id="content">
                    <!-- <div id="content"> -->
                        <?php
                        echo ' <div class="text-center" style="width:100%; color:green;">
                                    <h4> Trang hiện tại là : '.$curentPage.' </h4>
                                </div>';              
                        foreach ($home_list as $item) {
                        ?>
                        <?php 
                            echo ' <div class="col-sm-3 book_hover" style="margin-top:3em;">
                                        <div class="book_item" style="padding:2em 0;"> 
                                            <img src="'.$item->bookImg.'" alt="" style="width:80%;height:300px;">
                                            <div style="margin-top:15px;">
                                                <h4>'.$item->bookName.'</h4>
                                            </div>
                                            <div>
                                                <button data-id='.$item->bookId.' class="show btn btn-primary">Xem chi tiêt</button>
                                            </div>
                                        </div>
                                    </div>';
                        
                        ?>
                        <?php
                                }
                        ?>
                </div> 
                <div class="container text-center" style="background-color: gray;display:flex;margin-top:35px;justify-content:center">
                    <?php
                        for ($i = 1; $i <= $totalPage; $i++) {
                            echo '<a style="margin:1px 5px;" class="page"  href="#">' . $i . '</a> ';
                        }
                    ?>
                </div>
            </div>
        </div>


    <script>
        //$('#show_view').hide();
        $('a.page').on('click',function() {
            var _p = $(this).text();
            $.ajax({
                url         :           'index.php?action=load',
                type        :           'POST',
                data        :           {_page:_p},
                dataType    :           'html',
                success     :           function(html) {
                    $('div#content').html(html);
                    $('button.show').on('click',function() {
                    var id = $(this).data('id');
                    $.ajax({
                        url         :           'index.php?action=show',
                        type        :           'POST',
                        data        :           {id:id},
                        dataType    :           'html',
                        success     :           function(html) {
                            $('div#category-1').html(html);
                            $('button.reset').on('click',function() {
                                location.reload();
                            })
                            $('button.add').on('click',function() {
                            var id = $(this).data('id'); 
                            $.ajax({
                                url         :           'index.php?action=card',
                                type        :           'POST',
                                data        :           {id:id},
                                dataType    :           'html',
                                success     :           function(html) {
                                    $('div#category-1').html(html);
                                    request();
                                    function request() {
                                        $('button#reset').on('click',function() {
                                            location.reload();
                                        })
                                        $('button#Dangky').on('click',function() {
                                            var id = $(this).data('id'); 
                                            $.ajax({
                                                url         :           'index.php?action=save',
                                                type        :           'POST',
                                                data        :           {id:id},
                                                dataType    :           'html',
                                                success     :           function(html) {
                                                    $('div#category-1').html(html); 
                                                    request();                                               
                                                } })
                                        })
                                        $('a.btn_delete').on('click',function() {
                                            var id = $(this).data('id'); 
                                            $.ajax({
                                                url         :           'index.php?action=delete',
                                                type        :           'POST',
                                                data        :           {id:id},
                                                dataType    :           'html',
                                                success     :           function(html) {
                                                    $('div#category-1').html(html); 
                                                    request();                                           
                                                } 
                                            })
                                        })                                          
                                    } 

                                    
                                }
                            })
                        })
                        }
                    })
                })
                }
            })
        })
        $flag=true;

        $('button.show').on('click',function() {
            var id = $(this).data('id');
            $.ajax({
                url         :           'index.php?action=show',
                type        :           'POST',
                data        :           {id:id},
                dataType    :           'html',
                success     :           function(html) {
                    $('div#category-1').html(html);
                    $('button.reset').on('click',function() {
                        var _p = 1; 
                        $.ajax({
                            url         :           'index.php?action=load',
                            type        :           'POST',
                            data        :           {_page:_p},
                            dataType    :           'html',
                            success     :           function(html) {
                                $('div#category-1').html(html);
                            }
                        })
                        location.reload();
                    })
                    $('button.add').on('click',function() {
                        var id = $(this).data('id'); 
                        $.ajax({
                            url         :           'index.php?action=card',
                            type        :           'POST',
                            data        :           {id:id},
                            dataType    :           'html',
                            success     :           function(html) {
                                if (html == null) {
                                    $flag=false;
                                }
                                else {
                                    $('div#category-1').html(html);
                                    request();
                                    function request() {
                                        $('button#reset').on('click',function() {
                                            location.reload();
                                        })
                                        $('button#Dangky').on('click',function() {
                                            var id = $(this).data('id'); 
                                            $.ajax({
                                                url         :           'index.php?action=save',
                                                type        :           'POST',
                                                data        :           {id:id},
                                                dataType    :           'html',
                                                success     :           function(html) {
                                                    $('div#category-1').html(html); 
                                                    request();                                               
                                                } })
                                        })
                                        $('a.btn_delete').on('click',function() {
                                            var id = $(this).data('id'); 
                                            $.ajax({
                                                url         :           'index.php?action=delete',
                                                type        :           'POST',
                                                data        :           {id:id},
                                                dataType    :           'html',
                                                success     :           function(html) {
                                                    $('div#category-1').html(html); 
                                                    request();                                           
                                                } 
                                            })
                                        })
                                        // $('button#Thanhtoan').on('click',function() {
                                        //     location.reload();
                                        // })  
                                          
                                    } 
                                }
                            }
                        })
                    })
                }
            })
        })

        $('a.home1').on('click',function() {
            $.ajax({
                url         :           'index.php?action=dichvu',
                dataType    :           'html',
                success     :           function(html) {
                    $('div#category-1').html(html);
                }
            })
        })
        $('a.home2').on('click',function() {
            $.ajax({
                url         :           'index.php?action=tintuc',
                dataType    :           'html',
                success     :           function(html) {
                    $('div#category-1').html(html);
                }
            })
        })

        $('button#timkiem').on('click',function() {
            var listdata = $('#list').serialize();
            $.ajax({
                url     :       'index.php?action=search',
                type    :       'POST',
                data    :       {listdata:listdata},
                dataType:       'html',
                success :       function(html) {
                    $('div#category-1').html(html);
                    $('button.show').on('click',function() {
                        var id = $(this).data('id');
                        $.ajax({
                            url         :           'index.php?action=show',
                            type        :           'POST',
                            data        :           {id:id},
                            dataType    :           'html',
                            success     :           function(html) {
                                $('div#category-1').html(html);
                                $('button.reset').on('click',function() {
                                    var _p = 1; 
                                    $.ajax({
                                        url         :           'index.php?action=load',
                                        type        :           'POST',
                                        data        :           {_page:_p},
                                        dataType    :           'html',
                                        success     :           function(html) {
                                            $('div#category-1').html(html);
                                        }
                                    })
                                    location.reload();
                                })
                                $('button.add').on('click',function() {
                                    var id = $(this).data('id'); 
                                    $.ajax({
                                        url         :           'index.php?action=card',
                                        type        :           'POST',
                                        data        :           {id:id},
                                        dataType    :           'html',
                                        success     :           function(html) {
                                            if (html == null) {
                                                $flag=false;
                                            }
                                            else {
                                                $('div#category-1').html(html);
                                                request();
                                                function request() {
                                                    $('button#reset').on('click',function() {
                                                        location.reload();
                                                    })
                                                    $('button#Dangky').on('click',function() {
                                                        var id = $(this).data('id'); 
                                                        $.ajax({
                                                            url         :           'index.php?action=save',
                                                            type        :           'POST',
                                                            data        :           {id:id},
                                                            dataType    :           'html',
                                                            success     :           function(html) {
                                                                $('div#category-1').html(html); 
                                                                request();                                               
                                                            } })
                                                    })
                                                    $('a.btn_delete').on('click',function() {
                                                        var id = $(this).data('id'); 
                                                        $.ajax({
                                                            url         :           'index.php?action=delete',
                                                            type        :           'POST',
                                                            data        :           {id:id},
                                                            dataType    :           'html',
                                                            success     :           function(html) {
                                                                $('div#category-1').html(html); 
                                                                request();                                           
                                                            } 
                                                        })
                                                    })
                                                    // $('button#Thanhtoan').on('click',function() {
                                                    //     location.reload();
                                                    // })  
                                                    
                                                } 
                                            }
                                        }
                                    })
                                })
                            }
                        })
                    })
                }
            })
        })


    </script>

    <!-- bình luận -->
    <!-- <div class="container-fuild" style="background-color: gray;margin:15px 0;padding:30px 20px;min-height:150px;">
        <div class="comment_header">
            <div class="total_comment">
                <p>10 comment</p>
            </div>
            <div class="select_comment">
                <label for="comment">Sắp xếp theo : </label>
                <select  style="z-index:1;width:10em;height:40px" id="comment">
                    <option value="idCategory"> All </option>
                    <option value="idCategory">comment mới nhất</option>
                    <option value="idCategory1">comment cũ nhất</option>
                </select>
            </div>
        </div>
    </div> -->
<?php
require_once("./footter_view.php")
?>
</body>
</html>
