<?php
// require_once("./model/login_model.php");
// $this->login_model = new login_model();
// $flag=false;
// if($flag == true) {
//     $this->login_model->Pay();
// }
?>

<div class="container" style="padding: 2em 0;">
        <div class="panel panel-primary" style="margin: 2em 0;background-color:white;padding:1em 2em;">
            <div class="panel-heading" style="margin: 2em 0;">
                <h2 class="text-center">Quản Lý Danh Sách Mượn</h2>
            </div>
            <div class="panel-body" id="data"> 
                <div id="dataLoadPage">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50px"> STT </th>
                                <th> Hình ảnh</th>
                                <th> id</th>
                                <th> Tên sản phẩm</th>
                                <th> Số lượng</th>
                                <th> Giá</th>
                                <th> Thuộc Danh mục</th>
                                <th> Tác giả</th>
                                <th> Nhà xuất bản</th>
                                <th width="50px"></th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    $index = 1;
                    $soluong = 1;
                    foreach ($_SESSION['cart'] as $item) {
                    ?>
                            <tr>
                                <td> <?php echo $index++; ?></td>
                                <td> <img src="<?php echo $item['img'] ?>" alt="" style="width:100px;"></td>
                                <td> <?php  echo $item['id'] ?></td>
                                <td> <?php echo $item['name'] ?></td>
                                <td> <?php echo $item['quantity'] ?></td>
                                <td> <?php echo $item['price'] ?></td>
                                <td> <?php echo $item['categoryName'] ?></td>
                                <td> <?php echo $item['authName'] ?></td>
                                <td> <?php echo $item['publishName'] ?></td>
                                <td>
                                <a href="#" data-id=<?php  echo $item['id'] ?> class="btn_delete"> Xóa </a>
                                </td>
                            </tr>   
                    <?php
                            }
                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div style="display: flex;justify-content:flex-end">
                <button id="reset" class="btn btn-primary">Quay lại home</button>
                <button id="Dangky" class="btn btn-primary"  style="margin:0 3em;">Cập nhật danh sách mượn</button>
                <a onclick="return confirm('Check email để xem thời gian lấy sách?')" id="Thanhtoan" href="index.php?action=Pay" class="btn btn-primary">Gửi yêu cầu mượn</a>
            </div>
        </div>
    </div>