<?php
require_once("./model/book_model.php");
$this->book_model = new book_model();
?>
<style>
    .btn_category {
       background-color:hsla(50, 33%, 25%, .2);
       margin:2px 2px;
       border: none;
    }
    .btn_category:hover {
        color: #fff;
        background-color: #999;
    }
    .page {
        color: black;
        list-style: none;
        font-size: 1.4em;
        padding: 0 15px;
        margin: 5px 3px;
        background-color: white;
    }
    .page:hover {
        color: red;
        list-style: none;
        text-decoration: none;
    }
    .listPage {
        background-color: #ccc;
    }
</style>
    <div class="container">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h2 class="text-center">Quản Lý Sản Phẩm</h2>
            </div>
            <div class="panel-body" id="data"> 
                <button id="btn_add" class="btn btn-success" style="margin-bottom: 20px;"> Thêm sản phẩm</button>
                <div >
                    <div id="dataLoadPage">
                        <p>Trang hiện tại : <?php echo $curentPage ; ?> </p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50px"> STT </th>
                                    <th> Hình ảnh</th>
                                    <th> Tên sản phẩm</th>
                                    <th> Số lượng</th>
                                    <th> Giá</th>
                                    <th> Thuộc Danh mục</th>
                                    <th> Tác giả</th>
                                    <th> Nhà xuất bản</th>
                                    <th width="50px"></th>
                                    <th width="50px"></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php
    $index = 1;
    foreach ($book_list as $item) {
    ?>
                <tr>
                    <td><?php echo $index++; ?></td>
                    <td> <img src="<?php echo $item->bookImg; ?>" alt="" style="width:100px;"></td>
                    <td><?php echo $item->bookName; ?></td>
                    <td><?php echo $item->bookQuantity; ?></td>
                    <td><?php echo $item->bookPrice; ?></td>
                    <td> <?php $CN = $this->book_model->getCategoryId($item->idCategory); echo $CN->categoryName; ?></td>
                    <td> <?php $AN = $this->book_model->getAuthId($item->authId); echo $AN->authName; ?></td>
                    <td> <?php $PN = $this->book_model->getPublishId($item->publishId); echo $PN->publishName; ?></td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->bookId ?> class="btn_update">
                         Sửa 
                    </a>
                    </td>
                    <td>
                    <a href="#" data-id=<?php  echo $item->bookId ?> class="btn_delete">
                        Xóa
                    </a>
                    </td>
                </tr>   
    <?php
            }
    ?>
                        </tbody>
                    </table>
                </div>
                <div class="listPage text-center">
                    <?php
                        for($i = 1 ; $i <= $totalPage ; $i++) {
                            print '<a class="page" href="#" data-id="'.$i.'">'.$i.'</a>&nbsp;&nbsp';
                        }
                    ?>
                </div>
            </div>
            </div>
        </div>
    </div>