<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> -->
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- link icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--  -->
    <!-- <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script> -->

    <title>Document</title>
</head>
<body style="margin: 10px 20px;">

    <!-- banner -->
    <div class="container-fuild">   
        <div class="banner" style=" background-color: rgb(224, 187, 187);">
            <div class="row">
                <!-- header_img -->
                <div class="col-sm-3 banner_img">
                    <div class="img">
                        <img src="<?php echo $User['img']; ?>" alt="" class="img_admin">
                    </div>
                    <div class="img">
                        <h3> <?php echo $User['userName'] ?></h3>
                        <p>Quản trị viên</p>
                    </div>
                </div>
                <!-- header_search -->
                <div class="col-sm-7">
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10 banner_input">
                            <input id="input-search" type="text" style="width:100%;" class="input-search" placeholder="Nhập thông tin tìm kiếm">
                            <select name="Danhmuc" id="Danhmuc">
                                <option value="category">Category</option>
                                <option value="book">Book</option>
                                <option value="auth">Auth</option>
                                <option value="publish">Publish</option>
                                <option value="reader">Reader</option>
                                <option value="readerOnline">Reader Online</option>
                            </select>
                            <button class="btn_search" type="button" id="btn_search" name="btn_search" value="action">
                                <i class="fas fa-search" ></i>
                            </button>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </div>
                <!-- header_logout -->
                <div class="col-sm-2 banner_logout">
                    <div class="logout help">
                        <a href="https://www.manula.com/manuals/lexuanhoang1302/h-ng-d-n/1/vi/topic/tr-giup">Help</a>
                    </div>
                    <div class="logout">   
                        <a href="index.php">Quay lại home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- body -->
    <div class="container-fuild ">

        <div style="width:100%;height: 40px;">
        </div>

        <div class="row" style="background-color: #f5f5f5;"> 
             <!-- body__Danh mục -->
            <div class="col-sm-2" >
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10" style="background-color: white;">
                        <nav class="home border">
                            <h4><i class="fas fa-list-ul home-icon"></i>Home</h4>
                            <ul >
                                <li ><a id="category" class="home_link book" href="">category</a></li>
                                <li ><a id="book" class="home_link book" href="">book</a></li>
                                <li ><a id="auth" class="home_link book" href="">auth</a></li>
                                <li ><a id="publish" class="home_link book" href="">publish</a></li>
                            </ul>
                        </nav>
                        <nav class="news border">
                            <h4>User</h4>
                            <ul >
                            <li ><a id="reader" class="home_link book" href="">reader</a></li>
                            <li ><a id="readerOnline" class="home_link book" href="">readerOnline</a></li>
                            <li ><a id="mesage" class="home_link book" href="">readerbook</a></li>
                                <!-- <li ><a class="home_link menu" href="">World</a></li> -->
                            </ul>
                        </nav>
                        <nav class="event border">
                            <h4>Event</h4>
                            <ul >
                                <li ><a class="home_link book" href="">News</a></li>
                                <!-- <li ><a class="home_link menu" href="">domestic</a></li>
                                <li ><a class="home_link menu" href="">school</a></li> -->
                            </ul>
                        </nav>
                    </div>
                    <div class="col-sm-1"></div>
                </div>
            </div>
            <!-- body__app -->
            <div class="col-sm-10" >
                <div id="content" style="width:100%;height:100%;background-color:white; padding:10px 15px;">
                   <h2> Hello !!! Chào mừng bạn đến với trang quản trị Admin </h2>
                </div> 
            </div>
        </div>
    </div>


<!-- ajax  -->

<script>
    // ajax lần 1 hiện ra giao dienj list của danh mục cần xem
    $('a.book').on('click',function() {
        var book = $(this).text();
        console.log(book);
        $.ajax({
            type        :       'POST',
            url         :       'index.php?controller='+book,
            dataType    :       'html',
            data        :        {datas:book},
            success     :       function(html) {
                // if(html == 'false') {
                //         alert('Không có người dùng');
                //     }
                //     else {
                        $('#content').html(html); //dữ liệu HTML trả về sẽ được chèn vào trong thẻ có id = conten
                        // {            
                        // lấy sk từ nút click
    // thay đổi giao diện sang thêm và k cần ajax do k cần lấy dữ liệu
                            callbackAjax()
                            function callbackAjax() {
                                //$('#add').hide();
                                $('#btn_add').on('click',function() {
                                    $.ajax({
                                                url     :       'index.php?controller='+book+'&action=getCategory',
                                                type    :       'POST',
                                                dataType:       'html',
                                                success :       function(html) {
                                                    $('#content').html(html);
                                                    $('.btn_submit_add').on('click',function() {
                                                        var listdata = $('#list').serialize();
                                                   
                                                        $.ajax({
                                                            url     :       'index.php?controller='+book+'&action=add',
                                                            type    :       'POST',
                                                            dataType:       'html',
                                                            data    :       {listdata:listdata},
                                                            success :       function(html) {
                                                                 $('#content').html(html);
                                                                 callbackAjax()
                                                            }
                                                        })                                                 
                                                        })
                                            
                                                }
                                            })                   
                                })
                                $('.btn_submit_add').on('click',function() {
                                                        var listdata = $('#list').serialize();
                                                   
                                                        $.ajax({
                                                            url     :       'index.php?controller='+book+'&action=add',
                                                            type    :       'POST',
                                                            dataType:       'html',
                                                            data    :       {listdata:listdata},
                                                            success :       function(html) {
                                                                 $('#content').html(html);
                                                                 callbackAjax()
                                                            }
                                                        })                                                 
                                                        })
        // ajax lần 3 để thực hiện update dữ liệu
                                $('a.page').on('click',function(){
                                    var _p = $(this).data('id');
                                    $.ajax({
                                        url         :       'index.php?controller='+book+'&action=loadPage',
                                        type        :       'POST',
                                        dataType    :       'html',
                                        data        :       {page:_p},
                                        success     :       function(html) {
                                            $('#dataLoadPage').html(html);
                                            $('#btn_add').on('click',function() {
                                                $.ajax({
                                                            url     :       'index.php?controller='+book+'&action=getCategory',
                                                            type    :       'POST',
                                                            dataType:       'html',
                                                            success :       function(html) {
                                                                $('#content').html(html);
                                                                $('.btn_submit_add').on('click',function() {
                                                                    var listdata = $('#list').serialize();
                                                            
                                                                    $.ajax({
                                                                        url     :       'index.php?controller='+book+'&action=add',
                                                                        type    :       'POST',
                                                                        dataType:       'html',
                                                                        data    :       {listdata:listdata},
                                                                        success :       function(html) {
                                                                            $('#content').html(html);
                                                                            callbackAjax()
                                                                        }
                                                                    })                                                 
                                                                    })
                                                        
                                                            }
                                                        })                   
                                            })
                                            $('.btn_update').on('click',function() {
                                                var id = $(this).data('id');
                                                $.ajax({
                                                    url     :       'index.php?controller='+book+'&action=update',
                                                    type    :       'POST',
                                                    dataType:       'html',
                                                    data    :       {id:id},
                                                    success :       function(html) {
                                                        $('#content').html(html);
                
                                                        $('.btn_submit_update').on('click',function() {
                                                            var listdata = $('#update').serialize();
                                                            console.log(listdata);
                                                            $.ajax({
                                                                url     :       'index.php?controller='+book+'&action=update1',
                                                                type    :       'POST',
                                                                dataType:       'html',
                                                                data    :       {listdata:listdata},
                                                                success :       function(html) {
                                                                    $('#content').html(html);
                                                                    callbackAjax();
                                                                }
                                                            })
                                                        })  
                                                    }
                                                })
                                            })
                                            $('.btn_submit_update').on('click',function() {
                                                            var listdata = $('#update').serialize();
                                                            console.log(listdata);
                                                            $.ajax({
                                                                url     :       'index.php?controller='+book+'&action=update1',
                                                                type    :       'POST',
                                                                dataType:       'html',
                                                                data    :       {listdata:listdata},
                                                                success :       function(html) {
                                                                    $('#content').html(html);
                                                                    callbackAjax();
                                                                }
                                                            })
                                                        })  
                                            $('.btn_delete').on('click',function() {
                                                var id = $(this).data('id');
                                                $.ajax({
                                                    url     :       'index.php?controller='+book+'&action=delete',
                                                    type    :       'POST',
                                                    dataType:       'html',
                                                    data    :       {id:id},
                                                    success :       function(html) {  
                                                        $('#content').html(html);
                                                        callbackAjax();   
                                                    }
                                                })
                                            })
                                        }
                                    })
                                })
                                $('.btn_update').on('click',function() {
                                    var id = $(this).data('id');
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=update',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {id:id},
                                        success :       function(html) {
                                            $('#content').html(html);
    
                                            $('.btn_submit_update').on('click',function() {
                                                var listdata = $('#update').serialize();
                                                console.log(listdata);
                                                $.ajax({
                                                    url     :       'index.php?controller='+book+'&action=update1',
                                                    type    :       'POST',
                                                    dataType:       'html',
                                                    data    :       {listdata:listdata},
                                                    success :       function(html) {
                                                        $('#content').html(html);
                                                        callbackAjax()
                                                    }
                                                })
                                            })  
                                        }
                                    })
                                })
        // ajax lần 4 để xóa dữ liệu$('.btn_submit_update').on('click',function() {
                                $('.btn_submit_update').on('click',function() {
                                    var listdata = $('#update').serialize();
                                    console.log(listdata);
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=update1',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {listdata:listdata},
                                        success :       function(html) {
                                            $('#content').html(html);
                                            callbackAjax()
                                        }
                                    })
                                })  
                                $('.btn_delete').on('click',function() {
                                    var id = $(this).data('id');
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=delete',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {id:id},
                                        success :       function(html) {  
                                            $('#content').html(html);
                                            callbackAjax()   
                                        }
                                    })
                                })
                            }


                    
            }
        })
        return false;
    })
</script>

<!-- ajax tìm kiếm -->
<script>
    $('#btn_search').on('click',function() {
        var text_search = $('#input-search').val();
        var book = $('#Danhmuc').val();
        console.log(book);
        console.log(text_search);
        function callbackAjax1() {
            $('#btn_add').on('click',function() {
                $.ajax({
                            url     :       'index.php?controller='+book+'&action=getCategory',
                            type    :       'POST',
                            dataType:       'html',
                            success :       function(html) {
                                $('#data').html(html);
                                $('.btn_submit_add').on('click',function() {
                                    var listdata = $('#list').serialize();
                                
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=add',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {listdata:listdata},
                                        success :       function(html) {
                                            $('#data').html(html);
                                            callbackAjax1();
                                        }
                                    })                                                 
                                })
                        
                            }
                        })                   
            })
            $('.btn_submit_add').on('click',function() {
                                    var listdata = $('#list').serialize();
                                
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=add',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {listdata:listdata},
                                        success :       function(html) {
                                            $('#data').html(html);
                                            callbackAjax1();
                                        }
                                    })                                                 
                                    })
    // ajax lần 3 để thực hiện update dữ liệu
            $('a.page').on('click',function(){
                var _p = $(this).data('id');
                $.ajax({
                    url         :       'index.php?controller='+book+'&action=loadPage',
                    type        :       'POST',
                    dataType    :       'html',
                    data        :       {page:_p},
                    success     :       function(html) {
                        $('#dataLoadPage').html(html);
                        $('#btn_add').on('click',function() {
                        $.ajax({
                            url     :       'index.php?controller='+book+'&action=getCategory',
                            type    :       'POST',
                            dataType:       'html',
                            success :       function(html) {
                                $('#data').html(html);
                                $('.btn_submit_add').on('click',function() {
                                    var listdata = $('#list').serialize();
                                
                                    $.ajax({
                                        url     :       'index.php?controller='+book+'&action=add',
                                        type    :       'POST',
                                        dataType:       'html',
                                        data    :       {listdata:listdata},
                                        success :       function(html) {
                                            $('#data').html(html);
                                            callbackAjax1();
                                        }
                                    })                                                 
                                })
                        
                            }
                            })                   
                        })
                        $('.btn_submit_add').on('click',function() {
                            var listdata = $('#list').serialize();
                        
                            $.ajax({
                                url     :       'index.php?controller='+book+'&action=add',
                                type    :       'POST',
                                dataType:       'html',
                                data    :       {listdata:listdata},
                                success :       function(html) {
                                    $('#data').html(html);
                                    callbackAjax1();
                                }
                            })                                                 
                        })
                        $('.btn_update').on('click',function() {
                            var id = $(this).data('id');
                            $.ajax({
                                url     :       'index.php?controller='+book+'&action=update',
                                type    :       'POST',
                                dataType:       'html',
                                data    :       {id:id},
                                success :       function(html) {
                                    $('#content').html(html);

                                    $('.btn_submit_update').on('click',function() {
                                        var listdata = $('#update').serialize();
                                        console.log(listdata);
                                        $.ajax({
                                            url     :       'index.php?controller='+book+'&action=update1',
                                            type    :       'POST',
                                            dataType:       'html',
                                            data    :       {listdata:listdata},
                                            success :       function(html) {
                                                $('#content').html(html);
                                                callbackAjax1();
                                            }
                                        })
                                    })  
                                }
                            })
                        })
                        $('.btn_submit_update').on('click',function() {
                            var listdata = $('#update').serialize();
                            console.log(listdata);
                            $.ajax({
                                url     :       'index.php?controller='+book+'&action=update1',
                                type    :       'POST',
                                dataType:       'html',
                                data    :       {listdata:listdata},
                                success :       function(html) {
                                    $('#content').html(html);
                                    callbackAjax1();
                                }
                            })
                        })  
                        $('.btn_delete').on('click',function() {
                            var id = $(this).data('id');
                            $.ajax({
                                url     :       'index.php?controller='+book+'&action=delete',
                                type    :       'POST',
                                dataType:       'html',
                                data    :       {id:id},
                                success :       function(html) {  
                                    $('#content').html(html);
                                    callbackAjax1();
                                }
                            })
                        })
                    }
                })
            })
            $('.btn_update').on('click',function() {
                var id = $(this).data('id');
                $.ajax({
                    url     :       'index.php?controller='+book+'&action=update',
                    type    :       'POST',
                    dataType:       'html',
                    data    :       {id:id},
                    success :       function(html) {
                        $('#content').html(html);

                        $('.btn_submit_update').on('click',function() {
                            var listdata = $('#update').serialize();
                            console.log(listdata);
                            $.ajax({
                                url     :       'index.php?controller='+book+'&action=update1',
                                type    :       'POST',
                                dataType:       'html',
                                data    :       {listdata:listdata},
                                success :       function(html) {
                                    $('#content').html(html);
                                    callbackAjax1();
                                }
                            })
                       })  
                    }
                })
            })
            $('.btn_submit_update').on('click',function() {
                var listdata = $('#update').serialize();
                console.log(listdata);
                $.ajax({
                    url     :       'index.php?controller='+book+'&action=update1',
                    type    :       'POST',
                    dataType:       'html',
                    data    :       {listdata:listdata},
                    success :       function(html) {
                        $('#content').html(html);
                        callbackAjax1();
                    }
                })
            })  
    // ajax lần 4 để xóa dữ liệu
            $('.btn_delete').on('click',function() {
                var id = $(this).data('id');
                $.ajax({
                    url     :       'index.php?controller='+book+'&action=delete',
                    type    :       'POST',
                    dataType:       'html',
                    data    :       {id:id},
                    success :       function(html) {  
                        $('#content').html(html);
                        callbackAjax1();
                    }
                })
            })
        }
        if (text_search == "") {
            $.ajax({
                url             :           'index.php?controller='+book+'&action=list',
                data            :           {text_search:text_search,key_search:book},
                dataType        :           'html',
                type            :           'POST',
                success         :           function(html) {
                    $('#content').html(html);
                    callbackAjax1()
                }
            })
        }
        else {
            $.ajax({
                url             :           'index.php?controller='+book+'&action=search',
                data            :           {text_search:text_search,key_search:book},
                dataType        :           'html',
                type            :           'POST',
                success         :           function(html) {
                    $('#content').html(html);
                    callbackAjax1()
                }
            })
        }
    })
</script>

</body>
</html>