<?php
require_once("./model/book_model.php");
$this->book_model = new book_model();
?>
<table class="table table-bordered" >
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
    foreach ($search as $item) {
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
